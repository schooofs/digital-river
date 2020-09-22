<?php
/**
 * Search Page Template
 */


$head = new Head();
add_action( 'brick_page', 'wp_head',  1 );
add_action( 'brick_page', array('TopNavigation', 'display'),  5 );
add_action( 'brick_page', array('SearchView', 'init'),   10);
add_action( 'brick_page', array('Footer', 'display_footer'),  15 );
add_action( 'brick_page', array('ContactFormTab', 'display'), 20 );
add_action( 'brick_page', 'wp_footer',  25 );



do_action('brick_page');



