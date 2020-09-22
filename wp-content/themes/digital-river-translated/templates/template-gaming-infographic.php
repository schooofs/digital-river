<?php
/**
 * Template Name: Gaming Infographic
 */
?>

<?php


$head = new Head();
add_action( 'brick_page', 'wp_head',  1 );
add_action( 'brick_page', array('TopNavigation', 'display'),  5 );

do_action('brick_page');
add_action('wp_enqueue_scripts', 'theme_scripts');
?>


<head>
<meta charset="UTF-8">
<meta name="authoring-tool" content="Adobe_Animate_CC">
<title>walking</title>
<!-- write your code here -->
<style>
  #animation_container {
      margin-left: auto;
      margin-right: auto;
  }
</style>
    <script src="<?php echo get_bloginfo('template_directory'); ?>/js/walking.js"></script>
<script src="<?php echo get_bloginfo('template_directory'); ?>/js/canvas.js"></script>
<script src="https://code.createjs.com/createjs-2015.11.26.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    

    <?php 
        add_action( 'brick_page', array('Footer', 'display_footer'),  15 );
        add_action( 'brick_page', 'wp_footer',  25 );
    ?>
<!-- write your code here -->
</head>
<body onload="init();" style="margin:0px;">
	<div id="animation_container" style="background-color:rgba(255, 255, 255, 1.00); width:1280px; height:720px">
		<canvas id="canvas" width="1280" height="720" style="position: absolute; display: block; background-color:rgba(255, 255, 255, 1.00);"></canvas>
        <input type="button" value="pause" id="pauseBtn" onclick="togglePause();">
		<div id="dom_overlay_container" style="pointer-events:none; overflow:hidden; width:1280px; height:720px; position: absolute; left: 0px; top: 0px; display: block;">
		</div>
	</div>
</body>
