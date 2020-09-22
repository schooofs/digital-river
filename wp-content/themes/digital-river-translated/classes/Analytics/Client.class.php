<?php

class Client{

	static $hosts = ['https://vl0trxc779:95ms3ih35v@michaels-first-share-2826807899.us-east-1.bonsai.io:443/'];

	static function get(){
    	return Elasticsearch\ClientBuilder::create()->setHosts(self::$hosts)->build();
	}

}
