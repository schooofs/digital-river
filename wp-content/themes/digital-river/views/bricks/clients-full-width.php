<div class="<?= $background_color ?> marg-t-xxs-4 marg-b-xxs-4 marg-t-sm-6 marg-b-sm-6 full-clients-section"
	 style="<?= (isset($background_image)) ? ' background-image:url(\''.$background_image.'\'); ':'' ?>">
	<div class="row">
		<div class="col-xxs-10 col-xxs-offset-1">
			<div class="row">
				<?php if(count($clients) > 0): ?>
					<?php foreach($clients as $key => $client): ?>
						<div class="col-md-3 col-sm-4 col-xxs-6 marg-t-xxs-2 marg-b-xxs-2 marg-t-sm-4 marg-b-sm-4">
							<div class="logo-wrapper">
								<?= $client ?>
							</div>
						</div>
						<?= (($key+1) % 4 == 0) ? '<div class="clearfix visible-xl visible-lg visible-md"></div>':''; ?>
						<?= (($key+1) % 3 == 0) ? '<div class="clearfix visible-sm"></div>':''; ?>
						<?= (($key+1) % 2 == 0) ? '<div class="clearfix visible-xs"></div>':''; ?>
					<?php endforeach; ?>
			    <?php endif; ?>
			</div>
		</div>
	</div>
</div>