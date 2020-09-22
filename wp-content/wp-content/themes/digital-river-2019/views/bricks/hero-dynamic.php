<?php
global $post;
$page_fields = get_fields($post->ID);
?>

<div class="brick-hero-dynamic <?php if ($page_fields['include_progress_navigation']) {
    echo 'progress-nav-active';
} ?>" id="<?= $anchor ?>"<?php if ($progress_nav_enabled) {
    echo ' data-progress-nav="active"';
} ?>>
    <div class="background-pattern" style="background-image: url(<?= get_stylesheet_directory_uri() .
    '/assets/images/hero-pattern.png' ?>);"></div>
    <div class="container">
        <h1><?= $heading ?></h1>
        <?= $body ?>
    </div>
</div>