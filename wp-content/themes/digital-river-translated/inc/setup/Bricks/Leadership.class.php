<?php



/**
* For Displaying leadership Bricks
*/
class Leadership implements Brick
{

  public static function display($brick_info)
  {
    ?>
    <style> #template_b .tabbed_content .tab_header img:hover { -webkit-filter: none; -moz-filter: none; -o-filter: none; filter: none; } /* Tabbed Content */ #template_b { .tabbed_content { .tab_header img { width: 100%; padding: 0 .1em .2em 0; cursor: pointer; } .image .overlay.selected { top: 0; left: 0; width: 100%; height: 100%; background: url('#{$image-path}/tc_selected_overlay.png'); position: absolute; } .tab_header { padding: .25em; border: 1px solid $medMedGray; @media (min-width: $screen-lg-desktop) { img {} } img:hover { } .title { width: 89%; height: 2.2em; font-size: 1.5em; line-height: 2.8em; margin-top: 0; position: absolute; bottom: 0; color: $blue; background: url("#{$image-path}/img/name_bg.png"); margin-bottom: 1%; .text { margin-left: .4em; } .arrow { top: .4em; right: 4%; width: 1.8em; height: 1.8em; cursor: pointer; position: absolute; background: url('#{$image-path}tab_down_arrow.png') no-repeat; } .arrow:after { display: none; } .arrow.selected { background: url('#{$image-path}tab_up_arrow.png') no-repeat; bottom: -.3em; right: -1%; } } } .tab { margin-bottom: 1.8em; } .tab  .content { display: none; } .tab_content_container { display: none; position: relative; margin: 0 2% 1.8em 0; padding: 3em .8em  5em .8em; border-top: 2px solid $green; border-bottom: 2px solid $green; .tab_content_container h1 { font-size: 4em; line-height: 1em; color: $blue; font-weight: 300; } .tab_content_container p { margin-top: 2em; } .tab_content_container p:first-of-type { margin-top: 0px; } .tab_content_container .content_exit { font-style: normal; top: 0; right: .4em; width: 3em; height: 2em; display: block; font-size: 1.1em; line-height: 1.9em; position: absolute; text-align: center; color: black; background: $green; font-family: $eng; text-decoration: none; border-top-right-radius: 0; border-bottom-right-radius: 13px; border-bottom-left-radius: 13px; border-top-left-radius: 0; } } } } </style>
    <style>
    #template_b{
      margin-top:30px;
    }

    #template_b .tabbed_content .tab_row:first-of-type {
        margin-top: 2em;
        border-top: none;
        padding-top: 0;
    }
    #template_b .main_content{
      padding-right:50px;
    }

    #template_b .tabbed_content .tab {
        margin-bottom: 1.8em;
        padding: 0 45px 0 15px;
    }

    #template_b .tabbed_content .tab_header .title {
      width: 100%;
      height: 38px;
      font-size: 20px;
      line-height: 37px;
      margin-top: -40px;
      position: relative;
      color:black;
      background: url('http://55x6d1oo46s209smp10ge1wlsl.wpengine.netdna-cdn.com/wp-content/themes/digital-river-translated/img/name_bg.png');
    }

    #template_b .tabbed_content .tab_header .title .arrow {
      top: 10px;
      right: 9px;
      width: 20px;
      height: 20px;
      cursor: pointer;
      position: absolute;
      background: url("/wp-content/themes/digital-river-translated/img/tab_down_arrow.png") no-repeat;
    }

    #template_b .tabbed_content .tab_header .title .arrow.selected {
      background: url("/wp-content/themes/digital-river-translated/img/tab_up_arrow.png") no-repeat;
      bottom: 0;
      right: 9px;
    }

    #template_b .tabbed_content .tab_content_container .content_exit {
      font-style: normal;
      top: 0;
      right: 5px;
      width: 28px;
      height: 24px;
      display: block;
      font-size: 16px;
      line-height: 24px;
      position: absolute;
      text-align: center;
      color: #222021;
      background: #b3d334;
      font-family: 'DIN1451W01-Mittelschrif';
      text-decoration: none;
      -webkit-border-top-right-radius: 0;
      -webkit-border-bottom-right-radius: 13px;
      -webkit-border-bottom-left-radius: 13px;
      -webkit-border-top-left-radius: 0;
      -moz-border-radius-topright: 0;
      -moz-border-radius-bottomright: 13px;
      -moz-border-radius-bottomleft: 13px;
      -moz-border-radius-topleft: 0;
      border-top-right-radius: 0;
      border-bottom-right-radius: 13px;
      border-bottom-left-radius: 13px;
      border-top-left-radius: 0;
      -moz-background-clip: padding-box;
      -webkit-background-clip: padding-box;
      background-clip: padding-box;
    }


    #template_b p {
        padding: 2px 0;
        font-size: 1.2em;
        line-height: 1;
        color: #000;
        font-family: Arial,sans-serif;
        color: #343438;
        line-height: 1.25;
    }

    #template_b .rail p{
      font-size:13px !important;
    }
    </style>
    <section id="template_b" class="content_container container">
      <div class="left_border"></div>
      <div class="row">
        <section class="main_content col-md-8">


          <div class="splitter"></div>
          <div class="content post_content"></div>
          <!-- <div class="content post_content"></div> -->


          <div class="tabbed_content">

            <?php
            /* Left Leadership container */
            $counter = 0;
            foreach($brick_info["leaders"] as $leader){
              if($counter % 2 == 0){
                if($counter != 0){
                  echo '</div>';
                  echo '<div class="tab_content_container clearfix"></div></div>';
                }

                echo '<div class="tab_row">';
                echo '<div class="row">';
              }
              ?>
                <div class="tab col col-md-6 col-xs-6 ">
                  <div class="tab_header">
                    <div class="image">
              
                      <img src="<?php echo $leader['image']['url']?>" alt="">
                      <div class="overlay"></div>
                    </div>
                    <div class="title">
                      <div class="text"><?php echo $leader['name']?></div>
                      <div class="arrow"></div>
                    </div>
                    <div class="tab_content_container clearfix"></div>
                  </div>
                  <section class="content" data-open="false">
                    <a class="content_exit" href="#">X</a>
                    <h3 class="h1 eng"><?php echo $leader['name']?></h3>
                    <p><strong><?php echo $leader['position']?></strong></p>
                    <p><?php echo $leader['description']?></p>
                  </section>
                </div>

              <?php
              $counter++;
              }

              ?>

              </div>
              <div class="tab_content_container clearfix"></div>
            </div>
            <div class="tab_row ">
              <div class="row">
              </div>
              <div class="tab_content_container clearfix"></div>
            </div>
          </div>
        </section>
        <div class="border_left"></div>

                       

        <!-- Sidebar -->
        <section class="rail col-md-4 last col">
          <div class="enhanced_text widget hide_on_mobile">
        
            <h3>Executive Leadership Team</h3>

            <?php foreach($brick_info['leaders'] as $leader ){
              echo '<p><strong>'. $leader['name'] . '</strong><br>' . $leader['position'] . '</p>';
            }
            ?>

          </div>
        </section>
      </div>
    </section>


    <script>
    jQuery(function($) {
      var open = false,
      tab  = false,
      isMobile = $('.hide_on_mobile:visible').length == 0;

      $(window).load(function() {
        // $('#template_b .tabbed_content .tab_header img').greyScale();
      }).resize(function() {
        isMobile = $('.hide_on_mobile:visible').length == 0
      });

      // Stop propogation
      $('.tab_content_container > a').click(function(e) {
        e.stopPropagation();
      });

      // Closes the content
      $('.tab_content_container').on('click', function(e) {
        // Catch anchor tags
        var $target = $(e.target);
        if ($target.is('a') && !$target.hasClass('content_exit')) {
          location.href = $target.attr('href');
          return false;
        }

        e.preventDefault();
        var container = $(this);


        // Hide content container and change arrow status
        container.slideUp({
          duration: 500,
          complete: function() {
            change_status();
            container.html('');
          }
        });
      });

      // Loop through each row and check drawer status on the first tab
      $('.tab_row').each(function() {
        // Get the first tab
        var first_tab = $(this).children('.tab:first'),
        content   = first_tab.children('.content').html(),
        drawer_status = first_tab.children('.content').data('open');

        // If drawer status is open, display content
        if (drawer_status) {
          $(this).children('.tab_content_container').html(content);
        }
      });

      // Click to show content about current tab
      $('.tab_header').click(function(e) {

        var self = $(this);
        var srcElement = $(e.srcElement);

        open = (tab[0] == self[0]) ? true: false;

        change_status();

        //          $('.gray_disabled').switchClass('gray_disabled', 'gray');

        if (!open) {
          open = true;
          tab = self;
          // Get content
          var content = self.siblings('.content').html();

          // Force grayscale
          if ( srcElement.hasClass('text') || srcElement.hasClass('arrow') ) {
            $('canvas', self).fadeOut(500);
          }

          // Change arrow and overlay
          self.find('.arrow').addClass('selected');
          //self.parents('.tab').siblings('.tab').find('.overlay').addClass('selected');
          //self.children('.image').children('img').switchClass('gray', 'gray_disabled', 1000);

          // Display content
          if (isMobile) {
            self.children('.tab_content_container').slideUp(500, function() {
              $('.tab_header').each(function() {
                $(this).children('.tab_content_container').slideUp(500);
              });
              self
              .children('.tab_content_container')
              .html(content)
              .slideDown(1000, function() {
                $('html, body').animate({
                  scrollTop: self.offset().top + self.children('.image').height()
                }, 1000);
              });
            });
          } else {
            var myParent = self.parents('.tab_row');
            myParent.children('.tab_content_container').slideUp(500, function() {
              $('.tab_row').each(function() {
                if ($(this) != myParent) {
                  $(this).children('.tab_content_container').slideUp(500);
                }
              });
              myParent
              .children('.tab_content_container')
              .html(content)
              .slideDown(1000, function() {
                $('html, body').animate({
                  scrollTop: self.offset().top - 60
                }, 1000);
              });
            });
          }
        } else {
          open = false;
          tab = false;
          var container = $(this).parents('.tab_row').children('.tab_content_container');
          var myParent = $(this).parents('.tab_row');

          // Hide content container and change arrow status
          if (isMobile) {
            $('.tab_header').each(function() {
              $(this).find('.tab_content_container').slideUp(500);
            });
          } else {
            $('.tab_row').each(function() {
              if ($(this) != myParent) {
                $(this).children('.tab_content_container').slideUp(500);
              }
            });
          }

          container.slideUp(500, function() {
            container.html('');
          });
        }
      });

      function change_status() {
        $('.tab_header').each(function() {
          if ( $(this).find('.arrow').hasClass('selected') ) {
            $(this).find('.arrow').removeClass('selected');
            $(this).find('canvas').fadeIn(500);
          }
        });
      }
    });
    </script>

    <?php
  }
}
?>
