<?php


namespace DigitalRiver\Services;


class VisitorIPService extends BaseService
{

	private $optionsService;

	public function __construct(OptionsService $optionsService)
	{
		parent::__construct();
		$this->optionsService = $optionsService;
	}

	public function getUserIdAddress()
	{

		if ($siteIPHeader = $this->getSiteIPHeader()) {
			if (!empty($_SERVER[$siteIPHeader])) {
				return $_SERVER[$siteIPHeader];
			}
		}

		if ($this->getRemoteAddr()) {
			return $this->getRemoteAddr();
		}

		if ($this->getHTTPXForward()) {
			return $this->getHTTPXForward();
		}

		if ($this->getHTTPClientIP()) {
			return $this->getHTTPClientIP();
		}

	}


	public function isIPInDatabase($ipAddress)
	{
		$table = $this->config['database']['client_info_table'];
		$sql = "SELECT * FROM {$table} where ip_address = %s";
		return $this->db->prepare($sql, [$ipAddress]);
	}

	private function getRemoteAddr()
	{
		return $_SERVER['REMOTE_ADDR'];
	}

	private function getHTTPXForward()
	{
		return $_SERVER['HTTP_X_FORWARDED_FOR'];
	}

	private function getHTTPClientIP()
	{
		return $_SERVER['HTTP_CLIENT_IP'];
	}

	private function getSiteIPHeader()
	{
		return $this->optionsService->getSiteSpecificIPHeader();
	}

}



