<?php
/**
 * Template Name: Template Events
 */
?>
<?php get_header(); ?>
<?php get_template_part('masthead'); ?>

    <!-- Content Container -->
  <section class="content_container">

      <div class="container">
              <?php
              $cat = get_the_category( $post->orig_id );
              if ((!empty($cat) || $post->post_content) && !get_field('hide_title')) :
              ?>
              <div class="body_title"><?php the_title(); ?></div>
              <?php endif; ?>
          

              <?php if ($post) : ?>
                 
                  <div class="content post_content"><?php echo apply_filters('the_content', $post->post_content); ?></div>
                  <!-- <div class="content post_content"><?php //echo (get_the_content()) ? get_the_content(): $post->post_content; ?></div> -->
              <?php endif; ?>
          </div>

          <div class='row2'>

<?php

$posts = get_posts(array(
  'posts_per_page'   => 15,
  'post_type'        => 'events',
  'post_status'      => 'publish',
  'suppress_filters' => true 
));


$events_array = array();
foreach ($posts as $key => $post) {
    $event = new Event($post);
    $events_array[$event->get_timestamp($key)] =$event;
}

krsort($events_array);

      $upcomingEvents = array();
      $pastEvents = array();
           
      foreach ($events_array as $event) :

          if( time() <= $event->get_end_date()->modify('+1 day')->getTimestamp() ){

              $upcomingEvents[] = new DetailedListItem(
                                  $event->get_title(),
                                  $event->get_description(),
                                  $event->get_link(),
                                  array(
                                    "custom_link" => true,
                                    "tag" => $event->get_event_type() . '<span style="font-size:1.15em; color:#646469; margin: 0px 5px 0px 7px;">|</span>' . $event->get_date_string()
                                  )
                              );

          }else{


              if($event->get_link()){

                  if(count($pastEvents) <= 2 || $event->get_add_to_sidebar()){

                      $pastEvents[] = new DetailedListItem(
                                  $event->get_title(),
                                  $event->get_recap(),
                                  $event->get_recap_link(),
                                  array(
                                    "custom_link" => true,
                                    "tag" => $event->get_event_type() . '<span style="font-size:1.15em; color:#646469; margin: 0px 5px 0px 7px;">|</span>' . $event->get_date_string()
                                  )
                              );
                  }
              }


          }
      endforeach;
      ?>
    
        
<div class="container">
  <div class="row">
      <?php if(count($upcomingEvents) > 0): ?>
          <div class='col-md-8 webinars last'>
              <div class='eyebrow'>Upcoming Events &amp; Webinars</div>
              <div class='clear'></div>
              <?php
              foreach($upcomingEvents as $key=>$upcomingEvent):
                  $upcomingEvent->display();
              endforeach;
              ?>
          </div>
      <?php endif; ?>
      <?php
      if(count($upcomingEvents) <= 0):
          $class = "col-md-12 webinars";
          $pastStyles = "margin-right: 3.8%; width: 30.75%; border:none; padding:0;";
          $pastClass = "span_4";
      else: 
          $class = "sidebar col-md-4";
          $pastStyles = "";
          $pastClass = "";
      endif;
      ?>
      <div class='<?php echo $class; ?>'>
          <div class='eyebrow'>Past Events &amp; Webinars</div>
          <div class='clear'></div>
           <div class='detailed-link-wrapper'>
              <?php
              foreach($pastEvents as $key=>$pastEvent):
                  $pastEvent->display();
              endforeach;
              ?>
          </div>
      </div>
    </div>
</div>




  <div class='featured_wrapper'>
      <div class='featured_area'>
          <div class='featured' id='featured_1'>
              <div class='video_wrapper'>
                  <div class='embed-container'>
                      <iframe id="irce" src="https://player.vimeo.com/video/130242077?api=1&amp;player_id=irce" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe> 
                  </div>
              </div>
              <div class='copy_wrapper'>
                  <div class='quote'><div>Built for speed: Digital River’s racecar simulator at IRCE exhibited the company’s promise to increase clients’ speed to revenue.</div></div>
              </div>
              <div class='clear'></div>
          </div>
          
          <div class='clear'></div>
      </div>
      <div class='clear'></div>
  </div>

  </section>

<script>
 jQuery(document).ready(function(){
        jQuery(".button.watch").on("click",function(){
          jQuery(document).scrollTop(jQuery("#"+jQuery(this).data("videoid")).offset().top-130);
          jQuery("#"+jQuery(this).data("videoid")).vimeo("play");
        });
  });

</script>

<?php get_footer(); ?>
