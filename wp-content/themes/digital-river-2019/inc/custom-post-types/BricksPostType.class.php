<?php

class BricksPostType
{

    public static $brickTypes = array(
        "river" => "River",
        "half_half" => "Half & Half",
        "our_clients" => "Our Clients",
        "our_clients_slider" => "Our Clients Slider",
        "clients_full_width" => "Clients Full Width",
        "featured_clients" => "Featured Clients",
        "hero_header" => "Hero Header",
        "pictogram" => "Pictogram",
        "pictogram_callout" => "Pictogram Callout",
        "commerce_pictogram" => "Commerce Pictogram",
        "archive" => "Archive",
        "timeline" => "Timeline",
        "three_up" => "Three Up",
        "location" => "Location",
        "case_study_cross_sell" => "Case Study Cross Sell",
        "news_releases" => "News & Events - News Releases",
        "upcoming_events" => "News & Events - Upcoming Events",
        "media_coverage" => "News & Events - Media Coverage",
        "recent_posts" => "News & Events - Recent Posts",
        "twitter" => "News & Events - Twitter",
        "custom_code" => "Custom Code",
        "value_brief_overview" => "Value brief —— overview",
        "value_brief_image" => "Value brief —— image",
        "value_brief_fexible" => "Value brief —— flexible",
        "value_brief_cta" => "Value brief —— CTA",
        "flip_flap_resource_content" => "Our Company - resources & content",
        "three_across" => "Three Across",
        "quote" => "Quote",
        "clicky" => "Clicky",
        "games_clicky" => "Games Clicky",
        "german_timeline" => "German Timeline",
        "three_up_featured" => "Three up featured",
        "teams_locations" => "Teams/ Locations",
        "faq_question_answers" => "Frequently Asked Questions",
        "home_hero" => 'Home Hero',
        "home_widget" => "Home Widget",
        "home_benefits" => "Home Benefits",
        "home_quotes" => "Home Quotes",
        "home_integrations" => "Home Integrations",
        "home_news" => "Home News",
        "home_solutions" => "Home Solutions",
        "cta_banner" => "CTA Banner",
        "pr_quote" => "Payment and Risk Quote",
        "hero" => "Hero",
        "hero_dynamic" => 'Hero Dynamic',
        "in_the_news_filter" => "In The News Filter",
        "in_the_news_results" => "In The News Results",
        "events_slider" => "Events Slider",
        "patents" => "Patents",
        "heading_text" => "Heading and Text",
        "about_us_video" => "About Us - Video",
        "about_us_facts" => "About Us - Facts",
        "about_us_team" => "About Us - Team",
        "about_us_world" => "About Us - Locations",
        "demo_form" => "Request Demo - Form",
        "demo_quote" => "Request Demo - Quote",
        "benefits_quote" => "Benefits Quote",
        "partners_slider" => 'Partners Slider',
        "partners_accordion" => 'Partners Accordion',
        "partners_image_text" => 'Partners Image and Text',
        "partners_image_cta" => 'Partners Image CTA',
        "two_card" => "Two Card",
        "two_col" => "Two Col",
        "three_col" => "Three Col",
        "resources_filter" => 'Resources Filter',
        "resources_results" => 'Resources Results',
        "partner_form" => 'Partner Form',
        "feature" => 'Feature',
        "callouts" => "Callouts",
        "callouts_with_buttons" => "Callouts With Buttons",
        "videos" => "Videos",
        "agenda" => "Agenda",
        "speakers" => "Speakers",
        "events_hero" => "Events Hero",
        "events_reasons" => "Events Reasons",
        "events_location" => "Events Location",
        "events_cta_banner" => "Events CTA Banner",
        "featured_partner_hero" => "Featured Partner Hero",
        "featured_partner_three_col1" => "Featured Partner Three Col 1",
        "featured_partner_three_col2" => "Featured Partner Three Col 2",
        "system_integrators_slider" => "System Integrators Slider",
        "featured_partner_video" => "Featured Partner Video",
        "featured_partner_cta_banner" => "Featured Partner CTA Banner",
        "partners_features_table" => "Featured Partner Features Table",
        "partners_features_table_static" => "Featured Partner Tech Stack Image",
        "partners_salesforce_appexchange" => "Salesforce AppExchange Button",
        "banner_with_logos" => "Banner With Logos"
    );
    public static $post_type_key = 'bricks';
    public static $post_type_plural_name = 'Bricks';
    public static $post_type_singular_name = 'Brick';

    function __construct()
    {
        if (!post_type_exists(self::$post_type_key)) {
            add_action('init', array(&$this, 'register_post_type'));
            add_action('add_meta_boxes', array(&$this, 'add_brick_type_metabox'));
            add_action('save_post', array(&$this, 'save_brick_type_value'));
            add_filter('acf/location/rule_match/brick', array(&$this, 'acf_location_rules_match_brick'), 10, 3);
            add_filter('acf/location/rule_types', array(&$this, 'acf_location_rules_types'));
            add_filter('acf/location/rule_values/brick', array(&$this, 'acf_location_rules_values_brick'));
            add_action('add_meta_boxes', array(&$this, 'yoast_remove_metabox'), 99);
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
            'supports' => array('title'),
            'public' => false,
            'show_ui' => true,
            'show_in_menu' => true,
            'show_in_rest' => false,
            'menu_position' => 6,
            'show_in_nav_menus' => true,
            'publicly_queryable' => false,
            'exclude_from_search' => true,
            'has_archive' => false,
            'query_var' => false,
            'can_export' => true,
            'capability_type' => 'post',
            'rewrite' => false,
            'menu_icon' => 'dashicons-tagcloud'
        );

        register_post_type(self::$post_type_key, $args);
    }

    /**
     * Adds a box to the main column on the Post and Page edit screens.
     */
    public function add_brick_type_metabox()
    {
        add_meta_box(
            'brick_type',
            'Brick Type',
            array(&$this, 'render_brick_type_metabox'),
            self::$post_type_key,
            'side'
        );
    }


    /**
     * Prints the box content.
     *
     * @param WP_Post $post The object for the current post/page.
     */
    public function render_brick_type_metabox($post)
    {
        wp_nonce_field('save_brick_type_value', 'save_brick_type_meta_box_nonce');

        $selectedPostMeta = get_post_meta($post->ID, self::$post_type_key, true);

        foreach (self::$brickTypes as $brickId => $brickType) :
            echo "<input ";
            echo $brickId == $selectedPostMeta ? "checked" : "";
            echo " type='radio' name='" . self::$post_type_key . "' value='" . $brickId . "' />";
            echo "<label>" . $brickType . "</label>";
            echo "<br>";
        endforeach;
    }


    public function save_brick_type_value($post_id)
    {
        if (!isset($_POST['save_brick_type_meta_box_nonce'])) {
            return;
        }

        if (!wp_verify_nonce($_POST['save_brick_type_meta_box_nonce'], 'save_brick_type_value')) {
            return;
        }

        // If this is an autosave, our form has not been submitted, so we don't want to do anything.
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return;
        }

        // Check the user's permissions.
        if (isset($_POST['post_type']) && 'page' == $_POST['post_type']) {

            if (!current_user_can('edit_page', $post_id)) {
                return;
            }

        } else {

            if (!current_user_can('edit_post', $post_id)) {
                return;
            }
        }

        // Make sure that it is set.
        if (!isset($_POST[self::$post_type_key])) {
            return;
        }

        update_post_meta($post_id, self::$post_type_key, sanitize_text_field($_POST[self::$post_type_key]));
    }


    /**
     *    Triggers correct ACF fields to show up when a brick type is chosen
     *
     */
    public function acf_location_rules_match_brick($match, $rule, $options)
    {
        global $post;

        $selected_brick_type = $rule['value'];
        $brick_type = get_post_meta($post->ID, self::$post_type_key, true);

        if ($rule['operator'] == "==") {
            $match = ($brick_type == $selected_brick_type);
        } elseif ($rule['operator'] == "!=") {
            $match = ($brick_type != $selected_brick_type);
        }

        return $match;
    }


    /**
     *    Adds Slides as an option in post types selector
     *
     */
    public function acf_location_rules_types($choices)
    {

        $choices['Basic']['brick'] = 'Brick';
        return $choices;

    }


    /**
     *    Adds each brick type as an option for ACF functionality
     *
     */
    public function acf_location_rules_values_brick($choices)
    {
        return self::$brickTypes;
    }


    public function yoast_remove_metabox()
    {
        remove_meta_box('wpseo_meta', self::$post_type_key, 'normal');
    }

}
