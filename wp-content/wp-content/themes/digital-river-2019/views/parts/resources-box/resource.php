<?php if(isset($resource) && $resource === true): ?> 
  <a href="<?= $link ?>" 
      class="resource-link no-decoration" 
      title="<?= $title ?>" 
      <?= ($external === true) ? ' rel="nofollow" ' : '' ?>
      <?= ($target !== false) ? ' target="'.$target.'" ' : '' ?>
      ga-on="click"
      ga-event-label="<?= $title ?>"
      ga-event-category="Resource Box"
      ga-event-action="click">
<?php endif; ?>
<div class="resource hoverable <?= ($class !== null)? $class:'' ?>" data-name="<?= $title ?>" >
  <?php if(isset($resource) && $resource === true): ?> 
  <div class="clip"><?= $icon ?></div>
  <?php endif; ?>
  <div class="inner-resource">
    <span class="txt-lightBlue"><?= $type ?></span>
    <div class="h6 marg-t-sm-2 marg-b-xxs-0 resource-title"><?= $title ?></div>
     <div><?= $start_date ?></div>
  </div>
</div>
<?php if(isset($resource) && $resource === true): ?>
  </a>
<?php endif; ?>
