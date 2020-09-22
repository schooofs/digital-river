<div class="brick-speakers" id="<?= $anchor ?>"<?php if ($progress_nav_enabled) {
    echo ' data-progress-nav="active"';
} ?>>
    <div class="container">
        <h2><?= $heading ?></h2>
        <div class="speakers">
            <?php foreach ($speakers as $speaker) { ?>
                <div class="speaker" style="background-image: url(<?= get_the_post_thumbnail_url($speaker) ?>)">
                    <div class="content-container">
                        <span><?= $speaker->post_title ?></span>
                        <small><?= $speaker->custom['position'] ?></small>
                        <div class="symbol"><span></span></div>
                    </div>
                </div>
                <div class="speaker-panel">
                    <div class="container">
                        <h3><?= $speaker->post_title ?></h3>
                        <p class="position"><?= $speaker->custom['position'] ?></p>
                        <?= $speaker->custom['biography'] ?>
                        <button class="button-unstyled close">&times;</button>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>