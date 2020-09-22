<?php
/**
 * Taxonomy - Event Type
 *
 * @package digitalriver
 */

class EventTypeTaxonomy
{
    private static $event_type_taxonomy_key = 'event-type';
    private static $event_type_taxonomy_singular_name = 'Event Type';
    private static $event_type_taxonomy_plural_name = 'Event Types';

    function __construct()
    {
        add_action('init', array(&$this, 'register_taxonomy'));
    }

    public function register_taxonomy()
    {

        $labels = array(
            'name' => _x(self::$event_type_taxonomy_plural_name, 'taxonomy general name', 'digital-river-2019'),
            'singular_name' => _x(self::$event_type_taxonomy_singular_name, 'taxonomy singular name', 'digital-river-2019'),
            'search_items' => __('Search ' . self::$event_type_taxonomy_plural_name, 'digital-river-2019'),
            'popular_items' => __('Popular ' . self::$event_type_taxonomy_plural_name, 'digital-river-2019'),
            'all_items' => __('All ' . self::$event_type_taxonomy_plural_name, 'digital-river-2019'),
            'parent_item' => null,
            'parent_item_colon' => null,
            'edit_item' => __('Edit ' . self::$event_type_taxonomy_singular_name, 'digital-river-2019'),
            'update_item' => __('Update ' . self::$event_type_taxonomy_singular_name, 'digital-river-2019'),
            'add_new_item' => __('Add New ' . self::$event_type_taxonomy_singular_name, 'digital-river-2019'),
            'new_item_name' => __('New ' . self::$event_type_taxonomy_singular_name . ' Name', 'digital-river-2019'),
            'separate_items_with_commas' => __('Separate ' . self::$event_type_taxonomy_plural_name . ' with commas', 'digital-river-2019'),
            'add_or_remove_items' => __('Add or remove ' . self::$event_type_taxonomy_plural_name, 'digital-river-2019'),
            'choose_from_most_used' => __('Choose from the most used ' . self::$event_type_taxonomy_plural_name, 'digital-river-2019'),
            'not_found' => __('No ' . self::$event_type_taxonomy_plural_name . ' found.', 'digital-river-2019'),
            'menu_name' => __(self::$event_type_taxonomy_plural_name, 'digital-river-2019'),
        );

        $args = array(
            'hierarchical' => true,
            'labels' => $labels,
            'show_ui' => true,
            'show_admin_column' => true,
            'update_count_callback' => '_update_post_term_count',
            'query_var' => false,
            'rewrite' => array(),
        );

        register_taxonomy(self::$event_type_taxonomy_key, array(EventsPostType::$post_type_key), $args);
    }
}