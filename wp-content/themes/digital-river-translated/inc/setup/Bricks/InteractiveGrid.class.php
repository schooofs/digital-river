<?php

/**
 * For displaying custom bricks
 *
 */
class InteractiveGrid implements Brick
{
	private $headline;
	private $grid;

	public static $backgroundImageDir = "/wp-content/themes/digital-river-translated/img/grid/";

	public static $background_option_pre_html = '<div class="background-option"><img src="';
	public static $background_option_post_html = '" /></div>';

	public static $backgroundOptions = array(
		'global_fulfillment' => 'global_fulfillment.jpg',
		'meeting_4' => 'meeting_4.jpg',
		'working_on_laptop' => 'working_on_a_laptop.jpg',
		'working_together' => 'working_together.jpg',
		'business_call' => 'business_call.jpg',
		'china' => 'china.jpg',
		'cityscape' => 'cityscape.jpg',
		'collaboration' => 'collaboration.jpg',
		'development' => 'development.jpg',
		'meeting' => 'meeting.jpg',
		'meeting_2' => 'meeting_2.jpg',
		'meeting2' => 'meeting2.jpg',
		'meeting_3' => 'meeting_3.jpg',
		'meeting3' => 'meeting3.jpg',
		'online_shopping' => 'online_shopping.jpg',
		'online_shopping2' => 'online_shopping2.jpg',
		'online_shopping3' => 'online_shopping3.jpg',
		'online_shopping4' => 'online_shopping4.jpg',
		'online_shopping5' => 'online_shopping5.jpg',
		'thinking' => 'thinking.jpg',
		'using_phone' => 'using_phone.jpg',
		'using_tablet' => 'using_tablet.jpg',
		'working' => 'working.jpg',
		'working_2' => 'working_2.jpg',
	);

	public static $icon_options = array(
		"fa fa-plus" => "Plus"
	);

	public static $width = array(
		'quarter' => 'col-lg-3 col-sm-6 col-xxs-12',
		'third' => 'col-sm-4 col-xs-6 col-xxs-12',
		'half' => 'col-sm-6 col-xxs-12',
	);

	function __construct($html)
	{
		$this->headline = $headline;
		$this->grid = $grid;
	}

	public static function get_icon_options()
	{
		return self::$icon_options;
	}

	public static function get_background_options()
	{
		$backgroundOptions = array();
		foreach (self::$backgroundOptions as $key => $value) {
			$backgroundOptions[$key] = self::$background_option_pre_html.self::$backgroundImageDir.$value.self::$background_option_post_html;
		}

		return $backgroundOptions;
	}

	public static function display($brick_info)
	{
		echo '<div class="slide">';
			echo '<div class="container">';
				echo '<div class="row">';
					if($brick_info["headline"]){
						echo '<h2 class="text-center">'.$brick_info["headline"].'</h2>';
					}
				echo '</div>';
			echo '</div>';
		    echo '<div class="interactive-grid-wrapper container">';
		        echo '<div class=" interactive-grid">';
		            echo '<div class="row">';
		            foreach ($brick_info["resources"] as $key => $grid_item):
		            	if($grid_item['resource_or_video'] == "resource"){
		            		$resourceInfo = new TmpResource($grid_item['resource']);
		            	}

		            	if($grid_item['link_or_html'] == "link" && $grid_item['resource_or_video'] != "video"){
		            		echo '<a target="_blank" href="'.$resourceInfo->link.'">';
		            	}
		                echo '<div class=" ';
		                echo ($grid_item['resource_or_video'] == "video")? ' active-video ':' active-md ';
		                echo ' ' . self::$width[$grid_item['width']] . ' ';
		                echo ($grid_item['link_or_html'] == "html" || $grid_item['resource_or_video'] == "video")?' interact ':'';
		                echo ' grid-item-wrapper" >';
		                    echo '<div class="grid-item option ' . $grid_item['height'];
		                    echo ($grid_item['resource_or_video'] == "video")? ' embed-responsive embed-responsive-16by9 ':'';
		                    echo ' ">';
		                        if($grid_item['icon']):
		                            echo '<div class="expand hide-on-expand"><i class="'.$grid_item['icon'].'"></i></div>';
		                        endif;

		                        echo '<div class="background-image" style="background-image:url(\'';
		                        	if($grid_item['resource_or_video'] == "video"){
		                        		$image = get_field("resource_section_image", $grid_item['video']->ID);
		                        		echo $image['url'];
		                        	}else{
			                        	echo self::$backgroundImageDir.self::$backgroundOptions[$grid_item['background_options']];
		                        	}
	                        	echo '\');"></div>';
		                    
		                        echo '<div class="close"><i class="fa fa-times fa-lg"></i></div>';


		                        if($grid_item['resource_or_video'] == "video"){


	                        		$video_id = get_field("vimeo_id", $grid_item['video']->ID);
	
									echo '<p class="eng white video-headline">'.$grid_item['headline'].'</p>';

		                            echo '<i class="video-play dr-player x15"></i>';
		                            echo '<iframe class="video embed-responsive-item" style="width: 100%; height: 100%;" id="video_' . $video_id . '" src="https://player.vimeo.com/video/'.$video_id.'?api=1&amp;player_id=video_'.$video_id.'" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>'; 
		                        }else{
		                              echo "<div class='headline-wrapper'>";
		                                  echo "<div class='headline'>";
		                                      echo $grid_item['headline'];
		                                  echo "</div>";
		                              echo "</div>";
		                              if($grid_item['link_or_html'] == "html"){
			                              echo "<div class='description'>";
			                                  echo $grid_item['description'];
			                              echo "</div>";
			                          }
		                        }
		                    echo '</div>';
		                echo '</div>';

		            	if($grid_item['link_or_html'] == "link" && $grid_item['resource_or_video'] != "video"){
		            		echo '</a>';
		                }
		            endforeach;
		            echo '</div>';
		        echo '</div>';
		    echo '</div>';
		echo '</div>';
	}
}