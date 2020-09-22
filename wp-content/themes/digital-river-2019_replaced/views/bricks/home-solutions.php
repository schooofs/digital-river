<div class="brick-home-solutions" id="<?= $anchor ?>"<?php if ($progress_nav_enabled) {
    echo ' data-progress-nav="active"';
} ?>>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-11 text-center mb-3">
                <span class="preheading"><?= $preheading ?></span>
                <h2 class="heading"><?= $heading ?></h2>
                <p><?= $subheading ?></p>
            </div>
        </div>

        <div class="row">
            <?php foreach ($solutions as $card) { ?>
                <div class="col-lg-4 col-md-6">
                    <?php View::make('parts/card-solution', ["card" => $card]); ?>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
