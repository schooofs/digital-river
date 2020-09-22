<?php
use DigitalRiver\Utility;

/**
 * For displaying custom bricks
 *
 */
class LeadershipSection implements Brick
{
	function __construct() {}

	public static function display($brick_info)
	{
		$light_gray = Utility::$light_gray;

		$leaders = $brick_info['leaders'];

		include Utility::get_views_base_dir() . "/views/leadership.php";
	}
}
