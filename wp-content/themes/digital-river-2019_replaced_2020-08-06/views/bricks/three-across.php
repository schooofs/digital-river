<div class="row marg-t-xxs-8 marg-b-xxs-8">
    <div class="col-xxs-10 col-xxs-offset-1">
    	<div class="row marg-b-xxs-4">
            <div class="col-md-8 col-md-offset-2">
                <p> <?= $top_paragraph ?></p>
            </div>
        </div>
        <div class="row">
            <?php 
               foreach ($boxes as $key => $box): ?>
                <div class="col-md-4 col-sm-6 col-xxs-12 marg-t-xxs-3 marg-t-xs-0">
                    <div class="marg-b-xxs-2" width="80" height="80">
                        <?= ContentFormatter::svg($box['case_study_icon'], ["color"=>"#03B5E8", "size"=>"80"]); $box['case_study_icon'] ?>
                    </div>
                    <h5 class="txt-blue"><?= $box['heading'] ?></h5>
                    <p><?= $box['description'] ?> </p>
                </div>  
            <?php endforeach; ?>
        </div>
    </div>
</div>
