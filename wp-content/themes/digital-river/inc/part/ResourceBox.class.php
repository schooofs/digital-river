<?php
/**
 *
 * $resource - true/false - is this a resource or just a stat, fact, or proposition value statement
 * 
 * if($resource === true):
 *   $external - true/false - is the link an internal of external link
 *   $link - link to resource
 *   $title - title of the custom post type
 *   $icon - determened by the type custom post type (for event, use a calender, for marketing material, use a file icon)
 *   $type - type of custom post type
 * else:
 *   $icon - icon in icon set
 *   $title - text input - title of value prop
 *   $description - text input - sentence long description of value prop title
 * endif;
 *
 */

class ResourceBox
{
  public static $icons = [
    "videos"          => "",
    "events"          => "icons_TimeCalendar",
    "post"            => "icons_MessageChat",
    "web_page"        => "icons_Computer",
    "blog"            => "icons_MessageChat",
    "Webinar"         => "icons_UsersConnect",
    "press_release"   => "icons_Newspaper",
    "news"            => "icons_Newspaper",
    "resources"       => "icons_Document",
    "resource"        => "icons_Document",
    "case_study"      => "icons_Document",
    "white_paper"     => "icons_Document",
    "infographic"     => "icons_LightsIdeas",
    "value_brief"     => "icons_BusinessGraphicPie",
    "report"          => "icons_Document"
    
  ];

  private static $resource_defaults = [
      "animate" => null,
      "class"   => null
  ];

  public static function get_type($post_type)
  {
    if($post_type === "videos") {  
      return __("Video", "digital-river");  
    } else if($post_type === "press_release"){
      return __("Press Release", "digital-river");  
    } else if($post_type === "Webinar"){
      return __("Webinar", "digital-river");  
    } else if($post_type === "events"){
      return __("Event", "digital-river");  
    } else if($post_type === "blog" || $post_type === "post"){
      return __("Blog", "digital-river");  
    } else if($post_type === "case_study"){
      return __("Case Study", "digital-river"); 
    } else if($post_type === "web_page"){
      return __("Web Page", "digital-river");   
    } else if($post_type === "white_paper"){
      return __("White Paper", "digital-river");  
    } else if($post_type === "infographic"){
      return __("Infographic", "digital-river");  
    } else if($post_type === "value_brief"){
      return __("Value Brief", "digital-river");  
    } else if($post_type === "news"){
      return __("News", "digital-river"); 
    } else if($post_type === "report"){
      return __("Report", "digital-river");
    } 
        else {
      return __("Resource", "digital-river");  
    }
  }

  public static function get($resource) 
  {
    $resource = array_merge(self::$resource_defaults, $resource);

    ob_start();

    if($resource['type'] === "event"):
      self::event($resource['event'], $resource['animate'], $resource['class']);
    elseif($resource['type'] === "press_release"):
      self::press_release($resource['resource'], $resource['animate'], $resource['class']);
    elseif($resource['type'] === "news"):
      self::press_release($resource['resource'], $resource['animate'], $resource['class']);
    elseif($resource['type'] === "resource"):
      self::resource($resource['resource'], $resource['animate'], $resource['class']);
    elseif($resource['type'] === "Webinar"):
      self::resource($resource['resource'], $resource['animate'], $resource['class']);
    elseif($resource['type'] === "video"):
      self::video(get_the_title($resource['video']), get_fields($resource['video']), $resource['animate'], $resource['class']);
    else:
      if($resource['value_prop_type'] === "stat"){
        $visual = '<div class="value-prop-stat">' . $resource['value_prop_stat'] . '</div>';
      } else {
        $visual = ContentFormatter::svg($resource['value_prop_icon'], ["color"=>"#03B5E8"]);
      }
      self::value_prop($visual, $resource['value_prop_title'], $resource['value_prop_description'], $resource['animate'], $resource['class']);
    endif;  

    $resource = ob_get_contents();
    ob_end_clean();

    return $resource;
  }

  private static function press_release($post_object, $animate, $class)
  {
    View::make("parts/resources-box/resource", [   
      "resource"  => true,
      "external"  => isset($external) ? $external : false,
      "target"    => isset($target) ? $target : false,
      "link"      => get_permalink($post_object->ID),
      "title"     => $post_object->post_title,
      "icon"      => ContentFormatter::svg(self::$icons[$post_object->post_type], ["color"=>"#03B5E8"]),
      "type"      => self::get_type($post_object->post_type),
      "animate"   => $animate,
      "start_date" => get_field("event_start_date"),
      "class"     => $class
    ]);
  }

  private static function resource($post_object, $animate, $class)
  {

    $resource_type = get_field("resource_type", $post_object->ID);
    if($resource_type === "page") {
      $link = get_field("resource_page", $post_object->ID);
    } else if($resource_type === "marketo"){
      $link = get_field("resource_marketo", $post_object->ID);
      $external = true;
      $target = "_blank";
    } else {
      $link = get_field("resource_pdf", $post_object->ID);
      $target = "_blank";
    }


    $type = get_field("resource_type_of_resource", $post_object->ID);

     $type = ($type !== null) ? $type : 'resource';

    View::make("parts/resources-box/resource", [	 
      "resource"  => true,
      "external"  => isset($external) ? $external : false,
      "target"    => isset($target) ? $target : false,
      "link"      => $link,
      "title"     => $post_object->post_title,
      "icon"      => ContentFormatter::svg(self::$icons[$type], ["color"=>"#03B5E8"]),
      "type"      => ($type !== null) ? self::get_type($type) : self::get_type('resource'),
      "animate"   => $animate,
      "start_date"  => get_field("event_start_date", $post_object->ID),
      "class"     => $class
    ]);
  }

  private static function video($video_title, $video_fields, $animate, $class)
  {
    View::make("parts/resources-box/video", [	 
      "title"             => $video_title,
      "vimeo_id"          => $video_fields['vimeo_id'],
      "background_image"  => $video_fields['resource_section_image'],
      "animate"           => $animate,
      "class"             => $class,
      "icon"              => ContentFormatter::svg("icons_VideosPlay", ["color"=>"#03B5E8", "size" => 75]),
    ]);
  }

  private static function event($post_object, $animate, $class)
  {
      if(get_field("event_type", $post_object->ID) === "event"){
          View::make("parts/resources-box/event", [  
              "resource"    => true,
              "title"       => $post_object->post_title,
              "icon"        => ContentFormatter::svg(self::$icons[$post_object->post_type], ["color"=>"#03B5E8"]),
              "type"        => self::get_type($post_object->post_type),
              "animate"     => $animate,
              "class"       => $class,
              "external"  => true,
              "target"    => "_blank",
              "link"        => get_field("link_url", $post_object->ID),
              "location"    => get_field("event_location", $post_object->ID),
              "start_date"  => get_field("event_start_date", $post_object->ID),
              "end_date"  => get_field("event_end_date", $post_object->ID)
            ]); 
    } else {
          
    $type = "Webinar";
          
    $todaysDate = new DateTime();
    $todaysDate->getTimestamp(); 
          
    $eventDate = new Datetime(get_field("event_start_date", $post_object->ID));
    $eventDate->getTimestamp();
          
    if($todaysDate <= $eventDate){
            
          View::make("parts/resources-box/resource", [	 
              "resource"  => true,
              "external"  => true,
              "target"    => "_blank",
              "link"      => get_field("link_url", $post_object->ID),
              "title"     => $post_object->post_title,
              "icon"      => ContentFormatter::svg(self::$icons[$type], ["color"=>"#03B5E8"]),
              "type"      => ($type !== null) ? self::get_type($type) : self::get_type('resource'),
              "animate"   => $animate,
              "class"     => $class,
              "upcoming"  => get_field("upcoming_button_text", $post_object->ID),
              "start_date"  => get_field("event_start_date", $post_object->ID),
              "end_date"  => get_field("event_end_date", $post_object->ID)
            ]);
     
      }
        else {
            
    
            View::make("parts/resources-box/resource", [	 
              "resource"  => true,
              "external"  => isset($external) ? $external : false,
              "target"    => isset($target) ? $target : false,
              "link"      => get_field("post_event_link_url", $post_object->ID),
              "title"     => $post_object->post_title,
              "icon"      => ContentFormatter::svg(self::$icons[$type], ["color"=>"#03B5E8"]),
              "type"      => "On-Demand&nbsp;" .$type,
              "animate"   => $animate,
              "class"     => $class,
              "start_date"  => get_field("event_start_date"),
              "end_date"  => get_field("event_end_date", $post_object->ID)
            ]);     
    }
 
  }
}

  private static function value_prop($icon, $title, $description, $animate, $class)
  { 
    View::make("parts/resources-box/value-prop", [	 
      "icon"        => $icon,
      "title"       => $title,
      "description" => $description,
      "animate"     => $animate,
      "class"       => $class
    ]);
  }
    
  private static function news($icon, $title, $description, $animate, $class)
  { 
    View::make("parts/resources-box/resource", [	 
      "resource"  => true,
      "external"  => isset($external) ? $external : false,
      "target"    => isset($target) ? $target : false,
      "link"      => get_permalink($post_object->ID),
      "title"     => $post_object->post_title,
      "icon"      => ContentFormatter::svg(self::$icons[$post_object->post_type], ["color"=>"#03B5E8"]),
      "type"      => self::get_type($post_object->post_type),
      "animate"   => $animate,
      "start_date" => get_field("event_start_date"),
      "class"     => $class
    ]);
  }
}
