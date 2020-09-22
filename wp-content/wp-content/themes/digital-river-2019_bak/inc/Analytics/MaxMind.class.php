<?php
use GeoIp2\WebService\Client;

class MaxMind 
{
	public static function get_company_info()
	{
		$client = new Client(116585, '7RkV3PjIl2Mz');

	    if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
	    {
	      $ip=$_SERVER['HTTP_CLIENT_IP'];
	    }
	    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
	    {
	      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
	    }
	    else
	    {
	      $ip=$_SERVER['REMOTE_ADDR'];
	    }

		$record = $client->city($ip);

		if ( isset($record->traits->organization) ) {
			return [
				"name" => $record->traits->organization,
				"domain" => $record->traits->domain
			];
		} else {
			return false;
		}
	}
}