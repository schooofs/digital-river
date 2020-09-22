<div class="pad-t-xxs-4 pad-b-xxs-4">
	<div class="row">
		<div class="col-sm-6 col-sm-offset-3">
			<h2 class="tag marg-b-xxs-2 pad-t-xxs-4 pad-b-xxs-4">Media<br>Cover</h2>
			<div class="row">
				<div class="col-md-12 col-xs-6 pad-l-xxs-1 pad-r-xxs-1 pad-l-sm-2 pad-r-sm-2" >
					<div class="row">

						<?php foreach($mediaCoverages as $key => $mediaCoverage): ?>
							<div class="clearfix <?= ($key > 0) ? ' marg-t-md-2 ':' marg-t-md-0 ' ?> marg-t-xxs-2 marg-b-xxs-2 marg-b-md-0 col-sm-12">
                                <div class="bg-blue col-md-6">
                                 <?php $mediaCoverage['media_logo'] ?>
                                </div>
                            
							<?php
								$dateTime = DateTime::createFromFormat("Ymd", $mediaCoverage['date']);

								if ( is_object($dateTime) ) {
								  $month = $dateTime->format('F');
								  $year = $dateTime->format('Y');
								  $day = $dateTime->format('d');
								  //...
								}
							?>
							<span><?php echo $month . "&nbsp;" . $day . "&nbsp;,&nbsp;" . $year ?></span>
							<p><?= $mediaCoverage['title'] ?></p>

							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>