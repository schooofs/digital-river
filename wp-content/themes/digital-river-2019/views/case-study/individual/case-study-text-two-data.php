
<div class="bg-blue pad-t-xxs-4 pad-b-xxs-4" style="background-image:url(/wp-content/uploads/leading-footer-brick.jpg); background-size:cover; background-repeat:no-repeat;">
    <div class="row text-center">
        <div class="col-sm-10 col-sm-offset-1 pad-t-xxs-6 pad-b-xxs-6">
        <?php
        foreach($cs_data as $key => $cs_single_data):
        ?>
        <div class="col-xxs-10 col-xxs-offset-1 col-xs-6 col-xs-offset-3 col-sm-4 col-sm-offset-1 col-md-3 col-md-offset-2 pad-t-xxs-1 pad-b-xxs-1">
            <div class="quote">
                <?php if($cs_single_data['stat_or_icon'] === "icon"): ?>
                  <?= ContentFormatter::svg($cs_single_data['add_icon_case_study_icon'], ["color" => "#ffffff"]) ?>
                <?php else: ?>
                    <div class="h1 stat">
                        <strong>
                            <?= $cs_single_data['case_study_data_entry']  ?></strong></div>
                <?php endif; ?>
                <p> <?= $cs_single_data['case_study_data_summary'] ?></p>
            </div>
        </div>

        <?php
        endforeach; 
        ?>
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



			


			





			