<div class="row marg-t-xxs-8 marg-b-xxs-8">
	<div class="col-xxs-10 col-xxs-offset-1">
		<?= $heading ?>
		<div class="row">
			<?php foreach($posts as $post): ?>
				<div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-0 col-lg-4 marg-t-xxs-2 marg-b-xxs-2">
					<?= $post ?>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>