<?php

class CookieGenerator{

	static function display($user_info, $new_ip = false)
	{
		unset($user_info['view']);
		unset($user_info['subindustry']);
		unset($user_info['ip']);
		unset($user_info['time']);
		unset($user_info['last_updated']);

		return json_encode($user_info);
	}

}

?>