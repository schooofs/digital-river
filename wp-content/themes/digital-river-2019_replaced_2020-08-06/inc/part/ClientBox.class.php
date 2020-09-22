<?php

class ClientBox
{
  public static function make($client, $type)
  {
    ob_start();

    $case_study = get_field("case_study", $client['client']->ID);
    View::make("parts/client-box", [
    	"name" => $client['client']->post_title,
       "type" => $type,
       "quote" => get_field("quote", $client['client']->ID),
        "author" => get_field("author", $client['client']->ID),
    	"trust_statement" => get_field("trust_statement", $client['client']->ID),
    	"background_image" => get_field("background_image", $client['client']->ID),
    	"link" => null,
    	"logo" => ContentFormatter::svg("logo/".get_field("logo", $client['client']->ID), ['color'=>"#ffffff"])
    ]);
    $client_box = ob_get_contents();
    ob_end_clean();
    return $client_box;
  }
}