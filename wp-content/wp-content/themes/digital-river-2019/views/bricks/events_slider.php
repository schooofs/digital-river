<div class="brick-events-slider" id="<?= $anchor ?>"<?php if ($progress_nav_enabled) {
    echo ' data-progress-nav="active"';
} ?>>
    <div class="container">
        <h2 style="color: <?= $heading_colour ?>"><?= $heading ?></h2>

        <div class="dr-slider<?php if ($slider_pips_enabled) {
            echo ' with-pips';
        } ?><?php if ($slider_arrows_enabled) {
            echo ' with-arrows';
        } ?>" data-items-per-slide="<?= $items_per_slide ?>">
            <div class="dr-slider-outer">
                <div class="dr-slider-inner row">
                    <?php foreach ($slides as $slide) { ?>
                        <div class="dr-slide col">
                            <h3><?= $slide->post_title ?></h3>
                            <span class="start-date">
                                <?= $slide->custom['is_flagship'] ? $slide->custom['date'] : $slide->custom['event_start_date'] ?>
                            </span>
                            <span class="location">
                                <?= $slide->custom['is_flagship'] ? $slide->custom['location'] : $slide->custom['event_location'] ?>
                            </span>
                            <a href="<?= get_the_permalink($slide) ?>">
                                <button class="btn btn-large">LEARN MORE</button>
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