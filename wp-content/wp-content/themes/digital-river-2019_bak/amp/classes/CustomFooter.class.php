<?php

namespace CustomAmp;

class CustomFooter {

    function __construct()
    {
        add_filter( 'amp_post_template_file', [$this, 'dr_amp_set_custom_template'], 10, 3 );
    }

    function dr_amp_set_custom_template( $file, $type, $post )
    {
        if ( 'footer' === $type ) {
            $file = realpath(__DIR__ . '/..') . '/views/footer.php';
        }
        return $file;
    }
}