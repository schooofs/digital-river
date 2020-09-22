<main class="content-detail">
	
<div class="container">
<div class="case-study-outer row">
<div class="background-image-wrapper">
<img data-original="<?= $cs_featured_image['url'] ?>" alt="<?= $cs_featured_image['alt'] ?>" class="case-study-img lazy" />
</div>
<div class="case-study">
<div class="marg-t-xxs-5 col-md-12 col-lg-6 marg-t-lg-3 bg-blue wrapper" style="position:relative; z-index:0; background:transparent;">
<div class="row">
<div class="blueBox pad-t-xxs-6 pad-b-xxs-6 pad-t-sm-6 pad-b-sm-6 col-md-12 col-lg-10" style="background:rgba(3, 181, 232, 0.9);">
<div class="col-md-10 col-md-offset-1">
<h1 class="h3"><?= $cs_intro ?></h1>
<?php if($cs_intro_auth !== ""): ?>
<h6 class="col-sm-offset-1"><?= $cs_intro_auth ?></h6>
<?php endif; ?>
</div>
</div>
</div>
</div>
<div class="col-xxs-10 col-xxs-offset-1 col-lg-5 col-lg-offset-0 pad-t-xxs-2 pad-b-lg-2">
<div class="pad-b-xxs-4">
<div class="row">
<div class="col-md-4 col-lg-12">
<small class="text-uppercase"> <?= __("Company", "digital-river-2019") ?> </small>
<div class="logo-wrapper pad-t-sm-2"> <?= $cs_logo ?> </div>
</div>
<div class="col-md-4 col-lg-12 marg-t-xxs-2 marg-t-md-0 marg-t-lg-2">
<small class="text-uppercase"><?= __("Markets", "digital-river-2019") ?></small>
<div class="h4"><?= $cs_industry ?></div>
</div>
</div>
<div class="row marg-t-md-6 marg-t-lg-2">
<div class="col-md-4 col-lg-12 marg-t-xxs-2 marg-t-md-0 marg-t-lg-2">
<div class="h4"><?= __("The Customer", "digital-river-2019") ?></div>
<p><?= $cs_the_customer ?></p>
</div>
<div class="col-md-4 col-lg-12 marg-t-xxs-2 marg-t-md-0 marg-t-lg-2">
<div class="h4"><?= __("The Challenge", "digital-river-2019") ?></div>
<p><?= $cs_challenge ?></p>
</div>
<div class="col-md-4 col-lg-12 marg-t-xxs-2 marg-t-md-0 marg-t-lg-2">
<div class="h4"><?= __("The Solution", "digital-river-2019") ?></div>
<p><?= $cs_solution ?></p>
</div>
</div>
</div>
</div>
</div>
</div></div>



</main>
