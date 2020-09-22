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

        wp_enqueue_style('mf-interactive', get_template_directory_uri() . '/vendor/mf-interactive/styles.min.css');
        wp_enqueue_style('select-2-new', 'https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css');

        if (!dr_is_new_page()) {
            wp_enqueue_style('legacy', get_template_directory_uri() . '/assets/stylesheets/old_components/legacy.css');
        }

		if(get_current_blog_id() === 6) {
	        if (is_page_template( 'template-demo-now.php' )) {
	            wp_enqueue_style( 'demo', 'https://www.digitalriver.com/wp-content/themes/digital-river-2019/assets/stylesheets/demoNow.css');
	        }
	        if (is_page_template( 'template-adobe.php' )) {
	            wp_enqueue_style( 'adobe', 'https://www.digitalriver.com/wp-content/themes/digital-river-2019/assets/stylesheets/adobe.css');
	        }
	    } else {
	        if (is_page_template( 'template-demo-now.php' )) {
	            wp_enqueue_style( 'demo', get_template_directory_uri() . '/assets/stylesheets/demoNow.css');
	        }
	        if (is_page_template( 'template-adobe.php' )) {
	            wp_enqueue_style( 'adobe', get_template_directory_uri() . '/assets/stylesheets/adobe.css');
	        }
	    }
	}

}