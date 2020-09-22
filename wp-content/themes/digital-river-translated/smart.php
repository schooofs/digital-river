<?php
include "./classes/vendor/autoload.php";
foreach (glob("./classes/Analytics/*.php") as $filename)
{
    include $filename;
}

use GeoIp2\WebService\Client;

$ip = IpManager::get();

$id = ($_POST['info'] != "false")?$_POST['info']:null;

$assoc_ids = AssociateLead::get_lead_ids_by_ip($ip, $id);

if ($id == null) {

	if (count($assoc_ids) == 1) {

		$id = $assoc_ids[0];

	} else {

		$client = new Client(116585, 'BjMN3qos5O19');

		// $maxmind_results = $client->insights($ip);
		$maxmind_results = $client->city($ip);

		$account = AssociateLead::get_lead_ids_by_name($maxmind_results->traits->organization);

		if ($account !== false) {

			$id = $account;

		} else {

			$user_type = null;

			if ( $maxmind_results->traits->userType === "business" || isset($maxmind_results->traits->userType) === false ) {

		    	$salesforce = new Salesforce();

		    	$account = $salesforce->get_account($maxmind_results->traits->organization);

		    	$user_type = isset($maxmind_results->traits->userType) ? $maxmind_results->traits->userType : null;

			    if ($account != false) {

					$response = Lead::create(array(
					    'name' => $account->Name,
					    'domain' =>  $maxmind_results->traits->domain,
					    'industry' => $account->Vertical_Market__c,
					    'user_type' => $user_type,
				    	's' => true,
					    'i' => $get_account->ICP_Bullseye__c,
					    'system' => null
					), $ip);

			    } 

			}

			if ( ! isset($response) ) {

		    	$response = Lead::create(array(
				    'name' => $maxmind_results->traits->organization,
				    'domain' => $maxmind_results->traits->domain,
				    'user_type' => $user_type,
				    's' => false,
				    'industry' => null,
				    'system' => null
				), $ip);

			}

			$id = trim($response['_id']);

		}

	}

} else {

  	// Associate with a company, merge id into assoc_ids.
	if (count($assoc_ids) > 0) {

		$merge_result = AssociateLead::merge($id, $assoc_ids[0]);

		if ($merge_result != false) {
			$id = $merge_result;
		}
	}

  //TODO what if not associated with a company?
}

// Generate page view data
$view = new View();
echo $view->create(
		$id,
		$_POST['page_info']['url'],
		$_POST['page_info']['category'],
		$_POST['type'],
		$_POST['page_info']['sub_type'],
		$ip,
		$_POST['browser'],
		$_POST['device']
	);