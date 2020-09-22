<div class="marg-t-xxs-8 marg-b-xxs-8">
	<div class="row">
		<div class="col-xxs-10 col-xxs-offset-1">
			<h2 class="tag marg-b-xxs-2">Latest from<br>Digital River</h2>
			<div class="row">
				<div class="col-lg-4 col-sm-6 pad-l-xxs-1 pad-r-xxs-1 pad-l-sm-2 pad-r-sm-2">
					<div class="row">
						<?php foreach($pressReleases as $key => $pressRelease): ?>
							<div class="clearfix <?= ($key > 0) ? ' marg-t-md-2 ':' marg-t-md-0 ' ?> marg-t-xxs-2 marg-b-xxs-2 marg-b-md-0 col-sm-12">
								<?= ResourceBox::get([
										"type"			=> "press_release",
										"resource"		=> $pressRelease,
										"animate"		=> false,
										"class"			=> "pull-none"
								]); ?>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
				<div class="col-lg-4 col-sm-6 pad-l-xxs-1 pad-r-xxs-1 pad-l-sm-2 pad-r-sm-2">
					<div class="row"> 
                        <?php $event_count = 0; ?>
						<?php foreach($events as $key => $event): ?>
                            <?php 
                                $type_of_event = get_field("event_type", $event->ID);
                                $todaysDate = new DateTime();
                                $todaysDate->getTimestamp(); 

                                $eventDate = new Datetime(get_field("event_start_date", $event->ID));
                                $eventDate->getTimestamp();
                        
                                if($event == 1):
                                    if(isset($ondemand)): ?>
                                        <div class="clearfix <?= ($event > 0) ? ' marg-t-md-2 ':' marg-t-md-0 ' ?> marg-t-xxs-2 marg-b-xxs-2 marg-b-md-0 col-sm-12">
                                            <?= ResourceBox::get([
                                                "type"			=> "event",
                                                "event"			=> $ondemand,
                                                "animate"		=> false,
                                                "class"			=> "pull-none"
                                                ]); 
                                            ?>
                                        </div> 
                                        <?php  
                                        $event_count++;
                                        if($event_count == 1):
                                            break; 
                                        elseif($type_of_event !== "event" && $todaysDate >= $eventDate): 
                                            continue;
                                        endif;
                                    endif;
                            
                                else :

                                    if($type_of_event !== "event" && $todaysDate >= $eventDate):
                                            if(!isset($ondemand)):
                                                $ondemand = $event;
                                            endif;
                                            continue;
                                        endif;
                                    endif; 
                            ?>
                                
							<div class="clearfix <?= ($key > 0) ? ' marg-t-md-2 ':' marg-t-md-0 ' ?> marg-t-xxs-2 marg-b-xxs-2 marg-b-md-0 col-sm-12">
								<?= ResourceBox::get([
										"type"			=> "event",
										"event"			=> $event,
										"animate"		=> false,
										"class"			=> "pull-none"
								]); ?>
							</div>
                        <?php  $event_count++; 
                            if($event_count == 3) break;
						 endforeach; ?>
					</div>
				</div>
				<div class="col-lg-4 col-xs-12">
					<div class="row">
						<?php foreach($resources as $key => $resource): ?>
							<div class="clearfix <?= ($key > 0) ? ' marg-t-md-2 ':' marg-t-lg-0 ' ?> marg-t-xxs-2 marg-b-xxs-2 marg-b-md-0 col-lg-12 col-sm-6 pad-l-xxs-1 pad-r-xxs-1 pad-l-sm-2 pad-r-sm-2">
								<?= ResourceBox::get([
										"type"			=>"press_release",
										"resource"		=>$resource,
										"animate"		=>false,
										"class"			=>"pull-lg-right"
								]); ?>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
			<a href="/news-and-events/" title="<?= __('Go to News and Events','digital-river') ?>" class="btn btn-primary marg-t-xxs-2"><?= __('See More','digital-river') ?></a>
		</div>
	</div>
</div>