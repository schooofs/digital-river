<?php
/*
Template Name: Value Brief
*/
get_header();

add_action( 'individual_value_brief', array("ValueBriefIndividualController", "value_brief_hero"), 10 );
add_action( 'individual_value_brief', array("ValueBriefIndividualController", "value_brief_overview"), 20 );
add_action( 'individual_value_brief', array("ValueBriefIndividualController", "value_brief_intro"), 30 );
add_action( 'individual_value_brief', array("ValueBriefIndividualController", "value_brief_image"), 40 );
add_action( 'individual_value_brief', array("ValueBriefIndividualController", "value_brief_fexible"), 50 );
add_action( 'individual_value_brief', array("ValueBriefIndividualController", "value_brief_cta"), 60 );
do_action('individual_value_brief');

get_footer();