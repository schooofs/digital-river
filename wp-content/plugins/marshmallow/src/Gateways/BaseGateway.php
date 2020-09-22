<?php

namespace DigitalRiver\Gateways;

class BaseGateway
{

	protected $config;
	protected $db;

	public function __construct()
	{
		global $wpdb;
		global $config;

		$this->db = $wpdb;
		$this->config = $config;
	}

}
