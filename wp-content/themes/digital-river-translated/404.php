<?php
/**
 * 404 Page for catching bad URLs
 */

$head = new Head();
add_action( 'page_404', 'wp_head',  1 );
add_action( 'page_404', array('TopNavigation', 'display'),  5 );
add_action( 'page_404', function(){
  ?>
    <div class="slide text-center option top-double bottom-double">
      <div class="container" style="padding:50px 0;">
        <h1 class="eng">404: Page Not Found</h1>
        <a href="/" class="btn btn-primary option margin-top">Go to the home page</a>
      </div>
    </div>
  <?php
});
add_action( 'page_404', array('Footer', 'display_footer'),  15 );
add_action( 'page_404', array('ContactFormTab', 'display'), 20 );
add_action( 'page_404', 'wp_footer',  25 );
do_action("page_404");