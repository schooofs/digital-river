<?php

class DataLayer 
{
	public function __construct()
	{
		add_action("data_layer", [$this, "get"]);
	}

	public static function get()
	{
		if(is_404()){
			
			$data_layer = [
				"page_type"		=> "404"
			];

		} else if(is_search()) {
			
			$data_layer = [
				"page_type"		=> "search",
				"page_title"	=> sprintf("You searched for %s", get_search_query())
			];

		} else {

			$data_layer = [
				"page_title" 	=> get_the_title(),
				"page_type"		=> get_post_type(),
                "sessionID"     => session_id()
			];

			$categories = get_the_category();
			if ( ! empty($categories) ) {
				$data_layer["page_category"] = $categories[0]->name;
			}	
			
		}
		?>
		<script>dataLayer = [<?= json_encode($data_layer) ?>];</script>
		<?php
	}
}