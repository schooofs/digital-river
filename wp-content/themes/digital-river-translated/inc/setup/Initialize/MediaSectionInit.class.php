<?php

/**
 *	Class for initializing the set up for dr.com
 *
 */
class MediaSectionInit implements Initialize
{
	private static $post_type_acf_key = "field_5829bed5ff70c";

	private static $post_types = array(
		"press_release" => "Press Releases",
		"media_coverage" => "Media Coverage",
	);

	function __construct()
	{
		add_filter('acf/load_field/key='.self::$post_type_acf_key, array(&$this, 'fill_post_types') );
	}

	/**
	 *	Addeds all background options to the admin screen for Interactive Grid slides 
	 */
	function fill_post_types($field)
	{
		$field['choices'] = array();

		foreach ( self::$post_types as $key => $post_type ) {
		   $field['choices'][$key] = $post_type;
		}		

		return $field;
	}
}