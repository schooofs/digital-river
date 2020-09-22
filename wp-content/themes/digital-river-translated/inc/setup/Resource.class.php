<?php

class TmpResource {

	public $ID;
	public $link;
	public $external;
	public $title;
	public $type;
	public $description;
	public $linkLabel;


	function __construct($resource_post_object)
	{
		$this->external = get_field( "resource-type", $resource_post_object->ID ) == "external";
		$this->ID = $resource_post_object->ID;
		$this->link = $this->external ? get_field( "link", $resource_post_object->ID ) : get_permalink($resource_post_object->ID);
		$this->title = $this->external ? get_field( "title", $resource_post_object->ID ) : $resource_post_object->post_title;
      	$this->setType(__(get_field( "content_type", $resource_post_object->ID ), "digital-river"));
      	$this->description = get_field( "description", $resource_post_object->ID );
      	$this->linkLabel =  get_field( "link_title", $resource_post_object->ID );
	}

	function setType($newType)
	{
		$newType = ucwords(str_replace("-"," ",$newType));

		$this->type = $newType;
	}

}

