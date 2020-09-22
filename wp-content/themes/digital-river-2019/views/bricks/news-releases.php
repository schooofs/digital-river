<div class="pad-t-xxs-4">
	<div class="row">
		<div class="col-sm-6 col-sm-offset-3">
			<h2 class="tag marg-b-xxs-2">News<br>Releases</h2>
			<div class="row">
				<div class="col-md-12 col-xs-6 pad-l-xxs-1 pad-r-xxs-1 pad-l-sm-2 pad-r-sm-2">
					<div class="row">
						<?php foreach($pressReleases as $key => $pressRelease): ?>
							<div class="clearfix <?= ($key > 0) ? ' marg-t-md-2 ':' marg-t-md-0 ' ?> marg-t-xxs-2 marg-b-xxs-2 marg-b-md-0 col-sm-12">
								<?= $pressRelease['date']?>
							<p><?= $pressRelease['title'] ?></p>
							</div>
						<?php endforeach; ?> 
					</div>
				</div>
			</div>
			
		</div>
	</div>
</div>