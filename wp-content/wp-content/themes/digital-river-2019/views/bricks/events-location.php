<div class="brick-events-location" id="<?= $anchor ?>"<?php if ($progress_nav_enabled) {
    echo ' data-progress-nav="active"';
} ?>
     style="background: -webkit-linear-gradient(64.5deg, <?= $background_bottom_color ?> 49.9%, <?= $background_top_color ?> 50%)">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <?= $body ?>
            </div>
            <div class="col-lg-6">
                <div class="map-container">
                    <iframe src="<?= $google_map_embed_url ?>" width="600" height="450" frameborder="0"
                    style="border:0;"
                            allowfullscreen=""></iframe>
                </div>
            </div>
        </div>
    </div>
</div>