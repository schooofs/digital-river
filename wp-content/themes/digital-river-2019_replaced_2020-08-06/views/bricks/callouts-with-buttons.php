
<div class="brick-callouts-with-buttons" id="<?= $anchor ?>"<?php if ($progress_nav_enabled) {
    echo ' data-progress-nav="active"';
} ?> style="background-color: <?= $background_color ?>">
    <div class="container text-center">
        <?php if ($heading) { ?><h2><?= $heading ?></h2><?php } ?>
        <?php if ($body) { echo $body; } ?>
        <div class="row  mt-5">
            <div class="col-12 col-lg-10 offset-lg-1">
                <div class="row">
                    <?php foreach ($callouts as $callout) { ?>
                        <div class="col-md">
                            <?php View::make('parts/callout-with-buttons', ["callout" => $callout]); ?>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
