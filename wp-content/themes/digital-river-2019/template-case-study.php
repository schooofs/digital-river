<?php
/**
 * Template Name: Case Study
 */
get_header();

add_action( 'individual_case_study', array("CaseStudyIndividualController", "case_study_company_info"), 10 );
add_action( 'individual_case_study', array("CaseStudyIndividualController", "case_study_results"), 20 );
add_action( 'individual_case_study', array("CaseStudyIndividualController", "case_study_two_column_text"), 30 );
add_action( 'individual_case_study', array("CaseStudyIndividualController", "case_study_cross_sell"), 70 );
do_action('individual_case_study');

get_footer();