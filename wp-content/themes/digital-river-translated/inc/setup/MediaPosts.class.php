<?php

use DigitalRiver\Utility;

class MediaPosts
{
	public function display()
	{
		$years = range(date("Y"), 2011);

		$selected_year = isset($_GET['show_year']) ? $_GET['show_year'] : 2016;

		$green = Utility::$green;
 
 		$posts = get_posts(array(
 			'post_type'      => 'post',
 			'posts_per_page' => -1,
		   	'date_query' => array(
    	        'after' => sprintf('January 1st, %s', $selected_year),
	            'before' => sprintf('December 31st, %s', $selected_year),
 			)
		));

 		$post_list = array();

		foreach ($posts as $post) {

			 $post_list[] = new DetailedListItem(
							$post->post_title,
							strip_tags($post->post_content),
							get_permalink($post->ID)
                        );

		}

		include Utility::get_views_base_dir() . "/views/media_posts.php";
	}
}