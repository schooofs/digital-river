<?php

/*
Plugin Name: Add Custom TinyMCE Button
Plugin URI: http://digitalriver.com
Description: Adds a custom button to WP visual editor.
Author: Kossi C. Fiadjigbe
*/



add_action('admin_head', 'dr_add_my_tc_button');

//gavickpro_add_my_tc_button function should be as follows:

function dr_add_my_tc_button() {
    global $typenow;
    // check user permissions
    if ( !current_user_can('edit_posts') && !current_user_can('edit_pages') ) {
    return;
    }
    // verify the post type
    if( ! in_array( $typenow, array( 'post', 'page' ) ) )
        return;
    // check if WYSIWYG is enabled
    if ( get_user_option('rich_editing') == 'true') {
        add_filter("mce_external_plugins", "dr_add_tinymce_plugin");
        add_filter('mce_buttons', 'dr_register_my_tc_button');
    }
}




function dr_add_tinymce_plugin($plugin_array) {
    $plugin_array['dr_tc_button'] = plugins_url( '/add-resource-shortcode.php', __FILE__ ); // CHANGE THE BUTTON SCRIPT HERE
    return $plugin_array;
}




function dr_register_my_tc_button($buttons) {
   array_push($buttons, "dr_tc_button");
   return $buttons;
}


/*
==================================================================
 Creating and display an array of custom post type IDs
================================================================== 
*/

function list_of_mm_post_ids(){
$args = array(
'post_type' => ResourcesPostType::$post_type_key, 
'post_status' => 'publish',
'order' => 'ASC',
'posts_per_page' => -1
);
$posts_query = new WP_Query($args);

// Setting up the array in which ALL IDs of all product posts will be stored
$posts = array();


// Starting the loop
$resources = [];
while ($posts_query->have_posts()) {
  $posts_query-> the_post(); 
  $resources[] = '{"text":"'.get_the_title().'","value":"[add-resource postid='.get_the_ID().']","onclick":(function(){editor.insertContent(this.value());})}'; 
}

echo implode(",",$resources);

wp_reset_postdata(); //reset the global post data


}