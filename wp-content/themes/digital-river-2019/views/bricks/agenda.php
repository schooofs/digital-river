<div class="brick-agenda" id="<?= $anchor ?>"<?php if ($progress_nav_enabled) {
    echo ' data-progress-nav="active"';
} ?> style="background-image: url(<?= $background_image['url'] ?>)">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <h2><?= $heading ?></h2>
            </div>
            <div class="col-lg-9">
                <dl>
                    <?php foreach ($sessions as $session) { ?>
                        <dt><?= $session['time'] ?></dt>
                        <dd><?= $session['description'] ?></dd>
                    <?php } ?>
                </dl>
            </div>
        </div>
    </div>
</div>