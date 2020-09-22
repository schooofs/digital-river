<?php

/**
 * For displaying custom bricks
 *
 */
class EventsSection implements Brick
{


	public static function display($brick_info)
	{

    	echo '<div class="slide bg-white">';
        echo '<div class="container">';
          echo '<div class="row">';

		$events = Event::query();

		 if(count($events['upcoming_events']) > 0): ?>
          <div class="col-md-8 webinars last" style="padding: 30px;">
              <div class='eyebrow'>Upcoming Events &amp; Webinars</div>
              <div class='clear'></div>
              <?php
              foreach($events['upcoming_events'] as $key=>$upcomingEvent):
                  $formatted_event = new DetailedListItem(
	                                  $upcomingEvent->get_title(),
	                                  $upcomingEvent->get_description(),
	                                  $upcomingEvent->get_button_link(),
	                                  array(
	                                    "custom_link" => true,
	                                    "tag" => $upcomingEvent->get_event_type() . '<span style="font-size:1.15em; color:#646469; margin: 0px 5px 0px 7px;">|</span>' . $upcomingEvent->get_date_string() . $upcomingEvent->get_location_string(),
                                      "chars" => 500
	                                  )
	                              );
              		$formatted_event->display();
              endforeach;
              ?>
          </div>
      <?php endif; ?>
      <?php
      if(count($events['upcoming_events']) <= 0):
          $class = "col-md-12 webinars";
          $pastStyles = "margin-right: 3.8%; width: 30.75%; border:none; padding:0;";
          $pastClass = "span_4";
      else: 
          $class = "sidebar col-md-4";
          $pastStyles = "";
          $pastClass = "";
      endif;
      ?>
      <div class='<?php echo $class; ?>'>
          <div class='eyebrow'>Past Events &amp; Webinars</div>
          <div class='clear'></div>
           <div class='detailed-link-wrapper'>
              <?php
              foreach($events['past_events'] as $key=>$pastEvent):
              	$formatted_event = new DetailedListItem(
	                  $pastEvent->get_title(),
	                  $pastEvent->get_recap(),
	                  $pastEvent->get_recap_button(),
	                  array(
	                    "custom_link" => true,
	                    "tag" => $pastEvent->get_event_type() . '<span style="font-size:1.15em; color:#646469; margin: 0px 5px 0px 7px;">|</span>' . $pastEvent->get_date_string() . $pastEvent->get_location_string()
	                  )
                  );
      			$formatted_event->display();
              endforeach;
              ?>
          </div>
      </div>
      <?php

      echo '</div>';
      echo '</div>';
      echo '</div>';
	}
}