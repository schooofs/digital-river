<?php

class ScriptManager extends Manager {

	function __construct()
	{
		add_action('wp_enqueue_scripts', array(&$this, 'load'));

		add_action('code_42_header', array(&$this, 'renderAcf'));
	}

	static function load()
	{
		//Global
    	wp_register_script('env', get_template_directory_uri() . '/js/env.js', array(), '1');
    	
    	//Home
    	wp_register_script('main_site', get_template_directory_uri() . '/js/site.js', array(), '1');
    	wp_register_script('code_42_site', get_template_directory_uri() . '/js/code42/site.js', array(), '1');
    	wp_register_script('crashplan_site', get_template_directory_uri() . '/js/crashplan/site.js', array(), '1');
    	wp_register_script('modernizr', get_template_directory_uri() . '/js/vendor/modernizr.min.js', array(), '1');
    	wp_register_script('picturefill', get_template_directory_uri() . '/js/vendor/picturefill.min.js', array(), '1');
    	wp_register_script('respond', get_template_directory_uri() . '/js/vendor/respond.min.js', array(), '1');
    	wp_register_script('jquery-helpers', get_template_directory_uri() . '/js/legacy/shared/jquery.c42.helpers.js', array(), '1');
    	wp_register_script('mobilize', get_template_directory_uri() . '/js/legacy/shared/mobilize.js', array(), '1');
    	wp_register_script('css-browser-selector', get_template_directory_uri() . '/js/legacy/shared/css-browser-selector.js', array(), '1');
    	wp_register_script('404', get_template_directory_uri() . '/js/code42/404.js', array(), '1');



    	//Business
    	wp_register_script('site-blue', get_template_directory_uri() . '/js/legacy/business/site-blue.js', array(), '1');
    	wp_register_script('typekit', 'https://use.typekit.net/hou4pqk.js', array(), '1');


    	if(is_page_template(self::$home_brick_template) || is_page_template(self::$business_brick_template) || is_page_template(self::$which_template) || is_404()){
	        wp_enqueue_script('env');
		}



		if(is_page_template(self::$mobile_template)){

	        wp_enqueue_script('jquery');
	        wp_enqueue_script('jquery-helpers');
	        wp_enqueue_script('mobilize');
	        wp_enqueue_script('css-browser-selector');
	        
		}else if(is_page_template(self::$which_template)){
	        wp_enqueue_script('typekit');
	        wp_enqueue_script('modernizr');
        	wp_enqueue_script('picturefill');
	        wp_enqueue_script('main_site');
       		wp_enqueue_script('crashplan_site');
		}else{

	        wp_enqueue_script('respond');
        	wp_script_add_data( 'respond',  'conditional', 'lt IE 9' );

	        wp_enqueue_script('modernizr');
        	wp_enqueue_script('picturefill');

	        wp_enqueue_script('main_site');
       		wp_enqueue_script('crashplan_site');

			if(is_404()){
	        	wp_enqueue_script('404');
	        	wp_enqueue_script('code_42_site');
			}

		}

        // wp_enqueue_script('truste');

	}

	static function renderAcf()
	{
		if( is_array(get_field('scripts', get_the_ID())) ){
			foreach (get_field('scripts', get_the_ID()) as $key => $script) {
				echo '<script src="' . $script['script']  . '" type="text/javascript"></script>';
			}
		}
	}

}

