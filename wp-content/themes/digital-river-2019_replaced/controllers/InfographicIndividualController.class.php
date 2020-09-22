<?php

class InfographicIndividualController
{
	public static function content()
	{
		View::make("infographic/individual/content", [
			"infographic" => get_field("infographic")
		]);
	}

	public static function script()
	{
		ob_start();
		?>
		if(Clipboard.isSupported()) {

			 clipboard = new Clipboard('.copy-embed-code');
			  	clipboard.on('success', function(e) {
				    $('.alert-success').show();
				    e.clearSelection();
				    setTimeout(function() {
				      $('.alert-success').hide();
				    }, 2500);
			    })
		} else {
			$(".copy-embed-code").remove();
		}
		<?php
	    if(isset($GLOBALS['scripts'])) {
	      $GLOBALS['scripts'] .= ob_get_clean();
	    } else {
	      $GLOBALS['scripts'] = ob_get_clean();
	    }
	}
	public static function social_links()
	{
		View::make("infographic/individual/social-links");
	}

}