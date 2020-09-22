
<div class="brick-banner-with-logos" id="<?= $anchor ?>"<?php if ($progress_nav_enabled) {
    echo ' data-progress-nav="active"';
} ?> style="background: -webkit-linear-gradient(64.5deg, #e1f6fe 49.9%, #d9f3fd 50%)">
    <div class="container text-center">
        <?php if ($heading) { ?><h2><?= $heading ?></h2><?php } ?>
        <?php if ($body) { echo $body; } ?>
                <div class="col-12 col-lg-8 offset-lg-2">
                        <div class="row row--logos">               
                <?php 
                $delay = 0;
                foreach ($logos as $logo) { ?>
                    <div class="col col--logo">
                        <img src="<?= $logo['logo']['url']; ?>" class="img-fluid wow fadeIn" data-wow-delay="0.<?= $delay; ?>s" alt="<?= $logo['logo']['title']; ?>">
                    </div>
                <?php 
                $delay++;
                } ?>
                </div>
            </div>
        </div>
    </div>
</div>