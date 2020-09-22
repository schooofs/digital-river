<?php


namespace DigitalRiver\Services;


abstract class BaseService
{

	protected $db;

	/**
	 * @var $config
	 */
	protected $config;

	public function __construct()
	{
		global $wpdb;
		global $config;


		$this->config = $config;
		$this->db = $wpdb;
	}

}
