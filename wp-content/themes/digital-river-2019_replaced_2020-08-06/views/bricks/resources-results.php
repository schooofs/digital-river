<?php
$ajax_link = admin_url('admin-ajax.php?action=more_resources');
?>

<div class="brick-resources-results" id="<?= $anchor ?>"<?php if ($progress_nav_enabled) {
    echo ' data-progress-nav="active"';
} ?> style="background-color:white;" data-page="<?= $page ?>" data-limit="<?= $limit ?>"
     data-max="<?= $max ?>" data-picks="<?= $picks ?>" data-offset-adjust="<?= $offset_adjust ?>">
    <div class="featured-result">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <a href="<?= $featured->custom['link'] ?>"<?php if ($featured->custom['link_external']) {
                        echo ' target="_blank"';
                    } ?>>
                        <div class="featured-image img-background"
                             style="background-image: url(<?= $featured->custom['image']['url'] ?>)"></div>
                    </a>
                </div>
                <div class="col-md-7 featured-copy">
                    <h2>
                        <a href="<?= $featured->custom['link'] ?>"<?php if ($featured->custom['link_external']) {
                            echo ' target="_blank"';
                        } ?>><?= $featured->post_title ?></a>
                    </h2>
                    <p><?= $featured->post_excerpt ?></p>
                    <a href="<?= $featured->custom['link'] ?>"
                       class="btn"<?php if ($featured->custom['link_external']) {
                        echo ' target="_blank"';
                    } ?>>View now</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container results-container">
        <div class="row">
            <?php foreach ($resources as $resource) {
                View::make('parts/resource-card', ["resource" => $resource]);
            } ?>
        </div>
    </div>

    <div class="view-more">
        <button type="button" class="button-unstyled" data-action="<?= $ajax_link ?>">View more</button>
    </div>
</div>