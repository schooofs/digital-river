<div class="pad-t-xxs-4 pad-b-xxs-4 pad-t-md-6 pad-b-md-6">
	<div class="row">
		<div class="col-xxs-12 col-sm-7 col-sm-offset-0 col-md-6 <?= ($position !== "left") ? " col-md-push-6 col-sm-push-5 " : " " ?>">
			<div class="clearfix">
      			<img <?= (isset($lazy) && $lazy === true) ? 'data-original' : 'src'; ?>="<?= $image['url'] ?>" width="726" height="322" class="lazy img-responsive <?= ($position !== "left") ? " pull-right " : "" ?>" />
			</div>
			<div class="row marg-t-xxs-4">
				<div class="col-xxs-10 col-xxs-offset-1">
					<?= $content ?>
				</div>
			</div>
		</div>
		<?php if(count($clients) > 0): ?>
		<div class="col-xxs-12 marg-t-xxs-4 marg-t-sm-0 col-md-6 col-md-offset-0 marg-t-md-8 <?= ($position !== "left") ? " col-md-pull-6 col-sm-pull-7 " : "" ?>">
			<div class="owl-carousel owl-theme client-slider client-feature-wrapper <?= ($position !== "left") ? " right " : "" ?>" <?= ($position !== "left") ? ' data-start="'.count($clients).'" ' : "" ?>>
				<?php foreach($clients as $client): ?>
					<?= $client ?>
				<?php endforeach; ?>
			</div>
		</div>
	    <?php endif; ?>
	</div>
</div>