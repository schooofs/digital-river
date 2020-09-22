<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php do_action("data_layer"); ?>
	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-TCV324G');</script>
	<!-- End Google Tag Manager -->
	<?php wp_head(); ?>
    <link rel="icon" href="<?= get_template_directory_uri() . "/assets/images/dr-favicon.ico"; ?>"  />
</head>
<body class="loading">
<div id="demoNow" class="body-wrapper">
  <div class="section">
    <!-- <div class="body-inner-wrapper navbar-fixed-top"> -->
        <?php View::make("parts/main-header-view"); ?>
   


