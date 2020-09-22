<?php

/**
 * For displaying custom bricks
 *
 */
class ContactUsInit implements Initialize
{
	protected static $phone_numbers_key = "field_570cf2cb27c89";

	function __construct()
	{
		add_filter('acf/load_field/key='.self::$phone_numbers_key, array(&$this, 'acf_load_background_options') );
	}

	/**
	 *	Addeds all Masterheader background options to the admin screen for Masterheader slides
	 */
	function acf_load_background_options($field)
	{
	  $field['choices'] = array();

	  foreach(PhoneNumber::$phone_numbers as $key => $choice ) {
	    $field['choices'][ $choice ] = $key ;
	  }

	  return $field;
	}
}
