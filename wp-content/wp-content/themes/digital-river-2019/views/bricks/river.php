<div class="row river marg-t-xxs-8 marg-b-xxs-8 ml-5 ml-lg-0 <?= ($GLOBALS['river_side'] === "right")? "right":"left" ?>">
  <div class="col-xxs-10 col-xxs-offset-1 col-md-5 col-lg-6 col-sm-offset-1 col-md-offset-0  <?= ($GLOBALS['river_side'] === "right") ? '  ' : '  col-md-push-7 col-lg-push-6 ' ?>">
    <div class="featured-image">
      <img <?= (isset($lazy) && $lazy === true) ? 'data-original' : 'src' ?>="<?= $image['url'] ?>" width="780" height="337" alt="<?= $image['alt'] ?>" class="lazy img-responsive <?= ($GLOBALS['river_side'] === "left") ? " pull-right " : "" ?>" style="width:100%;height: 100%;" />
    </div>
	</div>
	<div class="content-outer-wrapper col-xxs-12 col-xxs-offset-1 col-md-10 col-lg-5 <?= ($GLOBALS['river_side'] !== "right")? " col-md-pull-5 col-lg-pull-6 col-sm-offset-1 ":"  col-md-offset-0 " ?>">
    <div class="row floater" >
		<div class="content-wrapper mt-5 mt-lg-5 mt-xl-0"><?= $content ?></div>
      <?php if($resources !== ""): ?>
      <div class="col-xxs-12 mt-5 resources-outer-wrapper" style="float:<?= ($GLOBALS['river_side'] !== "right")? "right":"left" ?>;">
        <div class="resources-wrapper" style="float: <?= ($GLOBALS['river_side'] === "right")? "right":"left" ?>;">
          <?= $resources ?>
	      </div> 
      </div> 
      <?php endif; ?>
    </div> 
	</div>
</div>