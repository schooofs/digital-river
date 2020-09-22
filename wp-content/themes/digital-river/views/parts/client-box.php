<?php if(isset($link) && $link !== null): ?>
<a href="#"
   ga-on="click"
   ga-event-label="<?= $name ?>"
   ga-event-category="Client Box"
   ga-event-action="click">
<?php endif; ?>
<div class="client-feature bg-blue <?= isset($link) ?: ' no-link ' ?>" <?php if(isset($background_image)){ ?>style="background-image: url('<?= $background_image ?>');"<?php } ?>>
    <div class="client-feature-inner">
      <div class="logo-wrapper" <?php if($type === "trust-statement"): ?>  style="margin-bottom:20rem;" <?php else: ?> style="margin-bottom:30rem;"   <?php endif ?>><?= $logo ?></div>
      
    <?php if($type === "trust-statement"): ?>
    <div class="outer-wrapper">
        <div class="trust-statement-wrapper" style="height:0px; position:relative;">
            <p class="lead"  style="position:absolute; bottom:0;">
                <?= $trust_statement ?>
                <br><span class="h4"><?= sprintf("%s %s %s", $name, __("trusts","digital-river"), "Digital River") ?></span>
            </p>
         </div>
    </div>
      <?php else: ?>
         <div class="outer-wrapper" style="height:0px; position:relative;">
            <div class="trust-statement-wrapper" style="position:absolute; bottom:0;">
                <p class="lead client-feature-quote"><i><?= sprintf("%s%s%s",__('"','digital-river'),$quote, __('"','digital-river')) ?></i></p>
                <p class="h4"> <?= $author ?></p>
             </div>
        </div>
            <?php endif; ?>
            <?php if(isset($link)): ?>
      <div class="h1 arrow-link">></div>
      <?php endif; ?>
    </div>
  </div>
<?php if(isset($link) && $link !== null): ?>
</a>
<?php endif; ?>
