<?php

get_header();

add_action("infographic", ["InfographicIndividualController", "content"]);
add_action("infographic", ["InfographicIndividualController", "script"]);
add_action( 'infographic', array("InfographicIndividualController", "social_links"),      20 );

do_action('infographic');

get_footer();