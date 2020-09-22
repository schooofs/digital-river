<section>
  <div class="container bg-white ">
    <div class="row">
      <div class="slide option bottom-double clearfix">
        <div class="col-sm-offset-1 col-sm-10">
          <div class="h2 eng text-center">More in this series...</div>
          <div class="row" >
            <?php if($previous != false): ?>
                <div class=" read-more <?php echo (!$next)?'col-md-12':'col-md-6'; ?>">
                  <div class="read-more-inner clearfix">
                    <div class="text-left slide">
                      <div class="med h4 option no-margin">Part <?php echo $previous['part']; ?>:</div>
                      <div class="h3 keep-reading-header eng option no-margin"><?php echo get_the_title($previous['id']); ?></div>
                      <a href="<?php echo get_permalink($previous['id']); ?>" class="btn btn-opposite option margin-top"><i class="fa fa-long-arrow-left" aria-hidden="true"></i> Keep Reading</a>
                    </div>
                  </div>
                </div>
            <?php endif; ?>
            <?php if($next != false): ?>
                <div class="  read-more <?php echo (!$previous)?'col-md-12':'col-md-6'; ?>">
                  <div class="read-more-inner clearfix">
                    <div class="text-right slide">
                      <div class="h4 med option no-margin">Part <?php echo $next['part']; ?>:</div>
                      <div class="eng h3 keep-reading-header option no-margin"><?php echo get_the_title($next['id']); ?></div>
                      <a href="<?php echo get_permalink($previous['id']); ?>" class="btn btn-opposite option margin-top">Keep Reading <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                    </div>
                  </div>
                </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>