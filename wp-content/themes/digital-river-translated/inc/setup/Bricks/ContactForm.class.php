<?php

/**
 * For displaying custom bricks
 *
 */
class ContactForm implements Brick
{
	function __construct() {}

	public static function display($brick_info)
	{
?>

<?php
    echo '<div class="slide ' . $brick_info['background_color'] . ' ">';
        echo '<div class="container">';
        if($brick_info["headline"]){
          echo '<h2 class="text-center">'.$brick_info["headline"].'</h2>';
        }
          echo '<div class="row">';

?>

  <div class="col-md-offset-2 col-md-8">


  <div class="row">

<form class="contact-us" method="POST"  novalidate="novalidate">

<fieldset class="form-group col-md-6">
    <label for="exampleTextarea"><?php _e("First Name","digital-river"); ?></label>
  <input class="form-control" maxlength="255" name="FirstName" id="FirstName" type="text">
</fieldset>

<fieldset class="form-group col-md-6">
    <label for="exampleTextarea"><?php _e("Last Name","digital-river"); ?></label>
  <input class="form-control" maxlength="255" name="LastName" id="LastName" type="text">
</fieldset>

<fieldset class="form-group col-md-6">
    <label for="exampleTextarea"><?php _e("Email Address","digital-river"); ?></label>
  <input class="form-control" maxlength="255" name="Email" id="Email" type="email">
</fieldset>

<fieldset class="form-group col-md-6">
    <label for="exampleTextarea"><?php _e("Job Title","digital-river"); ?></label>
  <input class="form-control" maxlength="255" name="title" id="title" type="email">
</fieldset>

<fieldset class="form-group col-md-6">
    <label for="exampleTextarea"><?php _e("Company Name","digital-river"); ?></label>
  <input class="form-control" maxlength="255" name="Company" id="Company" type="text">
</fieldset>

<fieldset class="form-group col-md-6">
    <label for="exampleTextarea"><?php _e("Phone Number","digital-river"); ?></label>
  <input class="form-control" maxlength="255" name="Phone" id="Phone" type="tel">
</fieldset>

<fieldset class="form-group col-md-6">
     <select name="Country" class="form-control select2 country" data-placeholder="<?php _e("Select a country","digital-river"); ?>">
          <option></option>
          <?php foreach(Countries::$countries as $country): ?>
                  <option value="<?php echo $country; ?>"><?php echo $country; ?></option>
          <?php endforeach; ?>
      </select>
</fieldset>

<fieldset class="form-group col-md-6">
     <select name="Business_Unit__c" class="form-control select2 country" data-placeholder="<?php _e("I'd like a demo of","digital-river"); ?>">
          <option></option>
          <option value="Commerce">Commerce Solutions</option>
          <option value="Commerce">Marketing Solutions</option>
          <option value="World Payments">Payments Solutions</option
      </select>
</fieldset>

<div class="checkbox col-md-12">
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
<input value="" name="campaignContent" type="hidden">
<input value="1" name="contact_submit" type="hidden">
<input value="" name="cookie" type="hidden">

<input value="348-QUY-258" name="munchkinId" type="hidden">

<div class="col-md-12">
  <button class="btn btn-primary submit_form" >Submit</button>
</div>

</form>

<?php
  echo '</div>';
  echo '</div>';
?>
<div class="col-md-4">
    <div class="image-wrapper">
        <img class="img-responsive" src="/wp-content/uploads/2015/09/demo-store2.png" alt="Digital River Demo Store Preview">
    </div>
</div>
<?php
  echo '</div>';
  echo '</div>';
  echo '</div>';

	}
}