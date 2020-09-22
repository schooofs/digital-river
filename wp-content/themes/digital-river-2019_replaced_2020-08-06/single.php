<?php

get_header();

add_action( 'individual_blog', array("BlogIndividualController", "heading"),      10 );
add_action( 'individual_blog', array("BlogIndividualController", "content"),      10 );
add_action( 'individual_blog', array("BlogIndividualController", "related"),      20 );
add_action( 'individual_blog', array("BlogIndividualController", "social_links"),      20 );
do_action('individual_blog');

get_footer();