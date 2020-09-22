<div class="cta-banner" id="<?= $anchor ?>"<?php if ($progress_nav_enabled) {
    echo ' data-progress-nav="active"';
} ?> style="background: -moz-linear-gradient(top, <?php echo $gradient_top;?>, <?php echo $gradient_bottom;?>);
    background: -webkit-gradient(linear, left top, left bottom, from(<?php echo $gradient_top;?>), to(<?php echo $gradient_bottom;?>));">
    <div class="container">
        <div class="row flex">
            <h2 class="strap" style="color: <?= $body_text_colour ?>"><?= $body_text ?></h2>

            <a href="<?= $cta_url ?>">
                <div class="cta btn" style="background:<?= $cta_colour ?>">
                    <?= $cta_text ?>
                </div>
            </a>
        </div>
    </div>
</div>



