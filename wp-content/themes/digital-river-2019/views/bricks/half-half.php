<div class="<?= $background_color ?>
			brick 
			<?= ($spacing_top !== "default") ? " pad-t-xs-".$spacing_top." ":"" ?> 
			<?= ($spacing_bottom !== "default") ? " pad-b-xs-".$spacing_bottom." ":"" ?>" 
			<?php if($background_image !== "") : ?> style="background-repeat:    no-repeat; background-size: cover; background-image: url(<?= $background_image ?>); <?= ($subject_matter_positioning === "right") ? " background-position: right 0; " : null ?> " >
            <?php endif; ?>

	<div class="row">
		<?php if(isset($center_content)): ?>
		<div class="col-12 text-center marg-b-md-5">
			<?= $center_content ?>
		</div>
		<?php endif; ?>
	</div>
	<div class="row flexbox flexbox-align-center">
		<?php if($left_side !== null): ?>
		<div class="col-xxs-10 col-xxs-offset-1 col-md-5 col-md-offset-1">
			<?= $left_side ?>
		</div>
	    <?php endif; ?>
		<?php if($right_side !== null): ?>
		<div class="col-xxs-10 col-xxs-offset-1 col-md-5 <?= $left_side === null ? "col-md-offset-5":"col-md-offset-0" ?>">
			<?= $right_side ?>
		</div>
	    <?php endif; ?>
	</div>
</div>