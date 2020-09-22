<?php if ($this->featurePost->svg != true) { ?>
  <style>
    .featured-outer-wrapper .featured-wrapper::before{
      background-image: url("<?php echo get_template_directory_uri(); ?>/img/blog/shadow.png");
    }
      
    .featured-outer-wrapper .featured-wrapper::after{
      background-image: url("<?php echo get_template_directory_uri(); ?>/img/blog/shadow-bottom.png");
    }
  </style>
<?php } ?>
<section>
  <div class="container">

      <div class="social-wrapper">
        <a target="_blank" title="Digital River's Twitter" href="https://twitter.com/DigitalRiverInc">
          <div class="text-center social">
              <i class="fa fa-twitter fa-2x fa-inverse"></i>
          </div>
        </a>
        <a target="_blank" title="Digital River's LinkedIn" href="https://www.linkedin.com/company/digital-river">
          <div class="text-center social">
              <i class="fa fa-linkedin fa-2x fa-inverse"></i>
          </div>
        </a>
        <a target="_blank" title="Digital River's RSS" href="/feed/rss2/">
          <div class="text-center social">
              <i class="fa fa-rss fa-2x fa-inverse"></i>
          </div>
        </a>
      </div>
    <?php if(isset($this->featurePost) && $this->featurePost->media != ""): ?>
      <div data-postid="<?= $this->featurePost->post_id ?>" class="featured-outer-wrapper <?php echo $this->featurePost->fields['background_color']; ?>  <?php echo ($this->featurePost->svg == true)?" transparent ":null; ?>" style="background-image:url('<?php echo $this->featurePost->media; ?>');">
    <?php else: ?>
      <div data-postid="<?= $this->featurePost->post_id ?>" class=" featured-outer-wrapper bg-white">
    <?php endif; ?>  


  	  <div class="<?= (isset($this->featurePost) && $this->featurePost->media != "")?"featured-wrapper":null ?> txt-white text-center">
        <div class="h1 eng <?= ($this->featurePost->media != "")?"blog-header":null ?> option no-margin-btm">
          <span class="no-decoration <?= ($this->featurePost->media != "")?"txt-white":"txt-green" ?>">Digital River Blog</span>
        </div>
      <?php if(isset($this->featurePost) && $this->featurePost->media != ""): ?>
            <a href="<?php echo $this->featurePost->link; ?>">
              <div class="featured-heading bg-dark">
          	  	<div class="eyebrow option no-margin">Commerce</div>
                <h1 class="eng option half-top-margin h3 txt-white"><?php echo $this->featurePost->title; ?></h1>
              </div>
            </a>
        <?php endif; ?>
  		</div>
    </div>
  </div>
</section>
