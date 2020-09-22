<?php
namespace DigitalRiver;

class Utility
{
	public static $light_blue = "#25d4ff";
	public static $blue = "#00a7e1";
	public static $dark_blue = "#007eb5";

	public static $light_green = "#b2d23c";
	public static $green = "#a8c628";
	public static $dark_green = "#81b315";

	public static $light_gray = "#8f9094";
	public static $gray = "#646469";
	public static $dark_gray = "#343438";

	public static $light_purple = "#933d91";
	public static $purple = "#6f29d3";
	public static $dark_purple = "#6810ba";

	public static function get_views_base_dir()
	{
		return dirname( __FILE__ ) . "/../..";
	}
}