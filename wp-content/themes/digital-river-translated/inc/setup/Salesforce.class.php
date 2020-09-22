<?php

class Salesforce{

    private static $post_fields = array(
        "grant_type"  => "password",
        "client_id"   => "3MVG9Z8h6Bxz0zc4NWhTFhzYWdsvN3zJ6ANKBBS7GMmy2gQsvWl3mP5JHAX_Qp3IQFMs2PRagXoGbwAldr7i6",
        "client_secret" => "9051947449520601292",
        "username"    => "mwilliamson@digitalriver.com.sandbox",
        "password"    => "p*-a(3T<w#@+e*n-"
      );

    private $salesforce_info;

    function __construct()
    {
      $this->salesforce_info = $this->get_key();
    }

    private function get_key()
    {

      $post_fields_string = "";
      $count = 0;
      foreach(self::$post_fields as $key => $post_field){
        if($count != 0){$post_fields_string .= "&";}
        $post_fields_string .= $key."=".$post_field;
        $count++;
      }

      echo ($post_fields_string);

      $curl = curl_init();
      curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

      curl_setopt_array($curl, array(
        CURLOPT_URL => "https://test.salesforce.com/services/oauth2/token",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $post_fields_string,
        CURLOPT_HEADER => false,
      ));

      $response = curl_exec($curl);
      $err = curl_error($curl);

      curl_close($curl);

      return json_decode($response);
    }


    private function search_accounts($search)
    {
      $post_fields = array(
        "q"  => $search,
        "fields"   => array("name", "Vertical_Market__c", "ICP_Account__c", "LastModifiedDate"),
        "sobjects" => array(array("name"=>"Account")),
        "in"    => "Website"
      );

      print_r($this->salesforce_info);

      $curl = curl_init();
      curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
      curl_setopt_array($curl, array(
        CURLOPT_URL => $this->salesforce_info->instance_url."/services/data/v37.0/parameterizedSearch",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => json_encode($post_fields),
        CURLOPT_HTTPHEADER => array(
          "content-type: application/json",
          "authorization: Bearer ". $this->salesforce_info->access_token,
          "cache-control: no-cache",
        ),
      ));

      $response = curl_exec($curl);
      $err = curl_error($curl);

      curl_close($curl);

      if ($err) {
        echo "cURL Error #:" . $err;
      } else {
        return json_decode($response);
      
      }
    }

    public function get_account($search)
    {
      $accounts = $this->search_accounts($search);

      $newest_account_timestamp = 0;
      $newest_account;

      if (count($accounts->searchRecords) > 0) {
        foreach ($accounts->searchRecords as $account) {
          if (strtotime($account->LastModifiedDate) > $newest_account_timestamp) {
            $newest_account = $account;
            $newest_account_timestamp = strtotime($account->LastModifiedDate);
            print_r($newest_account);
          }   
        }

        return $newest_account;
      }

      return false;
    }
}