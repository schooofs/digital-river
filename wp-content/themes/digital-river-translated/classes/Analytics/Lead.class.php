<?php

class Lead{

    public $id;
    public $ips;

    function __construct($id, $ips)
    {
        $this->id = $id;
        $this->ips = $ips;
    }

    static function get_by_id($user_id)
    {
        $client = Client::get();

        $response = $client->get([
                      'index' => 'leads',
                      'type' => 'lead',
                      'id' => $user_id
                    ]);

        $response["_source"]["id"] = $user_id;

        return $response["_source"];
    }

    static function create($organization, $ip)
    {
        $client = Client::get();

        date_default_timezone_set('UTC');
        $params = [
        'index' => 'leads',
        'type' => 'lead',
        'body' => [
            'time' => date("Y/m/j H:i:s"),
            'last_updated' => date("Y/m/j H:i:s"),
            'name' => $organization['name'],
            'domain' => $organization['domain'],
            'industry' => $organization['industry'],
            'system' => $organization['system'],
            'user_type' => $organization['user_type'],
            'ip' => array($ip),
            'view' => []
          ]
        ];

        $response = $client->index($params);

        if($response['created'] == 1){
            return $response;
        }else{
            return false;
        }
    }

    static function update($id, $new_IP){
      $params = [
        'index' => 'leads',
        'type' => 'lead',
        'id' => $id,
        'body' =>[
          "doc_as_upsert" => true,
          'doc' => $new_IP
        ]
      ];

      $response = $client->get([
                    'index' => 'leads',
                    'type' => 'lead',
                    'id' => $id
                  ]);

      return $response["_source"]['ip'];
      $response = $client->update($params);
    }

    static function add_company_info($user_id, $company_info)
    {
        $client = Client::get();

        $params = [
            'index' => 'leads',
            'type' => 'lead',
            'id' => $user_id,
            'body' => [
                "doc_as_upsert" => true,
                'doc' =>  $company_info
            ]
        ];

        $response = $client->update($params);

        return $response['_shards']['successful'];
    }

    static function is_icp(){

    }

}
