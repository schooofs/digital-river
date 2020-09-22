<?php

class TopBar 
{
	public function __construct()
	{
		add_action("abm_bar", [$this, "display"]);		
	}

	public function display()
	{
		$account = isset($_GET['account']) ? $_GET['account'] : ABM::$accounts[0];
		$abm = new ABM();
		$account_info = $abm->get_abm_info_staging($account);
		View::make("abm/top-bar", ["account_info" => $account_info]);
	}
}