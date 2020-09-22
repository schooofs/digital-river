<div class="card card-hr col-md-4 col-sm-6 col-xs-12 <?= ($progressive == false) ? " active " : null ?>">
  <a class="no-decoration" href="<?php echo $this->link; ?>">
		<div class="card-inner <?php echo ($this->media == "")?" no-img ":null; ?> ">
      <?php if($this->media != "" && isset($_GET['amp']) === false ): ?>
				<div class="card-image <?php echo ($this->svg == true)?" transparent text-center ":null; echo $this->fields["background_color"]; ?>">
					<img src="<?php echo $this->media; ?>" alt="">
				</div>
      <?php endif; ?>
      <div class="content-wrapper">

			   <h4 class="h3 eng heading txt-black option no-margin"><?php echo $this->title ?></h4>
        <?php if($this->media == ""): ?>
         <p class="light txt-darkGray"><?= substr(strip_tags($this->content), 0, 140)."..." ?></p> 
        <?php endif; ?>
      </div>
      <?php if($this->cat != ""): ?>
       <div class="med txt-black category eyebrow option no-margin"><?php echo $this->cat; ?></div>
      <?php endif; ?>
    </div>
  </a>
</div>