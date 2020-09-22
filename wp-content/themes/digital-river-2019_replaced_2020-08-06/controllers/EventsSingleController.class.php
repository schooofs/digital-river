<?php

class EventsSingleController
{

    public function __construct()
    {
        add_action('events-single', array($this, 'get_bricks'));
    }

    public function get_bricks()
    {
        global $post;

        $terms = get_the_terms($post, 'event-type');

        $extract_term_slug = function ($term) {
            return $term->slug;
        };

        $term_slugs = array_map($extract_term_slug, $terms);

        $is_flagship = in_array('flagship', $term_slugs);

        print_r($is_flagship);

        if (!$is_flagship) {
            $event_url = get_field('link_url');

            header('Location: ' . $event_url);
        }

        do_action('bricks');
    }

}