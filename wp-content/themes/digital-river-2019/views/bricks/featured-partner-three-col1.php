<div class="brick-three-col" id="<?= $anchor ?>"<?php if ($progress_nav_enabled) {
    echo ' data-progress-nav="active"';
} ?>>
    <div class="container" style="border-bottom: 1px solid #7fd3f0;">
        <div class="row mt-5">
            <div class="col">
                <h2><?=$heading ?></h2>
            </div>
        </div>
        <div class="row three-col" style="padding-top: 2rem; padding-bottom: 1rem;">
            <?php 
                $class = "col-md-4";
                if(sizeof($cards) <= 3) {
                    $class = "col-md-4";
                } elseif(sizeof($cards) == 4) {
                    $class = "col-md-3";
                } elseif(sizeof($cards) >= 5) {
                    $class = "col-md-2";
                }
                foreach ($cards as $key => $card) { ?>
                <div class="<?=$class ?>">
                    <div class="image-container" style="border-bottom: none; padding-bottom: 0; height: 100%;">
                        <a href="<?= $card['link'] ?>">
                            <img src="<?= $card['image'] ?>" class="icon wow fadeIn" style="width: 70px; height: auto;" data-wow-delay="" alt="ico">
                        </a>
                    </div>
                    <div class="content-container wow fadeIn mt-n3" style="width: 100%;" data-wow-delay="<?= ($key + 1) / 10 ?>s">
                        <h3><?= $card['heading'] ?></h3>
                        <p style="text-align: center;"><?= $card['body'] ?></p>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
