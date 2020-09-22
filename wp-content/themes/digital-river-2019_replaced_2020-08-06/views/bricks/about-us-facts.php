<div class="brick-about-us-facts white-bg" id="<?= $anchor ?>"<?php if ($progress_nav_enabled) {
    echo ' data-progress-nav="active"';
} ?>>
    <div class="stats-cols"
         style="background: url(<?php echo $background_image; ?>); background-repeat:no-repeat;">
        <div class="container row">
            <div class="col-md-10">
                <h2 style="color:<?php echo $title_colour; ?>"><?php echo $title; ?></h2>
                <p style="color:<?php echo $intro_text_colour; ?>"><?php echo $intro_text; ?></p>
            </div>
            <div class="flex-stats container row">
                <?php
                $iterationCount = 0.1;
                foreach ($items as $key => $itemsValues) { ?>
                    <div class="col">
                        <img src="<?= $itemsValues['icon'] ?>" alt="fact" data-wow-delay="<?= $iterationCount; ?>s">
                        <p style="color:<?php echo $itemsValues['icon_copy_colour'] ?>" class="wow fadeIn"
                           data-wow-delay="<?= $iterationCount; ?>s"><?php echo $itemsValues['icon_copy'] ?></p>
                    </div>
                    <?php $iterationCount += 0.2;
                } ?>
            </div>
        </div>
    </div>
    <!-- End of stats columns -->
</div>
