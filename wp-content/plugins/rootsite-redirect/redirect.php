<?php
/*
Plugin Name: Multisite Root Site Redirect
Plugin URI: https://www.digitalriver.com/
Description: Multisite Root Site Redirect
Version: 1.2
Author: Digital River
Author URI: https://www.digitalriver.com/
License: GPL2
*/
function redirect_initialize(){
    if(!is_user_logged_in()) {
        add_action('template_redirect', 'wpse52298_redirect');
        function wpse52298_redirect()
        {
            wp_redirect(esc_url('https://www.digitalriver.com'.$_SERVER['REQUEST_URI']), 301);
            exit();

        }
    }
}

add_action( 'init', 'redirect_initialize' );