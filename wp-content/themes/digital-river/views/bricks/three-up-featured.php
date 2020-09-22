<div class="bg-lightGray">
	<div class="awards row pad-t-xxs-8 pad-b-xxs-8">
		<div class="col-xxs-10 col-xxs-offset-1">
			<div class="row">
				<div class="col-sm-12">
					<h3 class="tag h2 "><?= $title ?></h3>
				</div>
			</div>
			<div class="row marg-t-xxs-3 marg-b-xxs-3">
	           <?php foreach ($award_boxes as $key => $award_box): ?>
			    <div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-0 col-lg-4 bg-white">
			    	<a href="<?= $award_box['link'] ?>">
			    	<div class="award wrapper hoverable bg-white pad-l-xxs-4 pad-r-xxs-4 pad-t-xxs-4 pad-b-xxs-4 marg-b-xxs-2"  style="background-color: white;">
			    		<div class="clip">  <?= ContentFormatter::svg($award_box['case_study_icon'], ["color"=>"#03B5E8", "size"=>"80"]); $award_box['case_study_icon'] ?>
	                    </div>
                            <p>
                                <?= ($award_box['type_of_award'] === "award") ? __("Award","digital-river") : $award_box['type_of_award'] ?>
                            </p>
				    	<img src="<?= $award_box['featured_image'] ?>" class="img-responsive img-center pad-t-xxs-4 pad-b-xxs-4">
				    	<p style="color:#003058;"><?= $award_box['description'] ?> </p>
			    	</div>
			    	</a>
			    </div>
	           <?php endforeach; ?>
			</div>
		</div>
	</div>
</div>
