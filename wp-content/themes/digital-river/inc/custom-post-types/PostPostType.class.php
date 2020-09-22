<?php
/**
 * Custom post type - Resources
 *
 * @package digitalriver
 */

class PostPostType {

    public static $author_field_key = "field_5a9d6e5f1e968";
    public static $additional_author_field_key = "field_5991c3a0de6f3";

    function __construct()
    {
        add_action("admin_menu", ["PostPostType", "create_subpage"]);
        add_filter('acf/load_field/key='.self::$author_field_key, ["PostPostType", "acf_load_author_field"]);
        add_filter('acf/load_field/key='.self::$additional_author_field_key, ["PostPostType", "acf_load_author_field"]);
        add_action('admin_head', ["PostPostType", "remove_wordpress_author_metabox"]);
        add_filter('the_author', ["PostPostType", 'filter_the_author']); 
    }

    public function create_subpage()
    {
        if( function_exists('acf_add_options_page') ) {
            acf_add_options_sub_page([
                'page_title'    => __('Authors','digital-river'),
                'menu_title'    => __('Authors','digital-river'),
                'menu_slug'     => 'blog-authors',
                'parent'        => 'edit.php',
            ]);
        }
    }

    public function remove_wordpress_author_metabox()
    {
        ?>
        <style>
            #authordiv, label[for="authordiv-hide"] {display: none;}
        </style>
        <?php
    }


    // Populate author field on posts admin from authors option page
    public static function acf_load_author_field( $field )
    {
        //get authors field from authors option page
        $authors = get_field("authors", "option");

        //format the array
        $authors = array_column($authors, "author");

        $formatted_authors = [];
        foreach($authors as $author) {
            $formatted_authors[$author] = $author;
        }

        //populate field from array
        $field['choices'] = $formatted_authors;

        return $field;
    }


    static function filter_the_author( $author_display_name )
    { 
        $authors_list = get_field("main-author");
        $authors = get_field("author_fields");
            
        if($authors !== false && count($authors) > 0)  { 

          $number_author = count($authors);

          foreach ($authors as $key => $author) {
            if ($key + 1 == $number_author) {
                  $authors_list .= " and";
            }
            else {
                  $authors_list .= " , ";
            }
              
            if($author['acf_fc_layout'] === "the_author") {
                $authors_list .= " ".$author['employee'];
            }
            else if($author['acf_fc_layout'] === "non-employee") {
               $authors_list .= " ".$author['non-employee'];
            }
          }
        }

        return $authors_list; 
    }

}
