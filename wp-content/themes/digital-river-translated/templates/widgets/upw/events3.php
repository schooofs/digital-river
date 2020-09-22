<?php
// Gather posts together
$posts_array = array();
foreach ($posts->posts as $key => $post) {
    // Get custom fields
    foreach ($custom_fields as $field) {
        $post->$field = get_field($field, $post->id);
    }
    $post->event_start_date = get_field('event_start_date',  $post->id, false);
    $post->event_start_date = new DateTime($post->event_start_date);

    $post->event_end_date = get_field('event_end_date',  $post->id, false);
    $post->event_end_date = new DateTime($post->event_end_date);


    if($post->multiday_event){
        $eventEndTimestamp = $post->event_end_date->getTimestamp();
        $timestamp = $post->event_end_date->getTimestamp();
        $timestamp = $timestamp + $key;
    }else{
        $eventEndTimestamp = $post->event_start_date->getTimestamp();
        $timestamp = $post->event_start_date->getTimestamp();
         $timestamp = $timestamp + $key;
    }

    $posts_array[$timestamp] = $post;
}

krsort($posts_array);

?>

        <?php
   
        $upcomingEvents = array();
        $pastEvents = array();
             
        foreach ($posts_array as $event) :
       

            if($event->multiday_event){
                $eventEndTimestamp = $event->event_end_date;
                $dateString = $event->event_start_date->format('M j, Y')." - ".$event->event_end_date->format('M j, Y');
            }else{
                $eventEndTimestamp = $event->event_start_date;
                $dateString = $event->event_start_date->format('M j, Y');
            }

            if($event->event_type == "event"){
                $eventType = "Event";
            }else{
                $eventType = "Webinar";
            }

            if( time() <= $eventEndTimestamp->modify('+1 day')->getTimestamp() ){
 
                $link = "<a class='button' href='".$event->link_url."'>".$event->upcoming_button_text."</a>";

                $upcomingEvents[] = array(
                    'type'=>$eventType,
                    "date"=>$dateString,
                    "title"=>$event->post_title,
                    "description"=>$event->event_description,
                    "url"=>$link
                );

            }else{

                if($event->post_event_link_url != "" || $event->post_event_video != ""){
                  
                    if($event->recap_button_text != ""){

                            if($event->post_event_link == "link"){
                                $link = "<a class='button' href='".$event->post_event_link_url."'>".$event->recap_button_text."</a>";
                            }else{
                                $link = "<div class='button watch' data-videoid='".$event->post_event_video."'>".$event->recap_button_text."</div>";
                            }
                    
                    }else{
                        $link = "";
                    }

                }else{
                    $link = "";
                }

                if($link != ""){

                    if(count($pastEvents) <= 2 || $event->add_to_past_events_sidebar == "add"){
                        $pastEvents[] = array(
                            'type'=>$eventType,
                            "date"=>$dateString,
                            "title"=>$event->post_title,
                            "description"=>$event->post_event_recap,
                            "url"=>$link
                        );
                    }
                }


            }
        endforeach;
        ?>
      

          
               
                    
                    <div class='clear'></div>
                    <?php if(count($upcomingEvents) > 0): ?>
                        <div class='span_8 webinars last'>
                            <div class='eyebrow'>Upcoming Events &amp; Webinars</div>
                            <div class='clear'></div>
                            <div class='detailed-link-wrapper'>
                                <?php foreach($upcomingEvents as $key=>$upcomingEvent): ?>
                                    <div class='detailed-link'>   
                                        <div class='short-detail'><?php echo $upcomingEvent['type']; ?> <span style='font-size:1.15em; color:#646469; margin:0 5px 0 2px;'>|</span><?php echo $upcomingEvent['date']; ?></div>
                                        <div class='title'><?php echo $upcomingEvent['title']; ?></div>
                                        <p class='description'><?php echo $upcomingEvent['description']; ?></p>
                                        <?php echo $upcomingEvent['url']; ?>
                                        <div class="clear"></div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <?php
                    if(count($upcomingEvents) <= 0):
                        $class = "span_12 last webinars";
                        $pastStyles = "margin-right: 3.8%; width: 30.75%; border:none; padding:0;";
                        $pastClass = "span_4";
                    else: 
                        $class = "sidebar span_4 last";
                        $pastStyles = "";
                        $pastClass = "";
                    endif;
                    ?>
                    <div class='<?php echo $class; ?>'>
                        <div class='eyebrow'>Past Events &amp; Webinars</div>
                        <div class='clear'></div>
                         <div class='detailed-link-wrapper'>

                    
                            <?php foreach($pastEvents as $key=>$pastEvent): ?>

                                <div class='detailed-link <?php echo $pastClass; ?>' style="<?php echo $pastStyles; if(($key+1) == count($pastEvents)){ echo " margin-right:0px;";} ?>">   
                                    <div class='short-detail'><?php echo $pastEvent['type']; ?> <span style='font-size:1.15em; color:#646469; margin:0 5px 0 2px;'>|</span><?php echo $pastEvent['date']; ?></div>
                                    <div class='title'><?php echo $pastEvent['title']; ?></div>
                                    <p class='description'><?php echo $pastEvent['description']; ?></p>
                                    <?php echo $pastEvent['url']; ?>
                                    <div class="clear"></div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
    
          


                <!--
                    <?php $start_date = (isset($event->start_date))?: $event->event_start_date; ?>
                    <div class="date col span_2"><?php echo date("M j", strtotime($start_date)); ?> <?php if ($event->event_end_date) : ?> - <?php echo date("M j", strtotime($event->event_end_date)); endif; ?></div>
                    <div class="event-info span_10 col">
                -->
                        <!-- Event Title -->
                <!--
                        <div class="title span_8 col">
                            <?php if ($event->external_link) : ?>
                               <a class="link" href="<?php echo $event->link_url; ?>" target="_blank"><?php echo $event->post_title; ?></a>
                            <?php else: ?>
                               <span class="empty_event"><?php echo $event->post_title; ?></span>
                            <?php endif; ?>
                        </div>
                -->
                        <!-- Event Location -->
                <!--
                        <?php if ($event->event_location) : ?>
                            <div class="location span_4 col"><?php echo $event->event_location; ?></div>
                        <?php endif; ?>
                        <div class="clearfix"></div>
                -->

                        <!-- Event Description -->
                <!--
                        <?php if ($event->event_description) : ?>
                            <div class="description span_12 col"><?php echo $event->event_description; ?></div>
                        <?php endif; ?>
                    </div>
                --> 
      
             
            


