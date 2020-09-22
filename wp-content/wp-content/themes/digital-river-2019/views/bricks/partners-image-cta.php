<div class="brick-partners-image-cta" style="margin-bottom:3rem;background-image: url(/wp-content/uploads/sites/8/bg-triangle-lightblue-left.svg);" id="<?= $anchor ?>"<?php if ($progress_nav_enabled) {
    echo ' data-progress-nav="active"';
} ?>>
    <div class="image-cta">
        <div class="container row justify-content-between">
            <div class="col-md-5">
                <a href="<?php echo $left_url ?>">
                    <figure><img src="<?php echo $left_image; ?>" alt=""></figure>
                </a>
                <a href="<?php echo $left_url ?>"><h3><?php echo $left_title; ?></h3></a>
                <a href="<?php echo $left_url ?>">
                    <div class="btn"><?php echo $left_cta; ?></div>
                </a>
            </div>

            <div class="col-md-5">
                <a href="<?php echo $right_url ?>">
                    <figure><img src="<?php echo $right_image; ?>" alt=""></figure>
                </a>
                <a href="<?php echo $right_url ?>"><h3><?php echo $right_title; ?></h3></a>
                <a href="<?php echo $right_url ?>">
                    <div class="btn"><?php echo $right_cta; ?></div>
                </a>
            </div>
        </div>
    </div>
</div>
