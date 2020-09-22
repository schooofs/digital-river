<?php

/**
 * For displaying custom bricks
 *
 */
class Contact implements Brick
{
	function __construct() {}

	public static function display($brick_info)
	{
		echo '<div class="slide ' . $brick_info['background_color'] . ' " style="color: ' . $brick_info['font_color'] . '">';
     		echo '<div class="container">';
				if($brick_info["headline"]){
					echo '<h2 class="text-center">'.$brick_info["headline"].'</h2>';
				}
        		echo '<p class="text-center lead">'.$brick_info['subheading'].'</p>';
        		echo '<div class="row">';
          			echo '<div class="col-xs-12">';
              			echo '<p class="lead text-center">';
              				// echo ' <strong class="left-border nowrap">'.ContactUsInit::$phone_numbers[$brick_info['phone_number']].'</strong>';
											echo ' <a class="btn btn-opposite" style="text-decoration:none" href="'.$brick_info['button_link'].'" >'.$brick_info['button_label'].'</a>';
											echo ' <span class="lt hidden-xs light" style="margin:0 5px;">'.__("or", "digital-river").'</span>';
											echo ' <span class="lt visible-xs light" style="display:block margin:5px 0;">'.__("or", "digital-river").'</span>';
											echo ' <span class="lt hidden-xs med"> '.__("call us","digital-river").': ' . $brick_info['phone_number'] . '</span>';
											echo ' <span class="lt visible-xs med" style="display:block "> '.__("call us","digital-river").': ' . $brick_info['phone_number'] . '</span>';
          				echo '</p>';
          			echo '</div>';
      			echo '</div>';
        	echo '</div>';
      echo '</div>';
    echo '</div>';
	}
}
