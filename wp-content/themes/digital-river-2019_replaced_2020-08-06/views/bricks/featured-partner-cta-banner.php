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
                <form id="mktoForm_6604"></form>
                <script>MktoForms2.loadForm("//app-sj03.marketo.com", "348-QUY-258", 6604);</script>
            </div>
            <div class="col-3 d-xs-none d-sm-none d-md-block pt-5 pr-5" style="background-color: #399ae1;">
                <img class="img-fluid" src="<?=$contact_image['url'] ?>"/>
                <p class="mt-3" style="color: <?= $body_text_colour ?>; font-size: 17px;"><?=$contact_name ?><br><?=$contact_title ?></p>
            </div>
        </div>
    </div>
</div>
