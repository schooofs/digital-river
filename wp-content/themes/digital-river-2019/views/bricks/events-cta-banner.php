<div class="brick-events-cta-banner" id="<?= $anchor ?>"<?php if ($progress_nav_enabled) {
    echo ' data-progress-nav="active"';
} ?> style="background: -moz-linear-gradient(top, <?php echo $gradient_top; ?>, <?php echo $gradient_bottom; ?>);
        background: -webkit-gradient(linear, left top, left bottom, from(<?php echo $gradient_top; ?>), to(<?php echo $gradient_bottom; ?>));">
    <div class="container">
        <div class="row flex">
            <h2 class="strap" style="color: <?= $body_text_colour ?>"><?= $body_text ?></h2>

            <button type="button" class="btn" data-toggle="modal"
                    data-target="#rsvp-form"<?php if (!$registration_open) {
                echo ' disabled';
            } ?>><?= $registration_open ? $rsvp_text : 'Registration Closed'
                ?></button>
        </div>
    </div>
</div>