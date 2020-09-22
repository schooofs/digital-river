<?php
/**
 * Custom post type - Resources
 *
 * @package digitalriver
 */

class InfographicPostType{

    public static $post_type_key = 'infographic';
    public static $post_type_plural_name = 'Infographics';
    public static $post_type_singular_name = 'Infographic';

    function __construct()
    {
        if( ! post_type_exists( self::$post_type_key ) ) {
            add_action('init', array( &$this, 'register_post_type' ) );
        }
    }

    public function register_post_type()
    {
        $labels = array(
            'name'               => _x( self::$post_type_plural_name, 'post type general name', 'digital-river' ),
            'singular_name'      => _x( self::$post_type_singular_name, 'post type singular name', 'digital-river' ),
            'menu_name'          => _x( self::$post_type_plural_name, 'admin menu', 'digital-river' ),
            'name_admin_bar'     => _x( self::$post_type_singular_name, 'add new on admin bar', 'digital-river' ),
            'add_new'            => _x( 'Add New', self::$post_type_singular_name, 'digital-river' ),
            'add_new_item'       => __( 'Add New '.self::$post_type_singular_name, 'digital-river' ),
            'new_item'           => __( 'New '.self::$post_type_singular_name, 'digital-river' ),
            'edit_item'          => __( 'Edit '.self::$post_type_singular_name, 'digital-river' ),
            'view_item'          => __( 'View '.self::$post_type_singular_name, 'digital-river' ),
            'all_items'          => __( 'All '.self::$post_type_plural_name, 'digital-river' ),
            'search_items'       => __( 'Search '.self::$post_type_plural_name, 'digital-river' ),
            'parent_item_colon'  => __( 'Parent '.self::$post_type_plural_name.':', 'digital-river' ),
            'not_found'          => __( 'No '.self::$post_type_plural_name.' found.', 'digital-river' ),
            'not_found_in_trash' => __( 'No '.self::$post_type_plural_name.' found in Trash.', 'digital-river' ),
        );

        $args = array(
            'labels'              => $labels,
            'supports'            => array('title', 'editor'),
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_rest'        => false,
            'menu_position'       => 6,
            'show_in_nav_menus'   => true,
            'publicly_queryable'  => true,
            'exclude_from_search' => false,
            'has_archive'         => false,
            'query_var'           => false,
            'can_export'          => true,
            'capability_type'     => 'post',
            'rewrite'             => array('slug' => 'infographic'),
            'menu_icon'           => 'dashicons-analytics'
        );

        register_post_type(self::$post_type_key, $args );
    }



}
