<div class="brick-three-col" id="<?= $anchor ?>"<?php if ($progress_nav_enabled) {
    echo ' data-progress-nav="active"';
} ?>>
    <div class="container" style="border-bottom: 1px solid #7fd3f0;">
        <div class="row mt-5">
            <div class="col">
                <h2>Benefits</h2>
            </div>
        </div>
        <div class="row three-col" style="padding-top: 2rem; padding-bottom: 3rem;">
            <?php foreach ($cards as $key => $card) { ?>
                <div class="col-md-4">
                    <div class="flex-wrap">
                        <div class="image-container" style="display: inline-block">
                            <a href="<?= $card['link'] ?>">
                                <img src="<?= $card['image'] ?>" class="icon wow fadeIn" style="width: 70px; height: auto;" data-wow-delay="" alt="ico" />
                            </a>
                        </div>
                        <div class="content-container wow fadeIn" data-wow-delay="<?= ($key + 1) / 10 ?>s">
                            <h3><?= $card['heading'] ?></h3>
                            <p><?= $card['body'] ?></p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
