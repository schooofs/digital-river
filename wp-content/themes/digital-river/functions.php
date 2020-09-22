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



if(isset($_REQUEST['action'])) require __DIR__ . '/inc/vendor/autoload.php';

// General
require_once( 'inc/View.class.php' );
require_once( 'inc/BrickChooser.class.php' );

//Custom Post Types
require_once( 'inc/custom-post-types/ClientsPostType.class.php' );
require_once( 'inc/custom-post-types/VideosPostType.class.php' );
require_once( 'inc/custom-post-types/EventsPostType.class.php' );
require_once( 'inc/custom-post-types/BricksPostType.class.php' );
require_once( 'inc/custom-post-types/ResourcesPostType.class.php' );
require_once( 'inc/custom-post-types/CaseStudiesPostType.class.php' );
require_once( 'inc/custom-post-types/PressReleasesPostType.class.php' );
require_once( 'inc/custom-post-types/MediaCoveragePostType.class.php' );
require_once( 'inc/custom-post-types/InfographicPostType.class.php' );
require_once( 'inc/custom-post-types/PostPostType.class.php' );

//Taxonomy
require_once( 'inc/taxonomy/IndustryTaxonomy.class.php' );
require_once( 'inc/taxonomy/RegisterCategories.class.php' );

// Scripts and Styles
require_once( 'inc/ScriptManager.class.php' );
require_once( 'inc/StyleManager.class.php' );

// Controllers
require_once( 'controllers/BrickController.class.php' );
require_once( 'controllers/BlogIndividualController.class.php' );
require_once( 'controllers/BlogOverviewController.class.php' );
require_once( 'controllers/PressReleaseIndividualController.class.php' );
require_once( 'controllers/CaseStudyIndividualController.class.php' );
require_once( 'controllers/ValueBriefIndividualController.class.php' );
require_once( 'controllers/InfographicIndividualController.class.php' );
//require_once( 'controllers/CommerceConnect.class.php' );

// Parts
require_once( 'inc/part/ResourceBox.class.php' );
require_once( 'inc/part/ClientBox.class.php');
require_once( 'inc/part/ContactForm.class.php');
require_once( 'inc/ContentFormatter.class.php' );

// Shortcodes
require_once( 'inc/shortcodes/SvgShortcode.class.php' );
require_once( 'inc/shortcodes/InfographicShortcode.class.php' );


// Analytics
require_once( 'inc/Analytics/DataLayer.class.php' );

include_once('amp/amp-functions.php');


//set cookie expiration to 2 years from start
add_action('init', 'start_cookie_birthday', 0);
function start_cookie_birthday() {
  ini_set('session.cookie_lifetime', +63072000);
}


//create session from server
add_action('init', 'start_session', 1);
function start_session() {
    if(!session_id()) {
         ini_set('session.cookie_domain', '.wpengine.com');
            session_start();

    }
}


function get_abm_info($request)
{
  global $wpdb;

  if(isset($_COOKIE['drdomain']) && $_COOKIE['drdomain'] !== "") {
    $domain_id = $_COOKIE['drdomain'];
  } else {
    $company_info = MaxMind::get_company_info();
    if ($company_info === false) {
      return new WP_Error( 'request-not-found', 'Request Not Found', array( 'status' => 500 ) );
    }

    $domain_id = $wpdb->get_var( sprintf("SELECT id FROM wp_tar WHERE domain = '%s'", $company_info['domain']) );
    if ($domain_id === null) {
      $domain_id = $wpdb->get_var( sprintf("SELECT id FROM wp_tar WHERE name LIKE '%%%s%%'", $company_info['name']) );
    }
  }

  if ($domain_id !== null) {
    $target = true;
    setcookie("drdomain", $domain_id, time() + (86400 * 30), "/");
    $wpdb->insert('wp_views', ['url'=>$_SERVER["HTTP_REFERER"],'domain_id'=>$domain_id,'created_at'=>date("Y-m-d H:i:s")], ['%s','%d','%s']);
  } else {
    $target = false;
    setcookie("drtarg", 0, time()+3600, "/");
  }

  return new WP_REST_Response(["drtarg"=>$target], 200 );
}



add_action( 'rest_api_init', 'register_routes');
function register_routes()
{
  require __DIR__ . '/inc/vendor/autoload.php';
  require_once( 'inc/Analytics/MaxMind.class.php' );
  require_once( 'inc/Analytics/Salesforce.class.php' );

  $version = '1';
  $namespace = 'dr/v' . $version;
  register_rest_route( $namespace, '/collect' , [
    [
      'methods'  => WP_REST_Server::READABLE,
      'callback' => 'get_abm_info'
    ]
  ]);
}



// Footer Navigation Menus
register_nav_menus( array(
    'our-offerings' => __( 'Footer Our Offerings', 'digital-river' ),
    'company' => __('Footer Company', 'digital-river'),
    'clients' => __('Footer Clients', 'digital-river'),
    'value-added-services' => __('Footer Value Added Services', 'digital-river'),
    'resources' => __('Footer Resources', 'digital-river'),
    'main-navigation' => __('Main Navigation', 'digital-river'),
    'top-navigation' => __('Top Navigation', 'digital-river'),
    'legal' => __('Legal and Privacy Policy', 'digital-river')
) );

function my_walker_nav_menu_start_el($item_output, $item, $depth, $args) {
    $menu_locations = get_nav_menu_locations();

    if ( has_term($menu_locations['top-navigation'], 'nav_menu', $item) ) {
       $item_output = preg_replace('/<a /', '<a class="btn btn-secondary btn-sm" ', $item_output, 1);
    }

    return $item_output;
}
add_filter('walker_nav_menu_start_el', 'my_walker_nav_menu_start_el', 10, 4);

//Register shortcodes
//add_action('init', 'register_shortcodes');

//Shortcode functions
function show_resource_box(){
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

  new BlogOverviewController();
  new BrickController();

  new SvgShortcode();
  new InfographicShortcode();

  new IndustryTaxonomy();
  new RegisterCategories();

  new ScriptManager();
  new StyleManager();


  if(is_admin()) {
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


add_filter('wpseo_premium_post_redirect_slug_change', '__return_true' );

add_filter( 'wpseo_breadcrumb_links', 'custom_wpseo_breadcrumb_links' );
function custom_wpseo_breadcrumb_links( $links )
{
  if(is_single() && get_post_type() === "post") {

    $links[1]['text'] = __("Blog", "digital-river");
    $links[1]['url'] = $links[0]['url'] . "/blog/";

    $links[2]['id'] = $links[1]['id'];
    unset($links[1]['id']);

  } else if(is_single() && get_post_type() === "press_release") {

    $links[1]['text'] = __("News & Events", "digital-river");
    $links[1]['url'] = $links[0]['url'] . "/news-and-events/";

    $links[2]['id'] = $links[1]['id'];
    unset($links[1]['id']);

  }

  return $links;
}




add_theme_support( 'title-tag' );

if( function_exists('acf_add_options_page') ) {

  acf_add_options_page('Select Locale');

  acf_add_options_sub_page(array(
  	    'page_title' 	=> 'Client Carousel',
		'menu_title'	=> 'Options list',
		'parent_slug'	=> 'edit.php?post_type=clients',
  ));

}

//include svg uploads
function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');


function theme_name_setup(){
  $loaded = load_theme_textdomain( "digital-river", get_stylesheet_directory() . '/lang');
  return $loaded;
}
add_action( 'after_setup_theme', 'theme_name_setup' );

add_filter( 'locale', 'my_theme_localized_lang' );
function my_theme_localized_lang( $locale ) {
  return get_field('language', 'option') . "_" .  get_field('country', 'option');
}


function decode_canonical( $canonical ) {
  return urldecode($canonical);
}
add_filter( 'wpseo_canonical', 'decode_canonical', 10, 1 );

//Replace all the messed up www-www-digitalriver-com.digitalriver.staging.wpengine.com links in the custom post types to render the correct url on the page. It does not change what's in the database, only what renders on the page

function replace_text($text) {
    $text = str_replace('www-www-digitalriver-com.digitalriver.staging.wpengine.com', 'www.digitalriver.com', $text);
    $text = str_replace('www-digitalriver-com.digitalriver.staging.wpengine.com', 'www.digitalriver.com', $text);
    $text = str_replace( 'digitalriver.staging.wpengine.com', 'digitalriver.com', $text);
    $text = str_replace( 'www-digitalriver-com.digitalriver.staging.wpengine.com', 'digitalriver.com', $text);
    $text = str_replace( '?utm_medium=Blog', '', $text);
    $text = str_replace( '?utm_source=blog', '', $text);
    $text = str_replace( '?utm_medium=LinkedIn', '', $text);
    $text = str_replace( '?utm_medium=PR', '', $text);
    $text = str_replace( '?utm_medium=PressRelease', '', $text);
    $text = str_replace( '?utm_medium=Website', '', $text);
    $text = str_replace( '?utm_source=SocialMedia_PressRelease', '', $text);


    return $text;
}
add_filter('the_content', 'replace_text');

function replace_text_press_releases($text) {
    $text = str_replace('www-www-digitalriver-com.digitalriver.staging.wpengine.com', 'www.digitalriver.com', $text);
    $text = str_replace('www-digitalriver-com.digitalriver.staging.wpengine.com', 'www.digitalriver.com', $text);
    $text = str_replace( 'digitalriver.staging.wpengine.com', 'digitalriver.com', $text);
    $text = str_replace( 'www-digitalriver-com.digitalriver.staging.wpengine.com', 'digitalriver.com', $text);
    $text = str_replace( '?utm_medium=Blog', '', $text);
    $text = str_replace( '?utm_source=blog', '', $text);
    $text = str_replace( '?utm_medium=LinkedIn', '', $text);
    $text = str_replace( '?utm_medium=PR', '', $text);
    $text = str_replace( '?utm_source=&amp;utm_medium=PR', '', $text);
    $text = str_replace( '?utm_medium=PressRelease', '', $text);
    $text = str_replace( '?utm_medium=Website', '', $text);
    $text = str_replace( '?utm_source=SocialMedia_PressRelease', '', $text);

    return $text;
}
add_filter('press_releases', 'replace_text_press_releases');

if(!is_admin()) {
    function add_asyncdefer_attribute($tag, $handle) {
        // if the unique handle/name of the registered script has 'async' in it
        if (strpos($handle, 'async') !== false) {
            // return the tag with the async attribute
            return str_replace( '<script ', '<script async ', $tag );
        }
        // if the unique handle/name of the registered script has 'defer' in it
        else if (strpos($handle, 'defer') !== false) {
            // return the tag with the defer attribute
            return str_replace( '<script ', '<script defer ', $tag );
        }
        // otherwise skip
        else {
            return $tag;
        }
    }
    add_filter('script_loader_tag', 'add_asyncdefer_attribute', 10, 2);
}
