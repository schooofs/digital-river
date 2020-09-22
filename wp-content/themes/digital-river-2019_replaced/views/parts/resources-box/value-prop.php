<div class="resource value-prop <?= ($class !== null)? $class:'' ?>">
  <div class="inner-resource">
    <div class="row">
		<div class="value-prop-icon">
			<?= $icon ?>
		</div>
	    <div class="col-xxs-8 col-xxs-offset-4 col-xs-9 col-xs-offset-3 col-sm-8 col-sm-offset-4 pad-l-xxs-1 pad-l-sm-2 pad-r-xxs-1 pad-r-md-2">
	      <?php if($title !== ""): ?>
	      <div class="h6 marg-b-xxs-1"><strong><?= $title ?></strong></div>
	  	  <?php endif; ?>
	      <?php if($description !== ""): ?>
	      <div class="h6 marg-b-xxs-0"><?= $description ?></div>
	  	  <?php endif; ?>
	    </div>
  	</div>
  </div>
</div>
