<?php

class DetailedListResource{

	private $Resource;

	function __construct($Resource)
	{
		$this->Resource = $Resource;
	}

	public function display()
	{
		$html = '<div class="detailed-list-item">';
			if($this->Resource->type != null):
				$html .= '<div class="tag med">'.$this->Resource->type.'</div>';
			endif;
			$html .= '<div class="title">'.$this->Resource->title.'</div>';
			$html .= '<p class="description">'.$this->Resource->description.'</p>';
			$html .= '<a';
			$html .= ($this->Resource->external == true)?' rel="nofollow" ':null;
			$html .= ($this->Resource->external == true)?' target="_blank" ':null;
			$html .= ' class="arrow arial" href="' . $this->Resource->link . '">' . __("Learn more", "digital-river") . '</a>';
		$html .= '</div>';

		echo $html;
	}	
}