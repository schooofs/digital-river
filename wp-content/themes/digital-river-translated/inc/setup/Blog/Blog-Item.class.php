<?php
  class BlogItem
  {

    public $post_id;
    public $title;
    public $content;
    public $media;
    public $author;
    public $date;
    public $link;
    public $series;
    public $cat;
    public $fields;
    public $svg;
    public $series_intro;

    /* Construct a Blog Item
     * @param post_id
     */
    public function __construct($post_object, $single = false)
    {
      $this->post_id = $post_object->ID;
      $this->date = date('F j, Y',strtotime($post_object->post_date));
      $this->link = get_permalink($post_object->ID);
      $this->title = $post_object->post_title;
      $this->content = $post_object->post_content;

      if($single == true){
          $this->author = array(
                            "name" => get_the_author_meta('display_name', $post_object->post_author),
                            "link" => get_author_posts_url(get_the_author_meta('ID', $post_object->post_author))
                        );
      }

      $fields = get_fields($post_object->ID);
      if($fields['post_call_to_action'] === 'Image'){
          $this->media = $fields['post_image'];
      }elseif ($fields['post_call_to_action'] === 'Video'){
          $this->media = $fields['vimeo_video_id'];
      }elseif ($fields['post_call_to_action'] === 'Svg'){
          $this->media = $fields['svg'];
      }

      preg_match("/svg/", $this->media, $match_array);

      $this->svg = (count($match_array) > 0)?true:false;

      $this->fields = $fields;


       if ( class_exists('WPSEO_Primary_Term') ){
          $wpseo_primary_term = new WPSEO_Primary_Term( 'category', $this->post_id );
          $wpseo_primary_term = $wpseo_primary_term->get_primary_term();
          $term = get_term( $wpseo_primary_term );

          if (is_wp_error($term)) { 
              $this->cat = '';
          } else { 
              $this->cat = $term->name;
          }
        }

        // $this->series_intro = get_post_meta($post_object->ID, "_series_key", true);

        // $this->series = get_the_series($post_object->ID);
    }

    public static function get_object_by_id($id)
    {
        return new BlogItem(get_post($id));
    }


    public function get_featured_post()
    {
        $featured_post_array = get_posts(array(
          'posts_per_page'   => 1,
          'category_name'    => 'featured',
          'orderby'          => 'date',
          'order'            => 'DESC',
          'post_type'        => 'post',
          'post_status'      => 'publish',
          'suppress_filters' => true 
        ));

        if (isset($featured_post_array[0])) {
          return new BlogItem($featured_post_array[0]);
        } else {
          return null;
        } 
    }

    public function display($is_category = null, $progressive = false)
    {
      include "views/overview/item.php";
    }


    public static function getItems($cat_slug=null, $search=null, $limit=12, $offset=0, $feature_id=null)
    {

      $args = array(
        'posts_per_page'   => $limit,
        'orderby'          => 'date',
        'order'            => 'DESC',
        'post_type'        => 'post',
        'post_status'      => 'publish',
        'suppress_filters' => true,
        'offset'           => $offset,
      );

      if ($feature_id != null) {
        $args['post__not_in'] = array($feature_id);
      }

      if($cat_slug != 'all' && $cat_slug != null){
        $args['category_name'] = $cat_slug; 
      }

      $posts_array = get_posts($args);

      $blog_items = array();
      foreach($posts_array as $post){
        $blog_items[] = new BlogItem($post);
      }

      return $blog_items;
    }


    public static function displayItems($posts, $is_category, $progressive = false){
      $hold=null;
      $part = 0;
      $num_of_items = 0;

      foreach ($posts as $key => $post) {

        /**
         * If post is the latest post in a series.
         * Display entire series
         * Non-latest post series will be ignored
         */

        // if ($post->series) {
        //   $series = get_series_posts($post->series[0]->term_id);
        //   $part = wp_series_part($post->post_id, $post->series[0]->term_id);



        //   if(count($series) == $part){
        //     if($start % 3 == 0){
        //       $hold = $series;
        //       $series_name =  $post->series[0]->name;
        //       continue;
        //     }else{
        //       \blog\Series::display($series, $post->series[0]->name);
        //       $start++;
        //       $start++;
        //     }
        //   }
        // }else{
            $post->display($is_category, $progressive);

        //     if($hold){
        //       \blog\Series::display($hold, $series_name);
        //       $start++;
        //       $hold = null;
        //     }
        //     $start++;
        // }

      }

    }


  }
