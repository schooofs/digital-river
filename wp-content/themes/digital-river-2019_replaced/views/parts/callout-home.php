<?php extract($callout); ?>

<a href="<?= $url ?>">
    <div class="callout">
        <div class="img-background" style="background-image: url('<?= $icon ?>')"></div>

        <div class="callout-body">
            <?= $title ?>
            <?= $copy ?>
        </div>

        <img src="/wp-content/uploads/sites/8/ico-arrow-green.svg" alt="Arrow" class="icon-arrow">
    </div>
</a>
