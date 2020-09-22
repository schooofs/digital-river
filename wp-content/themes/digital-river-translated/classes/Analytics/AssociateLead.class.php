<?php

class AssociateLead{
	
	static function get_better_lead($original, $challenger)
	{
		if($original['_source']['name'] != ""){
			return "original";
		}else if($challenger['_source']['name'] != ""){
			return "challenger";
		}else{
			return false;
		}
	}

	static function merge($id, $id_to_merge)
	{
        $client = Client::get();


        $response = $client->get([
	      'index' => 'leads',
	      'type' => 'lead',
          'id' => $id
        ]);


        $id_to_merge_info = $client->get([
	      'index' => 'leads',
	      'type' => 'lead',
          'id' => $id_to_merge
        ]);

        $winner = self::get_better_lead($response, $id_to_merge_info);

        $new_values = array();

        if($winner == "original"){

        	$new_values['view'] = array_merge($response['_source']['view'], $id_to_merge_info['_source']['view']);
        	$new_values['ip'] = array_unique(array_merge($response['_source']['ip'],$id_to_merge_info['_source']['ip']), SORT_REGULAR);

        	foreach($response['_source'] as $key => $source_item){
				if(preg_match('/_score/', $key)){
					$new_values[$key] = $source_item + $id_to_merge_info['_source'][$key];
				}
			}

			$id = $response['_id'];

			$params = [
			    'index' => 'leads',
			    'type' => 'lead',
			    'id' => $id_to_merge_info['_id']
			];

			$response = $client->delete($params);


        }else if($winner == "challenger"){

        	$new_values['_source']['view'] = array_merge($id_to_merge_info['_source']['view'], $response['_source']['view']);
        	$new_values['_source']['ip'] = array_unique(array_merge($id_to_merge_info['_source']['ip'],$response['_source']['ip']), SORT_REGULAR);

					foreach($id_to_merge_info['_source'] as $key => $source_item){
						if(preg_match('/_score/g', $key)){
							$new_values[$key] = $source_item + $response['_source'][$key];
						}
					}

					$id = $id_to_merge_info['_id'];

					$params = [
					    'index' => 'leads',
					    'type' => 'lead',
					    'id' => $response['_id']
					];

					$response = $client->delete($params);

        }

				$params = [
		            'index' => 'leads',
		            'type' => 'lead',
		            'id' => $id,
		            'body' => [
		                "doc_as_upsert" => true,
		                'doc' => $new_values
		            ]
		        ];

        $response = $client->update($params);

		return $response['_id'];
	}

	static function get_ips_by_id($id)
	{
		$client = Client::get();

		$response = $client->get([
			'index' => 'leads',
			'type' => 'lead',
			'id' => $id
		]);

		return $response["_source"]['ip'];
	}



	static function get_lead_ids_by_name($name)
	{
    	$client = Client::get();

		if($exclude_ids == null){
			$exclude_ids = array();
		}

		if($exclude_ids != null && !is_array($exclude_ids)){
 			$exclude_ids = array($exclude_ids);
 		}

		$params = [
			'index' => 'leads',
			'type' => 'lead',
			'_source' => ["id"],
			'body' => [
				'size' => 1,
				'query' => [
					'bool' => [
						"must" =>[
							'term' => [
								'name' => $name
							],
						]
					]
				]
			]
		];

		try {

			$response = $client->search($params);

			if ( count($response['hits']['hits']) == 1 ) {

				return $response['hits']['hits'][0]['_id'];

			}else{

				return false;

			}

		} catch (Exception $e) {

			return false;

		}

	}

	static function get_lead_ids_by_ip($ip, $exclude_ids = array())
	{
    	$client = Client::get();

		if($exclude_ids == null){
			$exclude_ids = array();
		}

		if($exclude_ids != null && !is_array($exclude_ids)){
 			$exclude_ids = array($exclude_ids);
 		}

		$params = [
			'index' => 'leads',
			'type' => 'lead',
			'_source' => ["ip"],
			'body' => [
				'size' => 1000,
				'query' => [
					'bool' => [
						"must" =>[
							'term' => [
								'ip' => $ip
							],
						],
						"must_not" => [
							"ids" => [
								"values" => $exclude_ids
							]
						]
					]
				]
			]
		];


		try {

			$response = $client->search($params);

			return array_column($response['hits']['hits'], '_id');

		} catch (Exception $e) {

			return array();

		}

	}

	static function get_associated_leads_by_id($id, $exclude_ids = array())
	{

			$leads = array();

			$ips = self::get_ips_by_id($id);

			foreach ($ips as $ip){

				$leads = array_merge($leads, self::get_lead_ids_by_ip($ip, $exclude_ids));

			}

			return $leads;
	}

}
