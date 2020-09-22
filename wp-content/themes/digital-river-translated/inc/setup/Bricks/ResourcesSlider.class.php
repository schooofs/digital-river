<?php

/**
 * For displaying custom bricks
 *
 */
class ResourcesSlider implements Brick
{
	function __construct() {}

	public static function display($brick_info)
	{
		?>
	    <style>

	      .detailed-list-item {
	        max-width: 350px;
	      }
	    
	      .owl-nav .prev, .owl-nav .next{
	        position: absolute;
	        top:50%;
	        transform:translateY(-50%);
	      }


	      .owl-nav .prev{
	        left:-5px;
	      }

	      .owl-nav .next{
	        right:-5px;
	      }

	      @media(min-width: 675px){
	        .owl-nav .prev{
	          left:-30px;
	        }

	        .owl-nav .next{
	          right:-30px;
	        }
	      }
	    </style>
		<?php
		echo '<div class="slide">';
			echo '<div class="container">';
				echo '<div class="row">';
					if($brick_info["headline"]){
						echo '<h2 class="text-center">'.$brick_info["headline"].'</h2>';
					}
				echo '</div>';
			echo '</div>';

		$detailed_list_args = array();
		foreach (array_column($brick_info['resources'],"resource") as $key => $resource) {
			$resource_object = new TmpResource($resource);
			$resource_object->linkLabel = "Learn More";
			$detailed_list_args[] = new DetailedListResource(new TmpResource($resource));
		}

		$Detailed_List = new DetailedList($detailed_list_args);
		$Detailed_List->slider();

		echo '</div>';
		
	}
}
