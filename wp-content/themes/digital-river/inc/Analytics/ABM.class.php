<?php

function get_abm_info($request)
	{
		// if(isset($_COOKIE['drdomain']) && $_COOKIE['drdomain'] !== "") {
		// 	$domain = $_COOKIE['drdomain'];
		// } else {
			$domain = MaxMind::get_company_domain();
			if ($domain === false) { 
				return new WP_Error( 'request-not-found', 'Request Not Found', array( 'status' => 500 ) );
			} else {
            	setcookie("drdomain", $domain);
			}
		// }

		$target = true;

    	return new WP_REST_Response(["target"=>$target], 200 );
	}

class ABM
{
	private static $field_mappings = [
		"Domain"  => "company_domain",
	];

	public function __construct()
	{
		self::register_routes();
	}

	protected static function register_routes()
	{
		$version = '1';
		$namespace = 'track/v' . $version;
		register_rest_route( $namespace, '/test' , [
			[
				'methods'  => WP_REST_Server::READABLE,
				'callback' => 'get_abm_info'
			]
		]);
	}

	

}