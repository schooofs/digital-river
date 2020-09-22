<?php

/**
 * For displaying custom bricks
 *
 */
class LandingPageContactForm implements Brick
{
	function __construct() {}

	public static function display($brick_info)
	{
?>

<style>


form.contact-us{
  margin: 0px;
}

.form{
  width:350px;
  margin: 50px auto 0;
}

.loading .contact-us,
.loading .cta-desc{
    opacity:.3;
}

.loading-icon{
    position:absolute;
    top:50%;
    left:50%;
    transform:translate(-50%,-50%);
}

@media (min-width:1000px){
  .form{
    position: fixed;
    top: 110px;
    margin: 0;
    transition:top 300ms;
  }
  
  .form.active{
      top:50px;
  }
}

@media (max-height:875px){
    .download-icon{
        display:none;
    }
}

.persist-wrapper .cta-desc{
    padding:15px;
}

.persist-wrapper .cta-form{
    padding: 0 15px;
}
.form-group {
    margin-bottom: 15px;
}



</style>

    <div class="container">
        <div class="row">
          <div class="persist-wrapper form-wrapper form <?php echo ($brick_info['background_color'] == "green") ? " bg-darkGreen txt-white":" bg-darkGray"; ?>">
                  <div class="cta-desc text-center clearfix">
                     <img class="download-icon" src="/wp-content/themes/digital-river-translated/img/svg/icon.svg" alt="<?php _e("Download Report Icon","digital-river"); ?>" width="50" />
                     <?php echo $brick_info['form_heading']; ?>
                  </div>
                  <form class="contact-us" method="POST" novalidate="novalidate">
                      <div class="cta-form">
                          <div class="row">
                      <fieldset class="form-group small-half overlap col-xs-12 col-xxs-6">
                          <label for="exampleTextarea"><?php _e("First Name","digital-river"); ?></label>
                        <input title="" data-original-title="" class="form-control" maxlength="255" name="firstName" id="FirstName" type="text">
                      </fieldset>
          
                      <fieldset class="form-group small-half overlap  col-xs-12 col-xxs-6">
                          <label for="exampleTextarea"><?php _e("Last Name","digital-river"); ?></label>
                        <input title="" data-original-title="" class="form-control" maxlength="255" name="lastName" id="LastName" type="text">
                      </fieldset>
          
                      <fieldset class="form-group small-half overlap  col-xs-12 col-xxs-6">
                          <label for="exampleTextarea"><?php _e("Email Address","digital-river"); ?></label>
                        <input title="" data-original-title="" class="form-control" maxlength="255" name="email" id="Email" type="email">
                      </fieldset>
          
                      <fieldset class="form-group small-half overlap  col-xs-12 col-xxs-6">
                          <label for="exampleTextarea"><?php _e("Phone Number","digital-river"); ?></label>
                        <input title="" data-original-title="" class="form-control" maxlength="255" name="phone" id="Phone" type="tel">
                      </fieldset>
          
                      <fieldset class="form-group small-half overlap  col-xs-12 col-xxs-6">
                          <label for="exampleTextarea"><?php _e("Company Name","digital-river"); ?></label>
                        <input title="" data-original-title="" class="form-control" maxlength="255" name="company" id="Company" type="text">
                      </fieldset>
          
                      <fieldset class="form-group small-half col-xs-12 col-xxs-6">
                           <select name="Country" class="form-control select2 country" data-placeholder="<?php _e("Select a country","digital-river"); ?>">
                                <option></option>
                                <?php foreach(Countries::$countries as $country): ?>
                                        <option value="<?php echo $country; ?>"><?php echo $country; ?></option>
                                <?php endforeach; ?>
                            </select>
                      </fieldset>
          
                      <div class="checkbox col-xs-12 col-xxs-12">
                        <label>
                          <input value="yes" name="Opted_In__c" type="checkbox">
                          <p class="opt-in" style="font-size:14px; margin:0;"><?php _e("Opt In: I wish to receive solution, event and company updates from Digital River via email.", "digital-river"); ?></p>
                        </label>
                      </div>
                    </div>
          
                  <input value="<?php echo $brick_info['business_unit']; ?>" name="Business_Unit__c" type="hidden">
                  <input value="DR Website" name="LeadSource" type="hidden">
                  <input value="" name="Campaign_Medium" type="hidden">
                  <input value="" name="Campaign_Source" type="hidden">
                  <input value="" name="Campaign_Term" type="hidden">
                  <input value="" name="Campaign_ID" type="hidden">
                  <input name="asset" value="<?php echo $brick_info['asset']; ?>" type="hidden">
                  <input value="" name="cookie" type="hidden">
                  <input value="1" name="contact_submit" type="hidden">
                
                  <input value="348-QUY-258" name="munchkinId" type="hidden">
              </div>
          
                      <button class="btn <?php echo ($brick_info['background_color'] == "green") ? "btn-dark":"btn-primary"; ?> btn-lg btn-block option margin-top submit_form"><?php echo $brick_info['btn_label']; ?> <i class="fa fa-arrow-circle-down"></i></button>
          
                </form>
          </div>
          </div>
      </div>

    
      <script>

          jQuery(document).ready(function($){

                var global_header_height = ($("#global_header").height()/2);
                $(document).on("scroll", function(){
                    var scroll_top = $(document).scrollTop();
                    if((scroll_top >= global_header_height) && !$(".form").hasClass("active")){
                        $(".form").addClass("active");
                    }else if((scroll_top < global_header_height) && $(".form").hasClass("active")){
                       $(".form").removeClass("active"); 
                    }
                });
          });

      </script>

<?php
	}
}