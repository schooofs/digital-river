<div class="side-menu-wrapper">
  <?php if(get_current_blog_id() === 6) : ?>
  <div class="tab btn btn-primary jp-contact-btn"><?= _e("Contact Us", "digital-river") ?></div>
  <?php elseif(get_current_blog_id() === 3) : ?>
  <div class="tab btn btn-primary cn-contact-btn"><?= _e("Contact Us", "digital-river") ?></div>
  <?php elseif(get_current_blog_id() === 2) : ?>
  <div class="tab btn btn-primary de-contact-btn"><?= _e("Contact Us", "digital-river") ?></div>
  <?php else: ?>
  <div class="tab btn btn-primary"><?= _e("Contact Us", "digital-river") ?></div>
  <?php endif; ?>
  <div class="side-menu">
    <div class="close">×</div> 
    <div class="screen active" data-screen="1">
      <div class="h4"><?= _e("How can we help you?", "digital-river") ?></div>
      <p><?= _e("Please choose one of the following options:", "digital-river") ?></p>
        <div class="marg-t-xxs-2">
        <!-- question start-->
        <div class="form-group">                
          <div class="radio-wrapper">
            <input class="radio" id="chargeRadio" value="charge" type="radio" name="sales-option">
            <label class="checkmark" for="chargeRadio"><?= _e("I have questions about a “DR+” charge on my billing statement.", "digital-river") ?></label>
          </div>
        </div>
        <!-- question end-->

        <!-- question start-->
        <div class="form-group">
          <div class="radio-wrapper">
            <input class="radio" id="productRadio" value="product" type="radio" name="sales-option">
            <label class="checkmark" for="productRadio"><?= _e("I made a purchase from a Digital River customer. I have a question about a product.", "digital-river")?></label>
          </div>
        </div>
        <!-- question end-->

        <!-- question start-->
        <div class="form-group">
          <div class="radio-wrapper">
            <input class="radio" id="salesRadio" value="sales" type="radio" name="sales-option">
            <label class="checkmark" for="salesRadio"><?= _e("I’m interested in learning more about your global ecommerce solutions and would like to speak to Digital River Sales.", "digital-river") ?></label>
          </div>
        </div>
        <!-- question end-->
            
        <button class="btn btn-primary marg-t-xxs-2 submit" id="submitSalesOption"><?= _e("Next", "digital-river") ?></button>
            
      </div>
    </div>
    <div class="screen" data-screen="2">
      <div class="alert alert-success marg-b-xxs-1" style="display:none;" data-mkto="<?= get_field("marketo_form_id", 'option') ?>" role="alert"><?= __("Thank you, we will reach out soon!", "digital-river") ?></div>
      <div class="marg-b-xxs-2 form-wrapper">
        <p><?= _e("Fields marked with an * are required.", "digital-river") ?></p>
        <div class="marg-b-xxs-2">
            <?php View::make("parts/contact-us-form", ["mkto_form_id" => get_field("marketo_form_id", 'option')]); ?>
        </div>
        <?php if(get_current_blog_id() === 2) : ?>
        <p>Lesen Sie unsere <a href="/datenschutzrichtlinien/" target="_blank">Datenschutzrichtlinien</a> hier.</p>
        <?php elseif(get_current_blog_id() === 3) : ?>
        <p>请在此处查阅我们的<a href="/隐私承诺/" target="_blank">隐私承诺。</a></p>
        <?php elseif(get_current_blog_id() === 6) : ?>
        <p>弊社の<a href="/のプライバシ-方針/" target="_blank">個人情報保護方針</a>をお読みください。</p>
        <?php else: ?>
        <p>Read our <a href="/corporate-policies/" target="_blank">Privacy Policy</a> here.</p>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>

<div class="bottom-sticky-nav-backdrop"></div>  

<script>

$("#submitSalesOption").prop( "disabled", true );

 $('.radio').click(function() {
    $("#submitSalesOption").prop( "disabled", false );
 });
</script>
