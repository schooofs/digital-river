<?php

get_header();

add_action( 'individual_blog', array("PressReleaseIndividualController", "content"),      10 );
do_action('individual_blog');

get_footer();