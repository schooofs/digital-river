<?php

class Companies extends MarketoInit{
	public $filterType;//filter field, one of describe SearchableFields
	public $filterValues;//array of filtered values
	public $fields;//optional array of fields to retrieve
	public $nextPageToken;//token for paging
	public $batchSize;//max 300, default 300
	
	public function getData(){
		$url = $this->host . "/rest/v1/companies.json?access_token=" . $this->getToken() . "&filterType=" . $this->filterType
					. "&filterValues=" . $this::csvString($this->filterValues);
		if (isset($this->fields)){
			$url .= "&fields=" . $this::csvString($this->fields);
		}
		if (isset($this->nextPageToken)){
			$url .= "&nextPageToken=" . $this->nextPageToken;
		}
		if (isset($this->batchSize)){
			$url .= "&batchSize=" . $this->batchSize;
		}
		$ch = curl_init($url);
		curl_setopt($ch,  CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('accept: application/json',));
		$response = curl_exec($ch);
		return $response;
	}

	private function getToken(){
		$ch = curl_init($this->host . "/identity/oauth/token?grant_type=client_credentials&client_id=" . $this->clientId . "&client_secret=" . $this->clientSecret);
		curl_setopt($ch,  CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('accept: application/json',));
		$response = json_decode(curl_exec($ch));
		curl_close($ch);
		$token = $response->access_token;
		return $token;
	}
	private static function csvString($fields){
		$csvString = "";
		$i = 0;
		foreach($fields as $field){
			if ($i > 0){
				$csvString = $csvString . "," . $field;
			}elseif ($i === 0){
				$csvString = $field;
			}	
                       $i++;
		}
		return $csvString;
	}
}