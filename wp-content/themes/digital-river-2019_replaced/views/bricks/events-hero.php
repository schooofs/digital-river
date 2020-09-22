<div class="brick-events-hero progress-nav-active" id="<?= $anchor ?>" data-progress-nav="active">
    <div class="background-pattern" style="background-image: url(<?= get_stylesheet_directory_uri() .
    '/assets/images/hero-pattern.png' ?>);"></div>
    <div class="container">
        <h1><?= $heading ?></h1>
        <p><?= $body ?></p>
        <p class="event-details"><?= $location . ' | ' . $date ?></p>

        <?php if ($rsvp && $registration_open) { ?>
            <div class="links">
                <button type="button" class="btn" data-toggle="modal"
                        data-target="#rsvp-form"><?= $rsvp_text ?></button>
            </div>
        <?php } else if (!$registration_open) { ?>
            <p class="registration-closed"><?= $rsvp_text ?></p>
            <p>Registration Over, Event Concluded</p>
        <?php } ?>
    </div>
</div>

<?php if ($rsvp) { ?>
    <div class="modal fade" id="rsvp-form" tabindex="-1" role="dialog" aria-labelledby="rsvp-form-label"
         aria-hidden="true" data-id="<?= $form_id ?>">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="rsvp-form-label">RSVP</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php View::make("parts/marketo-form", ["mkto_form_id" => $rsvp_form_id]); ?>
                </div>
            </div>
        </div>
    </div>
<?php }
