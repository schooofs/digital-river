<?php

/**
 *  Install Add-ons
 *  
 *  The following code will include all 4 premium Add-Ons in your theme.
 *  Please do not attempt to include a file which does not exist. This will produce an error.
 *  
 *  The following code assumes you have a folder 'add-ons' inside your theme.
 *
 *  IMPORTANT
 *  Add-ons may be included in a premium theme/plugin as outlined in the terms and conditions.
 *  For more information, please read:
 *  - http://www.advancedcustomfields.com/terms-conditions/
 *  - http://www.advancedcustomfields.com/resources/getting-started/including-lite-mode-in-a-plugin-theme/
 */ 

// Add-ons 
// include_once('add-ons/acf-repeater/acf-repeater.php');
// include_once('add-ons/acf-gallery/acf-gallery.php');
// include_once('add-ons/acf-flexible-content/acf-flexible-content.php');
// include_once( 'add-ons/acf-options-page/acf-options-page.php' );


/**
 *  Register Field Groups
 *
 *  The register_field_group function accepts 1 array which holds the relevant data to register a field group
 *  You may edit the array as you see fit. However, this may result in errors if the array is not compatible with ACF
 */

if(function_exists("register_field_group"))
{
    register_field_group(array (
        'id' => 'acf_custom-widgets',
        'title' => 'Custom Widgets',
        'fields' => array (
            array (
                'key' => 'field_227',
                'label' => 'Widget',
                'name' => 'widget',
                'type' => 'flexible_content',
                'layouts' => array (
                    array (
                        'label' => 'iFrame',
                        'name' => 'iframe',
                        'display' => 'row',
                        'sub_fields' => array (
                            array (
                                'key' => 'field_136',
                                'label' => 'Header Text',
                                'name' => 'header_text',
                                'type' => 'text',
                                'column_width' => '',
                                'default_value' => '',
                                'placeholder' => '',
                                'prepend' => '',
                                'append' => '',
                                'formatting' => 'none',
                                'maxlength' => '',
                            ),
                            array (
                                'key' => 'field_137',
                                'label' => 'Intro Text',
                                'name' => 'intro_text',
                                'type' => 'wysiwyg',
                                'column_width' => '',
                                'default_value' => '',
                                'toolbar' => 'full',
                                'media_upload' => 'yes',
                            ),
                            array (
                                'key' => 'field_138',
                                'label' => 'URL Title',
                                'name' => 'url_title',
                                'type' => 'text',
                                'column_width' => '',
                                'default_value' => '',
                                'placeholder' => '',
                                'prepend' => '',
                                'append' => '',
                                'formatting' => 'none',
                                'maxlength' => '',
                            ),
                            array (
                                'key' => 'field_139',
                                'label' => 'URL',
                                'name' => 'url',
                                'type' => 'text',
                                'column_width' => '',
                                'default_value' => '',
                                'placeholder' => '',
                                'prepend' => '',
                                'append' => '',
                                'formatting' => 'none',
                                'maxlength' => '',
                            ),
                            array (
                                'key' => 'field_140',
                                'label' => 'Hide on Responsive',
                                'name' => 'hide_on_responsive',
                                'type' => 'true_false',
                                'column_width' => '',
                                'message' => 'Hide on Responsive?',
                                'default_value' => 0,
                            ),
                        ),
                    ),
                    array (
                        'label' => 'Carousel',
                        'name' => 'carousel',
                        'display' => 'row',
                        'sub_fields' => array (
                            array (
                                'key' => 'field_141',
                                'label' => 'Header Text',
                                'name' => 'header_text',
                                'type' => 'text',
                                'column_width' => '',
                                'default_value' => '',
                                'placeholder' => '',
                                'prepend' => '',
                                'append' => '',
                                'formatting' => 'none',
                                'maxlength' => '',
                            ),
                            array (
                                'key' => 'field_142',
                                'label' => 'Intro Text',
                                'name' => 'intro_text',
                                'type' => 'wysiwyg',
                                'column_width' => '',
                                'default_value' => '',
                                'toolbar' => 'full',
                                'media_upload' => 'yes',
                            ),
                            array (
                                'key' => 'field_144',
                                'label' => 'Slides',
                                'name' => 'slides',
                                'type' => 'repeater',
                                'column_width' => '',
                                'sub_fields' => array (
                                    array (
                                        'key' => 'field_148',
                                        'label' => 'Slide Title',
                                        'name' => 'slide_title',
                                        'type' => 'text',
                                        'column_width' => '',
                                        'default_value' => '',
                                        'placeholder' => '',
                                        'prepend' => '',
                                        'append' => '',
                                        'formatting' => 'none',
                                        'maxlength' => '',
                                    ),
                                    array (
                                        'key' => 'field_149',
                                        'label' => 'Slide Subtitle',
                                        'name' => 'slide_subtitle',
                                        'type' => 'text',
                                        'column_width' => '',
                                        'default_value' => '',
                                        'placeholder' => '',
                                        'prepend' => '',
                                        'append' => '',
                                        'formatting' => 'none',
                                        'maxlength' => '',
                                    ),
                                    array (
                                        'key' => 'field_145',
                                        'label' => 'Slide Image',
                                        'name' => 'slide_image',
                                        'type' => 'image',
                                        'column_width' => '',
                                        'save_format' => 'url',
                                        'preview_size' => 'thumbnail',
                                        'library' => 'all',
                                    ),
                                    array (
                                        'key' => 'field_146',
                                        'label' => 'Slide Text',
                                        'name' => 'slide_text',
                                        'type' => 'wysiwyg',
                                        'column_width' => '',
                                        'default_value' => '',
                                        'toolbar' => 'full',
                                        'media_upload' => 'yes',
                                    ),
                                    array (
                                        'key' => 'field_147',
                                        'label' => 'Slide Video',
                                        'name' => 'slide_video',
                                        'type' => 'text',
                                        'column_width' => '',
                                        'default_value' => '',
                                        'placeholder' => '',
                                        'prepend' => '',
                                        'append' => '',
                                        'formatting' => 'none',
                                        'maxlength' => '',
                                    ),
                                ),
                                'row_min' => 0,
                                'row_limit' => 8,
                                'layout' => 'row',
                                'button_label' => 'Add Slide',
                            ),
                            array (
                                'key' => 'field_143',
                                'label' => 'Hide on Responsive',
                                'name' => 'hide_on_responsive',
                                'type' => 'true_false',
                                'column_width' => '',
                                'message' => 'Hide on Responsive?',
                                'default_value' => 0,
                            ),
                        ),
                    ),
                    array (
                        'label' => 'Featured Content',
                        'name' => 'featured_content',
                        'display' => 'row',
                        'sub_fields' => array (
                            array (
                                'key' => 'field_156',
                                'label' => 'Header Text',
                                'name' => 'header_text',
                                'type' => 'text',
                                'column_width' => '',
                                'default_value' => '',
                                'placeholder' => '',
                                'prepend' => '',
                                'append' => '',
                                'formatting' => 'none',
                                'maxlength' => '',
                            ),
                            array (
                                'key' => 'field_157',
                                'label' => 'Intro Text',
                                'name' => 'intro_text',
                                'type' => 'wysiwyg',
                                'column_width' => '',
                                'default_value' => '',
                                'toolbar' => 'full',
                                'media_upload' => 'yes',
                            ),
                            array (
                                'key' => 'field_152',
                                'label' => 'Content',
                                'name' => 'content',
                                'type' => 'repeater',
                                'column_width' => '',
                                'sub_fields' => array (
                                    array (
                                        'key' => 'field_155',
                                        'label' => 'Page',
                                        'name' => 'page',
                                        'type' => 'page_link',
                                        'column_width' => '',
                                        'post_type' => array (
                                            0 => 'post',
                                            1 => 'page',
                                            2 => 'attachment',
                                            3 => 'press_release',
                                            4 => 'events',
                                            5 => 'media_coverage',
                                        ),
                                        'allow_null' => 0,
                                        'multiple' => 0,
                                    ),
                                    array (
                                        'key' => 'field_159',
                                        'label' => 'Page TItle',
                                        'name' => 'page_title',
                                        'type' => 'text',
                                        'column_width' => '',
                                        'default_value' => '',
                                        'placeholder' => '',
                                        'prepend' => '',
                                        'append' => '',
                                        'formatting' => 'none',
                                        'maxlength' => '',
                                    ),
                                    array (
                                        'key' => 'field_161',
                                        'label' => 'Page Intro',
                                        'name' => 'page_intro',
                                        'type' => 'wysiwyg',
                                        'column_width' => '',
                                        'default_value' => '',
                                        'toolbar' => 'full',
                                        'media_upload' => 'yes',
                                    ),
                                    array (
                                        'key' => 'field_160',
                                        'label' => 'Feature Page Image',
                                        'name' => 'feature_page_image',
                                        'type' => 'image',
                                        'column_width' => '',
                                        'save_format' => 'url',
                                        'preview_size' => 'thumbnail',
                                        'library' => 'all',
                                    ),
                                    array (
                                        'key' => 'field_260',
                                        'label' => 'Video ID',
                                        'name' => 'video_id',
                                        'type' => 'text',
                                        'column_width' => '',
                                        'default_value' => '',
                                        'placeholder' => '',
                                        'prepend' => '',
                                        'append' => '',
                                        'formatting' => 'none',
                                        'maxlength' => '',
                                    ),
                                    array (
                                        'key' => 'field_261',
                                        'label' => 'Custom URL',
                                        'name' => 'custom_url',
                                        'type' => 'text',
                                        'column_width' => '',
                                        'default_value' => '',
                                        'placeholder' => '',
                                        'prepend' => '',
                                        'append' => '',
                                        'formatting' => 'none',
                                        'maxlength' => '',
                                    ),
                                    array (
                                        'key' => 'field_518d414ab4c0f',
                                        'label' => 'Read More Text',
                                        'name' => 'read_more_text',
                                        'type' => 'text',
                                        'instructions' => 'Leave blank to use the default.',
                                        'column_width' => '',
                                        'default_value' => '',
                                        'placeholder' => '',
                                        'prepend' => '',
                                        'append' => '',
                                        'formatting' => 'none',
                                        'maxlength' => '',
                                    ),
                                    array (
                                        'key' => 'field_525823a000e40',
                                        'label' => 'Enable Link',
                                        'name' => 'enable_link',
                                        'type' => 'true_false',
                                        'column_width' => '',
                                        'message' => 'Making this true enables the links, so that they can be clicked.',
                                        'default_value' => 0,
                                    ),
                                ),
                                'row_min' => 0,
                                'row_limit' => '',
                                'layout' => 'row',
                                'button_label' => 'Add Content',
                            ),
                            array (
                                'key' => 'field_162',
                                'label' => 'Hide on Responsive',
                                'name' => 'hide_on_responsive',
                                'type' => 'true_false',
                                'column_width' => '',
                                'message' => 'Hide on Responsive?',
                                'default_value' => 0,
                            ),
                        ),
                    ),
                    array (
                        'label' => 'Enhanced Text',
                        'name' => 'enhanced_text',
                        'display' => 'row',
                        'sub_fields' => array (
                            array (
                                'key' => 'field_163',
                                'label' => 'Content',
                                'name' => 'content',
                                'type' => 'wysiwyg',
                                'column_width' => '',
                                'default_value' => '',
                                'toolbar' => 'full',
                                'media_upload' => 'yes',
                            ),
                            array (
                                'key' => 'field_164',
                                'label' => 'Hide on Responsive',
                                'name' => 'hide_on_responsive',
                                'type' => 'true_false',
                                'column_width' => '',
                                'message' => 'Hide on Responsive?',
                                'default_value' => 0,
                            ),
                        ),
                    ),
                    array (
                        'label' => 'Tabbed Content',
                        'name' => 'tabbed_content',
                        'display' => 'row',
                        'sub_fields' => array (
                            array (
                                'key' => 'field_170',
                                'label' => 'Header Text',
                                'name' => 'header_text',
                                'type' => 'text',
                                'column_width' => '',
                                'default_value' => '',
                                'placeholder' => '',
                                'prepend' => '',
                                'append' => '',
                                'formatting' => 'none',
                                'maxlength' => '',
                            ),
                            array (
                                'key' => 'field_171',
                                'label' => 'Intro Text',
                                'name' => 'intro_text',
                                'type' => 'wysiwyg',
                                'column_width' => '',
                                'default_value' => '',
                                'toolbar' => 'full',
                                'media_upload' => 'yes',
                            ),
                            array (
                                'key' => 'field_172',
                                'label' => 'Rows',
                                'name' => 'rows',
                                'type' => 'repeater',
                                'column_width' => '',
                                'sub_fields' => array (
                                    array (
                                        'key' => 'field_173',
                                        'label' => 'Tabs',
                                        'name' => 'tabs',
                                        'type' => 'repeater',
                                        'column_width' => '',
                                        'sub_fields' => array (
                                            array (
                                                'key' => 'field_175',
                                                'label' => 'Tab Title',
                                                'name' => 'tab_title',
                                                'type' => 'text',
                                                'column_width' => '',
                                                'default_value' => '',
                                                'placeholder' => '',
                                                'prepend' => '',
                                                'append' => '',
                                                'formatting' => 'none',
                                                'maxlength' => '',
                                            ),
                                            array (
                                                'key' => 'field_176',
                                                'label' => 'Tab Title Image',
                                                'name' => 'tab_title_image',
                                                'type' => 'image',
                                                'column_width' => '',
                                                'save_format' => 'url',
                                                'preview_size' => 'thumbnail',
                                                'library' => 'all',
                                            ),
                                            array (
                                                'key' => 'field_174',
                                                'label' => 'Content',
                                                'name' => 'content',
                                                'type' => 'wysiwyg',
                                                'column_width' => '',
                                                'default_value' => '',
                                                'toolbar' => 'full',
                                                'media_upload' => 'yes',
                                            ),
                                            array (
                                                'key' => 'field_177',
                                                'label' => 'Drawer Open',
                                                'name' => 'drawer_open',
                                                'type' => 'true_false',
                                                'column_width' => '',
                                                'message' => 'Drawer Open?',
                                                'default_value' => 0,
                                            ),
                                        ),
                                        'row_min' => 0,
                                        'row_limit' => '',
                                        'layout' => 'row',
                                        'button_label' => 'Add Tab',
                                    ),
                                ),
                                'row_min' => 0,
                                'row_limit' => '',
                                'layout' => 'row',
                                'button_label' => 'Add Row',
                            ),
                            array (
                                'key' => 'field_208',
                                'label' => 'Hide on Responsive',
                                'name' => 'hide_on_responsive',
                                'type' => 'true_false',
                                'column_width' => '',
                                'message' => 'Hide on Responsive?',
                                'default_value' => 0,
                            ),
                        ),
                    ),
                    array (
                        'label' => 'Posts',
                        'name' => 'posts',
                        'display' => 'row',
                        'sub_fields' => array (
                            array (
                                'key' => 'field_231',
                                'label' => 'Header Text',
                                'name' => 'header_text',
                                'type' => 'text',
                                'column_width' => '',
                                'default_value' => '',
                                'placeholder' => '',
                                'prepend' => '',
                                'append' => '',
                                'formatting' => 'none',
                                'maxlength' => '',
                            ),
                            array (
                                'key' => 'field_262',
                                'label' => 'Intro Text',
                                'name' => 'intro_text',
                                'type' => 'textarea',
                                'column_width' => '',
                                'default_value' => '',
                                'placeholder' => '',
                                'maxlength' => '',
                                'formatting' => 'br',
                            ),
                            array (
                                'key' => 'field_200',
                                'label' => 'Number of Posts to Display',
                                'name' => 'posts_number',
                                'type' => 'select',
                                'column_width' => '',
                                'choices' => array (
                                    'All' => 'All',
                                    'One' => 'One',
                                ),
                                'default_value' => 'All',
                                'allow_null' => 0,
                                'multiple' => 0,
                            ),
                            array (
                                'key' => 'field_207',
                                'label' => 'Layout',
                                'name' => 'layout',
                                'type' => 'select',
                                'column_width' => '',
                                'choices' => array (
                                    'box' => 'Box',
                                    'list' => 'Date and Title List',
                                    'tabs' => 'Category Tabs',
                                ),
                                'default_value' => '',
                                'allow_null' => 0,
                                'multiple' => 0,
                            ),
                            array (
                                'key' => 'field_218',
                                'label' => 'Categories',
                                'name' => 'categories',
                                'type' => 'taxonomy',
                                'column_width' => '',
                                'taxonomy' => 'category',
                                'field_type' => 'checkbox',
                                'allow_null' => 0,
                                'load_save_terms' => 0,
                                'return_format' => 'id',
                                'multiple' => 0,
                            ),
                            array (
                                'key' => 'field_216',
                                'label' => 'From Date',
                                'name' => 'from_date',
                                'type' => 'date_picker',
                                'column_width' => '',
                                'date_format' => '@',
                                'display_format' => 'mm/dd/yy',
                                'first_day' => 1,
                            ),
                            array (
                                'key' => 'field_217',
                                'label' => 'To Date',
                                'name' => 'to_date',
                                'type' => 'date_picker',
                                'column_width' => '',
                                'date_format' => '@',
                                'display_format' => 'mm/dd/yy',
                                'first_day' => 1,
                            ),
                            array (
                                'key' => 'field_209',
                                'label' => 'Hide on Responsive',
                                'name' => 'hide_on_responsive',
                                'type' => 'true_false',
                                'column_width' => '',
                                'message' => 'Hide on Responsive?',
                                'default_value' => 0,
                            ),
                            array (
                                'key' => 'field_51798b978740f',
                                'label' => 'Hide Sorting Feature',
                                'name' => 'hide_sorting_feature',
                                'type' => 'true_false',
                                'column_width' => '',
                                'message' => 'Hide Sorting Feature?',
                                'default_value' => 0,
                            ),
                            array (
                                'key' => 'field_520a97dc5a4dc',
                                'label' => 'Test',
                                'name' => 'test',
                                'type' => 'post_type_selector',
                                'column_width' => '',
                            ),
                            array (
                                'key' => 'field_520b92bfdeb65',
                                'label' => 'Test 2',
                                'name' => 'test_2',
                                'type' => 'relationship',
                                'column_width' => '',
                                'return_format' => 'object',
                                'post_type' => array (
                                    0 => 'post',
                                    1 => 'press_release',
                                    2 => 'events',
                                    3 => 'media_coverage',
                                ),
                                'taxonomy' => array (
                                    0 => 'all',
                                ),
                                'filters' => array (
                                    0 => 'search',
                                    1 => 'post_type',
                                ),
                                'result_elements' => array (
                                    0 => 'post_type',
                                    1 => 'post_title',
                                ),
                                'max' => '',
                            ),
                        ),
                    ),
                ),
                'button_label' => 'Add Row',
            ),
        ),
        'location' => array (
            array (
                array (
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'custom_widgets',
                    'order_no' => 0,
                    'group_no' => 0,
                ),
            ),
        ),
        'options' => array (
            'position' => 'normal',
            'layout' => 'no_box',
            'hide_on_screen' => array (
                0 => 'the_content',
                1 => 'excerpt',
                2 => 'discussion',
                3 => 'comments',
                4 => 'revisions',
                5 => 'slug',
                6 => 'author',
                7 => 'format',
                8 => 'featured_image',
                9 => 'categories',
                10 => 'tags',
                11 => 'send-trackbacks',
            ),
        ),
        'menu_order' => 0,
    ));
}
