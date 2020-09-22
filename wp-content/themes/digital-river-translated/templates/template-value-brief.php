<?php
/**
 * Template Name: Template Value Brief
 */
?>
<!-- For Print Pages to Appear -->
<?php if(isset($_GET['print'])): ?>
    <style>
      #global_header {display: none;}
      #global_footer {display: none;}
      .overlay-wrapper{display: none;}
      .tab-content{display: none;}
    </style>
<?php endif; ?>

<?php
$head = new Head();
add_action( 'value_brief', 'wp_head',  1 );
add_action( 'value_brief', array('TopNavigation', 'display'),  5 );
add_action( 'value_brief', array('ValueBrief','display'),   10);
add_action( 'value_brief', array('Footer', 'display_footer'),  15 );
add_action( 'value_brief', array('ContactFormTab', 'display'), 20 );
add_action( 'value_brief', 'wp_footer',  25 );

do_action('value_brief');
?>