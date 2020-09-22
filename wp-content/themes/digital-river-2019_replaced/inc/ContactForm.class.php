<?php

class ContactForm
{
  public static function make($args = [])
  {
    ob_start();
    View::make("parts/contact-us-form", [
    	"class"	=> $args['class']
    ]);
    $contact_us_form = ob_get_contents();
    ob_end_clean();
    return $contact_us_form;
  }
}
