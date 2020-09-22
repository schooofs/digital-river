<?php extract($callout); ?>


    <div class="callout">
        <div class="callout-body text-center">
           <h2 class="heading"><?= $heading ?></h2>
           <div class="body">
                <?= $body ?>
            </div>
            <a href="<?= $button['url'] ?>" class="btn-fresh" ><?= $button['title'] ?></a>
            <a href="<?= $button2['url'] ?>" class="btn-fresh" ><?= $button2['title'] ?></a>
        </div>
    </div>
