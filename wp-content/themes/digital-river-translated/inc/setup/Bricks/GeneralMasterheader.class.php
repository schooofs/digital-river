<?php

/**
 * For displaying the top section of different pages 
 *
 */
class GeneralMasterheader implements Brick{

	public static function display($brick_info)
	{
		$header_tag = (isset($brick_info['header_tag'])) ? $brick_info['header_tag'] : "h1";
		echo '<section class="dark-bg bg-darkGreen masthead">';
			echo '<div class="masthead_background slide">';
	    		echo '<div class="container">';
					if ( function_exists('yoast_breadcrumb') ) 
						{yoast_breadcrumb('<p id="breadcrumbs">','</p>');}
					echo '<'.$header_tag.' class="eng">' . $brick_info['headline'] . '</'.$header_tag.'>';
					echo '<p class="lead light">' . $brick_info['subtitle'] . '</p>';
		        echo '</div>';
		    echo '</div>';
		echo '</section>';
	}
}