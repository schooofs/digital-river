<?php

global $wpdb;
$optionsService = $container->get('optionsService');

return [
    'baseUrl' => plugin_dir_url(dirname(__FILE__)),
	'database' => [
		'client_info_table' => $wpdb->prefix.'digitalriver_client_info'
	],
	'maxMind' => [
		'userId' => $optionsService->get_maxmind_option('dr_maxmind_username'),
		'licenseKey' => $optionsService->get_maxmind_option('dr_maxmind_licensekey')
	],
	'salesforce' => [
		'instanceUrl' => $optionsService->get_crm_options('dr_salesforce_url'),
		'version' => $optionsService->get_crm_options('dr_salesforce_version'),
		'username' => $optionsService->get_crm_options('dr_salesforce_username'),
		'password' => $optionsService->get_crm_options('dr_salesforce_password'),
		'securityToken' => $optionsService->get_crm_options('dr_salesforce_security_token'),
		'clientId' =>  $optionsService->get_crm_options('dr_salesforce_clientid'),
		'clientSecret' => $optionsService->get_crm_options('dr_salesforce_client_secret')

	]
];
