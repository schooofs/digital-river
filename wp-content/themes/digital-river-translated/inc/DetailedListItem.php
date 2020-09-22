<?php

class DetailedListItem{
	public $title;
	public $description;
	public $link;
	public $optional = array(
		"custom_link" => false,
		"link_label" => "Read More",
		"external_link" => "false",
		"new_page" => false,
		"tag" => null,
		"button" => false,
		"limit_description" => true,
		"chars" => 200,
		"external_src" => null,
		"author" => null,
		'date' => null
	);

	function __construct($title, $description, $link, $optional = array()) {
		$this->title = $title;
		$this->description = $description;
		$this->link = $link;
		$this->optional = array_merge($this->optional, $optional);
	}

	private function getTitle(){
		return $this->title;
	}

	private function setTitle($new_title){
		$this->title = $new_title;
		return true;
	}

	private function truncate_description($description, $chars) {
		$text = $description;
		if(strlen($text) > $chars):
		    $text = $text." ";
		    $text = substr($text,0,$chars);
		    $text = substr($text,0,strrpos($text,' '));
		    $text = $text."...";
	    endif;
	    return $text;
	}

	private function getDescription(){
		$options = $this->getOptional();
		if($options['limit_description'] == true):
			return $this->truncate_description($this->description, $options["chars"]);
		else:
			return $this->description;
		endif;
	}

	private function setDescription($new_description){
		$this->description = $new_description;
		return true;
	}


	private function getLink(){
		return $this->link;
	}

	private function setLink($new_link){
		$this->link = $new_link;
		return true;
	}


	private function getOptional(){
		return $this->optional;
	}

	private function setOptional($new_optional){
		$this->optional = array_merge($this->optional, $new_optional);
		return true;
	}



	public function display(){
		$optional = $this->getOptional();
		// print_r($this);
		?>
		<div class='detailed-list-item'>
			<?php if($optional['tag'] != null): ?>
				<div class='tag'><?php echo $this->optional['tag']; ?></div>
			<?php endif; ?>
			<p>
				<div class='title'><?php echo $this->getTitle(); ?></div>
				<?php if($optional['author'] != null): ?>
					<div ><? echo $optional['author'] ?></div>
				<?php endif; ?>
				<?php if($optional['date'] != null): ?>
					<div><? echo $optional['date'] ?></div>
				<?php endif; ?>
			</p>


			<p class='description'><?php echo $this->getDescription(); ?></p>
			<?php if(!$optional['custom_link']): ?>
				<a <?php echo ($optional['external_link'] != false)?' rel="nofollow" ':null; ?> <?php echo ($optional['new_page'] != false)?' target="_blank" ':null; ?> class="<?php echo ($optional['button'] == false)?' arrow ':' button ' ?> arial" href="<?php echo $this->getLink(); ?>"><?php echo $optional['link_label']; ?></a>
			<?php else: ?>
				<?php echo $this->getLink(); ?>
			<?php endif; ?>
		</div>
		<?php
	}
}
