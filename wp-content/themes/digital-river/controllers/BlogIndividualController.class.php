<?php

class BlogIndividualController
{
	public static function heading()
   	{     
		if(isset($_GET['amp'])) {
			View::make("blog/individual/amp/heading", [
				"image" => ["url"=>"http://localhost/wp-content/uploads/2017/07/building.jpg", "alt"=>"Testing This"]
			]);
		} else {
			View::make("blog/individual/heading", [
				"big_image" => get_field("big_image")
			]);
		}
	}

	public static function content()
	{
		if(isset($_GET['amp'])) {
			View::make("blog/individual/amp/content");
		} else {
			View::make("blog/individual/content", [
				"contact_us_form" => ContactForm::make(["class" => "blog-form"])
			]);
		}
	}

	public static function related()
	{
		$post_args = array(
			'posts_per_page' 	=> 3,
			'post__not_in' 		=> [get_the_ID()],
			'date_query'		=> ['after' => date('Y-m-d', strtotime('-6 months'))]
		);

		$post_args['tag__in'] = array_map(function($tag){
			return $tag->term_id;
		},wp_get_post_tags(get_the_ID()));


		// $post_args['category'] = $this->category_id;

		$posts = get_posts($post_args);

		$formatted_posts = [];


		foreach ($posts as $key => $post) {

			ob_start();
		    $category = get_the_category($post->ID);

			View::make("blog/parts/post", [
				"post" => $post,
                "author" => $authors_list,
				"category" => (!$blog_category) ? $category[0]->name : null,
			]);

			$formatted_posts[] = ob_get_clean();

		}

		if(count($formatted_posts) > 0) {
			View::make("blog/individual/related", [
				"heading" => '<h2 class="text-center">' . __("Recent Posts", "digital-river") . '</h2>',
				"posts" => $formatted_posts
			]);
		}
	}

	public static function social_links()
	{
		View::make("blog/individual/social-links");
	}

}