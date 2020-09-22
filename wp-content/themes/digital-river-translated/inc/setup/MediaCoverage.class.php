<?php

class MediaCoverage {

	public $fields;
	public $object;

	function __construct($post_obj)
	{
		$this->fields = get_fields($post_obj->ID);
		$this->object = $post_obj;

	}	

 	public function get_title()
	{
		return $this->object->post_title;
	}

	public function get_date()
	{
		return $this->fields['article_date'];
	}

	public function get_link()
	{
		return $this->fields['article_url'];
	}
}

