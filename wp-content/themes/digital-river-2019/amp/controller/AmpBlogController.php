<?php
namespace CustomAmp;

class AmpBlogController
{
	public static function featured_image()
   	{     		
		View::make("featured-image", [
	      "image"     => get_field('small_image'),    
    	]);
	}

	public static function social_share()
   	{     

   		View::make("social-share", [
	      "url"     	=> get_permalink(),
	      "title" 		=> get_the_title(),
	      "encoded_url" => urlencode( $url ),
	      "home_url"	=> home_url(), 
    	]);
	}

	public static function custom_footer()
   	{     		
		View::make("footer", [
	      "home_url"		=> home_url(),
	      "contact_link"   	=> "http://info.digitalriver.com/Contact-Digital-River.html",
    	]);
	}
}