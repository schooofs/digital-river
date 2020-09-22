<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php $current_site_id = get_current_blog_id(); ?>
	<?php if($current_site_id === 3): ?>
	<meta name="yandex-verification" content="4dbbda63d4f9073d" />
	<meta name="baidu-site-verification" content="JnpwTkgvPj" />
	<?php elseif($current_site_id === 2): ?>
	<meta name="yandex-verification" content="e313b9e5907a40ce" />
	<?php endif; ?>
	<?php do_action("data_layer"); ?>
	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-TCV324G');</script>
	<!-- End Google Tag Manager -->
	<!-- End Google Tag Manager (noscript) -->
	<?php wp_head(); ?>
    <link rel="icon" href="<?= get_template_directory_uri() . "/assets/images/dr-favicon.ico"; ?>"  />
</head>
<body <?php body_class(); ?>>
    <div class="body-wrapper">
        <?php 
        	if (is_page_template('template-commerce-connect.php')) {
        		View::make("parts/event-header-view");
        	} else {
        		View::make("parts/main-header-view");
        	}
        ?>
