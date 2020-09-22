<div class="pr-quote" id="<?= $anchor ?>"<?php if ($progress_nav_enabled) {
    echo ' data-progress-nav="active"';
} ?> style="background-color: #009fdf; background-image: url('<?= get_template_directory_uri() ?>/assets/images/bg-triangle-darkblue-left.svg'); background-repeat: no-repeat; background-position: left bottom;">
    <div class="row">
        <div class="col-md-3"></div>
        <div class="d-flex justify-content-center">
            <p class="strap">"<?= $quote; ?>"</p>
        </div>
        <div class="col-md-3"></div>
    </div>

    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <p class="client"><?= $person; ?>, <?= $business_title; ?>, <?= $client_name; ?></p>
        </div>
        <div class="col-md-3"></div>
    </div>
</div>    