
<div class="bg-blue pad-t-md-6 pad-b-md-6" style="background-size:cover; background-repeat:no-repeat;background-image:url(/wp-content/uploads/leading-footer-brick.jpg);">
	<div class="row text-center">
        <div class="col-sm-10 col-sm-offset-1 pad-t-xxs-6 pad-b-xxs-6">
            <div class="row">
				<?php
				foreach($cs_data as $key => $cs_single_data):
				?>
				<div class="col-xxs-10 col-xxs-offset-1 col-xs-6 col-xs-offset-3 col-sm-4 col-lg-3 <?= ($key !== 0) ? "col-lg-offset-1":"" ?> col-sm-offset-0 text-center pad-t-xxs-3 pad-t-md-0">
					<div class="quote">
                        <?php if($cs_single_data['stat_or_icon'] === "icon"): ?>
						  <?= ContentFormatter::svg($cs_single_data['add_icon_case_study_icon'], ["color" => "#ffffff"]) ?>
                        <?php else: ?>
                            <div class="h1 stat"><strong><?= $cs_single_data['case_study_data_entry']  ?></strong></div>
                        <?php endif; ?>
						<p> <?= $cs_single_data['case_study_data_summary'] ?></p>
					</div>
				</div>
				
				<?php
			 	endforeach; 
				?>
                </div><!--closes row-->
        </div>
    </div>
</div>
<style>
    .stat {
        font-size: 70px;
    }
    
    @media (min-width: 992px) {
        .stat {
            font-size: 100px;
        }
    }
 
</style>




