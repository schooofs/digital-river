<div class="brick-videos" id="<?= $anchor ?>"<?php if ($progress_nav_enabled) {
    echo ' data-progress-nav="active"';
} ?> style="background-color: <?= $background_color ?>">
    <div class="container">
        <div class="row">
            <?php foreach ($videos as $key => $video) { ?>
                <div class="col-md">
                    <div class="video-container">
                        <iframe src="https://player.vimeo.com/video/<?= $video['video']->custom['vimeo_id'] ?>" width="640"
                                height="360" frameborder="0" title="<?= $video['video']->post_title ?>"
                                webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
