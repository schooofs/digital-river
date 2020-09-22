<?php

class StyleManager
{

	function __construct()
	{
		add_action( 'wp_enqueue_scripts', array(&$this, 'enqueue') );
	}

	public function enqueue()
	{
		remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
		remove_action( 'wp_print_styles', 'print_emoji_styles' ); 

		if(get_current_blog_id() === 6) {
	 		wp_enqueue_style( 'main', '/wp-content/themes/digital-river/assets/stylesheets/main.min.css', array( ), '2.0.0');
	        
	        if (is_page_template( 'template-demo-now.php' )) {
	            wp_enqueue_style( 'demo', 'https://www.digitalriver.com/wp-content/themes/digital-river/assets/stylesheets/demoNow.css');
	        }
	        if (is_page_template( 'template-adobe.php' )) {
	            wp_enqueue_style( 'adobe', 'https://www.digitalriver.com/wp-content/themes/digital-river/assets/stylesheets/adobe.css');
	        }
	    } else {
			wp_enqueue_style( 'main', get_template_directory_uri() . '/assets/stylesheets/main.min.css', array( ), '2.0.0');
	        
	        if (is_page_template( 'template-demo-now.php' )) {
	            wp_enqueue_style( 'demo', get_template_directory_uri() . '/assets/stylesheets/demoNow.css');
	        }
	        if (is_page_template( 'template-adobe.php' )) {
	            wp_enqueue_style( 'adobe', get_template_directory_uri() . '/assets/stylesheets/adobe.css');
	        }
	    }
	}

}