<?php
  namespace blog;
  class Series{
    public static function get_all_posts_in_series($posts, $postid = 0, $series_id = 0, $skip = TRUE, $only_published = TRUE) {

      if ( !is_array( $posts ) )
        $posts = array($posts);

      $series_posts = array();
      $key = 0;

      $postids = '';
      $cycle = 0;

      foreach ( $posts as $newposts ) {
        if ( $cycle != 0 ) $postids .= ', ';
        if (array_key_exists('object_id', $posts)) {
          $postids .= $newposts['object_id'];
        } else {
          $postids .= $newposts;
        }
        $cycle++;
      }

      $posts = get_posts(array(
        'post_status' => 'publish',
        'include' => $postids,
        'post_type' => 'post'
      ));

      foreach ($posts as $post) {
          $tmp_key = $key;

          $currentpart = get_post_meta($post->ID, SERIES_PART_KEY, true);
          if($currentpart == 'intro'){
            $tmp_key = 0;
          }

          $series_posts[$tmp_key]['current'] = ($skip && $post->ID == $postid)? true : false;
          $series_posts[$tmp_key]['id'] = $post->ID;
          $series_posts[$tmp_key]['part'] = $currentpart;


          $key++;
      }

      if (count($series_posts) > 1)
        usort( $series_posts, '_usort_series_by_part' );

      return $series_posts;
    }

    public static function display($seriesPost, $series_name){
        $series = array();
        $count = 1;
      ?>
      <div class="blog-series-wrapper col-md-8">
        <span class="series-title-wrapper light text-center txt-white">
          <span class="pricetag">Blog Series</span><br>
          <span class="series-title h3 option no-margin"><?= $series_name ?></span>
        </span>
        <div class="blog-slick double">
          <?php
          foreach($seriesPost as $k => $s){
            $post = \BlogItem::get_object_by_id($s['id']);
            ob_start();
            ?>
            <a href="<?php echo $post->link; ?>">
              <div class="feature-series">
                  <div class="card-image <?php echo $post->fields["background_color"]; ?>">
                    <img class="img-responsive center-image <?= (!$post->svg)?" background-image ":null; ?>" src="<?php echo $post->media; ?>" />
                  </div>
                  <div class="post-title">
                    <div class="text-center option no-margin light txt-white h4"><?php echo ($post->series_intro != "true")?"Part ".$count:"Intro"; ?></div>
                      <h3 class="option no-margin text-center txt-white h4"><?php echo $post->title; ?></h3>
                  </div>
              </div>
            </a>
            
            <?php
            if($post->series_intro != "true"){
              $series[$count] = ob_get_contents();
              ob_end_clean();
              $count++;
            }else{
              $intro = ob_get_contents();
              ob_end_clean();
              echo $intro;
            }
          }
          foreach($series as $post){
            echo $post;
          }
          ?>
          </div>
        </div>
    <?php
    }
  }
