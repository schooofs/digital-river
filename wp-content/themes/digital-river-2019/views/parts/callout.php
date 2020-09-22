<?php extract($callout); ?>

<?php if ($link) { ?>
    <a href="<?= $link ?>">
<?php } ?>
    <div class="callout">
        <div class="img-background" style="background-image: url('<?= $icon['url'] ?>')"></div>

        <div class="callout-body">
            <?php if ($heading) { ?> <h3 class="heading"><?= $heading ?></h3> <?php } ?>
            <?php if ($subheading) { ?> <h3 class="subheading"><?= $subheading ?></h3> <?php } ?>
            <p><?= $body ?></p>
        </div>

        <?php if ($link) { ?>
            <img src="/wp-content/uploads/sites/8/ico-arrow-green.svg" alt="Arrow" class="icon-arrow">
        <?php } ?>
    </div>
<?php if ($link) { ?>
    </a>
<?php } ?>