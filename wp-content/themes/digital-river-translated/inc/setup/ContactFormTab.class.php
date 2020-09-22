<?php

/**
 * For displaying custom bricks
 *
 */
class ContactFormTab
{

  function __construct()
  {
    add_action( 'wp_ajax_ajax_display', array(&$this, 'ajax_display') );
    add_action( 'wp_ajax_nopriv_ajax_display', array(&$this, 'ajax_display') );
  }

  public function get_form_values()
  { 
    $leads = new MultipleLeads();
    $leads->filterType = "cookie";
    $leads->filterValues = array($_POST['cookie']);
    $leads->fields = array("firstName", "lastName", "email", "phone", "company", "Country", "Business_Unit__c", "Tell_Us_More__c");
    echo json_encode(json_decode($leads->getData())->result[0]);

    wp_die();
  }

  public function try_associate_lead()
  {
    $cookie = $_POST['cookie'];
    $lead_id = $_POST['lead_id'];

    $associate = new AssociateLead();
    $associate->id = trim($lead_id);
    $associate->cookie = urlencode($cookie);
    print_r($associate->getData());

    wp_die();
  }


  public static function ajax_display()
  {
    self::display();
    wp_die();
  }

	public static function display()
	{
?>
  
  <div class="tab-content">
    <div class="hit-box"></div>

    <div class="form-wrapper bg-lightGray">
      <div class="close">
        <i class="fa fa-times"></i>
      </div>
      <div class="tab btn btn-tertiary btn-lg">Contact Us</div>

      <div class="h1 heading">Contact Us</div>

      <form class="contact-us" method="POST"  novalidate="novalidate">

          <div class="row">
            <fieldset class="form-group small-half overlap col-xs-12 col-xxs-6">
                <label for="exampleTextarea">First Name</label>
              <input class="form-control" maxlength="255" name="firstName" id="FirstName" type="text">
            </fieldset>

            <fieldset class="form-group small-half overlap  col-xs-12 col-xxs-6">
                <label for="exampleTextarea">Last Name</label>
              <input class="form-control" maxlength="255" name="lastName" id="LastName" type="text">
            </fieldset>

            <fieldset class="form-group small-half overlap  col-xs-12 col-xxs-6">
                <label for="exampleTextarea">Email Address</label>
              <input class="form-control" maxlength="255" name="email" id="Email" type="email">
            </fieldset>

            <fieldset class="form-group small-half overlap  col-xs-12 col-xxs-6">
                <label for="exampleTextarea">Phone Number</label>
              <input class="form-control" maxlength="255" name="phone" id="Phone" type="tel">
            </fieldset>

            <fieldset class="form-group small-half overlap  col-xs-12 col-xxs-6">
                <label for="exampleTextarea">Company Name</label>
              <input class="form-control" maxlength="255" name="company" id="Company" type="text">
            </fieldset>

            <fieldset class="form-group small-half col-xs-12 col-xxs-6">
                <select name="Country" class="form-control select2 country" data-placeholder="Select a country">
                  <option></option>
                  <?php
                      foreach(Countries::$countries as $country){
                          echo '<option value="' . $country . '">' . $country . '</option>';
                      }
                  ?>
                </select>
            </fieldset>

            <fieldset class="form-group col-xs-12 col-xxs-12">
              <div class="radio-group">
                <label class="radio-label">Please select your primary area of interest:</label>
                <div class="row">
                  <div class="radio-wrapper col-xxs-6 col-xs-6">
                    <label>
                      <input value="Commerce" name="Business_Unit__c" type="radio">
                      Commerce
                    </label>
                  </div>
                  <div class="radio-wrapper col-xxs-6 col-xs-6">
                    <label>
                      <input value="World Payments" name="Business_Unit__c" type="radio">
                      World Payments
                    </label>
                  </div>
                  <div class="radio-wrapper col-xxs-6 col-xs-6">
                    <label>
                      <input value="Marketing"  name="Business_Unit__c" type="radio">
                      Marketing
                    </label>
                  </div>
                  <div class="radio-wrapper col-xxs-6 col-xs-6">
                    <label>
                      <input value="Customer Service" name="Business_Unit__c" type="radio">
                      Customer Service
                    </label>
                  </div>
                </div>
              </div>
            </fieldset>

            <fieldset class="form-group col-xs-12 col-xxs-12 overlap">
              <label class="textarea" for="exampleTextarea">Tell Us More</label>
              <textarea class="form-control" maxlength="1000" rows="4" name="Tell_Us_More__c" id="Tell_Us_More__c"></textarea>
            </fieldset>

            <div class="checkbox col-xs-12 col-xxs-12">
              <label>
                <input value="yes" name="Opted_In__c" type="checkbox"/>
                <strong class="opt-in">Opt In: I wish to receive solution, event and company updates from Digital River via email.</strong>
              </label>
            </div>
          </div>


          <input value="DR Website" name="LeadSource" type="hidden">
          <input value="" name="Campaign_Medium" type="hidden">
          <input value="" name="Campaign_Source" type="hidden">
          <input value="" name="Campaign_Term" type="hidden">
          <input value="" name="Campaign_ID" type="hidden">
          <input value="" name="campaignContent" type="hidden">
          <input value="1" name="contact_submit" type="hidden">
          <input value="348-QUY-258" name="munchkinId" type="hidden">
          <input value="" name="cookie" type="hidden">

          <button class="btn btn-primary option margin-top submit_form" >Send</button>

      </form>

    </div>
  </div>

<?php

	}
}