<div class="modal-header">
    <h5 class="modal-title" id="contact-form-label">お問い合わせ</h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<form id="contact-choice-form">
    <div class="modal-body">
        <fieldset name="contact-choice">
            <legend>お問い合わせ</legend>
            <p>以下のオプションから１つお選びください。</p>

            <div class="input-group">
                <input type="radio" id="billing" value="billing" name="contact-option">
                <label for="billing">DR+の料金の支払いについて質 問があります。</label>
            </div>

            <div class="input-group">
                <input type="radio" id="product" value="product" name="contact-option">
                <label for="product">Digital River の顧客から注文 しました。製品について質問が あります。</label>
            </div>

            <div class="input-group">
                <input type="radio" id="sales" value="sales" name="contact-option">
                <label for="sales">貴社のグローバル e コマースソ リューションについてもっと知 りたいので、Digital River の セールス担当者と話ができます か?</label>
            </div>
        </fieldset>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary" disabled>次へ</button>
    </div>
</form>
