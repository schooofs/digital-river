<?php

class Infographic{
  
    public static function display()
    {
        // $infographic = get_field("infographic");
      $infographic = array();
      $infographic['src'] = "/wp-content/themes/digital-river-translated/img/infographics/DR_half_1-01.svg";
      $infographic['alt'] = "United States of America Infographic";

        ?>
      <style>
        svg {
          width:100%;
        }
      </style>
        <div class="slide bg-gray option top-double bottom-double">
            <div class="container infographic-wrapper">
                <!-- <img style="width:100%;" class="img-responsive" src="<?php echo $infographic['src']; ?>" alt="<?php $infographic['alt']; ?>" /> -->
              <?php echo get_template_part('img/infographics/inline', 'USA_infographic.svg'); ?>
            </div>
        </div>

      <script>
      // jQuery(document).ready(function($){
      //     setTimeout(function(){
      //       $(".infographic-wrapper").append('<img style="width:100%;" class="img-responsive" src="/wp-content/themes/digital-river-translated/img/infographics/USA_2.svg" />');
      //     },2000);
      // });
      </script>


        <?php
    }

}