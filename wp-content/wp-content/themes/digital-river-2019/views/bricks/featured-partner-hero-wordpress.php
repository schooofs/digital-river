<?php
global $post;
$page_fields = get_fields($post->ID);

$classes = '';

if ($page_fields['include_progress_navigation']) {
    $classes .= ' progress-nav-active';
}

if ($slim) {
    $classes .= ' slim-hero';
}

if(isset($_GET['aliId'])) {
    header("Location: /partners/thank-you");
}

?>

<div class="brick-hero<?= $classes ?>" id="<?= $anchor ?>"<?php if ($progress_nav_enabled) {
    echo ' data-progress-nav="active"';
} ?> style="text-align: left;">
    <div class="background-pattern" style="background-image: url(<?= get_stylesheet_directory_uri() .
    '/assets/images/hero-pattern.png' ?>);"></div>
    <div class="container row">
        <div class="col-10 col-md-8 col-lg-9">
        <h1><?= $heading ?></h1>
        <p><?= $body ?></p>
        <form id="mktoForm_6614"></form>
        <script>MktoForms2.loadForm("//app-sj03.marketo.com", "348-QUY-258", 6614);</script>
            
        <?php if ($links) { ?>
            <div class="links pt-4" style="clear: both;">
                <?php foreach ($links as $link) { ?>
                    <a href="<?= $link['url'] ?>" style="margin: 0 0 0 0;" target="_blank"><?= $link['text'] ?></a>
                <?php } ?>
            </div>
        <?php } ?>
        </div>
        <div class="d-none d-md-block col-2 col-md-4 col-lg-3">
            <?php if ($logo) { ?>
                <a href="<?=$logo_url ?>" target="_blank"><img class="hero-logo" src="<?= $logo['url'] ?>" alt="<?= $logo['alt'] ?>"></a>
            <?php } ?>
        </div>
    </div>
</div>
