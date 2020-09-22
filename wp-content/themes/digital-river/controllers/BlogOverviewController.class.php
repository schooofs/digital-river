<?php

class BlogOverviewController
{

	public static $number_posts_to_get = 10;

	public function __construct()
	{
		add_action( 'init', array( $this, 'add_admin_menu' ) );
	    add_action( 'wp_ajax_nopriv_see_more_posts', array($this, 'get_more_posts') );
    	add_action( 'wp_ajax_see_more_posts', array($this, 'get_more_posts') );
	}

	public function add_admin_menu()
	{
		acf_add_options_page(array(
			'page_title' 	=> __('Blog Overview Page', 'digital-river'),
			'menu_title'	=> __('Blog Overview', 'digital-river'),
			'menu_slug' 	=> 'blog-overview',
			'capability'	=> 'edit_posts',
			'redirect'		=> false
		));
	}


	public static function heading()
	{
		$blog_category = get_field("blog_category");
		if($blog_category === 571 || $blog_category === 572 || $blog_category === 573 || $blog_category === 72 || $blog_category === 73 || $blog_category === 74 || $blog_category === 75) {
			$featured_post = get_posts(['posts_per_page' => 1, 'category' => $blog_category])[0];
		} else {
			$featured_post = get_field("all_editors_featured", "option");
		}

		global $post; 
		$post = $featured_post;
		setup_postdata( $post );

		View::make("blog/overview/hero", [
			"image" => get_field("big_image", $post->ID),
			"link"	=> get_permalink($post->ID)
		]);

		wp_reset_postdata();
	}

	public static function filter()
	{ 
        if($_ENV === "mycommerce") {

        	$blogid = $current_blog_id = get_current_blog_id();
            View::make("blog/overview/mycommerce-filter", [
			"category" => get_field("blog_category"),
			"blogid"  => $blogid
		]);
        } else {
            View::make("blog/overview/filter", [
			"category" => get_field("blog_category")
		]);
        }
	}
    
 

	public static function content()
	{
		$blog_category = get_field("blog_category");

		if($blog_category === 571) {
			$featured_resources = get_field("commerce_resources", "option");
		} else if ($blog_category === 572) {
			$featured_resources = get_field("monetization_resources", "option");
		} else if($blog_category === 573){
			$featured_resources = get_field("global_resources", "option");
		}else if ($blog_category === 72) {
			$featured_resources = get_field("innovation", "option");
		}else if ($blog_category === 73) {
			$featured_resources = get_field("global_markets", "option");
		}else if ($blog_category === 74) {
			$featured_resources = get_field("subscriptions", "option");
		}else if ($blog_category === 75) {
			$featured_resources = get_field("growth_markets", "option");
		} else {
			$featured_resources = get_field("all_resources", "option");
			$featured_post = get_field("all_editors_featured", "option");
		}

		$formatted_posts = [];
		$resource_count = 0;

		$args = ['posts_per_page' => self::$number_posts_to_get, 'cat' => $blog_category, "post_status" => "publish"];
		if ($featured_post === false) {
			$args['offset'] = 1;
		} else {
			$args['post__not_in'] = [$featured_post->ID];
		}

		$the_query = new WP_Query( $args );

		if($the_query->post_count === self::$number_posts_to_get) {
			$see_more = true;

			array_pop($the_query->posts);
			$the_query->post_count--;

		} else {
			$see_more = false;
		}

		$count = 0;
		while ( $the_query->have_posts() ) {
			$the_query->the_post();

			ob_start();
		    $category = get_the_category();

			View::make("blog/parts/post", [
				"post" => get_post(),
				"author" => $authors_list,
				"category" => (!$blog_category) ? $category[0]->name : null,
			]);

			$formatted_posts[] = ob_get_clean();

			if((!defined('ENV') || ENV !== "mycommerce") && ($count === 0 || $count === 1 || $count === 7)) {

				ob_start();

    			$type = get_field("resource_type_of_resource", $featured_resources[$resource_count]['resource']->ID);
			    $type = ($type !== null) ? $type : 'resource';

			    $resource_type = get_field("resource_type", $featured_resources[$resource_count]['resource']->ID);
			    if($resource_type === "page") {
			      $link = get_field("resource_page", $featured_resources[$resource_count]['resource']->ID);
			    } else if($resource_type === "marketo"){
			      $link = get_field("resource_marketo", $featured_resources[$resource_count]['resource']->ID);
			      $external = true;
			      $target = "_blank";
			    } else {
			      $link = get_field("resource_pdf", $featured_resources[$resource_count]['resource']->ID);
   				}
 
				View::make("blog/parts/featured-resource", [
					"post" => $featured_resources[$resource_count]['resource'],
					"icon" => ContentFormatter::svg(ResourceBox::$icons[$type], ["color" => "#ffffff"]),
					"type" => ResourceBox::get_type($type),
					"link" => $link,
					"external" => isset($external) ? $external : false,
					"target" => isset($target) ? $target : null
				]);

				$formatted_posts[] = ob_get_clean();

				$resource_count++;
			}

			$count++;
		}

		wp_reset_postdata();

		if($blog_category === 571) {
			$editors_pick = get_field("commerce_editors_pick", "option");
		} else if ($blog_category === 572) {
			$editors_pick = get_field("monetization_editors_pick", "option");
		} else if($blog_category === 573){
			$editors_pick = get_field("global_editors_pick", "option");
		}else if($blog_category === 72){
			$editors_pick = get_field("innovation_editors_pick", "option");
		} else if($blog_category === 73){
			$editors_pick = get_field("global_markets_editors_pick", "option");
		} else if($blog_category === 74){
			$editors_pick = get_field("subscriptions_editors_pick", "option");
		} else if($blog_category === 75){
			$editors_pick = get_field("growth_drivers_editors_pick", "option");
		} else {
			$editors_pick = get_field("all_editors_pick", "option");
		}


		ob_start();
		View::make("blog/parts/editors-pick",	[
			"post" => $editors_pick
		]);
   		$editors_pick = ob_get_clean();


		View::make("blog/overview/content", [
			"posts" 		=> $formatted_posts,
			"editors_pick" 	=> $editors_pick,
			"category"		=> $blog_category,
			"see_more" 		=> $see_more
		]);
	}

	public function get_more_posts()
	{
		$formatted_posts = [];
		$the_query = new WP_Query(['posts_per_page' => self::$number_posts_to_get, 'cat' => $_POST['cat'], 'offset' => $_POST['count'], "post_status" => "publish"]);


		if($the_query->post_count === self::$number_posts_to_get) {
			$see_more = true;
			array_pop($the_query->posts);
			$the_query->post_count--;

		} else {
			$see_more = false;
		}

		$count = 0;
		while ( $the_query->have_posts() ) {
			$the_query->the_post();

			ob_start();
		    $category = get_the_category();

		    echo '<div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-0 col-lg-4 marg-t-xxs-2 marg-b-xxs-2">';
			View::make("blog/parts/post", [
				"post" => get_post(),
				"category" => (!$blog_category) ? $category[0]->name : null,
			]);
			echo '</div>';
			
			echo '<script>';
			echo '$(".lazy").lazyload();';
			echo '</script>';
			
			echo (($count + 1) % 2 === 0) ? '<div class="clearfix visible-xs"></div>' : '';
			echo (($count + 1) % 3 === 0) ? '<div class="clearfix hidden-xs"></div>' : '';
			$formatted_posts[] = ob_get_clean();

			$count++;
		}

		echo json_encode([
			"count" 	=> count($formatted_posts)+$_POST['count'],
			"result" 	=> implode("", $formatted_posts),
			"see_more" 	=> $see_more
		]);

		wp_die();
	}


}