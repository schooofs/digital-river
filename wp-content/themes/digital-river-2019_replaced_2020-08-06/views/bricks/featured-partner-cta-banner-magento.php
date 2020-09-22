<?php
    // Temporary duplicate brick of featured-partner-cta-banner.php with hard-coded contact
    // information for Magento since there's a bug where adding information into a brick
    // after modifying the ACF field group doesn't make the new variable available for
    // some reason. Once resolved, this brick should be deleted and a new one should
    // be created from the original, using the variables to populate dynamic data.
    //
    // This is being done because we need to launch quickly. Technical debt :)
?> 
<style> 
    .cta-banner .form-group input {
        height: 40px;
    }
</style>
<div class="cta-banner" id="<?= $anchor ?>"<?php if ($progress_nav_enabled) {
    echo ' data-progress-nav="active"';
} ?> style="background: -moz-linear-gradient(top, <?php echo $gradient_top;?>, <?php echo $gradient_bottom;?>);
    background: -webkit-gradient(linear, left top, left bottom, from(<?php echo $gradient_top;?>), to(<?php echo $gradient_bottom;?>));">
    <div class="container">
        <div class="row flex">
            <div class="col-sm-12 col-md-8 pt-5 pl-5 pr-5" style="background-color: #399ae1;">
                <h2 class="strap" style="color: <?= $body_text_colour ?>">Ready to learn more?</h2> <!-- $body_heading -->
                <p style="color: <?= $body_text_colour ?>"><?=$body_text ?></p>
                <form id="mktoForm_6611"></form>
                <script>MktoForms2.loadForm("//app-sj03.marketo.com", "348-QUY-258", 6611);</script>
            </div>
            <div class="col-3 d-xs-none d-sm-none d-md-block pt-5 pr-5" style="background-color: #399ae1;">
                <img class="img-fluid" src="/wp-content/uploads/sites/8/rajeev.jpg"/>
                <p class="mt-3" style="color: <?= $body_text_colour ?>; font-size: 17px;">Rajeev Khurana<br>Director of Partnership Development</p>
            </div>
        </div>
    </div>
</div>
