    <div class="footer bg-blue pad-b-xxs-2 pad-b-xxs-10">
       <div class="col-sm-12 pad-t-md-2">
          <button class="btn btn-primary buttonFooter requestButton"><?= ContentFormatter::svg("icons_ArrowSingleUp", ["color"=>"#ffffff", "size"=>35]); ?></button> 
       </div>
        <?php if ( function_exists('yoast_breadcrumb') && ! is_front_page() ): ?>
             <div class="row">
                  <div class="col-xxs-10 col-xxs-offset-1">
                    <?php yoast_breadcrumb('<div class="pad-t-xxs-4 pad-t-sm-2" id="breadcrumbs">','</div>'); ?>
                  </div>
             </div>
        <?php endif; ?>
       <div class="row pad-t-xxs-4 pad-b-xxs-3">
        <div class="col-xxs-10 col-xxs-offset-1 col-sm-5">
           <div style="max-width:200px;">
             <a href="/"><?php include get_template_directory() . "/assets/images/digital-river-logo-white.svg"; ?></a>
            </div>
        </div>
        <div class="col-xxs-10 col-xxs-offset-1 col-xs-6 col-sm-5 col-sm-offset-0 col-md-4 col-md-offset-1 col-lg-3 col-lg-offset-2 pad-t-xxs-2 pad-t-sm-0 ">
            <div class="social-icons pull-right pull-xs-left">
               <a target="_blank" rel="nofollow" href="https://twitter.com/DigitalRiverInc"><div class="social-icon pull-right"><?= ContentFormatter::svg("icons_Twitter", ["color"=>"#03b5e8", "size"=>18]); ?></div></a>
               <a target="_blank" rel="nofollow" href="https://vimeo.com/digitalriver "><div class="social-icon pull-right"><?= ContentFormatter::svg("icons_Vimeo", ["size"=>18]); ?></div></a>
               <a target="_blank" rel="nofollow" href="https://www.linkedin.com/company/digital-river/"><div class="social-icon pull-right"><?= ContentFormatter::svg("icons_LinkedIn", ["color"=>"#03b5e8", "size"=>18]); ?></div></a>
            </div>
            <div class="pull-right pull-xs-left marg-t-xxs-2 marg-t-lg-1">
              <?php if(function_exists('display_language_selector')) display_language_selector(); ?>
            </div>
        </div>
       </div>
        <div class="row">
          <div class="col-xxs-10 col-xxs-offset-1 col-lg-9">
            <div class="footer-menus">
              <?php if (wp_nav_menu( array( 'theme_location' => 'our-offering', 'echo' => false )) !== false) : ?>
                <div class="footer-menu col-md-4 col-sm-5  col-xs-6 pad-t-xxs-1 pad-b-xxs-1 pad-t-xs-0 pad-b-xs-0 marg-t-xs-4 marg-t-sm-0">
                    <div class="h6 marg-t-xxs-1 marg-t-xs-0 marg-b-xxs-1">
                      <?php _e('Our Offerings','digital-river'); ?>
                      <div class="pull-right visible-xxs arrow arrow-up">
                        <span class="up"><?= ContentFormatter::svg("icons_ArrowSquareRight", ["color" => "#ffffff"]) ?></span>
                        <span class="down"><?= ContentFormatter::svg("icons_ArrowSquareDown", ["color" => "#ffffff"]) ?></span>
                      </div>
                    </div>
                    <?php wp_nav_menu(['theme_location' => 'our-offerings', 'menu_class'=>'menu-items list-unstyled']); ?>
                </div>
              <?php endif; ?>
              <?php if (wp_nav_menu( array( 'theme_location' => 'company', 'echo' => false )) !== false) : ?>
              <div class="footer-menu col-md-4 col-sm-4  col-xs-6 pad-t-xxs-1 pad-b-xxs-1 pad-t-xs-0 pad-b-xs-0 marg-t-xs-4 marg-t-sm-0">
                  <div class="h6 marg-t-xxs-1 marg-t-xs-0 marg-b-xxs-1">
                    <?php _e('Company','digital-river'); ?>
                    <div class="pull-right visible-xxs arrow arrow-up">
                      <span class="up"><?= ContentFormatter::svg("icons_ArrowSquareRight", ["color" => "#ffffff"]) ?></span>
                      <span class="down"><?= ContentFormatter::svg("icons_ArrowSquareDown", ["color" => "#ffffff"]) ?></span>
                    </div>
                  </div>
                  <?php wp_nav_menu(['theme_location' => 'company', 'menu_class'=>'menu-items list-unstyled']); ?>
              </div>
              <?php endif; ?>
              <div class="visible-xs  clearfix"></div>
              <?php if (wp_nav_menu( array( 'theme_location' => 'clients', 'echo' => false )) !== false) : ?>
              <div class="footer-menu col-md-4 col-sm-3 col-xs-6 pad-t-xxs-1 pad-b-xxs-1 pad-t-xs-0 pad-b-xs-0 marg-t-xs-4 marg-t-sm-0">
                  <div class="h6 marg-t-xxs-1 marg-t-xs-0 marg-b-xxs-1">
                    <?php _e('Markets','digital-river'); ?>
                    <div class="pull-right visible-xxs arrow arrow-up">
                      <span class="up"><?= ContentFormatter::svg("icons_ArrowSquareRight", ["color" => "#ffffff"]) ?></span>
                      <span class="down"><?= ContentFormatter::svg("icons_ArrowSquareDown", ["color" => "#ffffff"]) ?></span>
                    </div>
                  </div>
                  <?php wp_nav_menu(['theme_location' => 'clients', 'menu_class'=>'menu-items list-unstyled']); ?>
              </div>
              <?php endif; ?>
              <div class="visible-sm  clearfix"></div>
              <?php if (wp_nav_menu( array( 'theme_location' => 'value-added-services', 'echo' => false )) !== false) : ?>
              <div class="footer-menu col-md-4 col-xs-6 pad-t-xxs-1 pad-b-xxs-1 pad-t-xs-0 pad-b-xs-0 marg-t-xs-4 marg-t-md-0">
                  <div class="h6 marg-t-xxs-1 marg-t-xs-0 marg-b-xxs-1">
                    <?php _e('Value-Added Services','digital-river'); ?>
                    <div class="pull-right visible-xxs arrow arrow-up">
                      <span class="up"><?= ContentFormatter::svg("icons_ArrowSquareRight", ["color" => "#ffffff"]) ?></span>
                      <span class="down"><?= ContentFormatter::svg("icons_ArrowSquareDown", ["color" => "#ffffff"]) ?></span>
                    </div>
                  </div>
                  <?php wp_nav_menu(['theme_location' => 'value-added-services', 'menu_class'=>'menu-items list-unstyled']); ?>
              </div>
              <?php endif; ?>
              <div class="visible-xs clearfix"></div>
              <?php if (wp_nav_menu( array( 'theme_location' => 'resources', 'echo' => false )) !== false) : ?>
              <div class="footer-menu col-md-4 col-xs-6 pad-t-xxs-1 pad-b-xxs-1 pad-t-xs-0 pad-b-xs-0 marg-t-xs-4 marg-t-md-0">
                  <div class="h6 marg-t-xxs-1 marg-t-xs-0 marg-b-xxs-1">
                    <?php _e('Resources','digital-river'); ?>
                    <div class="pull-right visible-xxs arrow arrow-up">
                      <span class="up"><?= ContentFormatter::svg("icons_ArrowSquareRight", ["color" => "#ffffff"]) ?></span>
                      <span class="down"><?= ContentFormatter::svg("icons_ArrowSquareDown", ["color" => "#ffffff"]) ?></span>
                    </div>
                  </div>
                  <?php wp_nav_menu(['theme_location' => 'resources', 'menu_class'=>'menu-items list-unstyled']); ?>
              </div>
              <?php endif; ?>
          </div>
          <div class="row no-gutters hidden-sm hidden-md hidden-lg">
            <div class="col-xxs-12">
              <a class="trigger-contact-us btn btn-primary marg-t-xxs-2">Contact <span class="hidden-xxs">Us</span></a>
              <a href="/request-a-demo/" class="btn btn-primary marg-l-xxs-1 marg-l-xs-2 marg-t-xxs-2">Demo <span class="hidden-xxs">Now<span></a>
            </div>
          </div>
        </div> <!-- End of Footer Menu's -->     
              
    <div classs="row">
          <div class="col-xxs-10 col-xxs-offset-1 col-sm-12 col-md-6">
            <div class="pad-t-xxs-4 clearfix "> 
            <?php wp_nav_menu(['theme_location' => 'legal', 'menu_class'=>'menu-items list-unstyled']); ?>
   
            </div>
          </div>
        </div>
        </div>
              
    <style>
          .legal {
              display: inline;
          }
          li + .dividerLine::after {
              content: " |";
          }

        .dynamicYear a{
            color: #fff !important;
        }
       .dynamicYear a::before{
            content: "© 2019 ";
            color: #fff !important;
        }
 
      </style>


      </div>
    </div>