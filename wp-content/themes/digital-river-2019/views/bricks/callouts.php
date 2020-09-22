<div class="brick-callouts" id="<?= $anchor ?>"<?php if ($progress_nav_enabled) {
    echo ' data-progress-nav="active"';
} ?> style="background-color: <?= $background_color ?>">
    <div class="container">
        <?php if ($heading) { ?><h2><?= $heading ?></h2><?php } ?>
        <?php if ($body) { echo $body; } ?>
        <div class="row<?php if ($heading || $body) { echo ' mt-5'; } ?>">
            <?php foreach ($callouts as $callout) { ?>
                <div class="col-md">
                    <?php View::make('parts/callout', ["callout" => $callout]); ?>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
