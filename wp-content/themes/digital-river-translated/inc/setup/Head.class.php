<?php
class Head{

    function __construct()
    {
        add_action('wp_head', array(&$this, 'open_content'), -1 );
        add_action('wp_head',  array(&$this, 'close_content'), 999 );
    }

    public static function open_content()
    {
        ?>
        <!doctype html >
        <html <?= (isset($_GET['amp']) ? "⚡" : null); ?> lang="<?= PhoneNumber::$lang[ICL_LANGUAGE_CODE]; ?>">
            <head>
                <meta name="test" content="this is a test">
                <meta charset="utf-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
                <?php /** / ?>
                <meta name="twitter:card" content="summary_large_image">
                <meta name="twitter:site" content="@DigitalRiverInc">
                <meta name="twitter:creator" content="@DigitalRiverInc">
                <meta name="twitter:title" content="<?= (wp_title('', false)) ?: get_bloginfo('name'); ?>">
                <?php /**/ ?>


                <?php if( isset($_GET['amp']) ): ?>
                <script async src="https://cdn.ampproject.org/v0.js"></script>
                <script async custom-element="amp-sidebar" src="https://cdn.ampproject.org/v0/amp-sidebar-0.1.js"></script>
                <script async custom-element="amp-fit-text" src="https://cdn.ampproject.org/v0/amp-fit-text-0.1.js"></script>
                <?php endif; ?>
                <title><?= (wp_title('', false)) ?: get_bloginfo('name'); ?></title>
                <?php if( isset($_GET['amp']) ): ?>
                <link rel="canonical" href="<?= get_page_link(); ?>" />
                <?php endif; ?>
                <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">
                <?php if( isset($_GET['amp']) ): ?>

                <link rel="shortcut icon" href="<?= get_stylesheet_directory_uri(); ?>/favicon.png" />
                <?php
                   /**
                    * @todo Schema JSON
                    */
                ?>
                <script type="application/ld+json">
                  {
                    "@context": "http://schema.org",
                    "@type": "NewsArticle",
                    "headline": "Open-source framework for publishing content",
                    "datePublished": "2015-10-07T12:02:41Z",
                    "image": [
                      "logo.jpg"
                    ]
                  }
                </script>
                <style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>
                <style amp-custom>

                  <?php include_once 'amp-styles.php'; ?>

                </style>
                <?php endif; ?>
        <?php
    }

    public static function close_content()
    {
        ?>
        </head>
        <body>
        <?php if (isset($_GET['amp']) === false) { ?>
            <script src="//service.maxymiser.net/api/us/digitalriver.com/410ef6/mmapi.js"></script>
            <script>
                <?php $category = (get_field("category") != null)?get_field("category"):"Test"; ?>
                page_info = <?= json_encode(PageInfo::tag($type, null, array("category" => $category))); ?>;
            </script>
        <?php }
    }
}