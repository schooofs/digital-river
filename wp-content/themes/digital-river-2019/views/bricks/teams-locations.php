<div class="pad-t-xs-4 pad-b-xs-8">
    <div class="row">
        <div class="pad-t-xs-4 pad-b-xs-4">
            <div class="col-xxs-10 col-xxs-offset-1">
                <div class="row">
                    <div class="col-lg-12 col-xs-12">
                       <div class="h2 tag"><?= $team_title ?></div>
                    </div>
                </div>
                <div class="row bg-white">
                    <?php foreach($teams_locations as $key => $team_location): ?>
                        <div class="col-sm-6 client-feature-wrapper clearfix">
                            <a href="<?= $team_location['link'] ?>">
                            <div class="clip"><?= ContentFormatter::svg($team_location['icon'], ["color"=>"#00a7e1",  "z-index"=>"2"]); ?></div>
                            <div class="client-feature no-link bg-blue 1" style="background-image: url('<?= $team_location ['background_image'] ?>');">
                                <div class="client-feature-inner">
                                    <h2 class="h2 text-uppercase"><?= $team_location ['name_of_location'] ?></h2>
                                    <p><?= $team_location ['address'] ?> <?= $team_location ['country'] ?></p> 
                                    <p> <?= $team_location ['phone'] ?></p>
                                </div>
                            </div>
                            </a>
                        </div>
                        <?php if(($key+1) % 2 === 0): ?>
                            <div class="clearfix hidden-xs"></div>
                        <?php endif; ?>
                <?php endforeach; ?>
                </div>
            </div>
        </div>   
    </div>
</div>
<style type="text/css">
.client-feature-wrapper {margin: 20px 0;}
.client-feature-wrapper .client-feature {height: 350px; max-width: none;}
.client-feature-wrapper .client-feature-inner{min-height: 190px;}
@media (max-width:768px){
	.client-feature-wrapper .client-feature {margin-bottom: 20px;height: 300px;}
}
</style>