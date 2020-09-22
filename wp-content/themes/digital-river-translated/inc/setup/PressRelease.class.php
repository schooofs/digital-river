<?php

class PressRelease {

	public $fields;
	public $object;

	function __construct($post_obj)
	{
		$this->fields = get_fields($post_obj->ID);
		$this->object = $post_obj;

	}	

 	static public function query($args = array())
 	{
		$default_args = array( 
            'post_type' => 'press_release',
            'showposts' => 2,                                
            'suppress_filters' => 0                                
        );  

        return array_map(
        	function($post_object){ return new PressRelease($post_object); },
        	get_posts(array_merge($default_args, $args))
        );
 	}


 	public function get_title()
	{
		return $this->object->post_title;
	}

	public function get_description()
	{
		return $this->fields['short_description'];
	}

	public function get_date()
	{
		return $this->fields['date_published'];
	}

	public function get_link()
	{
		return get_permalink($this->object->ID);
	}
}

