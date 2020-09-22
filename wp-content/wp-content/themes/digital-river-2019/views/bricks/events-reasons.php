<div class="brick-events-reasons" id="<?= $anchor ?>"<?php if ($progress_nav_enabled) {
    echo ' data-progress-nav="active"';
} ?>>
    <div class="container">
        <h2><?= $heading ?></h2>
        <div class="row">
            <?php foreach ($cards as $card) { ?>
                <div class="col-md-4">
                    <img src="<?= $card['image']['url'] ?>" alt="<?= $card['image']['alt'] ?>">
                    <h3><?= $card['heading'] ?></h3>
                    <p><?= $card['body'] ?></p>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
