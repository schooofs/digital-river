<?php

/**
 *	Class for initializing the set up for dr.com
 *
 */
class EventsInit implements Initialize
{
	public static $post_type_name = 'events';
	public static $post_type_singular = 'Event';
	public static $post_type_plural = 'Events';

	function __construct()
	{
    	add_action( 'init', array( &$this, 'register_events_post_type' ), 0 );
	}

	public function register_events_post_type()
    {

	  	$args = array(
	        'labels' => array(
	            'name' => self::$post_type_plural,
	            'singular_name' => self::$post_type_singular,
	        ),
	        'public' => false,
	        'show_ui' => true,
	        'has_archive' => true,
	        'rewrite' => array('slug' => 'events', 'with_front' => false),
	    );

		register_post_type( self::$post_type_name, $args );


	    // Press Release Categories
	    register_taxonomy('event_category', self::$post_type_name, array(
	        'labels' => array(
	            'name' => __('Categories'),
	            'singular_name' => __('Category'),
	        ),
	        'hierarchical' => true,
	    ));

	    // Press Release Tags
	    register_taxonomy('event_tag', self::$post_type_name, array(
	        'labels' => array(
	            'name' => __('Tags'),
	            'singular_name' => __('Tag'),
	        ),
	        'hierarchical' => false,
	    ));

    }

}