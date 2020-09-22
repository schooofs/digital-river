<?php

namespace DigitalRiver\Gateways;

class ClientInfoGateway
{

	private $table;
    private $db;

    public function __construct($config, $db)
	{
		$this->table = $config['database']['client_info_table'];
		$this->db = $db;
	}


	public function getClientByIp($ipAddress)
	{
		$sql = "
		  SELECT * 
		  FROM {$this->table} 
		  where ip_address = %s
		  LIMIT 1
		  ";
		$query = $this->db->prepare($sql, [$ipAddress]);
		return $this->db->get_row($query);
	}

	public function create($ip, $org, $domain, $salesforceId, $salesforceAccountName, $showCustom)
	{
		return $this->db->insert($this->table, [
			'ip_address' => $ip,
			'mm_organization' => $org,
			'mm_domain' => $domain,
            'salesforce_id' => $salesforceId,
            'salesforce_account_name' => $salesforceAccountName,
            'show_custom_message' => $showCustom,
            'created_at' => current_time('mysql', false)
		]);
	}
}
