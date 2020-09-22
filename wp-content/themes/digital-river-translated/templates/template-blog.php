<?php
/**
  * Template Name: Template Blog
  */

  function initBlog(){

    if(is_single()){
      $blog = new \blog\Post(get_the_ID());
    }
    else{
      $blog = new BlogLayout();
    }

    $blog->display();


  if (isset($_GET['amp']) === false) {

    ?>

    <script>
      jQuery(document).ready(function($){

        $('#particleground').particleground({
          dotColor: '#ffffff',
          lineColor: '#ffffff',
          maxSpeedX: 0.3,
          maxSpeedY: 0.3,
          lineWidth:3,
          particleRadius:14,
          parallaxMultiplier:20,
          density: 10000,
        });
        
      });
    </script>
        <?php
      }
  }

$head = new Head();

  add_action( 'blog_post', 'wp_head',  1 );
  if (isset($_GET['amp']) === false) {
    add_action( 'blog_post', array('TopNavigation', 'display'),  5 );
  }

  if (isset($_GET['amp']) !== false) {
    add_action( 'blog_post', array('TopNavigation', 'displaySimple'),  5 );
  }

  add_action( 'blog_post', array('BlogLayout', 'blog_enqueue_styles'),   10);
  add_action( 'blog_post', array('BlogLayout', 'blog_enqueue_scripts'),   1);
  add_action( 'blog_post', 'initBlog',   15);
  if (isset($_GET['amp']) === false) {
    add_action( 'blog_post', array('Footer', 'display_footer'),  30 );
    add_action( 'blog_post', array('ContactFormTab', 'display'), 35 );
    add_action( 'blog_post', 'wp_footer',  40 );
  }

  if (isset($_GET['amp']) !== false) {
    add_action( 'blog_post', array('Footer', 'simple'),  30 );
  }
  
  add_action( 'blog_post', array('Footer', 'body_close'),  45 );





  do_action('blog_post');


?>
