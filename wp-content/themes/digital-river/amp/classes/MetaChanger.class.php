<?php

namespace CustomAmp;

class MetaChanger {

    function __construct()
    {
        add_filter( 'amp_post_article_header_meta', [$this, 'dr_amp_remove_author_meta'] );
        add_filter( 'amp_post_article_header_meta', [$this,'dr_amp_remove_date_meta'] );
    }


    function dr_amp_remove_author_meta( $meta_parts )
    {
        foreach ( array_keys( $meta_parts, 'meta-author', true ) as $key ) {
            unset( $meta_parts[ $key ] );
        }
        return $meta_parts;
    }

    function dr_amp_remove_date_meta( $meta_parts )
    {
        foreach ( array_keys( $meta_parts, 'meta-time', true ) as $key ) {
            unset( $meta_parts[ $key ] );
        }
        return $meta_parts;
    }
    
}