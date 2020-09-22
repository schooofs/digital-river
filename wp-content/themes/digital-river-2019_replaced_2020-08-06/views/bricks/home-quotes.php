<div class="brick-home-quotes" id="<?= $anchor ?>"<?php if ($progress_nav_enabled) {
    echo ' data-progress-nav="active"';
} ?>>
    <div class="container">
        <div class="dr-slider<?php if ($slider_pips_enabled) { echo ' with-pips'; } ?><?php if ($slider_arrows_enabled) { echo ' with-arrows'; } ?>" data-items-per-slide="<?= $items_per_slide ?>">
            <div class="dr-slider-outer">
                <div class="dr-slider-inner row">
                    <?php foreach ($slides as $slide) { ?>
                        <div class="dr-slide col">
                            <div class="quote">
                                <span>“</span>
                                <p><?= $slide['body'] ?></p>
                                <cite><?= $slide['author'] ?></cite>
                                <img src="<?= $slide['logo'] ?>" alt="<?= $slide['logo_alt'] ?>">
                            </div>
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

<?php /*
<div id="myCarousel" class="carousel slide dr-carousel home-quotes" data-ride="carousel" data-interval="50000"
     style="background-image:url('<?php echo $background_image; ?>'">

    <div class="carousel-inner container row ">
        <?php foreach ($quote_slides as $key => $quote_slidesValues) { ?>
            <div class="carousel-item item">
                <div class="carousel-caption">
                    <div class="row">
                        <?php if ($quote_slidesValues['show_quote_marks'] == "Yes") {
                            echo '<div class="col-md-1 quote-marks">“</div>';
                        } else {
                            echo '<div class="col-md-1 quote-marks"></div>';
                        }
                        ?>
                        <div class="col-md-11 quote-body"><?php echo $quote_slidesValues['quote_text'] ?></div>
                    </div>
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-11">
                            <p class="client-details"><?php echo $quote_slidesValues['company_name'] ?>
                                , <?php echo $quote_slidesValues['person_name'] ?>
                                , <?php echo $quote_slidesValues['person_role'] ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-1"></div>
                        <div class="col-md-11">
                            <img class="logo-image"
                                 src="<?php echo $quote_slidesValues['company_logo'] ?>"
                                 alt="<?= $quote_slidesValues['company_name'] ?>">
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>

    <ul class="carousel-indicators">
        <?php if (count($quote_slides) < 2) {
            // no indicators to be shown
        } else {
            $i = 0;

            foreach ($quote_slides as $key) { ?>
                <li data-target="#myCarousel" data-slide-to="<?php echo $i; ?>" class="dots"></li>
                <?php $i++;
            }
        } ?>
    </ul>
</div>
 */ ?>