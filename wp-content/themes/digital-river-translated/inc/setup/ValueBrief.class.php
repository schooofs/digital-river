<?php

class ValueBrief{
  
  public static function displayContent($content){
    ?>
            <?php if($content['acf_fc_layout'] == "heading_large"): ?>
            <h1 class="large-heading"><?php echo $content['heading_lg']; ?></h1>

            <?php elseif($content['acf_fc_layout'] == "heading_medium"): ?>
            
            <h2 class="medium-heading"><?php echo $content['heading_md']; ?></h2>

            <?php elseif($content['acf_fc_layout'] == "heading_small"): ?>
            <h3><?php echo $content['heading_sm']; ?></h3>

            <?php elseif($content['acf_fc_layout'] == "heading_underline"): ?>
            <h3 class="small-heading"><?php echo $content['heading_ul']; ?></h3>

            <?php elseif($content['acf_fc_layout'] == "paragraph"): ?>
            <div class="wysiwyg-style"><?php echo $content['pg']; ?></div>

            <?php elseif($content['acf_fc_layout'] == "superscript"): ?>
            <sup class="solosup"><?php echo $content['sup']; ?></sup>

            <?php elseif($content['acf_fc_layout'] == "image"): ?>
            <img alt="<?php echo $content['image_select']['alt']; ?>" src="<?php echo $content['image_select']['url']; ?>" />

            <?php endif; ?>

          <?php

  }

  public static function displayColumnType($column_type){
  ?>

          <?php if($column_type == "one-third-col"): ?>
          <div class="col-xs-4">

          <?php elseif($column_type == "one-half-col"): ?>
          <div class="col-xs-6">

          <?php elseif($column_type == "two-thirds-col"): ?>
          <div class="col-xs-8">

          <?php elseif($column_type == "one-col"): ?>
          <div class="col-xs-12">

          <?php else: ?>
          <div class="col-xs-12">

          <?php endif; ?>

          <?php
  }


  public static function display()
  {
    $isPrint = isset($_GET['print'])?true:false;
    $pages = (get_field('add_pages')); 
    ?>

    <div class="page-wrapper">

    <?php foreach ($pages as $key1 => $page) { ?>
    <?php $rows = (get_field('row', $page['page']->ID)); 
    ?>

    <!-- BEGIN PRINT BUTTON -->
    <?php if (is_user_logged_in() == true && !isset($_GET['print'])){ ?>
      <!-- <a href="<?php echo get_page_link(); ?>?print">Print</a> -->
    <?php } ?>
      


              <div class="single-page">


      
      <?php foreach ($rows as $key2 => $row) { ?>

        <?php foreach ($row['columns'] as $key3 => $column) { ?>

             <?php if($column['column_type'] != 'full-width'): ?>

                  <?php if($key3 == 0): ?>
                    <div class="container value-brief">

                        <?php if( get_field('upload_pdf') && $key1 == 0 && $key2 == 0): ?>
                          <a class="printButton" href="<?php the_field('upload_pdf'); ?>"><button class="btn btn-secondary"><?php _e("Export to PDF", "digital-river"); ?></button></a>
                        <?php endif; ?>


                        <div class="row">
                  <?php endif; ?>

             <?php endif; ?>


              <!-- BOOTSTRAP COLUMN -->
              <?php self::displayColumnType($column['column_type']); ?>


          <!-- BOOTSTRAP ROW TYPE -->
          <div class="<?php echo $row['row_type']; ?>">

            <?php if($key3 <= 2): ?>

                    <?php if($column['breakout'] == "on"): ?>
                    <div class="breakout">
                    <?php endif;  ?>


                        <?php 
                        foreach ($column['content'] as $key4 => $content) {
                            self::displayContent($content);
                        }
                        ?>

                    <?php if($column['breakout'] == "on"): ?>
                    </div>
                    <?php endif; ?>
                    <!-- END BREAKOUT -->


            <?php endif; ?>



         
              </div> <!-- END BOOTSTRAP ROW TYPE -->

            </div> <!-- END BOOTSTRAP Column TYPE -->


            <?php if($column['column_type'] != 'full-width'): ?>
                    <!-- END ROW TYPE -->

                      <?php if($key3 == (count($row['columns'])-1) ): ?>
                        </div>
                        </div>
                      <?php endif; ?>
                  <!-- END COLUMNS -->
              <?php endif; ?>



        <?php } ?>



      <!-- END ROW -->
      <?php } ?>

    <?php if (isset($_GET['print'])): ?>
      <?php

        $field_type = "";

        if(get_field("digital_river_or_mycommece") == "myc"):
          $logo = 'img/mycommerce_logo.svg';
        elseif(get_field("digital_river_or_mycommece") == "drwp"):
          $logo = 'img/footer-logo.svg';
          $field_type = "_wp";
        else:
          $logo = 'img/footer-logo.svg';

        endif;
      ?>


    <?php if(count($pages)-1 != $key1): ?>
       <div class="container value-brief" style="position:static; width:88%;">
          <div class="print-footer" style="width: 82%;">

            <?php // echo "<pre>"; print_r(get_fields()); echo "</pre>"; ?>

            <div class="row">
              <div class="col-xs-6">


                <?php echo '<img src="' .get_template_directory_uri()."/".$logo . '" class="imgleft" > '; ?>

              </div>
              <div class="col-xs-6">

                <?php $footerLink = (get_field('footer_url_link')); ?>

                <?php $footerURL = (get_field('footer_url')); ?>

                  <h1><a href="<?php echo $footerLink ?>"><?php echo $footerURL ?></a></h1>

                  <?php $footerTM = (get_field('footer_trademarks')); ?>

                  <h2>&copy;<?php echo date("Y"); ?> Digital River, Inc. | <?php echo $footerTM ?></h2>
              </div>
            </div>
          </div>
        </div>
    <?php else: ?>


    <div class="main-footer" >
      <div class="container value-brief" >

        <div class="row">
          <div class="col-xs-12 ">
            <div class="dividerContainer">
                <div class="divider"></div>
            </div>
            <div class="col-xs-6">
              <div class="row-four-footer">
                <h3 class="footerhd"><?php the_field('about'.$field_type, 'option'); ?></h3>
                <p class="<?php echo ICL_LANGUAGE_CODE; ?> footer-description"><?php the_field('description'.$field_type, 'option'); ?></p>
              </div>
            </div>
            
            <div class="col-xs-6">
              <div class="row-four-footer">
                <h3 class="footerhd"><?php the_field('tag_line'.$field_type, 'option'); ?></h3>

                <ul class="footerlist">
                  <?php $contacts = get_field('contact_list'.$field_type, 'option'); ?>
                  <?php foreach ($contacts as $key => $contact) { ?>
                      <li><?php echo $contact['contact_list_item'] ?></li>
                  <?php } ?>

                </ul>

              </div>
            </div>
          </div>
        </div>

          <div class="print-footer">


            <div class="row">
              <div class="col-xs-6">


                <?php echo '<img src="' .get_template_directory_uri()."/".$logo . '" class="imgleft" > '; ?>

              </div>
              <div class="col-xs-6">

                <?php $footerLink = (get_field('footer_url_link')); ?>

                <?php $footerURL = (get_field('footer_url')); ?>

                  <h1><a href="<?php echo $footerLink ?>"><?php echo $footerURL ?></a></h1>

                  <?php $footerTM = (get_field('footer_trademarks')); ?>

                  <h2>&copy;<?php echo date("Y"); ?> Digital River, Inc. | <?php echo $footerTM ?></h2>
              </div>
            </div>
          </div>
      </div>
      </div>


        <?php endif; ?>

    <?php endif; ?>


    <?php if(count($pages)-1 != $key1): ?>
    <div class="row">
      <div class="dividerHTML"></div>
    </div>
      <?php endif; ?>

      </div> 

    <!-- END CONTAINER -->


    <?php } ?>
   

    </div>





    <?php
  }

}