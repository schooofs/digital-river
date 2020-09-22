<?php

/**
 * Custom post type - Resources
 *
 * @package digitalriver
 */
class EventsPostType
{

    public static $post_type_key = 'events';
    public static $post_type_plural_name = 'Events';
    public static $post_type_singular_name = 'Event';

    function __construct()
    {
        if (!post_type_exists(self::$post_type_key)) {
            add_action('init', array(&$this, 'register_post_type'));
        }
    }

    public function register_post_type()
    {
        $labels = array(
            'name' => _x(self::$post_type_plural_name, 'post type general name', 'digital-river-2019'),
            'singular_name' => _x(self::$post_type_singular_name, 'post type singular name', 'digital-river-2019'),
            'menu_name' => _x(self::$post_type_plural_name, 'admin menu', 'digital-river-2019'),
            'name_admin_bar' => _x(self::$post_type_singular_name, 'add new on admin bar', 'digital-river-2019'),
            'add_new' => _x('Add New', self::$post_type_singular_name, 'digital-river-2019'),
            'add_new_item' => __('Add New ' . self::$post_type_singular_name, 'digital-river-2019'),
            'new_item' => __('New ' . self::$post_type_singular_name, 'digital-river-2019'),
            'edit_item' => __('Edit ' . self::$post_type_singular_name, 'digital-river-2019'),
            'view_item' => __('View ' . self::$post_type_singular_name, 'digital-river-2019'),
            'all_items' => __('All ' . self::$post_type_plural_name, 'digital-river-2019'),
            'search_items' => __('Search ' . self::$post_type_plural_name, 'digital-river-2019'),
            'parent_item_colon' => __('Parent ' . self::$post_type_plural_name . ':', 'digital-river-2019'),
            'not_found' => __('No ' . self::$post_type_plural_name . ' found.', 'digital-river-2019'),
            'not_found_in_trash' => __('No ' . self::$post_type_plural_name . ' found in Trash.', 'digital-river-2019'),
        );

        $args = array(
            'labels' => $labels,
            'supports' => array('title', 'excerpt', 'thumbnail'),
            'show_ui' => true,
            'show_in_menu' => true,
            'show_in_rest' => false,
            'menu_position' => 6,
            'show_in_nav_menus' => true,
            'publicly_queryable' => true,
            'public' => true,
            'has_archive' => true,
            'can_export' => true,
            'menu_icon' => 'dashicons-nametag'
        );

        register_post_type(self::$post_type_key, $args);
    }

}