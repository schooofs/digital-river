<div class="row river marg-t-xxs-8 marg-b-xxs-8 <?= ($GLOBALS['river_side'] === "right")? "right":"left" ?>">
  <div class="col-xxs-10 col-xxs-offset-1  col-md-5 col-lg-6 col-sm-offset-1 col-md-offset-0  <?= ($GLOBALS['river_side'] === "right") ? '  ' : '  col-md-push-7 col-lg-push-6 ' ?>">
    <div class="featured-image">
      <img <?= (isset($lazy) && $lazy === true) ? 'data-original' : 'src' ?>="<?= $image['url'] ?>" width="780" height="337" alt="<?= $image['alt'] ?>" class="lazy img-responsive <?= ($GLOBALS['river_side'] === "left") ? " pull-right " : "" ?>" style="width:100%;height: 100%;" />
    </div>
	</div>
	<div class="content-outer-wrapper col-xxs-10 col-xxs-offset-1 col-md-6 col-lg-5 <?= ($GLOBALS['river_side'] !== "right")? " col-md-pull-5 col-lg-pull-6 col-sm-offset-1 ":"  col-md-offset-0 " ?>">
    <div class="col-md-offset-right-10 row floater" >
      <?php if($resources !== ""): ?>
      <div class="col-xxs-12 col-md-6 col-lg-4 resources-outer-wrapper" style="float:<?= ($GLOBALS['river_side'] !== "right")? "right":"left" ?>;">
        <div class="resources-wrapper" style="float: <?= ($GLOBALS['river_side'] === "right")? "right":"left" ?>;">
          <?= $resources ?>
	      </div> 
      </div> 
      <?php endif; ?>
    </div> 
		<div class="content-wrapper marg-t-xxs-3 marg-t-md-5 marg-t-lg-10"><?= $content ?></div>
	</div>
</div>