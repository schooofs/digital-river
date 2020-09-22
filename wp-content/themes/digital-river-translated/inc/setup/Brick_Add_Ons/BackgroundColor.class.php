<?php

class BackgroundColor extends AddOn{

	protected static $background_options_key = "field_57153ff8b911e";

	public static $background_option_pre_html = '<div class="background-option"><div class="inner-background ';
	public static $background_option_post_html = ' "></div></div>';

	public static $backgroundOptions = array(
		'bg-lightBlue',
		'bg-blue',
		'bg-darkBlue',
		'bg-lightGreen',
		'bg-green',
		'bg-darkGreen',
		'bg-lightGray',
		'bg-gray',
		'bg-darkGray',
		'bg-lightOrange',
		'bg-orange',
		'bg-darkOrange',
		'bg-lightRed',
		'bg-red',
		'bg-darkRed',
		'bg-lightPurple',
		'bg-purple',
		'bg-darkPurple',
		'bg-lightYellow',
		'bg-yellow',
		'bg-darkYellow',
	);



	function __construct()
	{
		add_filter('acf/load_field/key='.self::$background_options_key, array(&$this, 'acf_load_background_options') );
	}


	function custom_css()
	{
		?>
		<style>
			.background-option{
				width:30.77%;
				overflow: hidden;
				border:solid 1px #CCC;
				padding:7px;
				background: #FFF;
				margin: 0 0 20px 1.33%;
				float: left;
				-webkit-box-sizing: border-box;
 				-moz-box-sizing: border-box;
  				box-sizing: border-box;
			}

			.background-option .inner-background{
				width:100%;
				height:75px;
			}

			input:checked + .background-option{
				background-color: #333;
				position: relative;
			}

			input:checked + .background-option .inner-background::after{
			    content: "Selected";
			    position: absolute;
			    font-size: 2em;
			    top: 0;
			    left: 0;
			    text-align: center;
			    width: 100%;
			    margin: 35px 0 0;
			}

			.acf-field-radio[data-name="background_color"] input{
				display:none;
			}


		.dark-bg, .bg-blue, .bg-darkBlue, .bg-gray, .bg-darkGray, .bg-lightOrange, .bg-orange, .bg-darkOrange, .bg-lightRed, .bg-red, .bg-darkRed, .bg-lightPurple, .bg-purple, .bg-darkPurple, .bg-black, .bg-gray50, .bg-gray60, .bg-gray70, .bg-gray80, .bg-gray90 {
		  color: #FFF; }
		  .dark-bg a, .bg-blue a, .bg-darkBlue a, .bg-gray a, .bg-darkGray a, .bg-lightOrange a, .bg-orange a, .bg-darkOrange a, .bg-lightRed a, .bg-red a, .bg-darkRed a, .bg-lightPurple a, .bg-purple a, .bg-darkPurple a, .bg-black a, .bg-gray50 a, .bg-gray60 a, .bg-gray70 a, .bg-gray80 a, .bg-gray90 a {
		    color: #FFF;
		    text-decoration: underline; }
		  .dark-bg .btn-opposite, .bg-blue .btn-opposite, .bg-darkBlue .btn-opposite, .bg-gray .btn-opposite, .bg-darkGray .btn-opposite, .bg-lightOrange .btn-opposite, .bg-orange .btn-opposite, .bg-darkOrange .btn-opposite, .bg-lightRed .btn-opposite, .bg-red .btn-opposite, .bg-darkRed .btn-opposite, .bg-lightPurple .btn-opposite, .bg-purple .btn-opposite, .bg-darkPurple .btn-opposite, .bg-black .btn-opposite, .bg-gray50 .btn-opposite, .bg-gray60 .btn-opposite, .bg-gray70 .btn-opposite, .bg-gray80 .btn-opposite, .bg-gray90 .btn-opposite {
		    border-color: #FFF;
		    color: #FFF; }
		    .dark-bg .btn-opposite:hover, .bg-blue .btn-opposite:hover, .bg-darkBlue .btn-opposite:hover, .bg-gray .btn-opposite:hover, .bg-darkGray .btn-opposite:hover, .bg-lightOrange .btn-opposite:hover, .bg-orange .btn-opposite:hover, .bg-darkOrange .btn-opposite:hover, .bg-lightRed .btn-opposite:hover, .bg-red .btn-opposite:hover, .bg-darkRed .btn-opposite:hover, .bg-lightPurple .btn-opposite:hover, .bg-purple .btn-opposite:hover, .bg-darkPurple .btn-opposite:hover, .bg-black .btn-opposite:hover, .bg-gray50 .btn-opposite:hover, .bg-gray60 .btn-opposite:hover, .bg-gray70 .btn-opposite:hover, .bg-gray80 .btn-opposite:hover, .bg-gray90 .btn-opposite:hover {
		      background: rgba(255, 255, 255, 0.2);
		      color: #FFF;
		      border-color: #FFF; }

			.bg-lightBlue {
			  background-color: #25d4ff; }

			.bg-blue {
			  background-color: #00a7e1; }

			.bg-darkBlue {
			  background-color: #007eb5; }

			.bg-lightGreen {
			  background-color: #b2d23c; }

			.bg-green {
			  background-color: #a8c628; }

			.bg-darkGreen {
			  background-color: #81b315; }

			.bg-lightGray {
			  background-color: #f0f0f0; }

			.bg-gray {
			  background-color: #555555; }

			.bg-darkGray {
			  background-color: #343434; }

			.bg-lightOrange {
			  background-color: #f07822; }

			.bg-orange {
			  background-color: #ff5b00; }

			.bg-darkOrange {
			  background-color: #e24024; }

			.bg-lightRed {
			  background-color: #ff245e; }

			.bg-red {
			  background-color: #ea0f43; }

			.bg-darkRed {
			  background-color: #bd0a33; }

			.bg-lightPurple {
			  background-color: #933d91; }

			.bg-purple {
			  background-color: #6f29d3; }

			.bg-darkPurple {
			  background-color: #6810ba; }

			.bg-lightYellow {
			  background-color: #fff021; }

			.bg-yellow {
			  background-color: #f9d316; }

			.bg-darkYellow {
			  background-color: #f1bd00; }

			.bg-black {
			  background-color: #343438; }

			.bg-white {
			  background-color: #FFF; }

			.bg-offWhite {
			  background-color: #F4F4F4; }

			.bg-gray10 {
			  background-color: #e6e6e6; }

			.bg-gray20 {
			  background-color: #cccccc; }

			.bg-gray30 {
			  background-color: #b3b3b3; }

			.bg-gray40 {
			  background-color: #999999; }

			.bg-gray50 {
			  background-color: gray; }

			.bg-gray60 {
			  background-color: #666666; }

			.bg-gray70 {
			  background-color: #4d4d4d; }

			.bg-gray80 {
			  background-color: #333333; }

			.bg-gray90 {
			  background-color: #1a1a1a; }
		</style>
		<?php
	}

	public static function get_background_options()
	{
		$backgroundOptions = array();
		foreach (self::$backgroundOptions as $value) {
			$backgroundOptions[$value] = self::$background_option_pre_html.$value.self::$background_option_post_html;
		}

		return $backgroundOptions;
	}

	/**
	 *	Addeds all background options to the admin screen for Interactive Grid slides 
	 */
	function acf_load_background_options($field)
	{
		if(is_admin())
			$this->custom_css();

		$field['choices'] = array();
		foreach(self::get_background_options() as $key => $choice ){
			$field['choices'][ $key ] = $choice;
		}

		return $field;
	}
}