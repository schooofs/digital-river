<?php
$is_pr = $article->post_type == PressReleasesPostType::$post_type_key;
$date_label = $is_pr ? 'date_published' : 'article_date';
$image_label = $is_pr ? 'author_thumb' : 'media_logo';
$link = $is_pr ? get_permalink($article) : $article->custom['article_url'];
$image = !empty($article->custom[$image_label]) ? $article->custom[$image_label] : site_url() . '/wp-content/uploads/sites/8/digital-river-logo.png';
?>
<div class="card-article">
    <div class="row">
        <div class="col-2">
            <div class="img-background" style="background-image: url(<?= $image ?>)"></div>
        </div>
        <div class="col-10">
            <span class="article-date"><?= $article->custom[$date_label] ?></span>
            <p><a href="<?= $link ?>"<?php if (!$is_pr) { echo ' target="_blank"'; } ?>><?=
                    $article->post_title ?></a></p>
        </div>
    </div>
</div>
