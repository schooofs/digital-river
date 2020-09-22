<div id="upcoming-events" class="bg-blue <?= $vertical_padding === false ? $vertical_padding :  " pad-t-xxs-4 pad-b-xxs-4 " ?>" <?php if(isset($background_image)){echo 'style="background-image:url(\''.$background_image.'\')"';} ?>>
	<div class="row">
		<div class="col-xxs-10 col-xxs-offset-1">
			<h2 class="tag marg-b-xxs-2">Events</h2>
			<div class="row">
				<div class="col-xxs-10 col-xxs-offset-1 col-sm-12 col-sm-offset-0 pad-l-xxs-1 pad-r-xxs-1 pad-l-sm-2 pad-r-sm-2">
					<div id="upcoming-events-slider" class="owl-carousel owl-theme">
						<?php foreach($events as $key => $event): ?>
							<?= ResourceBox::get([
								"type"		=> "event",
								"event"		=> $event,
								"animate"	=> false,
							]); ?>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>



