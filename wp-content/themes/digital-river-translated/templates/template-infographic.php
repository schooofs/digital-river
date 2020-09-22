<?php
/**
 * Template Name: Template Infographic
 */
?>

<?php
$head = new Head();
add_action( 'infographic', 'wp_head',  1 );
add_action( 'infographic', array('TopNavigation', 'display'),  5 );
add_action( 'infographic', array('Infographic','display'),   10);
add_action( 'infographic', array('Footer', 'display_footer'),  15 );
add_action( 'infographic', array('ContactFormTab', 'display'), 20 );
add_action( 'infographic', 'wp_footer',  25 );

do_action('infographic');
?>