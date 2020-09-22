<?php $vimeo_id = $cs_video_id ; ?>
<div class="flexbox flexbox-align-center bg-lightGray" style="overflow:hidden;">
	<div class="col-xxs-12 col-md-5 col-md-offset-1 pad-t-xxs-12 pad-b-xxs-12" style="position:relative; z-index:0;">
		<p class="lead"><?= $cs_description ?></p>
	</div>
	<div class="col-xxs-12 col-md-6 text-center" style="position:relative; z-index:0;">
        <a data-vimeoid="<?= $case_study_video_id ?>" data-toggle="modal" data-target=".videos-modal" class=" play-video" role="button">
            <img src="/wp-content/themes/digital-river/assets/images/play-icon-blue.svg" style="z-index: 1; position: absolute; top: 50%; left: 50%;  transform: translate(-50%, -50%); opacity: 0.8;" height="100" width="100" />
            <img src="<?= $cs_default_image['url'] ?>" alt="<?= $cs_default_image['alt'] ?>" class=" btn-lg button-overlay play-button" width="100%" height="100%" />
        </a>
	</div>
</div>
<?php
if(isset($GLOBALS['videos'])) {
	$GLOBALS['videos'] = array_merge($GLOBALS['videos'], [$vimeo_id => true]);
} else {
	$GLOBALS['videos'] = [$vimeo_id => true];
}
?>
