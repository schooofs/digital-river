 <div class="our-services-wrapper">
     <div class="our-services-inner-wrapper">
         <div class="row">
            <div class="col-xxs-10 col-xxs-offset-1">
                <div class="text-uppercase pad-t-xxs-6">
                    <h2 class="tag">Why work With<br>Digital River</h2>
                </div>  
                <div class="capabilities-wrapper text-center clearfix">
                    <?php foreach ($icon_units as $key => $icon_unit): ?>
                        <div class="capability <?= ($key === 0) ? "active" : null ?>" id="clicky_<?= $key ?>">
                            <div class="capability-icon"><?= ContentFormatter::svg($icon_unit['case_study_icon'], ["color"=>"#002C57", "size"=>"60"]); ?>
                            </div> 
                            <div class="capability-title-wrapper">
                                <div class="h5 capability-title option">
                                 <?= $icon_unit['title'] ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>  
                <div class="pad-b-xxs-3 pad-b-md-6 txt-blue">
                    <?php foreach ($icon_units as $key => $icon_unit): ?>
                           <div class="capability-description-wrapper <?= ($key === 0) ? "active" : null ?> mobile" data-capid="clicky_<?= $key ?>"> 
                               <div class="description-wrapper">
                                <h3 class="h3 capability-header"><?= $icon_unit['title'] ?></h3>
                                <p class="capability-description light">
                                    <?= $icon_unit['description'] ?></p>
                               </div>
                            </div>
                     <?php endforeach; ?>
                 </div>
            </div>
        </div>
    </div>
</div>


