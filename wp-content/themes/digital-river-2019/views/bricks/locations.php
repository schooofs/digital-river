

<style type="text/css">
	
.locations .client-feature-wrapper {
    margin: 20px 0;
}

.locations .client-feature-wrapper .client-feature {
    height: 350px;
    max-width: none;
}

@media (max-width:768px){
	.locations .client-feature-wrapper .client-feature {
	    margin-bottom: 20px;
	    height: 300px;
}

}

</style>


<div class="pad-t-xxs-6 pad-b-xxs-6 marg-l-xxs-1 marg-l-sm-0 locations">
	<div class="row">
		<div class="col-xxs-10 col-xxs-offset-1">
		    <div class="row">
		        <div class="col-lg-12 col-xs-12">
		           <div class="h2 tag pad-b-xxs-2"><?= $title ?></div>
		        </div>
		    </div>

		  <ul class="nav nav-tabs" role="tablist">
		    <li role="presentation" class="active"><a href="#americas" aria-controls="americas" role="tab" data-toggle="tab"><?= __("Americas","digital-river-2019") ?></a></li>
		    <li role="presentation"><a href="#emea" aria-controls="emea" role="tab" data-toggle="tab"><?= __("EMEA","digital-river-2019") ?></a></li>
		    <li role="presentation"><a href="#apac" aria-controls="apac" role="tab" data-toggle="tab"><?= __("APAC","digital-river-2019") ?></a></li>
		  </ul>
		  <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="americas">
                    <div class="row">
                        <?php foreach($locations as $key => $location): ?>
                            <div class=" col-sm-6 client-feature-wrapper">
                                <div class="client-feature no-link bg-blue 1" style="background-image: url('<?= $location['background_image'] ?>');">
                                    <div class="client-feature-inner">
                                        <h2 class="h2 text-uppercase"><?= $location['location_name'] ?></h2>
                                        <p><?= $location['address'] ?> | <?= $location['country'] ?></p> 
                                        <p><?= $location['phone_number'] ?></p>
                                  </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php if(($key+1) % 2 === 0): ?>
                        <div class="clearfix hidden-xs"></div>
                    <?php endif; ?>
				    </div>
		        </div>
                <div role="tabpanel" class="tab-pane" id="emea">
                     <div class="row">
                            <?php foreach($emea_locations as $key => $emea_location): ?>
                                <div class=" col-sm-6 client-feature-wrapper">
                                    <div class="client-feature no-link bg-blue 1" style="background-image: url('<?= $emea_location['background_image'] ?>');">
                                        <div class="client-feature-inner">
                                            <h2 class="h2 text-uppercase"><?= $emea_location['location_name'] ?></h2>
                                            <p><?= $emea_location['address'] ?> | <?= $emea_location['country'] ?></p> 
                                            <p><?= $emea_location['phone_number'] ?></p>
                                      </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php if(($key+1) % 2 === 0): ?>
                            <div class="clearfix hidden-xs"></div>
                        <?php endif; ?>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane" id="apac">
                     <div class="row">
                            <?php foreach($apac_locations as $key => $apac_location): ?>
                                <div class=" col-sm-6 client-feature-wrapper">
                                    <div class="client-feature no-link bg-blue 1" style="background-image: url('<?= $apac_location['background_image'] ?>');">
                                        <div class="client-feature-inner">
                                            <h2 class="h2 text-uppercase"><?= $apac_location['location_name'] ?></h2>
                                            <p><?= $apac_location['address'] ?> | <?= $apac_location['country'] ?></p> 
                                            <p><?= $apac_location['phone_number'] ?></p>
                                      </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php if(($key+1) % 2 === 0): ?>
                            <div class="clearfix hidden-xs"></div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>			
        </div>
    </div>
</div>
