<?php
//error_reporting(E_ALL);
//ini_set('display_errors', 1);

/*
 * Only allow Admin users to view WP REST API JSON Endpoints
 */
// function mytheme_only_allow_logged_in_rest_access( $access ) {
// 	if( ! is_user_logged_in() || ! current_user_can( 'manage_options' ) ) {
// 		return new WP_Error( 'rest_cannot_access', __( 'Only authenticated users can access the REST API.', 'disable-json-api' ), array( 'status' => rest_authorization_required_code() ) );
// 	}
// 	return $access;
// }
// add_filter( 'rest_authentication_errors', 'mytheme_only_allow_logged_in_rest_access' );


if (isset($_REQUEST['action'])) require __DIR__ . '/inc/vendor/autoload.php';

// Theme Support
add_theme_support('post-thumbnails');

// General
require_once('inc/View.class.php');
require_once('inc/BrickChooser.class.php');

//Custom Post Types
require_once('inc/custom-post-types/ClientsPostType.class.php');
require_once('inc/custom-post-types/VideosPostType.class.php');
require_once('inc/custom-post-types/EventsPostType.class.php');
require_once('inc/custom-post-types/BricksPostType.class.php');
require_once('inc/custom-post-types/ResourcesPostType.class.php');
require_once('inc/custom-post-types/CaseStudiesPostType.class.php');
require_once('inc/custom-post-types/PressReleasesPostType.class.php');
require_once('inc/custom-post-types/MediaCoveragePostType.class.php');
require_once('inc/custom-post-types/InfographicPostType.class.php');
require_once('inc/custom-post-types/PostPostType.class.php');
require_once('inc/custom-post-types/MenuAssetPostType.class.php');
require_once('inc/custom-post-types/SpeakerPostType.class.php');

//Taxonomy
require_once('inc/taxonomy/EventTypeTaxonomy.class.php');
require_once('inc/taxonomy/IndustryTaxonomy.class.php');
require_once('inc/taxonomy/RegisterCategories.class.php');
require_once('inc/taxonomy/ResourceTypeTaxonomy.class.php');
require_once('inc/taxonomy/ResourceTopicTaxonomy.class.php');

// Scripts and Styles
require_once('inc/ScriptManager.class.php');
require_once('inc/StyleManager.class.php');

// Controllers
require_once('controllers/BrickController.class.php');
require_once('controllers/BlogIndividualController.class.php');
require_once('controllers/BlogOverviewController.class.php');
require_once('controllers/PressReleaseIndividualController.class.php');
require_once('controllers/CaseStudyIndividualController.class.php');
require_once('controllers/ValueBriefIndividualController.class.php');
require_once('controllers/InfographicIndividualController.class.php');
require_once('controllers/EventsSingleController.class.php');

// Parts
require_once('inc/part/ResourceBox.class.php');
require_once('inc/part/ClientBox.class.php');
require_once('inc/part/ContactForm.class.php');
require_once('inc/ContentFormatter.class.php');

// Shortcodes
require_once('inc/shortcodes/SvgShortcode.class.php');
require_once('inc/shortcodes/InfographicShortcode.class.php');

// Analytics
require_once('inc/Analytics/DataLayer.class.php');
include_once('amp/amp-functions.php');

// Bootstrap Navwalker
require_once('inc/bootstrap-navwalker.php');


//set cookie expiration to 2 years from start
add_action('init', 'start_cookie_birthday', 0);
function start_cookie_birthday()
{
    ini_set('session.cookie_lifetime', +63072000);
}


//create session from server
add_action('init', 'start_session', 1);
function start_session()
{
    if (!session_id()) {
        ini_set('session.cookie_domain', '.wpengine.com');
        session_start();

    }
}


function get_abm_info($request)
{
    global $wpdb;

    if (isset($_COOKIE['drdomain']) && $_COOKIE['drdomain'] !== "") {
        $domain_id = $_COOKIE['drdomain'];
    } else {
        $company_info = MaxMind::get_company_info();
        if ($company_info === false) {
            return new WP_Error('request-not-found', 'Request Not Found', array('status' => 500));
        }

        $domain_id = $wpdb->get_var(sprintf("SELECT id FROM wp_tar WHERE domain = '%s'", $company_info['domain']));
        if ($domain_id === null) {
            $domain_id = $wpdb->get_var(sprintf("SELECT id FROM wp_tar WHERE name LIKE '%%%s%%'", $company_info['name']));
        }
    }

    if ($domain_id !== null) {
        $target = true;
        setcookie("drdomain", $domain_id, time() + (86400 * 30), "/");
        $wpdb->insert('wp_views', ['url' => $_SERVER["HTTP_REFERER"], 'domain_id' => $domain_id, 'created_at' => date("Y-m-d H:i:s")], ['%s', '%d', '%s']);
    } else {
        $target = false;
        setcookie("drtarg", 0, time() + 3600, "/");
    }

    return new WP_REST_Response(["drtarg" => $target], 200);
}


add_action('rest_api_init', 'register_routes');
function register_routes()
{
    require __DIR__ . '/inc/vendor/autoload.php';
    require_once('inc/Analytics/MaxMind.class.php');
    require_once('inc/Analytics/Salesforce.class.php');

    $version = '1';
    $namespace = 'dr/v' . $version;
    register_rest_route($namespace, '/collect', [
        [
            'methods' => WP_REST_Server::READABLE,
            'callback' => 'get_abm_info'
        ]
    ]);
}

// Menus
register_nav_menus(array(
    'our-offerings' => __('Footer Our Offerings', 'digital-river-2019'),
    'company' => __('Footer Company', 'digital-river-2019'),
    'clients' => __('Footer Clients', 'digital-river-2019'),
    'value-added-services' => __('Footer Value Added Services', 'digital-river-2019'),
    'resources' => __('Footer Resources', 'digital-river-2019'),
    'main-navigation' => __('Main Navigation', 'digital-river-2019'),
    'top-navigation' => __('Top Navigation', 'digital-river-2019'),
    'legal' => __('Legal and Privacy Policy', 'digital-river-2019'),
    'main-navigation-2019' => __('Main Navigation 2019', 'digital-river-2019')
));

function my_walker_nav_menu_start_el($item_output, $item, $depth, $args)
{
    $menu_locations = get_nav_menu_locations();

    if (has_term($menu_locations['top-navigation'], 'nav_menu', $item)) {
        $item_output = preg_replace('/<a /', '<a class="btn btn-secondary btn-sm" ', $item_output, 1);
    }

    return $item_output;
}

add_filter('walker_nav_menu_start_el', 'my_walker_nav_menu_start_el', 10, 4);

//Register shortcodes
//add_action('init', 'register_shortcodes');

//Shortcode functions
function show_resource_box()
{
    return "resource_box = [show_resource_box]";
}

//add_shortcode('resource_box', 'show_resource_box');

add_action("init", "init_digital_river", 0);
function init_digital_river()
{
    new DataLayer();
    new BrickChooser();

    new ClientsPostType();
    new VideosPostType();
    new EventsPostType();
    new ResourcesPostType();
    new BricksPostType();
    new CaseStudiesPostType();
    new PressReleasesPostType();
    new MediaCoveragePostType();
    new InfographicPostType();
    new PostPostType();
    new MenuAssetPostType();
    new SpeakerPostType();

    new BlogOverviewController();
    new BrickController();
    new EventsSingleController();

    new SvgShortcode();
    new InfographicShortcode();

    new EventTypeTaxonomy();
    new IndustryTaxonomy();
    new RegisterCategories();
    new ResourceTypeTaxonomy();
    new ResourceTopicTaxonomy();

    new ScriptManager();
    new StyleManager();


    if (is_admin()) {
        new ResourceBox();
    }
}


/*
function breezer_addDivToImage( $content )
{
   $pattern = '/img+/i';
   $replacement = 'amp-img layout="responsive"';
   $content = preg_replace( $pattern, $replacement, $content );
   return $content;
}

add_filter( 'the_content', 'breezer_addDivToImage' );

*/
/*
* Yoast SEO Disable Automatic Redirects for
* Posts And Pages
* Credit: Yoast Development Team
* Last Tested: May 09 2017 using Yoast SEO Premium 4.7.1 on WordPress 4.7.4
*/


add_filter('wpseo_premium_post_redirect_slug_change', '__return_true');

add_filter('wpseo_breadcrumb_links', 'custom_wpseo_breadcrumb_links');
function custom_wpseo_breadcrumb_links($links)
{
    if (is_single() && get_post_type() === "post") {

        $links[1]['text'] = __("Blog", "digital-river-2019");
        $links[1]['url'] = $links[0]['url'] . "/blog/";

        $links[2]['id'] = $links[1]['id'];
        unset($links[1]['id']);

    } else if (is_single() && get_post_type() === "press_release") {

        $links[1]['text'] = __("News & Events", "digital-river-2019");
        $links[1]['url'] = $links[0]['url'] . "/news-and-events/";

        $links[2]['id'] = $links[1]['id'];
        unset($links[1]['id']);

    }

    return $links;
}


add_theme_support('title-tag');

if (function_exists('acf_add_options_page')) {

    acf_add_options_page('Select Locale');

    acf_add_options_sub_page(array(
        'page_title' => 'Client Carousel',
        'menu_title' => 'Options list',
        'parent_slug' => 'edit.php?post_type=clients',
    ));

}

//include svg uploads
function cc_mime_types($mimes)
{
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}

add_filter('upload_mimes', 'cc_mime_types');


function theme_name_setup()
{
    $loaded = load_theme_textdomain("digital-river-2019", get_stylesheet_directory() . '/lang');
    return $loaded;
}

add_action('after_setup_theme', 'theme_name_setup');

add_filter('locale', 'my_theme_localized_lang');
function my_theme_localized_lang($locale)
{
    return get_field('language', 'option') . "_" . get_field('country', 'option');
}

// //Remove WPAUTOP from ACF TinyMCE Editor
// function acf_wysiwyg_remove_wpautop() {
//   remove_filter('acf_the_content', 'wpautop' );
// }
// add_action('acf/init', 'acf_wysiwyg_remove_wpautop');


function decode_canonical($canonical)
{
    return urldecode($canonical);
}

add_filter('wpseo_canonical', 'decode_canonical', 10, 1);

//Replace all the messed up www-www-digitalriver-com.digitalriver.staging.wpengine.com links in the custom post types to render the correct url on the page. It does not change what's in the database, only what renders on the page

function replace_text($text)
{
    $text = str_replace('www-www-digitalriver-com.digitalriver.staging.wpengine.com', 'www.digitalriver.com', $text);
    $text = str_replace('www-digitalriver-com.digitalriver.staging.wpengine.com', 'www.digitalriver.com', $text);
    $text = str_replace('digitalriver.staging.wpengine.com', 'digitalriver.com', $text);
    $text = str_replace('www-digitalriver-com.digitalriver.staging.wpengine.com', 'digitalriver.com', $text);
    $text = str_replace('?utm_medium=Blog', '', $text);
    $text = str_replace('?utm_source=blog', '', $text);
    $text = str_replace('?utm_medium=LinkedIn', '', $text);
    $text = str_replace('?utm_medium=PR', '', $text);
    $text = str_replace('?utm_medium=PressRelease', '', $text);
    $text = str_replace('?utm_medium=Website', '', $text);
    $text = str_replace('?utm_source=SocialMedia_PressRelease', '', $text);


    return $text;
}

add_filter('the_content', 'replace_text');

function replace_text_press_releases($text)
{
    $text = str_replace('www-www-digitalriver-com.digitalriver.staging.wpengine.com', 'www.digitalriver.com', $text);
    $text = str_replace('www-digitalriver-com.digitalriver.staging.wpengine.com', 'www.digitalriver.com', $text);
    $text = str_replace('digitalriver.staging.wpengine.com', 'digitalriver.com', $text);
    $text = str_replace('www-digitalriver-com.digitalriver.staging.wpengine.com', 'digitalriver.com', $text);
    $text = str_replace('?utm_medium=Blog', '', $text);
    $text = str_replace('?utm_source=blog', '', $text);
    $text = str_replace('?utm_medium=LinkedIn', '', $text);
    $text = str_replace('?utm_medium=PR', '', $text);
    $text = str_replace('?utm_source=&amp;utm_medium=PR', '', $text);
    $text = str_replace('?utm_medium=PressRelease', '', $text);
    $text = str_replace('?utm_medium=Website', '', $text);
    $text = str_replace('?utm_source=SocialMedia_PressRelease', '', $text);

    return $text;
}

add_filter('press_releases', 'replace_text_press_releases');

if (!is_admin()) {
    function add_asyncdefer_attribute($tag, $handle)
    {
        // if the unique handle/name of the registered script has 'async' in it
        if (strpos($handle, 'async') !== false) {
            // return the tag with the async attribute
            return str_replace('<script ', '<script async ', $tag);
        } // if the unique handle/name of the registered script has 'defer' in it
        else if (strpos($handle, 'defer') !== false) {
            // return the tag with the defer attribute
            return str_replace('<script ', '<script defer ', $tag);
        } // otherwise skip
        else {
            return $tag;
        }
    }

    add_filter('script_loader_tag', 'add_asyncdefer_attribute', 10, 2);
}

// Resource filtering AJAX actions
add_action("wp_ajax_filter_resources", "filter_resources");
add_action("wp_ajax_nopriv_filter_resources", "filter_resources");

function filter_resources()
{
    $filters = [
        "topic" => $_REQUEST['topic'],
        "type" => $_REQUEST['type']
    ];

    $brick = get_posts(array(
        'post_type' => 'bricks',
        'name' => 'resources-results'
    ))[0];

    $brick_info = get_fields($brick->ID);
    $brick_info['filters'] = $filters;

    BrickController::resources_results($brick->ID, $brick_info);

    wp_die();
}

// Resource count AJAX actions
add_action("wp_ajax_count_resources", "count_resources");
add_action("wp_ajax_nopriv_count_resources", "count_resources");
function count_resources()
{
    $filters = [
        "topic" => $_REQUEST['topic'],
        "type" => $_REQUEST['type']
    ];

    $topic_args = [
        'posts_per_page' => -1,
        'post_type' => [
            ResourcesPostType::$post_type_key,
            'post'
        ],
        'post_status' => 'publish'
    ];

    if ($filters['topic']) {
        $topic_args['tax_query'] = [
            [
                'taxonomy' => 'resource-topic',
                'field' => 'slug',
                'terms' => $filters['topic']
            ]
        ];
    }

    $type_args = [
        'posts_per_page' => -1,
        'post_type' => [
            ResourcesPostType::$post_type_key,
            'post'
        ]
    ];

    if ($filters['type']) {
        $type_args['tax_query'] = [
            [
                'taxonomy' => 'resource-type',
                'field' => 'slug',
                'terms' => $filters['type']
            ]
        ];
    }

    $queries = [
        "topic" => new WP_Query($topic_args),
        "type" => new WP_Query($type_args),
    ];

    $counts = [];

    foreach ($queries as $key => $query) {
        $taxonomy = $key === 'topic' ? 'resource-type' : 'resource-topic';

        foreach ($query->posts as $post) {
            $terms = get_the_terms($post->ID, $taxonomy);

            foreach ($terms as $term) {
                $counts[$taxonomy][$term->slug]++;
            }
        }
    }

    $brick = get_posts(array(
        'post_type' => 'bricks',
        'name' => 'resources-filter'
    ))[0];

    $brick_info = get_fields($brick->ID);
    $brick_info['counts'] = $counts;

    BrickController::resources_filter($brick->ID, $brick_info);

    wp_die();
}

function dr_body_class()
{
    $classes = 'mfTrigger0';

    if (dr_is_new_page()) {
        $classes .= ' dr_new';
    }

    return $classes;
}

function dr_is_new_page()
{

    // This array includes a list of all page IDs that should use the new 2019 formatting. 
    // All omitted pages will use legacy formatting. 

    $new_pages = [
        '1155', /* home */
        '19002', /* solutions */
        '19003', /* order-management */
        '18576', /* payments-risk */
        '19004', /* commerce */ 
        '18875', /* benefits */
        '18936', /* partners */
        '18894', /* developers */
        '18990', /* resources */
        '18757', /* about-us */
        '16237', /* news-and-events */
        '17186', /* request-demo */
        '19040', /* mycommerce */
        '19308', /* partner-with-us */
        '19408', /* thank-you */
        '16196', /* careers */
        '19836', /* Dev - Salesforce B2B integration */
        '19859' /* Stg - Salesforce B2B Integration */ 
    ];

    return is_page($new_pages) || is_new_child_page() || is_new_post_type();
}

function is_new_child_page()
{
    global $post;

    $parent_ids = [
        get_page_by_path('partners')->ID,
        get_page_by_path('events')->ID
    ];

    $is_child = array_search($post->post_parent, $parent_ids);

    return $is_child === 0;
}

function is_new_post_type()
{
    global $post;

    $post_types = [
        'events'
    ];

    $is_post_type = array_search($post->post_type, $post_types);

    return $is_post_type === 0;
}

// News filtering AJAX actions
add_action("wp_ajax_filter_news", "filter_news");
add_action("wp_ajax_nopriv_filter_news", "filter_news");

function filter_news()
{
    $year = $_REQUEST['year'];

    $brick = get_posts(array(
        'post_type' => 'bricks',
        'name' => 'news-results'
    ))[0];

    $brick_info = get_fields($brick->ID);
    $brick_info['year'] = $year;

    BrickController::in_the_news_results($brick->ID, $brick_info);

    wp_die();
}

// More news AJAX actions
add_action("wp_ajax_more_news", "more_news");
add_action("wp_ajax_nopriv_more_news", "more_news");

function more_news()
{
    $year = $_REQUEST['year'];
    $page = $_REQUEST['page'];
    $limit = $_REQUEST['limit'];

    $args = [
        'posts_per_page' => $limit,
        'offset' => $page * $limit,
        'post_type' => [
            PressReleasesPostType::$post_type_key,
            MediaCoveragePostType::$post_type_key
        ],
    ];

    if ($year) {
        $args['year'] = $year;
    }

    $articles = get_posts($args);

    foreach ($articles as $article) {
        $article->custom = get_fields($article->ID);

        View::make('parts/in-the-news-article', ["article" => $article]);
    }

    wp_die();
}

// More resource AJAX actions
add_action("wp_ajax_more_resources", "more_resources");
add_action("wp_ajax_nopriv_more_resources", "more_resources");

function more_resources()
{
    $page = $_REQUEST['page'];
    $limit = $_REQUEST['limit'];
    $filters = [
        "topic" => $_REQUEST['topic'],
        "type" => $_REQUEST['type']
    ];
    $picks = $_REQUEST['picks'];
    $offset_adjust = $_REQUEST['offsetAdjust'];

    $with_filters = $filters['topic'] || $filters['type'];

    $args = [
        'posts_per_page' => $limit,
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
        $args['offset'] = $limit * $page + 1;

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
        $args['offset'] = $limit * $page + $offset_adjust;
    }

    if ($picks) {
        $args['offset'] -= 2;
    }

    $query = new WP_Query($args);
    $resources = $query->posts;

    foreach ($resources as $resource) {
        $custom = get_fields($resource->ID);

        if ($resource->post_type === 'post') {
            $custom['image'] = $custom['small_image'];
            $custom['link'] = get_the_permalink($resource->ID);
        }

        $resource->custom = $custom;

        View::make('parts/resource-card', ["resource" => $resource]);
    }

    wp_die();
}

add_filter('acf/location/rule_types', 'acf_location_rules_types');

function acf_location_rules_types($choices)
{
    $choices['Events']['event-type'] = 'Event Type';

    return $choices;
}

add_filter('acf/location/rule_values/event-type', 'acf_location_rule_values_event_type');

function acf_location_rule_values_event_type($choices)
{

    $terms = get_terms([
        'taxonomy' => 'event-type',
        'hide_empty' => false,
    ]);

    if ($terms) {
        foreach ($terms as $term) {
            $choices[$term->term_id] = $term->name;
        }
    }

    return $choices;
}

add_filter('acf/location/rule_match/event-type', 'acf_location_rule_match_event_type', 10, 4);

function acf_location_rule_match_event_type($match, $rule, $options)
{
    $event_types = get_the_terms($options['post_id'], 'event-type');
    $selected_term = (int)$rule['value'];

    $count = 0;
    foreach ($event_types as $type) {
        if ($type->term_id == $selected_term) {
            $count++;
        }
    }

    if ($rule['operator'] == "==") {
        $match = $count > 0 ? true : false;
    } elseif ($rule['operator'] == "!=") {
        $match = $count > 0 ? false : true;
    }

    return $match;
}