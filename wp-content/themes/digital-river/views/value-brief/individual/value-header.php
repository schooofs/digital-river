<div class=" bg-blue heroHeader <?= $vertical_padding === false ? " pad-t-sm-8 pad-b-sm-8 " :  " pad-t-sm-16 pad-b-sm-16 " ?>" <?php if(isset($vb_background_image)){echo 'style="background-image:url(\''.$vb_background_image.'\')"';} ?>>
    <div class="row"> 
      <div class="col-sm-7 col-md-6">
        <div class="bg-lightBlue pad-t-xxs-4 pad-b-xxs-4 box">
          <div class="row">
            <div class="col-md-9 col-md-offset-2">
              <div class="pad-l-xxs-2 pad-l-md-0">
                  <h3 class="h6 text-uppercase"><?= $top_text_content ?></h3>
                  <h1 class="h1 text-uppercase main-heading"><?= $heading ?></h1>
                  <p style="opacity:1.0;"><?= $text_content ?></p>
                  <?= $link ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php if($vertical_padding !== false): ?>
    <div>
      <button class="btn btn-primary <?= $vertical_padding === true ? $vertical_padding : " activePadding " ?> buttonScroll">
          <i class="fa fa-angle-down arrow"></i>
      </button> 
    </div>
   <?php endif; ?>
</div>