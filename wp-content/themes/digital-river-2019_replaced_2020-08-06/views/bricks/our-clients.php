<div class="<?= $background_color ?> brick clients-section" id="<?= $anchor ?>"<?php if ($progress_nav_enabled) {
    echo ' data-progress-nav="active"';
} ?>
	 style="<?= (isset($background_image)) ? ' background-image:url(\''.$background_image.'\'); ':'' ?>">
	<div class="row">
		<?php if($content !== null): ?>
		<div class="col-xxs-10 col-xxs-offset-1 col-md-4 col-md-offset-1">
			<?= $content ?>
		</div>
	    <?php endif; ?>
		<?php if(count($clients) > 0): ?>
		<div class="col-xxs-offset-1 col-xxs-10 col-md-4 col-md-offset-<?= $content !== null ? 1 : 6 ?>">
			<div class="row">
				<?php foreach($clients as $client_count => $client): ?>
					<div class="col-xxs-6 <?= ($client_count !== 0 && $client_count !== 1) ? ' marg-t-xxs-6 ':' marg-t-xxs-4 ' ?> marg-t-xxs-2">
						<div class="logo-wrapper">
							<?= $client ?>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		</div>
	    <?php endif; ?>
	</div>
</div>