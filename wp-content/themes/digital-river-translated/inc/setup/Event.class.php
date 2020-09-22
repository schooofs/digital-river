<?php

class Event{

	public $fields;
	public $object;

	function __construct($post_obj)
	{
		$this->fields = get_fields($post_obj->ID);
		$this->object = $post_obj;
	}	

	public static function query($args = array())
	{
		$default_args = array(
		  'posts_per_page'   => 30,
		  'post_type'        => EventsInit::$post_type_name,
		  'post_status'      => 'publish',
		  'suppress_filters' => false 
		);

	    $events_array = array_map(
        	function($post_object){ return new Event($post_object); },
        	get_posts(array_merge($default_args, $args))
        );

		krsort($events_array);
		$upcomingEvents = array();
		$pastEvents = array();
		   
		foreach ($events_array as $event) :

		  if ( time() <= $event->get_last_day()->getTimestamp() ) {

		      $upcomingEvents[$event->get_last_day()->getTimestamp()] = $event;

		  } else {

		      if (count($pastEvents) <= 2 && $event->get_add_to_sidebar()) {
		      	$pastEvents[$event->get_last_day()->getTimestamp()] = $event;
		      }

		  }

		endforeach;

		ksort($upcomingEvents);
		ksort($pastEvents);

		return array(
			"upcoming_events" => $upcomingEvents,
			"past_events" => $pastEvents
		);

	}

	public function get_start_date()
	{
    	return new DateTime($this->fields['event_start_date']);
	}

	public function get_end_date()
	{
    	return new DateTime($this->fields['event_end_date']);
	}

	public function get_timestamp($key)
	{
	    if($this->fields['multiday_event']){
	        $this->get_end_date()->getTimestamp();
	        return $timestamp + $key;
	    }else{
	        $this->get_start_date()->getTimestamp();
       		return $timestamp + $key;
	    }
	}

	private function get_formatted_date($date)
	{
		return $date->format('M j, Y');
	}

	public function get_date_string()
	{
	    if($this->fields['multiday_event']){
            return $this->get_formatted_date($this->get_start_date()) . ' - ' . $this->get_formatted_date($this->get_end_date());
        }else{
            return $this->get_formatted_date($this->get_start_date());
        }
	}

	public function get_event_type()
	{
        if($this->fields['event_type'] == "event"){
            return "Event";
        }else{
            return "Webinar";
        }
	}

	public function get_recap_button()
	{
        if($this->fields['post_event_link_url'] != "" || $this->fields['post_event_video'] != ""){
            if($this->fields['recap_button_text'] != ""){
                return '<a class="btn btn-primary" href="'.$this->fields['post_event_link_url'].'">'.$this->fields['recap_button_text'].'</a>';
            }
        }

        return false;
	}

	public function get_last_day()
	{
	    if($this->fields['multiday_event']){
			return $this->get_end_date()->modify('+1 day');
        }else{
			return $this->get_start_date()->modify('+1 day');
        }
	}

	public function get_link()
	{
		return '<a class="arrow" href="'.$this->fields['link_url'].'">'.$this->fields['upcoming_button_text'].'</a>';
	}

	public function get_button_link()
	{
		return '<a class="btn btn-primary" href="'.$this->fields['link_url'].'">'.$this->fields['upcoming_button_text'].'</a>';
	}


	public function get_title()
	{
		return $this->object->post_title;
	}

	public function get_recap()
	{
		return $this->fields['post_event_recap'];
	}

	public function get_description()
	{
		return $this->fields['event_description'];
	}

	public function get_add_to_sidebar()
	{
		return $this->fields['add_to_past_events_sidebar'][0] == "add";
	}

	public function get_location_string()
	{
		if($this->get_event_type() == "Event")
			return '<span class="pull-right"><i class="fa fa-map-marker" aria-hidden="true"></i> ' . $this->fields['event_location'] . '</span>';
	}

}