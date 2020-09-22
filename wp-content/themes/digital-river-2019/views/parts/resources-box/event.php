
<a href="<?= $link ?>" 
  class="resource-link no-decoration" 
  title="<?= $title ?>" 
  <?= ($external === true) ? ' rel="nofollow" ' : '' ?>
  <?= ($target !== false) ? ' target="'.$target.'" ' : '' ?>
  ga-on="click"
  ga-event-label="<?= $title ?>"
  ga-event-category="Resource Box"
  ga-event-action="click">

  <div class="resource hoverable <?= ($class !== null)? $class:'' ?>" data-name="<?= $title ?>" >
    <?php if(isset($resource) && $resource === true): ?> 
    <div class="clip"><?= $icon ?></div>
    <?php endif; ?>
    <div class="inner-resource">
      <div class="txt-lightBlue"><?= $type ?></div>
      <div class="h6 marg-t-sm-2 marg-b-xxs-0 resource-title"><?= $title ?></div>
      <div><?= $start_date ?> <?= $end_date !== $start_date ? " - ".$end_date : "" ?></div>
      <div><?= $location ?></div>
    </div>
  </div>
</a>

