<?php
class RegisterCategories {
	
	public function __construct()
	{
		add_action( 'init', array($this, 'add_taxonomies_to_pages') );
	}

	function add_taxonomies_to_pages()
	{
		register_taxonomy_for_object_type( 'category', 'page' );
	}

}