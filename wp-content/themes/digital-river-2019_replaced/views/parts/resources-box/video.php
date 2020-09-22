<div class="resource video bg-blue hoverable play-video <?= ($class !== null) ? $class : '' ?>"
     data-vimeoid="<?= $vimeo_id ?>"
     <?php if (isset($background_image) && $background_image !== null){ ?>style="background-image:url('<?= $background_image ?>');"<?php } ?>
     data-toggle="modal"
     data-target=".videos-modal"
     ga-on="click"
     ga-event-label="<?= $vimeo_id ?>"
     ga-event-value="video"
     ga-event-category="Resource Box"
     ga-event-action="open">
    <?= $icon ?>
    <div class="title"><?= $title ?></div>
</div>