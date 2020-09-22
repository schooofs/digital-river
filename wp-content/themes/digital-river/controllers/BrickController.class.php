<?php

class BrickController 
{

  public function __construct()
  {
    add_action( 'wp_ajax_nopriv_get_archive', array($this, 'get_archive_posts') );
    add_action( 'wp_ajax_get_archive', array($this, 'get_archive_posts') );
  }

  public static function river($brick_id, $brick_info)
  {
    extract($brick_info);
 
    $GLOBALS['river_side'] = ( isset($GLOBALS['river_side']) && $GLOBALS['river_side'] === "left") ? "right" : "left";

    $resource_boxes = "";
    if ($resources !== false) {
      foreach($resources as $resource){
        $resource['class'] =  " left ";
        $resource_boxes .= ResourceBox::get($resource);
      }
    }
    
    View::make("bricks/river", [
      "image"     => $image,
      "lazy"      => true,
      "resources" => $resource_boxes,        
      "content"   => ContentFormatter::content($content['content']),
      
    ]);
  }


  public static function half_half($brick_id, $brick_info)
  {
    extract($brick_info);

    View::make("bricks/half-half", [
      "background_color"  => $background_color,
      "background_image"  => $background_image,
      "spacing_top" => $spacing_top,
      "spacing_bottom" => $spacing_bottom,
      "subject_matter_positioning" => $subject_matter_positioning,
      "left_side"         => is_array($left_content['content']) ?ContentFormatter::content($left_content['content']):null,
      "right_side"        => is_array($right_content['content']) ?ContentFormatter::content($right_content['content']):null,
    ]);
  }



  public static function half_half_wider($brick_id, $brick_info)
  {
    extract($brick_info);

    View::make("bricks/half-half-wider", [
      "background_color"  => $background_color,
      "background_image"  => $background_image,
      "spacing_top"       => $spacing_top,
      "spacing_bottom"    => $spacing_bottom,
      "image_side"        => $image_side,
      "left_side"         => is_array($left_content['content']) ?ContentFormatter::content($left_content['content']):null,
      "right_side"        => is_array($right_content['content']) ?ContentFormatter::content($right_content['content']):null,
    ]);
  }


  public static function our_clients($brick_id, $brick_info)
  {
    extract($brick_info);

    $formatted_clients = [];
    foreach($clients as $client) {
      $formatted_clients[] = ContentFormatter::svg("logo/" . get_field("logo", $client['client']), ["color" => "#002C57"]);
    }

    View::make("bricks/our-clients", [
      "background_color"  => $background_color,
      "content"         => is_array($content['content']) ?ContentFormatter::content($content['content']):null,
      "clients"           => $formatted_clients,
      "position"          => $clients_position
    ]);

  }

  public static function clients_full_width($brick_id, $brick_info)
  {
    extract($brick_info);

    $formatted_clients = [];
    foreach($clients as $client) {
      $formatted_clients[] = ContentFormatter::svg("logo/" . get_field("logo", $client['client']), ["color" => "#002C57"]);
    }

    View::make("bricks/clients-full-width", [
      "background_color"  => $background_color,
      "clients"           => $formatted_clients,
    ]);

  }


  public static function our_clients_slider($brick_id, $brick_info)
  {
    extract($brick_info);

    $formatted_clients = [];
    foreach($clients as $client) {
      $formatted_clients[] = ClientBox::make($client);
    }

    View::make("bricks/our-clients-slider", [
      "background_color"  => $background_color,
      "content"           => is_array($content['content']) ?ContentFormatter::content($content['content']):null,
      "clients"           => $formatted_clients,
      "image"             => $image,
      "position"          => $clients_position
    ]);

  }


  public static function featured_clients($brick_id, $brick_info)
  {
    extract($brick_info);

    $formatted_clients = [];
    foreach($clients as $client) {
      $formatted_clients[] = ClientBox::make($client, $type);
    }

    View::make("bricks/clients", [
      "clients" => $formatted_clients
    
    ]);
  }

  public static function pictogram($brick_id, $brick_info)
  {
    extract($brick_info);

    View::make("bricks/pictogram", [
      "pictogram" => $pictogram,
      "resource"  => ResourceBox::get($resource[0]),
      "content"   => ContentFormatter::content($content['content'])
    ]);
  }
    
    public static function commerce_pictogram($brick_id, $brick_info)
  {
    extract($brick_info);

    View::make("bricks/commerce-pictogram", [
      "pictogram" => $pictogram,
      "resource"  => ResourceBox::get($resource[0]),
      "content"   => ContentFormatter::content($content['content'])
    ]);
  }
    
        
  public static function hero_header($brick_id, $brick_info)
  {
    extract($brick_info);

    View::make("bricks/hero-header", [
      "background_color"  => $background_color,
      "background_image"  => $background_image,
      "vertical_padding" => $vertical_padding,
      "heading" => $heading,
      "top_text_content" => $top_text_content,
      "text_content" => $text_content,
      "link" => ($show_link === true) ? ContentFormatter::link($link) : null,
    ]);
  }
    

  public static function in_the_news($brick_id, $brick_info)
  {
    extract($brick_info);
      

    View::make("bricks/in-the-news", [
      "pressReleases"  => get_posts(['posts_per_page' => 3,'post_type' => PressReleasesPostType::$post_type_key]),
      "events"         => get_posts([
          'posts_per_page' => 8,
          'post_type'      => EventsPostType::$post_type_key,
          'orderby'        => 'event_start_date',
          'order'          => 'DSC',
          'meta_query'     => [
            [
              'key'    => 'event_end_date',
              'compare' => '>=',
              'value'   => date('Ymd'),
              'type'      => 'DATE'
            ]
          ]
      ]),
             
      "resources"      => get_posts(['posts_per_page' => 3,'post_type' => 'post'])
    ]);

  }

  public static function pictogram_callout($brick_id, $brick_info)
  {
    extract($brick_info);

    $resource['class'] = "pull-right";

    View::make("bricks/pictogram-callout", [
      "svg"           => sprintf("%s%s%s", get_template_directory(), "/images/", $svg),
      "resource"      => ResourceBox::get($resource),
      "heading"       => $heading,
      "description"   => $description,
      "link"          => ContentFormatter::link($link)
    ]);

  }

  public static function meet_the_team($brick_id, $brick_info)
  {
    extract($brick_info);

    View::make("bricks/meet-the-team", [
      "team_members" => $team_member_info, // repeater custom field 
    ]);
  }


  public static function archive($brick_id, $brick_info)
  {
      ob_start();
      
      if(isset($GLOBALS['scripts'])){
          $GLOBALS['scripts'] .= ob_get_clean(); 
      }else {
          $GLOBALS['scripts'] = ob_get_clean(); 
      } 
    
      
    extract($brick_info);

    $posts = get_posts(['posts_per_page' => -1,'post_type' => $post_type, 'year'  => date("Y")]);

    $formattedPosts = [];
    foreach($posts as $post) {
      
      $formattedPosts[] = [
        "title" => $post->post_title,
        "date"  => ($post_type === PressReleasesPostType::$post_type_key) ? get_field("date_published", $post->ID) : get_field("article_date", $post->ID),
        "media_logo" => ($post_type === MediaCoveragePostType::$post_type_key) ? get_field("media_logo", $post->ID) : null,
        "link"  =>  ($post_type === PressReleasesPostType::$post_type_key) ? get_permalink($post->ID) : get_field("article_url", $post->ID),
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
      "years"     => range(date("Y"), date('Y', strtotime($ax_first_post_date))),
      "posts"     => $formattedPosts,
      'post_type' => $post_type,
      "title"     => ContentFormatter::heading($archive_heading['seo_tag'], $archive_heading['size'], $archive_heading['tag'], $archive_heading['heading'])  
    ]);

  }

  public function get_archive_posts()
  {
    $accepted_post_types = [PressReleasesPostType::$post_type_key, MediaCoveragePostType::$post_type_key];
    $year = isset($_POST['year']) ? $_POST['year'] : date("Y");
    $post_type = (isset($_POST['post_type']) && in_array($_POST['post_type'], $accepted_post_types)) ? $_POST['post_type'] : PressReleasesPostType::$post_type_key;

    $posts = get_posts(['posts_per_page' => -1,'post_type' => $post_type, 'year'  => $year]);


    $formattedPosts = [];
    foreach($posts as $post) {
      
      $formattedPosts[] = [
        "title" => $post->post_title,
        "date"  => ($post_type === PressReleasesPostType::$post_type_key) ? get_field("date_published", $post->ID) : get_field("article_date", $post->ID),
        "media_logo" => ($post_type === MediaCoveragePostType::$post_type_key) ? get_field("media_logo", $post->ID) : null,
        "link"  =>  ($post_type === PressReleasesPostType::$post_type_key) ? get_permalink($post->ID) : get_field("article_url", $post->ID),
        "target" => ($post_type === PressReleasesPostType::$post_type_key) ? null : ' target="_blank" rel="nofollow" ',
      ];
    }      
      
      View::make("parts/archive", [
        "posts" => $formattedPosts
      ]);

    wp_die();
  }

  public static function upcoming_events($brick_id, $brick_info)
  {
    extract($brick_info);

    View::make("bricks/upcoming-events", [
       "background_image"  => $background_image,
       "events"  => get_posts([
          'posts_per_page' => 8,
          'post_type'      => EventsPostType::$post_type_key,
          'orderby'        => 'event_start_date',
          'order'          => 'DSC',
          'meta_query'     => [
            [
              'key'    => 'event_end_date',
              'compare' => '>=',
              'value'   => date('Ymd'),
              'type'      => 'DATE'
            ]
          ]
      ])
        
    ]);

  }

  public static function media_coverage($brick_id, $brick_info)
  {
      
    extract($brick_info);

    $mediaCoverages = get_posts(['posts_per_page' => 3,'post_type' => MediaCoveragePostType::$post_type_key]);

    $formattedMediaCoverages = [];
    foreach($mediaCoverages as $mediaCoverage) {
      $formattedMediaCoverages[] = [
       "title" => $mediaCoverage->post_title,
       "media_logo" => get_field("media_logo", $mediaCoverage->ID),
       "date"  => get_field("article_date", $mediaCoverage->ID)
      ];
    }

    View::make("bricks/media-coverage", [
      "mediaCoverages"  => $formattedMediaCoverages
    ]);

  }

  public static function recent_posts($brick_id, $brick_info)
  {
    extract($brick_info);


    error_reporting(E_ALL);
    ini_set('display_errors', 1);


    $heading = ContentFormatter::heading($heading['seo_tag'], $heading['size'], $heading['tag'], $heading['heading'], "marg-b-xxs-2");


    $the_query = new WP_Query([
                      'posts_per_page'  => 3,
                      'tag' => ($posts_tag !== null && $posts_tag !== "") ? $posts_tag : null
                  ]);

    $formatted_posts = [];
    

    while ( $the_query->have_posts() ) {
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
      "heading" => $heading,
      "posts" => $formatted_posts
    ]);
  }

    
  public static function custom_code($brick_id, $brick_info)
  {
    extract($brick_info);


    $shortcode = "svg";
    $pattern = get_shortcode_regex();
    if ( preg_match_all( '/'. $pattern .'/s', $html, $matches )
        && array_key_exists( 2, $matches )
        && in_array( $shortcode, $matches[2] ) ) {
     
        foreach ($matches[0] as $match) {
          if($pos = strpos ( $html , "[".$shortcode)) {
            $html = substr_replace ( $html , do_shortcode($match) , $pos, strlen($match) );
          }
        }
    }

    if(isset($GLOBALS['scripts'])) {
      $GLOBALS['scripts'] .= $javascript;
    } else {
      $GLOBALS['scripts'] = $javascript;
    }

    View::make("bricks/custom-code", [
     "html" => $html,
      "css"  => $css
        
    
    ]);

  }

public static function value_brief_overview($brick_id, $brick_info)
  {
    extract($brick_info);

    View::make("bricks/value-brief-overview", [
      "vb_overview" => $vboverview,
      "vb_capability" => $vbcapability,
      "vb_overview_image" => $vbimage,
    ]);
  }

public static function value_brief_image($brick_id, $brick_info)
  {
    extract($brick_info);

    View::make("bricks/value-brief-image", [
      "vb_image" => $add_an_image,  
    ]);
  }

  public static function value_brief_fexible($brick_id, $brick_info)
  {
    extract($brick_info);

    View::make("bricks/value-brief-flexible", [
      "vb_flexible_content" => $vbflexible_content, 
    ]);
  }

  public static function value_brief_cta($brick_id, $brick_info)
  {
    extract($brick_info);

    View::make("bricks/value-brief-cta", [
      "vb_cta_content_text" => $cta_content_text, 
      "vb_cta_button_text" => $cta_button_text, 
    ]);
  }


  public static function timeline($brick_id, $brick_info)
  {
    extract($brick_info);

    View::make("bricks/timeline");
  }
  public static function german_timeline($brick_id, $brick_info)
  {
    extract($brick_info);

    View::make("bricks/german-timeline");
  }

  public static function location($brick_id, $brick_info)
  {
    extract($brick_info);

    View::make("bricks/locations", [ 
        "title"     => $title,
        "locations" => $locations,
        "emea_locations" => $emea_locations,
        "apac_locations" => $apac_locations
        
    ]);
    
  }

  public static function three_up($brick_id, $brick_info)
  {
    extract($brick_info);

    View::make("bricks/three-up");
  }

  public static function case_study_cross_sell($brick_id, $brick_info)
  {
    extract($brick_info);

    $formatted_clients = [];

    foreach(get_field("clients", "option") as $client):
      $case_study = get_field("case_study", $client['client']);
      $formatted_clients[] = [
        "name" => $client['client']->post_title,
        "link" => ($case_study !== false) ? get_permalink($case_study) : null,
        "logo" => ContentFormatter::svg("logo/".get_field("logo", $client['client']), ['color'=>"#ffffff"])
      ];
    endforeach; 

    View::make("bricks/case-study-cross-sell", [
      "clients" => $formatted_clients,
      

    ]);
  }
    

    public static function flip_flap_resource_content($brick_id, $brick_info)
  {
    extract($brick_info); 
 
    foreach($about_company as $key => $single_about):
        
        $GLOBALS['river_side'] = ( isset($GLOBALS['river_side']) && $GLOBALS['river_side'] === "left") ? "right" : "left";
        $flip_flaps[$key]['side'] = $GLOBALS['river_side'];
        $flip_flaps[$key]['resource'] = "";
        if ($single_about !== false) {
          foreach($single_about['resources'] as $resource){
            $resource['class'] = ($GLOBALS['river_side'] === "left") ? " left ":" right pull-right ";
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
        "flip_flaps" => $flip_flaps, 
        "title"     => ContentFormatter::heading($company_heading['seo_tag'], $company_heading['size'], $company_heading['tag'], $company_heading['heading'], "marg-b-xxs-2")        
      ]);
    
  }
    

    public static function three_across($brick_id, $brick_info)
  {   
    extract($brick_info);

            View::make("bricks/three-across", [
                "top_paragraph" => $top_paragraph,
                "boxes" => $boxes,
            ]);
    }

    
    public static function clicky($brick_id, $brick_info)
    {
        extract($brick_info);

        
        View::make("bricks/clicky", [
            "icon_units" => $icon_units,
             "title"     => $title,
             "content"   => ContentFormatter::content($content['content']),
            
        ]);
    }
    

public static function three_up_featured($brick_id, $brick_info)
  {
    extract($brick_info);

    View::make("bricks/three-up-featured", [
        "title"     => $title,
        "award_boxes" => $award_boxes

    ]);
  }
    
public static function teams_locations($brick_id, $brick_info)
    {
        extract($brick_info);
        
        View::make("bricks/teams-locations", [
            "locations" => $locations,
             "title"     => $title
            
        ]);
    }
    
    public static function icon_stat($brick_id, $brick_info)
   { 
        extract($brick_info);
       
        View::make("mycommerce/icon-stat", [
            "title" => $title,
            "paragraph" => $paragraph,
            "background_image"  => $background_image,
            "icon_units" => $icon_units

      ]);
  }
        
    public static function video_half($brick_id, $brick_info)
   { 
        extract($brick_info);

        View::make("mycommerce/video-half", [
            "left_right" => $left_right,
            "content"   => ContentFormatter::content($content['content']),
            "image"  => $image,
            "video_link"    => $video_link,
            "video"         => $video

      ]);
  }
     public static function mycommerce_clicky($brick_id, $brick_info)
    {
        extract($brick_info);

        View::make("mycommerce/clicky", [
            "icon_units" => $icon_units,
             "title"     => $title,
            "left_right" => $left_right,
             "content"   => ContentFormatter::content($content['content']),
            
        ]);
    }
    
    public static function mycommerce_slider($brick_id, $brick_info)
    {
        extract($brick_info);
        
        View::make("mycommerce/mycommerce-slider", [
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
        "background_color"  => $background_color,
        "background_image"  => $background_image,
        "spacing_top"       => $spacing_top,
        "spacing_bottom"    => $spacing_bottom,
        "left_side"         => $sign_up_custom_code,
        "right_side"        => is_array($custom_right_content['content']) ?ContentFormatter::content($custom_right_content['content']):null,
        "center_content"    => is_array($custom_center_content['content']) ?ContentFormatter::content($custom_center_content['content']):null,
      ]);
    }

    public static function mycommerce_client_success_grid($brick_id, $brick_info)
    {
      extract($brick_info);

      View::make("mycommerce/client_success_grid", [
        "client_success_clients" => $client_success_clients,
      ]);
    }

    public static function mycommerce_team_member($brick_id, $brick_info)
    {
      extract($brick_info);

      View::make("mycommerce/team-member", [
        "mycommerce_team_members" => $mycommerce_team_members,
      ]);
    }

    public static function mycommerce_client_success_slider($brick_id, $brick_info)
    {
      extract($brick_info);

      View::make("mycommerce/client_success_quote_slider", [
        "testimonial_slider" => $testimonial_slider,
      ]);
    }
    
    public static function mycommerce_video_hero($brick_id, $brick_info)
    {
      extract($brick_info);

      View::make("mycommerce/video-header", [
          "content"   => ContentFormatter::content($content['content'])
        
      ]);
    }

    public static function mycommerce_row_pictogram($brick_id, $brick_info)
    {
    extract($brick_info);

    View::make("mycommerce/about-pictogram", [
      "about_pictogram" => $about_pictogram,
    ]);
  }

  public static function mycommerce_river($brick_id, $brick_info)
  {
    extract($brick_info);
 
    $GLOBALS['river_side'] = ( isset($GLOBALS['river_side']) && $GLOBALS['river_side'] === "left") ? "right" : "left";

    $resource_boxes = "";
    if ($resources !== false) {
      foreach($resources as $resource){
        $resource['class'] = ($GLOBALS['river_side'] === "left") ? " left ":" right pull-right ";
        $resource_boxes .= ResourceBox::get($resource);
      }
    }
    
    View::make("mycommerce/river", [
      "image"     => $image,
      "lazy"      => true,
      "resources" => $resource_boxes,        
      "content"   => ContentFormatter::content($content['content']),
      
    ]);
  }

  public static function mycommerce_pictogram_river($brick_id, $brick_info)
  {
    extract($brick_info);
 
    $GLOBALS['river_side'] = ( isset($GLOBALS['river_side']) && $GLOBALS['river_side'] === "left") ? "right" : "left";
    
    View::make("mycommerce/pictogram-river", [
      "offering_pictogram" => $offering_pictogram,    
      "content"   => ContentFormatter::content($content['content']),
      
    ]);
  }
}












