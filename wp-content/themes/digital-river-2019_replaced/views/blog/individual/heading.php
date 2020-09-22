
<div class="blog-heading <?= ($big_image === null) ? ' brick bg-blue ':'' ?>">
	<?php if($big_image !== null): ?>
    <img width="<?= $big_image['width'] ?>" height="<?= $big_image['height'] ?>" alt="<?= $big_image['alt'] ?>" src="<?= $big_image['url'] ?>" class="img-responsive" />
	<?php endif; ?>
	<div class="row"> 
	  <div class="col-sm-11 col-md-7 col-lg-6 pad-l-xxs-0 hero-overlay">
		<div class="bg-blue transparent marg-b-md-1">
	      <div class="row">
	         <div class="col-xxs-10 col-xxs-offset-1 col-lg-9 col-lg-offset-2 col-md-9 col-md-offset-2 pad-t-xxs-1 pad-b-md-1">
                <div class="h3 text-uppercase txt-white"><a href="/resources/" style="color: #ffffff !important;"><?= __(" Blog","digital-river-2019") ?></a></div>
	        </div>
	      </div>
	    </div>
	    <div class="bg-lightBlue transparent pad-t-xxs-1 pad-b-xxs-1 pad-t-lg-4 pad-b-lg-4 box">
	      <div class="row">
	        <div class="col-xxs-10 col-xxs-offset-1 col-md-9 col-md-offset-2">
	          <div>
	          	  <?php the_title('<h1 class="h2 txt-white">', '</h1>') ?>
                  <div class="h4 txt-white"><?= __("By:  ", "digital-river-2019") ?><?php the_author();  ?></div>
	          </div>
	        </div>
	      </div>
	    </div>
      </div>
    </div>
</div>