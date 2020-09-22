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
?>

<div class="brick-hero<?= $classes ?>" id="<?= $anchor ?>"<?php if ($progress_nav_enabled) {
    echo ' data-progress-nav="active"';
} ?>>
    <div class="background-pattern" style="background-image: url(<?= get_stylesheet_directory_uri() .
    '/assets/images/hero-pattern.png' ?>);"></div>
    <div class="container">
        <h1><?= $heading ?></h1>
        <?php if ($logo) { ?>
            <img class="hero-logo" src="<?= $logo['url'] ?>" alt="<?= $logo['alt'] ?>">
        <?php } ?>
        <p><?= $body ?></p>

        <?php if ($links) { ?>
            <div class="links">
                <?php foreach ($links as $link) { ?>
                    <a href="<?= $link['url'] ?>"><?= $link['text'] ?></a>
                <?php } ?>
            </div>
        <?php } ?>
    </div>
</div>
