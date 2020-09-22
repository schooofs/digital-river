<div class="features-table" style="color: <?=$body_text_colour ?>">
    <div class="container">
        <div class="row">
            <h2 style="color: <?=$heading_text_colour ?>;" class="mx-auto pt-5 pb-5"><?=$heading_text ?></h2>
        </div>
        <div class="row" style="background-color: <?=$background_colour ?>; padding: 2.5rem;">
            <div class="d-none d-md-block col col-md-4">
                <div>
                   <!-- This works on local, but there's some really weird bug preventing it from showing this field on staging, so for now we need to hard-code the image until we can investigate. -->
                   <!-- <img class="ml-5 mt-5 pt-5" src="<?=$logo_image['url'] ?>" /> -->
                   <img class="ml-5 mt-5 pt-5" src="<?=get_site_url() ?>/wp-content/uploads/sites/8/salesforce-partner-temp.png" />
                </div> 
                <div>
                    <img style="position: absolute; bottom: 0;" src="<?=get_site_url() ?>/wp-content/uploads/sites/8/Digital-River-Logo_160x70.png" />
                </div>
            </div>
            <div class="col-xs-12 col-md-8">
                <?php
                    $row_count = 0;
                    foreach($rows as $row) {
                        $row_count += 1;
                ?>
                <div class="row" style="<?php if($row_count < 4) { echo "border-bottom: 1px solid $body_text_colour ;"; } ?> padding-bottom: 1rem; <?php if($row_count > 1) { echo "padding-top: 2rem;"; } /* if($row_count == 4) { echo "background-color: $highlighted_row_colour ; color: $highlighted_row_text_colour ;"; } */ ?>">
                    <div class="col col-md-7 row">
                        <div class="col-12 col-md-4 col-lg-2"><img src="<?=$row['icon']['url'] ?>" class="mx-auto" style="height: 32px; width: 32px;" /></div>
                        <div class="col-12 col-md-8 col-lg-10 text-uppercase"><?=$row['heading'] ?></div>
                    </div>
                    <div class="col col-md-5">
                        <ul style="padding: 0;">
                            <?php 
                                foreach($row['bullets'] as $bullet) {
                            ?>
                                    <li style="margin: 0; padding: 0;"><?=$bullet['bullet_text'] ?></li>
                            <?php
                                }
                            ?>
                        </ul>
                    </div>
                </div>
                <?php
                    }
                ?>
            </div>
        </div>
    </div>
</div>
