<div class="brick-home-benefits" id="<?= $anchor ?>"<?php if ($progress_nav_enabled) {
    echo ' data-progress-nav="active"';
} ?>>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10 text-center mb-3">
                <h2 class="large-title mb-3"><?= $title ?></h2>
                <?= $copy ?>
            </div>
        </div>

        <div class="row">
            <?php foreach ($right_hand_col as $index => $benefit) { ?>
                <div class="col-lg-4">
                    <?php View::make('parts/callout-home', [
                        "callout" => $benefit,
                        "index" => $index
                    ]); ?>
                </div>
            <?php } ?>
        </div>

        <div class="text-center mt-3">
            <a href="/benefits" class="btn"><?= $button_text ?></a>
        </div>
    </div>
</div>
