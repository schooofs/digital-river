<?php


namespace DigitalRiver\Services;

use GeoIp2\WebService\Client;

class MaxMindService {


	/**
	 * @var Client
	 */
	private $client;

	public function __construct( Client $client ) {
		$this->client = $client;
	}

	public function getCompanyInfoFromIp( $ip ) {
		return $this->client->insights( $ip );
	}

	public function getDomain( $info ) {
		return $info->traits->domain;
	}

	public function getOrganization( $info ) {
		return $info->traits->organization;
	}
}
