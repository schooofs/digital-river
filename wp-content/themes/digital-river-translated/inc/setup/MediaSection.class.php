<?php
use DigitalRiver\Utility;

/**
 * For displaying custom bricks
 *
 */
class MediaSection implements Brick
{
	function __construct() {}

	public static function display($brick_info)
	{
		$years = range(date("Y"), 2011);

		$selected_year = isset($_GET['show_year']) ? $_GET['show_year'] : date("Y");

		echo $selected_year;

		$green = Utility::$green;

 		$posts = get_posts(array(
 			'post_type'      => $brick_info['media_post_type'],
 			'posts_per_page' => -1,
		   	'date_query' => array(
    	        'after' => sprintf('January 1st, %s', $selected_year),
	            'before' => sprintf('December 31st, %s', $selected_year),
 			)
		));

 		$post_list = array();

		foreach ($posts as $post) {


	 		if ($brick_info['media_post_type'] === "media_coverage") {
	 			$title = get_field("name_of_publication", $post->ID);
	 			$subtitle = $post->post_title;
	 		} else {
	 			$title = $post->post_title;
	 			$subtitle = null;
	 		}


	 		$date = new DateTime($post->post_date);
	 		$timestamp = $date->getTimestamp();

			$post_list[$timestamp] = new DetailedListItem(
				$title, 
				strip_tags($post->post_content),
                (get_field("article_url", $post->ID))?: get_permalink($post->ID),
				array(
					"tag" => date("F jS, Y", strtotime((get_field("article_date", $post->ID))?: $post->post_date)),
					"author" => $subtitle,

				)
            );

		}

		include Utility::get_views_base_dir() . "/views/media_posts.php";
	}
}
