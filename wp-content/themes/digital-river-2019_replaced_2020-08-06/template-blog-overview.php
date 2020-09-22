<?php
/*
Template Name: Blog Overview
*/
get_header();

add_action( 'blog_overview', array("BlogOverviewController", "heading"), 10 );
add_action( 'blog_overview', array("BlogOverviewController", "filter"), 20 );
add_action( 'blog_overview', array("BlogOverviewController", "content"), 30 );
do_action('blog_overview');

get_footer();