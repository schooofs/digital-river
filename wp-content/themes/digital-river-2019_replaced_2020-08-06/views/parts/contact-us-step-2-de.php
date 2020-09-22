<div class="modal-header">
    <h5 class="modal-title" id="contact-form-label">Kontaktiere Uns</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <?php View::make("parts/marketo-form", ["mkto_form_id" => $form_id]); ?>
</div>
