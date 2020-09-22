<div class="brick-feature<?php if (!$padding_bottom) {
    echo ' pb-0';
} ?>" id="<?= $anchor ?>"<?php if ($progress_nav_enabled) {
    echo ' data-progress-nav="active"';
} ?>
     style="background: -webkit-linear-gradient(64.5deg, <?= $background_bottom_color ?> 49.9%, <?= $background_top_color ?> 50%)">
    <div class="container">

        <div class="row<?php if ($image_alignment == 'right') {
            echo ' flex-lg-row-reverse';
        } ?>">
            <div class="col-lg-6">
                <?php if ($image) { ?>
                    <img src="<?= $image['url'] ?>" alt="<?= $image['alt'] ?>">
                <?php } elseif ($video) { ?>
                    <div class="video-container">
                        <iframe src="https://player.vimeo.com/video/<?= $video->custom['vimeo_id'] ?>" width="640"
                                height="360" frameborder="0" title="<?= $video->post_title ?>"
                                webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                    </div>
                <?php } ?>
            </div>
            <div class="col-lg-6">
            <h2><?= $heading ?></h2>
                <?php foreach ($body as $chunk) { ?>
                    <div class="content-chunk">
                        <h3><?= $chunk['heading']; ?></h3>

                    <?php if($chunk['wysiwyg_or_list'] != 'list'): ?>

                        <?= $chunk['body']; ?>

                    <?php else: ?>
                   
                        <ul class="ticked-list">
                            <?php foreach ( $chunk['list'] as $listChunk) { ?>
                            <li><?= $listChunk['list_item']; ?></li>
                            <?php } ?>
                        </ul>
                  
                    <?php endif;?>

                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>