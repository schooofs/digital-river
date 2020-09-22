<div class="brick-partners-image-text" id="<?= $anchor ?>"<?php if ($progress_nav_enabled) {
    echo ' data-progress-nav="active"';
} ?>>
    <div class="image-text-module" style="background:white;">
        <div class="container row image-text-cols">
            <div class="col-lg-6">
                <h2 style="<?php echo $title_colour; ?>"><?php echo $title; ?></h2>
                <?php echo $body_copy; ?>
            </div>

            <div class="col-lg-6"><img src="<?php echo $image; ?>" alt="img"></div>
        </div>
    </div>
</div>


