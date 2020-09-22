<?php

/* Modal class for search  */
class Search
{

  /* Get type of search area
   * @param:
   * @return: search type (String)
   */
  public static function get_type(){
      if(isset($_GET['type'])){
        return $_GET['type'];
      }else if(isset($_GET['post_type'])){
        return $_GET['post_type'];
      }else{
        return null;
      }
  }

  /* Get results for resources search query
   * @param:
   * @return resources result (Array)
   */
  public static function resources_search(){
      global $wpdb;

      $search = get_search_query();
      $search_array = explode(" ", $search);
      $search_query_arg = "";
      $post_type = "marketing_materials";

      foreach($search_array as $key => $search_arg):

          if($key == 0){
              $search_query_arg .= "AND";
          }else{
              $search_query_arg .= "OR";
          }

          $search_query_arg .= " LOWER( $wpdb->postmeta.meta_value ) LIKE '%".strtolower($search_arg)."%' OR   LOWER( $wpdb->posts.post_title ) LIKE '%".strtolower($search_arg)."%' AND $wpdb->posts.post_type = '".$post_type."' ";

      endforeach;

      $sql = "SELECT $wpdb->postmeta.meta_value, $wpdb->posts.ID, $wpdb->posts.post_title
      FROM $wpdb->postmeta INNER JOIN $wpdb->posts
      ON $wpdb->postmeta.post_id=$wpdb->posts.ID
      WHERE meta_key = 'description' ".$search_query_arg;

      $sql = 'SELECT '.$wpdb->postmeta.'.meta_value, '.$wpdb->posts.'.ID, '.$wpdb->posts.'.post_title  FROM '.$wpdb->postmeta.' INNER JOIN '.$wpdb->posts.' ON '.$wpdb->postmeta.'.post_id='.$wpdb->posts.'.ID WHERE meta_key = "description"'.$search_query_arg;
      $results = $wpdb->get_results( $sql , OBJECT );

      foreach($results as $key => $result):
          $posts_array[] = (object) array(
              'post_title' => $result->post_title,
              'content' => $result->meta_value,
              'ID' => $result->ID
          );
      endforeach;

      return $posts_array;
  }



  public static function get_pages_by_slide_ids($slide_ids) {
    global $wpdb;

    $sql = 'SELECT post_id FROM '.$wpdb->postmeta.' WHERE meta_value IN ('.implode(",",$slide_ids).')';

    return ($wpdb->get_results($sql, ARRAY_N));
  }


  /* Format results for page. resources, press release and news feed.
   * @param:
   * @return formatted result (Array)
   */
   public static function format_results(){
     $solutions_parent    = get_field('solution_parent_page', 'option');
     $our_expertise_types = array('events', 'press_release', 'media_coverage');
     $blog_posts = array('post');

     $type=self::get_type();
     $blog_array = array();
     $posts_array = array();
     $numOfBlogPosts = 3;
     $blogCount = 0;
     $count = 0;

     $slide_ids = array();
     $page_ids = array();
     $OG = array(29);
     while ( have_posts() ) {
       the_post();

       $id = get_the_ID();

       // say no to OG
       if(in_array($id, $OG) ){
         continue;
       }

       if(get_post_type() == 'slides'){
         $slide_pages = self::get_pages_by_slide_ids(array( $id ));
         for($i=0; $i < count($slide_pages); $i++){
           for($j=0; count($slide_pages[$j]); $j++){
             if(!in_array($slide_pages[$i][$j], $page_ids)){
                $id  = $slide_pages[$i][$j];
                array_push($page_ids,  $id );
                $posts_array[$count] = self::tmp_post($id);
                // print_r($posts_array[$count]);
                $count++;

             }
           }
         }
       }
       else{
         array_push($page_ids, $id);
         $posts_array[$count] = self::tmp_post($id);
         $count++;
       }

     }

      return $posts_array;
   }

   public static function tmp_post($id){
     $tmp_post = (object)array();
     $tmp_post->ID = $id;

     // Get the excerpt
     $tmp_post->content = get_the_excerpt( $tmp_post->ID ) ."</strong>";

     $tmp_post->type = get_post_type( $tmp_post->ID );
     $tmp_post->post_title = get_the_title( $tmp_post->ID );

     return $tmp_post;
   }
}
?>
