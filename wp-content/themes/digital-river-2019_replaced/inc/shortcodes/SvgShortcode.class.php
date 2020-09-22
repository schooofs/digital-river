<?php

class SvgShortcode
{
	public function __construct()
	{
		add_shortcode('svg', [$this, 'callback']);
	}

	public function callback( $atts = array(), $content = null )
	{
		$args = [];
		if (isset($atts['color'])) {
			$args['color'] = $atts['color'];
		}
		
		if (isset($atts['size'])) {
			$args['size'] = $atts['size'];
		}

		if (isset($atts['class'])) {
			$args['class'] = $atts['class'];
		}

		return ContentFormatter::svg($atts['icon'], $args);;
	}
}