<?php extract($card); ?>

<a href="<?= $url ?>">
    <div class="card-solution">
        <div class="img-background" style="background-image: url('<?= $icon ?>')"></div>

        <div class="card-solution-body">
            <h3><?= $title ?></h3>
            <p><?= $body ?></p>
        </div>

        <img src="/wp-content/uploads/sites/8/ico-arrow-green.svg" alt="Arrow" class="icon-arrow">
    </div>
</a>
