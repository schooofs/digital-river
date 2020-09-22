<div class="brick-two-col" id="<?= $anchor ?>"<?php if ($progress_nav_enabled) {
    echo ' data-progress-nav="active"';
} ?>>
    <div class="container">
        <h2><?= $heading ?></h2>
        <div class="row">
            <?php foreach ($cards as $card) { ?>
                <div class="col-md-6">
                    <?= $card['body'] ?>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
