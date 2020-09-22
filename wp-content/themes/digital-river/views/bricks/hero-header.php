<div class="heroHeader <?= $background_color ?> <?= $vertical_padding === false ? " pad-t-sm-8 pad-b-sm-8 " :  " pad-t-sm-10 pad-b-sm-10 " ?>"  <?php if(isset($background_image)){echo 'style="background-image:url(\''.$background_image.'\')"';} ?>>
    <div class="row"> 
      <div class="col-sm-9 col-md-6">
        <div class="bg-lightBlue pad-t-xxs-4 pad-b-xxs-4 box">
          <div class="row">
            <div class="col-md-9 col-md-offset-2">
              <div class="pad-l-xxs-2 pad-l-md-0">
                  <h3 class="h6 text-uppercase"><?= $top_text_content ?></h3>
                  <h1 class="h1 text-uppercase main-heading"><?= $heading ?></h1>
                  <?= $text_content ?>
                  <?= $link ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>


