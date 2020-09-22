<?php

/**
 * For displaying custom bricks
 *
 */
class ContactFormTab implements Brick
{
	function __construct() {}

	public static function display()
	{
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>
<script type="text/javascript">
  jQuery(document).ready(function($){
      $('select').select2({
            theme: "bootstrap",
            width: "resolve"
      });
  });
</script>



<form class="contact-us" method="POST"  novalidate="novalidate">

<div class="row">
  <fieldset class="form-group col-xs-6">
      <label for="exampleTextarea">First Name</label>
    <input class="form-control" maxlength="255" name="FirstName" id="FirstName" type="text">
  </fieldset>

  <fieldset class="form-group  col-xs-6">
      <label for="exampleTextarea">Last Name</label>
    <input class="form-control" maxlength="255" name="LastName" id="LastName" type="text">
  </fieldset>

  <fieldset class="form-group  col-xs-6">
      <label for="exampleTextarea">Email Address</label>
    <input class="form-control" maxlength="255" name="Email" id="Email" type="email">
  </fieldset>

  <fieldset class="form-group  col-xs-6">
      <label for="exampleTextarea">Phone Number</label>
    <input class="form-control" maxlength="255" name="Phone" id="Phone" type="tel">
  </fieldset>

  <fieldset class="form-group  col-xs-6">
      <label for="exampleTextarea">Company Name</label>
    <input class="form-control" maxlength="255" name="Company" id="Company" type="text">
  </fieldset>

  <fieldset class="form-group  col-xs-6">
      <label for="exampleTextarea">Country</label>
      <select class="form-control">
          <option value="">Select...</option>
        <?php
            foreach(Countries::$countries as $country){
                echo '<option value="' . $country . '">' . $country . '</option>';
            }
        ?>
      </select>
  </fieldset>
</div>

<fieldset class="form-group">
  <div class="row">
    <div class="radio-wrapper col-xs-4">
      <label>
        <input value="Commerce" name="Business_Unit__c" type="radio">
        Commerce
      </label>
    </div>
    <div class="radio-wrapper col-xs-4">
      <label>
        <input value="World Payments" name="Business_Unit__c" type="radio">
        World Payments
      </label>
    </div>
    <div class="radio-wrapper col-xs-4">
      <label>
        <input value="Marketing"  name="Business_Unit__c" type="radio">
        Marketing
      </label>
    </div>
    <div class="radio-wrapper col-xs-4">
      <label>
        <input value="Customer Service" name="Business_Unit__c" type="radio">
        Customer Service
      </label>
    </div>
  </div>
</fieldset>

<fieldset class="form-group">
  <label for="exampleTextarea">Tell Us More</label>
  <textarea class="form-control" maxlength="1000" rows="4" name="Tell_Us_More__c" id="Tell_Us_More__c"></textarea>
</fieldset>

<div class="checkbox">
  <label>
    <input class="mktoField" value="yes" name="Opted_In__c" type="checkbox"/>
    <strong>Opt In: I wish to receive solution, event and company updates from Digital River via email.</strong>
  </label>
</div>

<input value="DR Website" name="LeadSource" type="hidden">
<input value="" name="Campaign_Medium" type="hidden">
<input value="" name="Campaign_Source" type="hidden">
<input value="" name="Campaign_Term" type="hidden">
<input value="" name="Campaign_ID" type="hidden">
<input value="1" name="contact_submit" type="hidden">
<input value="348-QUY-258" name="munchkinId" type="hidden">

<button id="submit_form" class="btn btn-primary option margin-top" >Send</button>

</form>

<?php

	}
}