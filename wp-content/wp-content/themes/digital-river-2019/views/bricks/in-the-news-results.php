<?php
$link = admin_url('admin-ajax.php?action=more_news');
?>

<div class="brick-in-the-news-results" id="<?= $anchor ?>"<?php if ($progress_nav_enabled) {
    echo ' data-progress-nav="active"';
} ?> data-page="<?= $page ?>" data-limit="<?= $limit ?>"
     data-max="<?= $max ?>">
    <div class="container">
        <?php foreach ($articles as $article) {
            if ($article->custom) {
                View::make('parts/in-the-news-article', ['article' => $article]);
            }
        } ?>
    </div>

    <div class="view-more">
        <button type="button" class="button-unstyled" data-action="<?= $link ?>">View more</button>
    </div>
</div>