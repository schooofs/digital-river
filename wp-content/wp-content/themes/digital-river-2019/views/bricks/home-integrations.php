<div class="brick-home-integrations" id="<?= $anchor ?>"<?php if ($progress_nav_enabled) {
    echo ' data-progress-nav="active"';
} ?>>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-5">
                <h2 class="title"><?= $title ?></h2>
                <p><?= $body ?></p>
                <a href="<?= $cta_url ?>" class="btn btn-large"><?= $cta_text ?></a>
            </div>

            <div class="col-md-7">
                <div class="dr-slider<?php if ($slider_pips_enabled) {
                    echo ' with-pips';
                } ?><?php if ($slider_arrows_enabled) {
                    echo ' with-arrows';
                } ?>" data-items-per-slide="<?= $items_per_slide ?>">
                    <div class="dr-slider-outer">
                        <div class="dr-slider-inner row">
                            <?php foreach ($slides as $slide) { ?>
                                <div class="dr-slide col">
                                    <a href="<?php echo ( $slide['url'] !== '' ) ? $slide['url'] : 'javascript:void(0)'; ?>">
                                        <img src="<?= $slide['image'] ?>" alt="<?= $slide['alt'] ?>">
                                    </a>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="dr-slider-controls">
                        <button class="button-unstyled prev"></button>
                        <button class="button-unstyled next"></button>
                    </div>
                    <div class="dr-slider-pips">
                        <button class="button-unstyled"></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
