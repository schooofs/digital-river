<?php
global $post;
$page_fields = get_fields($post->ID);
?>

<?php if (array_key_exists('include_progress_navigation', $page_fields) &&
    $page_fields['include_progress_navigation']) { ?>
    <div class="dr_progress-navigation">
        <div class="dr_progress-bar"><span></span></div>
        <div class="container">
            <div class="row">
                <?php foreach ($page_fields['bricks'] as $brickArr) {
                    $brick = get_post($brickArr['brick']);
                    $brick->custom = get_fields($brick->ID);

                    if (array_key_exists('progress_nav_enabled', $brick->custom) &&
                        $brick->custom['progress_nav_enabled']) {
                        $anchor = '#' . BrickController::create_anchor(preg_replace('#[ -]+#', '-', $brick->custom['label']));
                        ?>

                        <div class="col">
                            <a href="<?= $anchor ?>" class="scroll-link"><?= $brick->custom['label'] ?></a>
                        </div>
                    <?php }
                } ?>
            </div>
        </div>
    </div>
<?php } ?>