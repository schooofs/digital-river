<div class="brick-patents" id="<?= $anchor ?>"<?php if ($progress_nav_enabled) {
    echo ' data-progress-nav="active"';
} ?> style="background-color:white;">
    <div class="container">
        <h2 style="color: <?= $heading_colour ?>"><?= $heading ?></h2>

        <div class="row">
            <?php foreach($cards as $card) { ?>
                <div class="col-3">
                    <div class="patent">
                        <img src="<?= $card['image'] ?>" alt="">
                        <p><?= $card['body'] ?></p>
                        <a href="<?= $card['link_url'] ?>"><?= $card['link_text'] ?></a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>