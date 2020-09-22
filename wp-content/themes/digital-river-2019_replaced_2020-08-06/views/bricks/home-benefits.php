<div class="brick-home-benefits" id="<?= $anchor ?>"<?php if ($progress_nav_enabled) {
    echo ' data-progress-nav="active"';
} ?>
     style="background-colour:<?php echo $background_colour; ?>;background:url(<?php echo $background_image; ?>);background-repeat:no-repeat;background-size:cover;">
    <div class="row container justify-content-between">
        <div class="col-md-5 wow fadeIn flex-sticky">
            <div class="benefits-left">
                <h2 class="large-title"><?= $title ?></h2>
                <p><?= $copy ?></p>
            </div>
        </div>

        <div class="col-md-7">
            <div class="benefits-right">
                <?php foreach ($right_hand_col as $vals) { ?>
                    <div class="row wow fadeIn" data-wow-delay=".s">
                        <div class="col-md-3">
                            <img class="benefits-icon" src="<?= $vals['icon'] ?>" alt="<?= $vals['title'] ?>">
                        </div>

                        <div class="col-md-9 pad-left-medium-sm">
                            <a href="<?= $vals['url'] ?> ">
                                <h3 class="small-title"><?= $vals['title'] ?></h3>
                            </a>
                            <p><?= $vals['copy'] ?></p>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>