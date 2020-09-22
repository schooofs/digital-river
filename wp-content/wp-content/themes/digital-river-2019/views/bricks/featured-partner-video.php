<div class="brick-about-us-video" id="<?= $anchor ?>"<?php if ($progress_nav_enabled) { echo ' data-progress-nav="active"'; } ?>>
    <div class="video-text" style="background-image: url(/wp-content/themes/digital-river-2019/img/bg-video-text.svg);">
        <div id="myCarousel2" class="carousel slide dr-carousel" data-ride="carousel" data-interval="false">
            <div class="carousel-inner">
                <?php foreach ($slider as $key => $sliderValues): ?>
                    <div class="carousel-item item">
                        <div class="container row">
                            <div class="col-md-6 video-text--copy">
                                <h2><?php echo $sliderValues['slide_title']; ?></h2>
                                <h5 class="mt-n2"><?php echo $sliderValues['slide_subtitle']; ?></h5>
                                <p><?php echo $sliderValues['slide_copy']; ?></p>
                            </div>
                            <div class="col-md-6">
                                <div class="embed-container video-text--video" style="margin-top: -1rem; margin-bottom: 3rem;">
                                    <iframe style="border: 15px solid white; " src='<?php echo $sliderValues['video_url']; ?>' frameborder='0'
                                            webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <ul class="carousel-indicators">
                <?php if (count($slider) >= 2) {
                    $i = 0;
                    foreach ($slider as $key): ?>
                        <li data-target="#myCarousel2" data-slide-to="<?php echo $i; ?>" class="dots"></li>
                        <?php $i++; ?>

                    <?php endforeach;
                } ?>
            </ul>
        </div>
    </div>
</div>
