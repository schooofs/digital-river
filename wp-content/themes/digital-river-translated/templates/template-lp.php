<?php
/**
 * Template Name: Template LP
 */
?>
<?php

// get_header();

function display_brick_page()
{
	$bricks = array_column( get_field("bricks"), "brick" );
	foreach($bricks as $brick){
		BrickChooser::display($brick->ID);	
	}
}
$head = new Head();
add_action( 'brick_page', 'wp_head',  1 );
add_action( 'brick_page', array('TopNavigation', 'display'),  5 );
add_action( 'brick_page', 'display_brick_page',   10);
add_action( 'brick_page', array('Footer', 'display_footer'),  15 );
add_action( 'brick_page', 'wp_footer',  25 );


do_action('brick_page');