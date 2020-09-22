<?php
namespace blog;
class Post
{

    private $posts_in_series;
    private $category;
    private $category_id;
    private $post_id;
    private $series_part;
    private $series_title;

    public function __construct($post_id)
    {
      $this->post_id = $post_id;

      if ( class_exists('WPSEO_Primary_Term') ) {
      
        $wpseo_primary_term = new \WPSEO_Primary_Term( 'category', get_the_ID() );
        $wpseo_primary_term = $wpseo_primary_term->get_primary_term();
        $term = get_term( $wpseo_primary_term );

        if (is_wp_error($term)) { 
            $this->category = '';
        } else { 
            $this->category = $term->name;
            $this->category_id = $term->term_id;
        }

      }

    }


    public function display()
    {

      echo '<div class="blog-wrapper bg-lightGray">';
        echo '<div id="particleground"></div>';
        echo '<div class="blog-inner-wrapper">';
          $this->display_header();
          $this->display_content();
          // $this->display_author();
          if (isset($_GET['amp']) === false) {
            $this->display_comments();
            // $this->display_keep_reading();
            
          }
          $this->display_related();
        echo '</div>';
      echo '</div>';

    }

    public function display_keep_reading()
    {

      if ($this->posts_in_series) {

        foreach ($this->posts_in_series as $key => $post) {

          if ($post['current'] == true) {

            if ((count($this->posts_in_series)-1) != $key)
              $next = $this->posts_in_series[$key+1];

            break;
          }

          $previous = $post;

        }

        include "views/individual_post/keep_reading.php";

      }

    }


    public function display_header()
    {

      $fields = get_fields(get_the_ID());

      /**
       *  @todo alt tags
       */
      $media = array();
      if($fields['post_call_to_action'] === 'Image'){
          $media["src"] = $fields['post_image'];
      }elseif ($fields['post_call_to_action'] === 'Video'){
          $media["src"] = $fields['vimeo_video_id'];
      }elseif ($fields['post_call_to_action'] === 'Svg'){
          $media["src"] = $fields['svg'];
      }

      $media["alt"] = "Alt Text";

      $amp = isset($_GET['amp']) ? true : false; 

      preg_match("/svg/", $media["src"], $match_array);

     $media["svg"] = (count($match_array) > 0)?true:false;

     $media["light"] = ($fields['light_or_dark_image'] == "dark") ? false : true;

      $series = $this->series_title;
      if($this->series_part != "" && $this->series_part != "intro")
        $series .= ": Part " . $this->series_part; 

      include "views/individual_post/header.php";

    }


    public function display_comments()
    {

      $comments = get_approved_comments( get_the_ID());

      include "views/individual_post/comments.php";

    }


    public function display_related()
    {

      $post_args = array(
        'posts_per_page' => 3,
        'caller_get_posts' => 1
      );

      $post_args['tag__in'] = array_map(function($tag){
                return $tag->term_id;
              },wp_get_post_tags($this->post_id));

      if ($this->posts_in_series) {
        $post_args['post__not_in'] = array_map(function($series){
                  return $series['id'];
                }, $this->posts_in_series);
      }
      
      $post_args['post__not_in'][] = $this->post_id;


      $post_args['category'] = $this->category_id;

      $post_args['date_query'] = array(
          'after' => date('Y-m-d', strtotime('-6 months')) 
      );


      $posts = get_posts($post_args);

      include "views/individual_post/related_posts.php";

    }


    public function display_content()
    {

      include "views/individual_post/content.php";
      
    }


    public function display_author()
    {
      
      include "views/individual_post/author.php";

    }

}
