<?php

namespace CustomAmp;

class CustomHeader {

    function __construct()
    {
        add_filter( 'amp_post_template_file', [$this, 'dr_amp_set_custom_template'], 10, 3 );
    }

    function dr_amp_set_custom_template( $file, $type, $post )
    {
        if ( 'header' === $type ) {
            $file = realpath(__DIR__ . '/..') . '/views/digital-river-header.php';
        }
        return $file;
    }
}