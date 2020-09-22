<?php

class ScriptManager
{

	function __construct()
	{
		add_action( 'wp_enqueue_scripts', array(&$this, 'enqueue') );

	}

	public function enqueue()
	{
		wp_deregister_script( 'wp-embed' );

        if(get_current_blog_id() !== 3){
            wp_enqueue_script( 'vimeo-defer', 'https://player.vimeo.com/api/player.js', array( ), '2.0.2', true );
        }
		wp_enqueue_script( 'marketo-defer', '//app-sjqe.marketo.com/js/forms2/js/forms2.js', array( ), '2.0.2', true );
		wp_enqueue_script( 'global', get_template_directory_uri() . '/assets/javascripts/main.min.js', array( ), '2.0.3', true );
		wp_localize_script( 'global', 'global', array(
			'ajaxurl' => admin_url( 'admin-ajax.php' ),
			'rest_root' => esc_url_raw( rest_url() ),
			'rest_nonce' => wp_create_nonce( 'wp_rest' )
		));

        if ( is_page_template( 'template-demo-now.php' )) {

            wp_enqueue_script( 'demoNow', get_template_directory_uri() . '/assets/javascripts/demoNow.js', array( ), '2.0.2', true );

        } else if ( is_page_template( 'template-adobe.php' )) {

            wp_enqueue_script( 'adobe-defer', get_template_directory_uri() . '/assets/javascripts/adobe.js', array( ), '2.0.3', true );

        } else if ( get_post_type() === InfographicPostType::$post_type_key ) {

            wp_enqueue_script( 'clipboard-defer', get_template_directory_uri() . '/assets/javascripts/vendor/clipboard.min.js', array( ), '2.0.2', true );

        }



	}

}
