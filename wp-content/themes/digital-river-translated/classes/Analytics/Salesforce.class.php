<?php

class Salesforce{

    private static $post_fields = array(
        "grant_type"  => "password",
        "client_id"   => "",
        "client_secret" => "",
        "username"    => "",
        "password"    => ""
      );

    private $salesforce_info;

    function __construct()
    {
      $this->salesforce_info = $this->get_key();
    }

    private function get_key()
    {

      // $post_fields_string = "";
      // $count = 0;
      // foreach(self::$post_fields as $key => $post_field){
      //   $post_fields_string .= '-----011000010111000001101001\r\nContent-Disposition: form-data; name=\"'.$key.'\"\r\n\r\n'.$post_field.'\r\n';
      //   $count++;
      // }

      // $post_fields_string .= '-----011000010111000001101001--';


    
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://login.salesforce.com/services/oauth2/token",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "POST",
          CURLOPT_POSTFIELDS => "-----011000010111000001101001\r\nContent-Disposition: form-data; name=\"grant_type\"\r\n\r\npassword\r\n-----011000010111000001101001\r\nContent-Disposition: form-data; name=\"client_id\"\r\n\r\n3MVG99OxTyEMCQ3i_VdD9j6F7BstBOFKYu0j1qPUfnYI2ZgNjQD0fR4Zl16z6RrNZoPUtpTSVlZwVanCGO59b\r\n-----011000010111000001101001\r\nContent-Disposition: form-data; name=\"client_secret\"\r\n\r\n2324997527935493904\r\n-----011000010111000001101001\r\nContent-Disposition: form-data; name=\"username\"\r\n\r\nmwilliamson@digitalriver.com\r\n-----011000010111000001101001\r\nContent-Disposition: form-data; name=\"password\"\r\n\r\n94pw8H,U=ZpdavMZ\r\n-----011000010111000001101001--",
          CURLOPT_HTTPHEADER => array(
            "cache-control: no-cache",
            "content-type: multipart/form-data; boundary=---011000010111000001101001",
          ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
          // echo "cURL Error #:" . $err;
        } else {
          // echo $response;
        }

      return json_decode($response);
    }


    private function search_accounts($search)
    {
      $post_fields = array(
        "q"  => $search,
        "fields"   => array("Name", "Vertical_Market__c", "ICP_Bullseye__c", "LastModifiedDate"),
        "sobjects" => array(array("name"=>"Account")),
        "in"    => "Name"
      );

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

      // $newest_account_timestamp = 0;
      // $newest_account;

      if (count($accounts->searchRecords) > 0) {
        // foreach ($accounts->searchRecords as $account) {
        //   if (strtotime($account->LastModifiedDate) > $newest_account_timestamp) {
        //     $newest_account = $account;
        //     $newest_account_timestamp = strtotime($account->LastModifiedDate);
        //   }   
        // }

        return $accounts->searchRecords[0];
      }

      return false;
    }
}