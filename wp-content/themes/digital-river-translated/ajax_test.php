<?php
include "./classes/vendor/autoload.php";
foreach (glob("./classes/Analytics/*.php") as $filename)
{
    include $filename;
}

$id = ($_POST['info'] != "false")?$_POST['info']:null;

$assoc_ids = AssociateLead::get_lead_ids_by_ip($_POST['location_data']['traits']['ip_address'], $id);


if($id == null){
		if(count($assoc_ids) == 1){
      // Associate with a company, use assoc_id as id
			$id = $assoc_ids[0];

		}else{
		    $salesforce = new Salesforce();

		    preg_match("/^(?:https?:\/\/)?(?:www\.)?([^:\/\n]+)?(?:\.co)/mi", $_POST['location_data']['traits']['domain'], $formatted_domain);

		    $account = $salesforce->get_account($formatted_domain[0]);

		    if($account != false){
				$response = Lead::create(array(
				    'name' => $account->Name,
				    'domain' =>  $_POST['location_data']['traits']['domain'],
				    'industry' => $account->Vertical_Market__c,
				    'system' => "test"
				), $_POST['location_data']['traits']['ip_address']);
		    }else{
		    	$response = Lead::create(array(
				    'name' => $_POST['location_data']['traits']['organization'],
				    'domain' =>  $_POST['location_data']['traits']['domain'],
				    'industry' => null,
				    'system' => null
				), $_POST['location_data']['traits']['ip_address']);
		    }

	      $id = trim($response['_id']);
      
		}
}else{


  // Associate with a company, merge id into assoc_ids.
	if(count($assoc_ids) > 0){
		$merge_result = AssociateLead::merge($id, $assoc_ids[0]);


		if($merge_result != false){
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
			$_POST['location_data']['traits']['ip_address'],
			$_POST['browser'],
			$_POST['device'],
			$_POST['longitude'],
			$_POST['latitude']
		);



