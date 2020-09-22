<div class="blog-heading <?= (isset($image) && $image !== null) ? '  ' : ' brick bg-blue ' ?> blog-heading-<?= get_the_ID() ?>">
	<a href="<?= $link ?>" title="<?php the_title() ?>">
	<?php if(isset($image) && $image !== null): ?>
		<img height="<?= $image['height'] ?>" width="<?= $image['width'] ?>" alt="<?= $image['alt'] ?>" src="<?= $image['url'] ?>" class="img-responsive hidden-xs" style="-webkit-filter: grayscale(100%); filter: grayscale(100%);"/>
	<?php endif; ?>
	<div class="row"> 
	  <div class="col-sm-11 col-md-7 col-lg-6 pad-l-xxs-0 pad-t-sm-8 pad-b-sm-8 hero-overlay">
	    <div class="bg-blue transparent marg-b-md-1">
	      <div class="row">
	        <div class="col-xxs-10 col-xxs-offset-1 col-lg-9 col-lg-offset-2 col-md-9 col-md-offset-2 pad-t-xxs-1 pad-b-md-1">
	        	<h2 class="h3 text-uppercase"><?= __("Blog","digital-river") ?></h2>
	        </div>
	      </div>
	    </div>
	    <div class="bg-lightBlue transparent pad-t-xxs-1 pad-b-xxs-1 pad-t-lg-4 pad-b-lg-4 box">
	      <div class="row">
	        <div class="col-xxs-10 col-xxs-offset-1 col-md-9 col-md-offset-2">
	          <div class="pad-b-lg-1">
	          	  <h1 class="h2 txt-white"><?php the_title() ?></h1>
	          	  <div class="h4 txt-white"><?= __("By: ", "digital-river") . get_the_author(); ?></div>
	          </div>
	        </div>
	      </div>
	    </div>
	  </div>
  </div>
  </a>
</div>
<style>@media(min-width:992px){.blog-heading-<?= get_the_ID() ?>{background-image:url("<?= $image['url'] ?>");}}</style>
