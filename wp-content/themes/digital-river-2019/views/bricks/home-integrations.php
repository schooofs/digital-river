<div class="brick-home-integrations" id="<?= $anchor ?>"<?php if ($progress_nav_enabled) {
    echo ' data-progress-nav="active"';
} ?>>
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-lg-7 col-md-6">
                <h2 class="title"><?= $title ?></h2>
                <p><?= $body ?></p>
                <a href="<?= $cta_url ?>" class="btn btn-large"><?= $cta_text ?></a>
            </div>

            <div class="col-lg-4 col-md-5">
                <?php foreach ($partners as $index => $partner) { ?>
                    <div class="partner">
                        <a href="<?= ($partner['url'] !== '') ? $partner['url'] : 'javascript:void(0)'; ?>"
                           id="home_partner_<?= $index ?>">
                            <img src="<?= $partner['image']['url'] ?>" alt="<?= $partner['image']['alt'] ?>">
                        </a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
