<?php

class BrickController
{

    public function __construct()
    {
        add_action('wp_ajax_nopriv_get_archive', array($this, 'get_archive_posts'));
        add_action('wp_ajax_get_archive', array($this, 'get_archive_posts'));
    }

    public static function river($brick_id, $brick_info)
    {
        extract($brick_info);

        $GLOBALS['river_side'] = (isset($GLOBALS['river_side']) && $GLOBALS['river_side'] === "left") ? "right" : "left";

        $resource_boxes = "";
        if ($resources !== false) {
            foreach ($resources as $resource) {
                $resource['class'] = " left ";
                $resource_boxes .= ResourceBox::get($resource);
            }
        }

        View::make("bricks/river", [
            "anchor" => self::create_anchor($label),
            "progress_nav_enabled" => $progress_nav_enabled,
            "image" => $image,
            "lazy" => true,
            "resources" => $resource_boxes,
            "content" => ContentFormatter::content($content['content']),

        ]);
    }

    public static function demo_quote($brick_id, $brick_info)
    {
        extract($brick_info);

        View::make("bricks/demo-quote", [
            "anchor" => self::create_anchor($label),
            "progress_nav_enabled" => $progress_nav_enabled,
            "background_image" => $background_image,
            "quote" => $quote,
            "client_name" => $client_name,
            "person" => $person,
            "business_title" => $business_title
        ]);
    }

    public static function demo_form($brick_id, $brick_info)
    {
        extract($brick_info);

        View::make("bricks/demo-form", [
            "anchor" => self::create_anchor($label),
            "progress_nav_enabled" => $progress_nav_enabled,
            "cta_button_text" => $cta_button_text,
            "cta_button_colour" => $cta_button_colour,
            "title_text" => $title_text,
            "title_colour" => $title_colour,
            "body_copy" => $body_copy
        ]);
    }

    public static function hero($brick_id, $brick_info)
    {
        extract($brick_info);

        View::make("bricks/hero", [
            "anchor" => self::create_anchor($label),
            "progress_nav_enabled" => $progress_nav_enabled,
            "heading" => $heading,
            "body" => $body,
            "links" => $links,
            "slim" => $slim,
            "logo" => $logo
        ]);
    }

    public static function featured_partner_hero($brick_id, $brick_info)
    {
        extract($brick_info);

        View::make("bricks/featured-partner-hero", [
            "anchor" => self::create_anchor($label),
            "progress_nav_enabled" => $progress_nav_enabled,
            "heading" => $heading,
            "body" => $body,
            "links" => $links,
            "slim" => $slim,
            "logo" => $logo,
            "logo_url" => $logo_url
        ]);
    }
    public static function featured_partner_hero_magento($brick_id, $brick_info)
    {
        extract($brick_info);

        View::make("bricks/featured-partner-hero-magento", [
            "anchor" => self::create_anchor($label),
            "progress_nav_enabled" => $progress_nav_enabled,
            "heading" => $heading,
            "body" => $body,
            "links" => $links,
            "slim" => $slim,
            "logo" => $logo,
            "logo_url" => $logo_url
        ]);

    }    public static function featured_partner_hero_wordpress($brick_id, $brick_info)
    {
        extract($brick_info);

        View::make("bricks/featured-partner-hero-wordpress", [
            "anchor" => self::create_anchor($label),
            "progress_nav_enabled" => $progress_nav_enabled,
            "heading" => $heading,
            "body" => $body,
            "links" => $links,
            "slim" => $slim,
            "logo" => $logo,
            "logo_url" => $logo_url
        ]);
    }
    public static function partner_form($brick_id, $brick_info)
    {
        extract($brick_info);

        View::make("bricks/partner-form", [
            "anchor" => self::create_anchor($label),
            "progress_nav_enabled" => $progress_nav_enabled
        ]);
    }

    public static function hero_dynamic($brick_id, $brick_info)
    {
        extract($brick_info);

        $entryKey = $_GET[$query_id];

        if (!empty($entryKey)) {
            $matches = 0;

            foreach ($entries as $key => $entry) {
                if ($entryKey == $entry['id']) {
                    $heading = $entry['heading'];
                    $body = $entry['body'];

                    $matches++;
                }
            }
        }

        if (!$matches || empty($entryKey)) {
            $heading = $entries[0]['heading'];
            $body = $entries[0]['body'];
        }

        View::make("bricks/hero-dynamic", [
            "anchor" => self::create_anchor($label),
            "progress_nav_enabled" => $progress_nav_enabled,
            "heading" => $heading,
            "body" => $body
        ]);
    }

    public static function in_the_news_filter($brick_id, $brick_info)
    {
        extract($brick_info);

        View::make("bricks/in-the-news-filter", [
            "anchor" => self::create_anchor($label),
            "progress_nav_enabled" => $progress_nav_enabled,
            "heading" => $heading,
            "heading_colour" => $heading_colour
        ]);
    }

    public static function in_the_news_results($brick_id, $brick_info)
    {
        extract($brick_info);

        $limit = 3;
        $page = 2;

        $args = [
            'posts_per_page' => $limit * $page,
            'post_type' => [
                PressReleasesPostType::$post_type_key,
                MediaCoveragePostType::$post_type_key
            ]
        ];

        if ($year) {
            $args['year'] = $year;
        }

        $query = new WP_Query($args);
        $articles = $query->posts;

        foreach ($articles as $article) {
            $fields = get_fields($article->ID);
            $article->custom = $fields;
        }

        View::make("bricks/in-the-news-results", [
            "anchor" => self::create_anchor($label),
            "progress_nav_enabled" => $progress_nav_enabled,
            "articles" => $articles,
            "limit" => $limit,
            "page" => $page,
            "max" => floor($query->found_posts / $limit)
        ]);
    }

    public static function events_slider($brick_id, $brick_info)
    {
        extract($brick_info);

        foreach ($events as $event) {
            $custom_fields = get_fields($event->ID);

            $terms = get_the_terms($event, 'event-type');

            $extract_term_slug = function ($term) {
                return $term->slug;
            };

            $term_slugs = array_map($extract_term_slug, $terms);

            $custom_fields['is_flagship'] = in_array('flagship', $term_slugs);

            $event->custom = $custom_fields;
        }

        View::make("bricks/events_slider", [
            "anchor" => self::create_anchor($label),
            "progress_nav_enabled" => $progress_nav_enabled,
            "heading" => $heading,
            "heading_colour" => $heading_colour,
            "slides" => $events,
            "slider_arrows_enabled" => $slider_arrows_enabled,
            "slider_pips_enabled" => $slider_pips_enabled,
            "items_per_slide" => $items_per_slide
        ]);
    }

    public static function resources_filter($brick_id, $brick_info)
    {
        extract($brick_info);

        $resource_topics = get_terms('resource-topic', [
            'hide_empty' => false
        ]);

        $resource_types = get_terms('resource-type', [
            'hide_empty' => false
        ]);

        foreach ($counts as $i => $count) {
            if ($i == 'resource-topic') {
                foreach ($resource_topics as $j => $term) {
                    $term->dynamic_count = $count[$term->slug] ? $count[$term->slug] : 0;
                }
            } elseif ($i == 'resource-type') {
                foreach ($resource_types as $j => $term) {
                    $term->dynamic_count = $count[$term->slug] ? $count[$term->slug] : 0;
                }
            }
        }

        View::make("bricks/resources-filter", [
            "anchor" => self::create_anchor($label),
            "progress_nav_enabled" => $progress_nav_enabled,
            'resource_topics' => $resource_topics,
            'resource_types' => $resource_types
        ]);
    }

    public static function resources_results($brick_id, $brick_info)
    {
        extract($brick_info);

        $limit = 3;
        $page = 3;

        $with_filters = $filters['topic'] || $filters['type'];

        $args = [
            'post_type' => [
                ResourcesPostType::$post_type_key,
                'post'
            ],
            'orderby' => 'date',
            'order' => 'DESC',
            'post_status' => 'publish'
        ];

        if ($with_filters) {
            $args['tax_query'] = [];
            $args['posts_per_page'] = $limit * $page + 1;

            if ($filters['topic']) {
                array_push($args['tax_query'], [
                    'taxonomy' => 'resource-topic',
                    'field' => 'slug',
                    'terms' => $filters['topic']
                ]);
            }

            if ($filters['type']) {
                array_push($args['tax_query'], [
                    'taxonomy' => 'resource-type',
                    'field' => 'slug',
                    'terms' => $filters['type']
                ]);
            }
        } else {
            $args['posts_per_page'] = $limit * $page + 1;
        }

        $query = new WP_Query($args);
        $resources = $query->posts;

        $featured_in_query = false;

        if ($with_filters) {
            $featured = $resources[0];
            array_splice($resources, 0, 1);
        } else {
            foreach ($resources as $key => $resource) {
                if ($resource->ID == $featured->ID) {
                    array_splice($resources, $key, 1);
                    $featured_in_query = true;
                }
            }

            if (!$featured_in_query) {
                array_pop($resources);
            }
        }

        $featured->custom = get_fields($featured->ID);

        if ($featured->post_type === 'post') {
            $featured->custom['image'] = $featured->custom['small_image'];
            $featured->custom['link'] = get_the_permalink($featured->ID);
        }

        $picks = $query->found_posts > ($with_filters ? 8 : 7);

        if ($picks) {
            foreach ($editors_picks as $pick) {
                $pick->editors_pick = true;
            }

            array_splice($resources, 3, 0, [$editors_picks[0]]);
            array_splice($resources, 8, 0, [$editors_picks[1]]);
            array_splice($resources, 9, 2);
        }

        foreach ($resources as $resource) {
            $custom = get_fields($resource->ID);

            if ($resource->post_type === 'post') {
                $custom['image'] = $custom['small_image'];
                $custom['link'] = get_the_permalink($resource->ID);
            }

            $resource->custom = $custom;
        }

        View::make("bricks/resources-results", [
            "anchor" => self::create_anchor($label),
            "progress_nav_enabled" => $progress_nav_enabled,
            "featured" => $featured,
            "resources" => $resources,
            "page" => $page,
            "limit" => $limit,
            "max" => floor($query->found_posts / $limit),
            "picks" => $picks == 1 ? 'true' : 'false',
            "offset_adjust" => $featured_in_query ? 1 : 0
        ]);
    }

    public static function patents($brick_id, $brick_info)
    {
        extract($brick_info);

        View::make("bricks/patents", [
            "anchor" => self::create_anchor($label),
            "progress_nav_enabled" => $progress_nav_enabled,
            "heading" => $heading,
            "heading_colour" => $heading_colour,
            "cards" => $cards
        ]);
    }

    public static function two_col($brick_id, $brick_info)
    {
        extract($brick_info);

        View::make("bricks/two-col", [
            "anchor" => self::create_anchor($label),
            "progress_nav_enabled" => $progress_nav_enabled,
            "heading" => $heading,
            "cards" => $cards
        ]);
    }

    public static function three_col($brick_id, $brick_info)
    {
        extract($brick_info);

        View::make("bricks/three-col", [
            "anchor" => self::create_anchor($label),
            "progress_nav_enabled" => $progress_nav_enabled,
            "cards" => $cards
        ]);
    }

    public static function featured_partner_three_col1($brick_id, $brick_info)
    {
        extract($brick_info);

        View::make("bricks/featured-partner-three-col1", [
            "anchor" => self::create_anchor($label),
            "progress_nav_enabled" => $progress_nav_enabled,
            "cards" => $cards
        ]);
    }

    public static function featured_partner_three_col2($brick_id, $brick_info)
    {
        extract($brick_info);

        View::make("bricks/featured-partner-three-col2", [
            "anchor" => self::create_anchor($label),
            "progress_nav_enabled" => $progress_nav_enabled,
            "cards" => $cards
        ]);
    }


    public static function half_half($brick_id, $brick_info)
    {
        extract($brick_info);

        View::make("bricks/half-half", [
            "anchor" => self::create_anchor($label),
            "progress_nav_enabled" => $progress_nav_enabled,
            "background_color" => $background_color,
            "background_image" => $background_image,
            "spacing_top" => $spacing_top,
            "spacing_bottom" => $spacing_bottom,
            "subject_matter_positioning" => $subject_matter_positioning,
            "left_side" => is_array($left_content['content']) ? ContentFormatter::content($left_content['content']) : null,
            "right_side" => is_array($right_content['content']) ? ContentFormatter::content($right_content['content']) : null,
        ]);
    }


    public static function half_half_wider($brick_id, $brick_info)
    {
        extract($brick_info);

        View::make("bricks/half-half-wider", [
            "anchor" => self::create_anchor($label),
            "progress_nav_enabled" => $progress_nav_enabled,
            "background_color" => $background_color,
            "background_image" => $background_image,
            "spacing_top" => $spacing_top,
            "spacing_bottom" => $spacing_bottom,
            "image_side" => $image_side,
            "left_side" => is_array($left_content['content']) ? ContentFormatter::content($left_content['content']) : null,
            "right_side" => is_array($right_content['content']) ? ContentFormatter::content($right_content['content']) : null,
        ]);
    }


    public static function our_clients($brick_id, $brick_info)
    {
        extract($brick_info);

        $formatted_clients = [];
        foreach ($clients as $client) {
            $formatted_clients[] = ContentFormatter::svg("logo/" . get_field("logo", $client['client']), ["color" => "#002C57"]);
        }

        View::make("bricks/our-clients", [
            "anchor" => self::create_anchor($label),
            "progress_nav_enabled" => $progress_nav_enabled,
            "background_color" => $background_color,
            "content" => is_array($content['content']) ? ContentFormatter::content($content['content']) : null,
            "clients" => $formatted_clients,
            "position" => $clients_position
        ]);

    }

    public static function clients_full_width($brick_id, $brick_info)
    {
        extract($brick_info);

        $formatted_clients = [];
        foreach ($clients as $client) {
            $formatted_clients[] = ContentFormatter::svg("logo/" . get_field("logo", $client['client']), ["color" => "#002C57"]);
        }

        View::make("bricks/clients-full-width", [
            "anchor" => self::create_anchor($label),
            "progress_nav_enabled" => $progress_nav_enabled,
            "background_color" => $background_color,
            "clients" => $formatted_clients,
        ]);
    }

    public static function our_clients_slider($brick_id, $brick_info)
    {
        extract($brick_info);

        $formatted_clients = [];

        foreach ($clients as $client) {
            $formatted_clients[] = ClientBox::make($client);
        }

        View::make("bricks/our-clients-slider", [
            "anchor" => self::create_anchor($label),
            "progress_nav_enabled" => $progress_nav_enabled,
            "background_color" => $background_color,
            "content" => is_array($content['content']) ? ContentFormatter::content($content['content']) : null,
            "clients" => $formatted_clients,
            "image" => $image,
            "position" => $clients_position
        ]);
    }

    public static function featured_clients($brick_id, $brick_info)
    {
        extract($brick_info);

        $formatted_clients = [];

        foreach ($clients as $client) {
            $formatted_clients[] = ClientBox::make($client, $type);
        }

        View::make("bricks/clients", [
            "anchor" => self::create_anchor($label),
            "progress_nav_enabled" => $progress_nav_enabled,
            "clients" => $formatted_clients
        ]);
    }

    public static function pictogram($brick_id, $brick_info)
    {
        extract($brick_info);

        View::make("bricks/pictogram", [
            "anchor" => self::create_anchor($label),
            "progress_nav_enabled" => $progress_nav_enabled,
            "pictogram" => $pictogram,
            "resource" => ResourceBox::get($resource[0]),
            "content" => ContentFormatter::content($content['content'])
        ]);
    }

    public static function commerce_pictogram($brick_id, $brick_info)
    {
        extract($brick_info);

        View::make("bricks/commerce-pictogram", [
            "anchor" => self::create_anchor($label),
            "progress_nav_enabled" => $progress_nav_enabled,
            "pictogram" => $pictogram,
            "resource" => ResourceBox::get($resource[0]),
            "content" => ContentFormatter::content($content['content'])
        ]);
    }


    public static function hero_header($brick_id, $brick_info)
    {
        extract($brick_info);

        View::make("bricks/hero-header", [
            "anchor" => self::create_anchor($label),
            "progress_nav_enabled" => $progress_nav_enabled,
            "background_color" => $background_color,
            "background_image" => $background_image,
            "vertical_padding" => $vertical_padding,
            "heading" => $heading,
            "top_text_content" => $top_text_content,
            "text_content" => $text_content,
            "link" => ($show_link === true) ? ContentFormatter::link($link) : null,
        ]);
    }


    public static function pictogram_callout($brick_id, $brick_info)
    {
        extract($brick_info);

        $resource['class'] = "pull-right";

        View::make("bricks/pictogram-callout", [
            "anchor" => self::create_anchor($label),
            "progress_nav_enabled" => $progress_nav_enabled,
            "svg" => sprintf("%s%s%s", get_template_directory(), "/images/", $svg),
            "resource" => ResourceBox::get($resource),
            "heading" => $heading,
            "description" => $description,
            "link" => ContentFormatter::link($link)
        ]);

    }

    public static function archive($brick_id, $brick_info)
    {
        ob_start();

        if (isset($GLOBALS['scripts'])) {
            $GLOBALS['scripts'] .= ob_get_clean();
        } else {
            $GLOBALS['scripts'] = ob_get_clean();
        }

        extract($brick_info);

        $posts = get_posts(['posts_per_page' => -1, 'post_type' => $post_type, 'year' => date("Y")]);

        $formattedPosts = [];
        foreach ($posts as $post) {

            $formattedPosts[] = [
                "title" => $post->post_title,
                "date" => ($post_type === PressReleasesPostType::$post_type_key) ? get_field("date_published", $post->ID) : get_field("article_date", $post->ID),
                "media_logo" => ($post_type === MediaCoveragePostType::$post_type_key) ? get_field("media_logo", $post->ID) : null,
                "link" => ($post_type === PressReleasesPostType::$post_type_key) ? get_permalink($post->ID) : get_field("article_url", $post->ID),
                "target" => ($post_type === PressReleasesPostType::$post_type_key) ? null : ' target="_blank" rel="nofollow" ',
            ];
        }


        $ax_args = array(
            'numberposts' => 1,
            'post_status' => 'publish',
            'order' => 'ASC',
            'post_type' => $post_type
        );

        // Get all posts in order of first to last
        $ax_get_all = get_posts($ax_args);

        // Extract first post from array
        $ax_first_post = $ax_get_all[0];

        // Assign first post date to var
        $ax_first_post_date = $ax_first_post->post_date;


        View::make("bricks/archive", [
            "anchor" => self::create_anchor($label),
            "progress_nav_enabled" => $progress_nav_enabled,
            "years" => range(date("Y"), date('Y', strtotime($ax_first_post_date))),
            "posts" => $formattedPosts,
            'post_type' => $post_type,
            "title" => ContentFormatter::heading($archive_heading['seo_tag'], $archive_heading['size'], $archive_heading['tag'], $archive_heading['heading'])
        ]);

    }

    public function get_archive_posts()
    {
        $accepted_post_types = [PressReleasesPostType::$post_type_key, MediaCoveragePostType::$post_type_key];
        $year = isset($_POST['year']) ? $_POST['year'] : date("Y");
        $post_type = (isset($_POST['post_type']) && in_array($_POST['post_type'], $accepted_post_types)) ? $_POST['post_type'] : PressReleasesPostType::$post_type_key;

        $posts = get_posts(['posts_per_page' => -1, 'post_type' => $post_type, 'year' => $year]);


        $formattedPosts = [];
        foreach ($posts as $post) {

            $formattedPosts[] = [
                "title" => $post->post_title,
                "date" => ($post_type === PressReleasesPostType::$post_type_key) ? get_field("date_published", $post->ID) : get_field("article_date", $post->ID),
                "media_logo" => ($post_type === MediaCoveragePostType::$post_type_key) ? get_field("media_logo", $post->ID) : null,
                "link" => ($post_type === PressReleasesPostType::$post_type_key) ? get_permalink($post->ID) : get_field("article_url", $post->ID),
                "target" => ($post_type === PressReleasesPostType::$post_type_key) ? null : ' target="_blank" rel="nofollow" ',
            ];
        }

        View::make("parts/archive", [
            "anchor" => self::create_anchor($label),
            "progress_nav_enabled" => $progress_nav_enabled,
            "posts" => $formattedPosts
        ]);

        wp_die();
    }

    public static function upcoming_events($brick_id, $brick_info)
    {
        extract($brick_info);

        View::make("bricks/upcoming-events", [
            "anchor" => self::create_anchor($label),
            "progress_nav_enabled" => $progress_nav_enabled,
            "background_image" => $background_image,
            "events" => get_posts([
                'posts_per_page' => 8,
                'post_type' => EventsPostType::$post_type_key,
                'orderby' => 'event_start_date',
                'order' => 'DSC',
                'meta_query' => [
                    [
                        'key' => 'event_end_date',
                        'compare' => '>=',
                        'value' => date('Ymd'),
                        'type' => 'DATE'
                    ]
                ]
            ])

        ]);
    }

    public static function media_coverage($brick_id, $brick_info)
    {
        extract($brick_info);

        $mediaCoverages = get_posts(['posts_per_page' => 3, 'post_type' => MediaCoveragePostType::$post_type_key]);

        $formattedMediaCoverages = [];
        foreach ($mediaCoverages as $mediaCoverage) {
            $formattedMediaCoverages[] = [
                "title" => $mediaCoverage->post_title,
                "media_logo" => get_field("media_logo", $mediaCoverage->ID),
                "date" => get_field("article_date", $mediaCoverage->ID)
            ];
        }

        View::make("bricks/media-coverage", [
            "anchor" => self::create_anchor($label),
            "progress_nav_enabled" => $progress_nav_enabled,
            "mediaCoverages" => $formattedMediaCoverages
        ]);
    }

    public static function recent_posts($brick_id, $brick_info)
    {
        extract($brick_info);

        error_reporting(E_ALL);
        ini_set('display_errors', 1);

        $heading = ContentFormatter::heading($heading['seo_tag'], $heading['size'], $heading['tag'], $heading['heading'], "marg-b-xxs-2");


        $the_query = new WP_Query([
            'posts_per_page' => 3,
            'tag' => ($posts_tag !== null && $posts_tag !== "") ? $posts_tag : null
        ]);

        $formatted_posts = [];


        while ($the_query->have_posts()) {
            $the_query->the_post();


            ob_start();

            View::make("blog/parts/post", [
                "post" => get_post(),
                "category" => get_field("blog_category")
            ]);

            $formatted_posts[] = ob_get_clean();

        }

        wp_reset_postdata();


        View::make("blog/individual/related", [
            "anchor" => self::create_anchor($label),
            "progress_nav_enabled" => $progress_nav_enabled,
            "heading" => $heading,
            "posts" => $formatted_posts
        ]);
    }


    public static function custom_code($brick_id, $brick_info)
    {
        extract($brick_info);


        $shortcode = "svg";
        $pattern = get_shortcode_regex();
        if (preg_match_all('/' . $pattern . '/s', $html, $matches)
            && array_key_exists(2, $matches)
            && in_array($shortcode, $matches[2])) {

            foreach ($matches[0] as $match) {
                if ($pos = strpos($html, "[" . $shortcode)) {
                    $html = substr_replace($html, do_shortcode($match), $pos, strlen($match));
                }
            }
        }

        if (isset($GLOBALS['scripts'])) {
            $GLOBALS['scripts'] .= $javascript;
        } else {
            $GLOBALS['scripts'] = $javascript;
        }

        View::make("bricks/custom-code", [
            "anchor" => self::create_anchor($label),
            "progress_nav_enabled" => $progress_nav_enabled,
            "html" => $html,
            "css" => $css
        ]);

    }

    public static function value_brief_overview($brick_id, $brick_info)
    {
        extract($brick_info);

        View::make("bricks/value-brief-overview", [
            "anchor" => self::create_anchor($label),
            "progress_nav_enabled" => $progress_nav_enabled,
            "vb_overview" => $vboverview,
            "vb_capability" => $vbcapability,
            "vb_overview_image" => $vbimage,
        ]);
    }

    public static function value_brief_image($brick_id, $brick_info)
    {
        extract($brick_info);

        View::make("bricks/value-brief-image", [
            "anchor" => self::create_anchor($label),
            "progress_nav_enabled" => $progress_nav_enabled,
            "vb_image" => $add_an_image,
        ]);
    }

    public static function value_brief_fexible($brick_id, $brick_info)
    {
        extract($brick_info);

        View::make("bricks/value-brief-flexible", [
            "anchor" => self::create_anchor($label),
            "progress_nav_enabled" => $progress_nav_enabled,
            "vb_flexible_content" => $vbflexible_content,
        ]);
    }

    public static function value_brief_cta($brick_id, $brick_info)
    {
        extract($brick_info);

        View::make("bricks/value-brief-cta", [
            "anchor" => self::create_anchor($label),
            "progress_nav_enabled" => $progress_nav_enabled,
            "vb_cta_content_text" => $cta_content_text,
            "vb_cta_button_text" => $cta_button_text,
        ]);
    }


    public static function timeline($brick_id, $brick_info)
    {
        extract($brick_info);

        View::make("bricks/timeline", [
            "anchor" => self::create_anchor($label),
            "progress_nav_enabled" => $progress_nav_enabled
        ]);
    }

    public static function german_timeline($brick_id, $brick_info)
    {
        extract($brick_info);

        View::make("bricks/german-timeline", [
            "anchor" => self::create_anchor($label),
            "progress_nav_enabled" => $progress_nav_enabled
        ]);
    }

    public static function location($brick_id, $brick_info)
    {
        extract($brick_info);

        View::make("bricks/locations", [
            "anchor" => self::create_anchor($label),
            "progress_nav_enabled" => $progress_nav_enabled,
            "title" => $title,
            "locations" => $locations,
            "emea_locations" => $emea_locations,
            "apac_locations" => $apac_locations
        ]);
    }

    public static function three_up($brick_id, $brick_info)
    {
        extract($brick_info);

        View::make("bricks/three-up", [
            "anchor" => self::create_anchor($label),
            "progress_nav_enabled" => $progress_nav_enabled,
        ]);
    }

    public static function case_study_cross_sell($brick_id, $brick_info)
    {
        extract($brick_info);

        $formatted_clients = [];

        foreach (get_field("clients", "option") as $client):
            $case_study = get_field("case_study", $client['client']);
            $formatted_clients[] = [
                "name" => $client['client']->post_title,
                "link" => ($case_study !== false) ? get_permalink($case_study) : null,
                "logo" => ContentFormatter::svg("logo/" . get_field("logo", $client['client']), ['color' => "#ffffff"])
            ];
        endforeach;

        View::make("bricks/case-study-cross-sell", [
            "anchor" => self::create_anchor($label),
            "progress_nav_enabled" => $progress_nav_enabled,
            "clients" => $formatted_clients,
        ]);
    }


    public static function flip_flap_resource_content($brick_id, $brick_info)
    {
        extract($brick_info);

        foreach ($about_company as $key => $single_about):

            $GLOBALS['river_side'] = (isset($GLOBALS['river_side']) && $GLOBALS['river_side'] === "left") ? "right" : "left";
            $flip_flaps[$key]['side'] = $GLOBALS['river_side'];
            $flip_flaps[$key]['resource'] = "";
            if ($single_about !== false) {
                foreach ($single_about['resources'] as $resource) {
                    $resource['class'] = ($GLOBALS['river_side'] === "left") ? " left " : " right pull-right ";
                    $flip_flaps[$key]['resource'] .= ResourceBox::get($resource);
                }
            }

            if ($flip_flaps[$key]['side'] === "right"):
                $flip_flaps[$key]['pull'] = " col-sm-pull-5 col-md-pull-6 col-xl-pull-7 ";
                $flip_flaps[$key]['push'] = " col-sm-push-5 col-md-push-4 col-xl-push-3 ";
            else:
                $flip_flaps[$key]['pull'] = "";
                $flip_flaps[$key]['push'] = "";
            endif;

            $flip_flaps[$key]['content'] = ContentFormatter::content($single_about['content_content']);

        endforeach;


        View::make("bricks/flip-flap-resource-content", [
            "anchor" => self::create_anchor($label),
            "progress_nav_enabled" => $progress_nav_enabled,
            "flip_flaps" => $flip_flaps,
            "title" => ContentFormatter::heading($company_heading['seo_tag'], $company_heading['size'], $company_heading['tag'], $company_heading['heading'], "marg-b-xxs-2")
        ]);

    }


    public static function three_across($brick_id, $brick_info)
    {
        extract($brick_info);

        View::make("bricks/three-across", [
            "anchor" => self::create_anchor($label),
            "progress_nav_enabled" => $progress_nav_enabled,
            "top_paragraph" => $top_paragraph,
            "boxes" => $boxes,
        ]);
    }


    public static function clicky($brick_id, $brick_info)
    {
        extract($brick_info);


        View::make("bricks/clicky", [
            "anchor" => self::create_anchor($label),
            "progress_nav_enabled" => $progress_nav_enabled,
            "icon_units" => $icon_units,
            "title" => $title,
            "content" => ContentFormatter::content($content['content']),
        ]);
    }


    public static function three_up_featured($brick_id, $brick_info)
    {
        extract($brick_info);

        View::make("bricks/three-up-featured", [
            "anchor" => self::create_anchor($label),
            "progress_nav_enabled" => $progress_nav_enabled,
            "title" => $title,
            "award_boxes" => $award_boxes
        ]);
    }

    public static function home_widget($brick_id, $brick_info)
    {
        extract($brick_info);
        switch ( get_current_blog_id() ) {
            case '12': // German
                View::make("bricks/home-widget-de", [
                    "anchor" => self::create_anchor($label),
                    "progress_nav_enabled" => $progress_nav_enabled,
                ]);
                break;

            case '14': // China
                View::make("bricks/home-widget-cn", [
                    "anchor" => self::create_anchor($label),
                    "progress_nav_enabled" => $progress_nav_enabled,
                ]);
                break;

            case '16': // Japan
                View::make("bricks/home-widget-jp", [
                    "anchor" => self::create_anchor($label),
                    "progress_nav_enabled" => $progress_nav_enabled,
                ]);
                break;

            default:
                View::make("bricks/home-widget", [
                    "anchor" => self::create_anchor($label),
                    "progress_nav_enabled" => $progress_nav_enabled,
                ]);
                break;
        }
    }

    public static function home_benefits($brick_id, $brick_info)
    {
        extract($brick_info);

        View::make("bricks/home-benefits", [
            "anchor" => self::create_anchor($label),
            "progress_nav_enabled" => $progress_nav_enabled,
            "background_colour" => $background_colour,
            "background_image" => $background_image,
            "title" => $title,
            "copy" => $copy,
            "right_hand_col" => $right_hand_col
        ]);
    }

    public static function home_quotes($brick_id, $brick_info)
    {
        extract($brick_info);

        View::make("bricks/home-quotes", [
            "anchor" => self::create_anchor($label),
            "progress_nav_enabled" => $progress_nav_enabled,
            "slides" => $slides,
            "items_per_slide" => $items_per_slide,
            "slider_pips_enabled" => $slider_pips_enabled,
            "slider_arrows_enabled" => $slider_arrows_enabled,
        ]);
    }

    public static function home_integrations($brick_id, $brick_info)
    {
        extract($brick_info);

        View::make("bricks/home-integrations", [
            "anchor" => self::create_anchor($label),
            "progress_nav_enabled" => $progress_nav_enabled,
            "title" => $title,
            "body" => $body,
            "cta_text" => $cta_text,
            "cta_url" => $cta_url,
            "cta_colour" => $cta_colour,
            "slides" => $slides,
            "slider_arrows_enabled" => $slider_arrows_enabled,
            "slider_pips_enabled" => $slider_pips_enabled,
            "items_per_slide" => $items_per_slide
        ]);
    }

    public static function home_news($brick_id, $brick_info)
    {
        extract($brick_info);

        $blog = get_posts([
            'posts_per_page' => 1,
            'post_type' => 'post'
        ])[0];

        $blog->custom = get_fields($blog);

        $press_release = get_posts([
            'posts_per_page' => 1,
            'post_type' => PressReleasesPostType::$post_type_key
        ])[0];

        $event = get_posts([
            'posts_per_page' => 1,
            'post_type' => EventsPostType::$post_type_key
        ])[0];

        $event->custom = get_fields($event);

        $podcast = get_posts([
            'posts_per_page' => 1,
            'post_type' => ResourcesPostType::$post_type_key,
            'tax_query' => [
                [
                    'taxonomy' => 'resource-type',
                    'field' => 'slug',
                    'terms' => 'podcast'
                ]
            ]
        ])[0];

        View::make("bricks/home-news", [
            "anchor" => self::create_anchor($label),
            "progress_nav_enabled" => $progress_nav_enabled,
            "blog_heading" => $blog_heading,
            "news_events_heading" => $news_events_heading,
            "press_releases_heading" => $press_releases_heading,
            "events_heading" => $events_heading,
            "podcasts_heading" => $podcasts_heading,
            "cta_text_single" => $cta_text_single,
            "cta_text_landing" => $cta_text_landing,
            "blog" => $blog,
            "press_release" => $press_release,
            "event" => $event,
            "podcast" => $podcast,
        ]);
    }

    public static function cta_banner($brick_id, $brick_info)
    {
        extract($brick_info);

        View::make("bricks/cta-banner", [
            "anchor" => self::create_anchor($label),
            "progress_nav_enabled" => $progress_nav_enabled,
            "background_image" => $background_image,
            "body_text" => $body_text,
            "body_text_colour" => $body_text_colour,
            "cta_text" => $cta_text,
            "cta_url" => $cta_url,
            "cta_colour" => $cta_colour,
            "gradient_top" => $gradient_top,
            "gradient_bottom" => $gradient_bottom
        ]);
    }

    public static function featured_partner_cta_banner($brick_id, $brick_info)
    {
        extract($brick_info);

        View::make("bricks/featured-partner-cta-banner", [
            "anchor" => self::create_anchor($label),
            "progress_nav_enabled" => $progress_nav_enabled,
            "background_image" => $background_image,
            "body_text" => $body_text,
            "body_text_colour" => $body_text_colour,
            "cta_text" => $cta_text,
            "cta_url" => $cta_url,
            "cta_colour" => $cta_colour,
            "gradient_top" => $gradient_top,
            "gradient_bottom" => $gradient_bottom
        ]);
    }

    public static function featured_partner_cta_banner_magento($brick_id, $brick_info)
    {
        extract($brick_info);

        View::make("bricks/featured-partner-cta-banner-magento", [
            "anchor" => self::create_anchor($label),
            "progress_nav_enabled" => $progress_nav_enabled,
            "background_image" => $background_image,
            "body_text" => $body_text,
            "body_text_colour" => $body_text_colour,
            "cta_text" => $cta_text,
            "cta_url" => $cta_url,
            "cta_colour" => $cta_colour,
            "gradient_top" => $gradient_top,
            "gradient_bottom" => $gradient_bottom
        ]);
    }

    public static function featured_partner_cta_banner_wordpress($brick_id, $brick_info)
    {
        extract($brick_info);

        View::make("bricks/featured-partner-cta-banner-wordpress", [
            "anchor" => self::create_anchor($label),
            "progress_nav_enabled" => $progress_nav_enabled,
            "background_image" => $background_image,
            "body_text" => $body_text,
            "body_text_colour" => $body_text_colour,
            "cta_text" => $cta_text,
            "cta_url" => $cta_url,
            "cta_colour" => $cta_colour,
            "gradient_top" => $gradient_top,
            "gradient_bottom" => $gradient_bottom
        ]);
    }

    public static function partners_features_table($brick_id, $brick_info)
    {
        extract($brick_info);

        View::make("bricks/partners-features-table", [
            "anchor" => self::create_anchor($label),
            "progress_nav_enabled" => $progress_nav_enabled,
            "heading_text" => $heading_text,    
            "heading_text_colour" => $heading_text_colour,
            "background_colour" => $background_colour,
            "body_text_colour" => $body_text_colour,
            "highlighted_row_colour" => $highlighted_row_colour,
            "highlighted_row_text_colour" => $highlighted_row_text_colour,
            "logo_image" => $logo_image,
            "rows" => $rows
        ]);
    }

    public static function partners_features_table_static($brick_id, $brick_info)
    {
        extract($brick_info);

        View::make("bricks/partners-features-table-static", [
            "anchor" => self::create_anchor($label),
            "progress_nav_enabled" => $progress_nav_enabled,
            "heading_text" => $heading_text,    
            "heading_text_colour" => $heading_text_colour,
            "table_image" => $table_image
        ]);
    }

    public static function partners_salesforce_appexchange($brick_id, $brick_info)
    {
        extract($brick_info);

        View::make("bricks/partners-salesforce-appexchange", [
            "anchor" => self::create_anchor($label),
            "progress_nav_enabled" => $progress_nav_enabled,
            "logo_image" => $logo_image,
            "body_text" => $body_text,
            "body_text_colour" => $body_text_colour,
            "cta_text" => $cta_text,
            "cta_url" => $cta_url,
            "cta_colour" => $cta_colour
        ]);
    }


    public static function heading_text($brick_id, $brick_info)
    {
        extract($brick_info);

        View::make("bricks/heading-text", [
            "anchor" => self::create_anchor($label),
            "progress_nav_enabled" => $progress_nav_enabled,
            "heading" => $heading,
            "body" => $body
        ]);
    }

    public static function pr_quote($brick_id, $brick_info)
    {
        extract($brick_info);

        View::make("bricks/pr-quote", [
            "anchor" => self::create_anchor($label),
            "progress_nav_enabled" => $progress_nav_enabled,
            "background_image" => $background_image,
            "quote" => $quote,
            "client_name" => $client_name,
            "person" => $person,
            "business_title" => $business_title,
            "background_colour" => $background_colour,
            "gradient_top" => $gradient_top,
            "gradient_bottom" => $gradient_bottom
        ]);
    }

    public static function feature($brick_id, $brick_info)
    {
        extract($brick_info);

        if ($video) {
            $video->custom = get_fields($video->ID);
        }

        View::make("bricks/feature", [
            "anchor" => self::create_anchor($label),
            "progress_nav_enabled" => $progress_nav_enabled,
            "heading" => $heading,
            "image" => $image,
            "video" => $video,
            "image_alignment" => $image_alignment,
            "body" => $body,
            "background_top_color" => $background_top_color,
            "background_bottom_color" => $background_bottom_color,
            "padding_bottom" => $padding_bottom
        ]);
    }

    public static function callouts($brick_id, $brick_info)
    {
        extract($brick_info);

        View::make("bricks/callouts", [
            "anchor" => self::create_anchor($label),
            "progress_nav_enabled" => $progress_nav_enabled,
            "callouts" => $callouts,
            "background_color" => $background_color,
            "heading" => $heading,
            "body" => $body
        ]);
    }

    public static function benefits_quote($brick_id, $brick_info)
    {
        extract($brick_info);

        View::make("bricks/benefits-quote", [
            "anchor" => self::create_anchor($label),
            "progress_nav_enabled" => $progress_nav_enabled,
            "background_image" => $background_image,
            "quote" => $quote,
            "client_name" => $client_name,
            "person" => $person,
            "business_title" => $business_title,
            "background_colour" => $background_colour,
            "gradient_top" => $gradient_top,
            "gradient_bottom" => $gradient_bottom
        ]);
    }

    public static function partners_slider($brick_id, $brick_info)
    {
        extract($brick_info);

        View::make("bricks/partners-slider", [
            "anchor" => self::create_anchor($label),
            "progress_nav_enabled" => $progress_nav_enabled,
            "heading" => $heading,
            "slider" => $slider
        ]);
    }

    public static function system_integrators_slider($brick_id, $brick_info)
    {
        extract($brick_info);

        View::make("bricks/system-integrators-slider", [
            "anchor" => self::create_anchor($label),
            "progress_nav_enabled" => $progress_nav_enabled,
            "heading" => $heading,
            "slider" => $slider
        ]);
    }

    public static function partners_accordion($brick_id, $brick_info)
    {
        extract($brick_info);

        View::make("bricks/partners-accordion", [
            "anchor" => self::create_anchor($label),
            "progress_nav_enabled" => $progress_nav_enabled,
            "accordion_title_one" => $accordion_title_one,
            "accordion_copy_one" => $accordion_copy_one,
            "accordion_title_two" => $accordion_title_two,
            "accordion_copy_two" => $accordion_copy_two,
            "cta_text" => $cta_text,
            "cta_url" => $cta_url,
            "accordion_two_image" => $accordion_two_image,
            "cta_text_one" => $cta_text_one,
            "cta_url_one" => $cta_url_one,
            "accordion_one_image" => $accordion_one_image
        ]);
    }

    public static function partners_image_text($brick_id, $brick_info)
    {
        extract($brick_info);

        View::make("bricks/partners-image-text", [
            "anchor" => self::create_anchor($label),
            "progress_nav_enabled" => $progress_nav_enabled,
            "title" => $title,
            "title_colour" => $title_colour,
            "body_copy" => $body_copy,
            "image" => $image,
        ]);
    }

    public static function partners_image_cta($brick_id, $brick_info)
    {
        extract($brick_info);

        View::make("bricks/partners-image-cta", [
            "anchor" => self::create_anchor($label),
            "progress_nav_enabled" => $progress_nav_enabled,
            "left_image" => $left_image,
            "left_title" => $left_title,
            "left_cta" => $left_cta,
            "right_image" => $right_image,
            "right_title" => $right_title,
            "right_cta" => $right_cta,
            "left_url" => $left_url,
            "right_url" => $right_url
        ]);
    }

    public static function about_us_video($brick_id, $brick_info)
    {
        extract($brick_info);

        View::make("bricks/about-us-video", [
            "anchor" => self::create_anchor($label),
            "progress_nav_enabled" => $progress_nav_enabled,
            "slider" => $slider
        ]);
    }

    public static function featured_partner_video($brick_id, $brick_info)
    {
        extract($brick_info);

        View::make("bricks/featured-partner-video", [
            "anchor" => self::create_anchor($label),
            "progress_nav_enabled" => $progress_nav_enabled,
            "slider" => $slider
        ]);
    }

    public static function about_us_facts($brick_id, $brick_info)
    {
        extract($brick_info);

        View::make("bricks/about-us-facts", [
            "anchor" => self::create_anchor($label),
            "progress_nav_enabled" => $progress_nav_enabled,
            "background_image" => $background_image,
            "title" => $title,
            "title_colour" => $title_colour,
            "intro_text" => $intro_text,
            "intro_text_colour" => $intro_text_colour,
            "items" => $items
        ]);
    }

    public static function about_us_team($brick_id, $brick_info)
    {
        extract($brick_info);

        View::make("bricks/about-us-team", [
            "anchor" => self::create_anchor($label),
            "progress_nav_enabled" => $progress_nav_enabled,
            "team_section_title" => $team_section_title,
            "team" => $team,
            "strapline" => $strapline,
            "cta" => $cta,
            "link" => $link
        ]);
    }


    public static function about_us_world($brick_id, $brick_info)
    {
        extract($brick_info);

        View::make("bricks/about-us-world", [
            "anchor" => self::create_anchor($label),
            "progress_nav_enabled" => $progress_nav_enabled,
            "title" => $title,
            "subtitle" => $subtitle,
            "title_colour" => $title_colour,
            "locations" => $locations
        ]);
    }

    public static function teams_locations($brick_id, $brick_info)
    {
        extract($brick_info);

        View::make("bricks/teams-locations", [
            "anchor" => self::create_anchor($label),
            "progress_nav_enabled" => $progress_nav_enabled,
            "locations" => $locations,
            "title" => $title
        ]);
    }

    public static function icon_stat($brick_id, $brick_info)
    {
        extract($brick_info);

        View::make("mycommerce/icon-stat", [
            "anchor" => self::create_anchor($label),
            "progress_nav_enabled" => $progress_nav_enabled,
            "title" => $title,
            "paragraph" => $paragraph,
            "background_image" => $background_image,
            "icon_units" => $icon_units
        ]);
    }

    public static function video_half($brick_id, $brick_info)
    {
        extract($brick_info);

        View::make("mycommerce/video-half", [
            "anchor" => self::create_anchor($label),
            "progress_nav_enabled" => $progress_nav_enabled,
            "left_right" => $left_right,
            "content" => ContentFormatter::content($content['content']),
            "image" => $image,
            "video_link" => $video_link,
            "video" => $video
        ]);
    }

    public static function mycommerce_clicky($brick_id, $brick_info)
    {
        extract($brick_info);

        View::make("mycommerce/clicky", [
            "anchor" => self::create_anchor($label),
            "progress_nav_enabled" => $progress_nav_enabled,
            "icon_units" => $icon_units,
            "title" => $title,
            "left_right" => $left_right,
            "content" => ContentFormatter::content($content['content']),
        ]);
    }

    public static function mycommerce_slider($brick_id, $brick_info)
    {
        extract($brick_info);

        View::make("mycommerce/mycommerce-slider", [
            "anchor" => self::create_anchor($label),
            "progress_nav_enabled" => $progress_nav_enabled,
            "background_image" => $background_image,
            "title" => $title,
            "paragraph" => $paragraph,
            "link_text" => $link_text,
            "link" => $link,
            "logo" => $logo
        ]);
    }

    public static function half_half_custom($brick_id, $brick_info)
    {
        extract($brick_info);

        View::make("mycommerce/half-half-custom-code", [
            "anchor" => self::create_anchor($label),
            "progress_nav_enabled" => $progress_nav_enabled,
            "background_color" => $background_color,
            "background_image" => $background_image,
            "spacing_top" => $spacing_top,
            "spacing_bottom" => $spacing_bottom,
            "left_side" => $sign_up_custom_code,
            "right_side" => is_array($custom_right_content['content']) ? ContentFormatter::content($custom_right_content['content']) : null,
            "center_content" => is_array($custom_center_content['content']) ? ContentFormatter::content($custom_center_content['content']) : null,
        ]);
    }

    public static function mycommerce_client_success_grid($brick_id, $brick_info)
    {
        extract($brick_info);

        View::make("mycommerce/client_success_grid", [
            "anchor" => self::create_anchor($label),
            "progress_nav_enabled" => $progress_nav_enabled,
            "client_success_clients" => $client_success_clients,
        ]);
    }

    public static function mycommerce_team_member($brick_id, $brick_info)
    {
        extract($brick_info);

        View::make("mycommerce/team-member", [
            "anchor" => self::create_anchor($label),
            "progress_nav_enabled" => $progress_nav_enabled,
            "mycommerce_team_members" => $mycommerce_team_members,
        ]);
    }

    public static function mycommerce_client_success_slider($brick_id, $brick_info)
    {
        extract($brick_info);

        View::make("mycommerce/client_success_quote_slider", [
            "anchor" => self::create_anchor($label),
            "progress_nav_enabled" => $progress_nav_enabled,
            "testimonial_slider" => $testimonial_slider,
        ]);
    }

    public static function mycommerce_video_hero($brick_id, $brick_info)
    {
        extract($brick_info);

        View::make("mycommerce/video-header", [
            "anchor" => self::create_anchor($label),
            "progress_nav_enabled" => $progress_nav_enabled,
            "content" => ContentFormatter::content($content['content'])
        ]);
    }


    public static function mycommerce_row_pictogram($brick_id, $brick_info)
    {
        extract($brick_info);

        View::make("mycommerce/about-pictogram", [
            "anchor" => self::create_anchor($label),
            "progress_nav_enabled" => $progress_nav_enabled,
            "about_pictogram" => $about_pictogram,
        ]);
    }

    public static function mycommerce_river($brick_id, $brick_info)
    {
        extract($brick_info);

        $GLOBALS['river_side'] = (isset($GLOBALS['river_side']) && $GLOBALS['river_side'] === "left") ? "right" : "left";

        $resource_boxes = "";
        if ($resources !== false) {
            foreach ($resources as $resource) {
                $resource['class'] = ($GLOBALS['river_side'] === "left") ? " left " : " right pull-right ";
                $resource_boxes .= ResourceBox::get($resource);
            }
        }

        View::make("mycommerce/river", [
            "anchor" => self::create_anchor($label),
            "progress_nav_enabled" => $progress_nav_enabled,
            "image" => $image,
            "lazy" => true,
            "resources" => $resource_boxes,
            "content" => ContentFormatter::content($content['content']),
        ]);
    }

    public static function mycommerce_pictogram_river($brick_id, $brick_info)
    {
        extract($brick_info);

        $GLOBALS['river_side'] = (isset($GLOBALS['river_side']) && $GLOBALS['river_side'] === "left") ? "right" : "left";

        View::make("mycommerce/pictogram-river", [
            "anchor" => self::create_anchor($label),
            "progress_nav_enabled" => $progress_nav_enabled,
            "offering_pictogram" => $offering_pictogram,
            "content" => ContentFormatter::content($content['content']),
        ]);
    }

    public static function videos($brick_id, $brick_info)
    {
        extract($brick_info);

        foreach ($videos as $video) {
            $video['video']->custom = get_fields($video['video']->ID);
        }

        View::make("bricks/videos", [
            "anchor" => self::create_anchor($label),
            "progress_nav_enabled" => $progress_nav_enabled,
            "videos" => $videos,
            "background_color" => $background_color
        ]);
    }

    public static function events_hero($brick_id, $brick_info)
    {
        extract($brick_info);
        extract(get_fields());

        View::make("bricks/events-hero", [
            "anchor" => self::create_anchor($label),
            "heading" => $heading,
            "body" => $body,
            "rsvp" => $rsvp,
            "rsvp_text" => $rsvp_text,
            "rsvp_form_id" => $rsvp_form_id,
            "location" => $location,
            "date" => $date,
            "registration_open" => $registration_open
        ]);
    }

    public static function events_reasons($brick_id, $brick_info)
    {
        extract($brick_info);

        View::make("bricks/events-reasons", [
            "anchor" => self::create_anchor($label),
            "progress_nav_enabled" => $progress_nav_enabled,
            "heading" => $heading,
            "cards" => $cards
        ]);
    }

    public static function agenda($brick_id, $brick_info)
    {
        extract($brick_info);

        View::make("bricks/agenda", [
            "anchor" => self::create_anchor($label),
            "progress_nav_enabled" => $progress_nav_enabled,
            "heading" => $heading,
            "sessions" => $sessions,
            "reveal_text" => $reveal_text,
            "background_image" => $background_image
        ]);
    }

    public static function speakers($brick_id, $brick_info)
    {
        extract($brick_info);

        foreach ($speakers as $speaker) {
            $speaker->custom = get_fields($speaker->ID);
        }

        View::make("bricks/speakers", [
            "anchor" => self::create_anchor($label),
            "progress_nav_enabled" => $progress_nav_enabled,
            "heading" => $heading,
            "speakers" => $speakers
        ]);
    }

    public static function events_location($brick_id, $brick_info)
    {
        extract($brick_info);

        View::make("bricks/events-location", [
            "anchor" => self::create_anchor($label),
            "progress_nav_enabled" => $progress_nav_enabled,
            "body" => $body,
            "google_map_embed_url" => $google_map_embed_url,
            "background_top_color" => $background_top_color,
            "background_bottom_color" => $background_bottom_color
        ]);
    }

    public static function events_cta_banner($brick_id, $brick_info)
    {
        extract($brick_info);

        View::make("bricks/events-cta-banner", [
            "anchor" => self::create_anchor($label),
            "progress_nav_enabled" => $progress_nav_enabled,
            "background_image" => $background_image,
            "body_text" => $body_text,
            "body_text_colour" => $body_text_colour,
            "rsvp_text" => $rsvp_text,
            "gradient_top" => $gradient_top,
            "gradient_bottom" => $gradient_bottom,
            "registration_open" => get_field('registration_open')
        ]);
    }

    public static function create_anchor($label)
    {

        switch ( get_current_blog_id() ) {
            case '12': // German
                return $label ? 'b_' . strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $label))) : '';

            case '14': // China
                return $label ? 'b_' . $label : '';

            case '16': // Japan
                return $label ? 'b_' . $label : '';

            default:
                return $label ? 'b_' . strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $label))) : '';
        }
    }
}












