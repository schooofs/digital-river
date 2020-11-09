<!DOCTYPE html>
<html <?php language_attributes(); ?>>

    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="profile" href="http://gmpg.org/xfn/11">
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
        <?php $current_site_id = get_current_blog_id(); ?>
        <?php wp_head(); ?>
        <link rel="icon" href="<?= get_template_directory_uri() . "/assets/images/dr-favicon.ico"; ?>"/>
    </head>

    <body <?php body_class(dr_body_class()); ?>>
        <div class="body-wrapper">