<?php
/**
 * Taxonomy - Industry
 *
 * @package digitalriver
 */

class IndustryTaxonomy 
{
    private static $industry_taxonomy_key = 'industry';
    private static $industry_taxonomy_singular_name = 'Industry';
    private static $industry_taxonomy_plural_name = 'Industries';

    function __construct()
    {
        add_action('init', array( &$this, 'register_taxonomy' ) );
    }

    public function register_taxonomy()
    {

        $labels = array(
            'name'                       => _x( self::$industry_taxonomy_plural_name, 'taxonomy general name', 'digital-river-2019' ),
            'singular_name'              => _x( self::$industry_taxonomy_singular_name, 'taxonomy singular name', 'digital-river-2019' ),
            'search_items'               => __( 'Search '.self::$industry_taxonomy_plural_name, 'digital-river-2019' ),
            'popular_items'              => __( 'Popular '.self::$industry_taxonomy_plural_name, 'digital-river-2019' ),
            'all_items'                  => __( 'All '.self::$industry_taxonomy_plural_name, 'digital-river-2019' ),
            'parent_item'                => null,
            'parent_item_colon'          => null,
            'edit_item'                  => __( 'Edit '.self::$industry_taxonomy_singular_name, 'digital-river-2019' ),
            'update_item'                => __( 'Update '.self::$industry_taxonomy_singular_name, 'digital-river-2019' ),
            'add_new_item'               => __( 'Add New '.self::$industry_taxonomy_singular_name, 'digital-river-2019' ),
            'new_item_name'              => __( 'New '.self::$industry_taxonomy_singular_name.' Name', 'digital-river-2019' ),
            'separate_items_with_commas' => __( 'Separate '.self::$industry_taxonomy_plural_name.' with commas', 'digital-river-2019' ),
            'add_or_remove_items'        => __( 'Add or remove '.self::$industry_taxonomy_plural_name, 'digital-river-2019' ),
            'choose_from_most_used'      => __( 'Choose from the most used '.self::$industry_taxonomy_plural_name, 'digital-river-2019' ),
            'not_found'                  => __( 'No '.self::$industry_taxonomy_plural_name.' found.', 'digital-river-2019' ),
            'menu_name'                  => __( self::$industry_taxonomy_plural_name, 'digital-river-2019' ),
        );

        $args = array(
            'hierarchical'          => true,
            'labels'                => $labels,
            'show_ui'               => true,
            'show_admin_column'     => true,
            'update_count_callback' => '_update_post_term_count',
            'query_var'             => false,
            'rewrite'               => array(),
        );

        register_taxonomy( self::$industry_taxonomy_key, [VideosPostType::$post_type_key, ClientsPostType::$post_type_key, CaseStudiesPostType::$post_type_key,  ResourcesPostType::$post_type_key], $args );
    }
}