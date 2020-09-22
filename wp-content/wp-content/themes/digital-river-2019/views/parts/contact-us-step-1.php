<div class="modal-header">
    <h5 class="modal-title" id="contact-form-label">Contact Us</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<form id="contact-choice-form">
    <div class="modal-body">
        <fieldset name="contact-choice">
            <legend>How can we help you?</legend>
            <p>Please choose one of the following options:</p>

            <div class="input-group">
                <input type="radio" id="billing" value="billing" name="contact-option">
                <label for="billing">I have questions about a “DR+” charge on my billing statement.</label>
            </div>

            <div class="input-group">
                <input type="radio" id="product" value="product" name="contact-option">
                <label for="product">I made a purchase from a Digital River customer. I have a question about a
                    product.</label>
            </div>

            <div class="input-group">
                <input type="radio" id="sales" value="sales" name="contact-option">
                <label for="sales">I’m interested in learning more about your global ecommerce solutions and would like
                    to speak to Digital River Sales.</label>
            </div>
        </fieldset>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary" disabled>Next</button>
    </div>
</form>
