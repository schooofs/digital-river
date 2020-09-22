<?php

class Salesforce{

    private $salesforce_info;

    function __construct()
    {
        add_action( 'sf_sync_accounts', [&$this, 'sync_accounts'] );
    }

    private static function get_key()
    {
      $fields = [
        "grant_type"    => "password",
        "client_id"     => "3MVG99OxTyEMCQ3i_VdD9j6F7BstBOFKYu0j1qPUfnYI2ZgNjQD0fR4Zl16z6RrNZoPUtpTSVlZwVanCGO59b",
        "client_secret"   => "2324997527935493904",
        "username"      => "mwilliamson@digitalriver.com.sandbox",
        "password"      => "powerAID10!"."MyI8yTsN8pB9agcgp1sRmC2d"
      ];

      $field_string = [];
      foreach($fields as $key => $field) {
        $field_string[] = $key . "=" . $field;
      }

      $curl = new \GuzzleHttp\Client();
      $response = $curl->request("POST", "https://test.salesforce.com/services/oauth2/token", [
        "headers" => ['Content-Type: application/x-www-form-urlencoded'],
        "form_params"    => $fields
      ]);

      return json_decode($response->getBody());
    }

    public static function sync_accounts()
    {
      wp_mail( 'mwilliamson@digitalriver.com', 'DR', 'WP Crontrol rocks!' );

      global $wpdb;

      require get_template_directory() . '/inc/vendor/autoload.php';

      $wp_accounts = [];
      $results = $wpdb->get_results( 'SELECT * FROM wp_tar', ARRAY_A );
      foreach($results as $key => $result) {
        $wp_accounts[$key] = $result['domain'];
      }

      $accounts = self::get_accounts();

      $extract = new LayerShifter\TLDExtract\Extract();
      $query = "INSERT INTO wp_tar (name, domain, sf_id) VALUES ";
      $values = [];
      $place_holders = [];

      foreach($accounts as $key => $account) {
        $parsed_domain = $extract->parse($account->Website);
        if($parsed_domain->getRegistrableDomain() !== NULL) {
          $pos = array_search($parsed_domain->getRegistrableDomain(), $wp_accounts);
          if ( $pos === false ) {
            array_push($values, $account->Name, $parsed_domain->getRegistrableDomain(), $account->Id);
            $place_holders[] = "('%s','%s','%s')";
          } else {
            unset($wp_accounts[$pos]);
          }
        }
      }    

      if ( count($wp_accounts) > 0 ) {
        $domain_list = array_map(function($domain){
          return "'" . $domain . "'";
        }, $wp_accounts);
        $domain_list = implode(",",$domain_list);
        $wpdb->query("DELETE FROM wp_tar WHERE domain IN (" . $domain_list . ")");
      }

      $query .= implode(', ', $place_holders);
      $wpdb->query( $wpdb->prepare("$query ", $values));

      wp_mail( 'mwilliamson@digitalriver.com', 'DR Done', 'WP Crontrol rocks!' );
      
    }

    public static function get_accounts()
    {
      $salesforce_info = self::get_key();

      $accounts = [];
      $done = false;
      $endpoint = "/services/data/v37.0/query"."?q=SELECT+Id,Name,Account_Overall_Grade__c,Website+from+Account+where+Account_Overall_Grade__c>30+AND+Percent_Complete__c=100";

      while ($done === false) {
      
        try {
          $curl = new \GuzzleHttp\Client();
          $response = $curl->request("GET", $salesforce_info->instance_url.$endpoint, [
            'headers' => [
              'Authorization' => 'Bearer '.$salesforce_info->access_token,
              'Content-Type' => 'application/json'
            ]
          ]);  
        } catch (Exception $e) {};

        $response = json_decode($response->getBody());
        $done = $response->done;
        $endpoint = $response->nextRecordsUrl;

        $accounts = array_merge($accounts, $response->records);
      
      }
      
      return $accounts;
    }

   
}


