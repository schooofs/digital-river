<?php

class ResourcesSection{
	
	public $resources;

	public function __construct($resources = null){
		$this->resources = $resources;
	}

	private function getResources(){
		return $this->resources;
	}

	private function setResources($newResources){
		$this->resources = $newResources;
	}

	private function numOfResources(){
		return count($this->getResources());
	}

	public function display($hp = null){
		?>
		<style>
.home .row{max-width: 1180px; }

  #resources .item{max-width: 450px;}

.resources-wrapper {
    font-family: "DIN 1451 W01 Engschrift",sans-serif;
    padding-bottom: 40px;
    padding-top: 10px;
    position: relative;
    background: #FFF;

}

.resources-wrapper .heading{
  color: #343438;
  font-size: 3.85em;
  float: left;
  line-height: 1em;
  letter-spacing: 0.5px;
}

.resources-wrapper .heading span{
  float:left;
  margin-right: 15px;
}


.resources-wrapper .link_wrapper{
  width: 100%;
  margin: 0 auto;
}

.home .resources-wrapper .link_wrapper .links {
    margin-top: 10px;
}

.resources-wrapper .link_wrapper .links .header{
  font-size: 1.4em;
    color: #343438;
}

.resources-wrapper .link_wrapper .links li{
  list-style: none;
  margin: 15px 0;
}

.resources-wrapper .link_wrapper .links li a{
  font-family: Arial,sans-serif;
  font-size: 1em;
  color:#00a7e1;
  text-decoration: none;
}

.resources-wrapper .row2 .span_8{
  margin-top: 30px;
}


.owl-next, .owl-prev{
    -webkit-transition: all 250ms ease-out;
    -moz-transition: all 250ms ease-out;
    -o-transition: all 250ms ease-out;
    transition: all 250ms ease-out;
    opacity: 0;
}

#resources{position: relative;}

.resources-wrapper:hover .owl-next{
  right:-45px;
  opacity: .7;
}

.resources-wrapper:hover .owl-prev{
  left: -25px;
  opacity: .7;
}

.resources-wrapper .owl-next:hover, .resources-wrapper .owl-prev:hover{opacity: 1;}

.owl-prev{
  text-indent: -9999px;
  background: url("../img/arrow-left.svg") no-repeat;
  position: absolute;
  top:40%;
  left: 0;
  width: 40px;
  height: 30px;

}


.owl-next{
  text-indent: 9999px;
  background: url("../img/arrow-right.svg") no-repeat;
  top:40%;
  right: 0;
  width: 40px;
  height: 30px;
  position: absolute;
}

#template_j .resources-wrapper a{
      position: relative;
      display: inline-block;
      color: #007EB5;
      text-decoration: none;
      font-family: "Arial";
  }

  .resources-wrapper a.hover:hover {
      color: #00A7E1;
      text-decoration: none;
  }

  .resources-wrapper a.hover::after {
      margin-top: 1px;
      margin-left: 5px;
      content: "›";
      transform: translateX(-20px);
  }
  .resources-wrapper a.hover::before, .resources-wrapper a.hover::after {
      display: inline-block;
      opacity: 0;
      transition: transform 0.3s ease 0s, opacity 0.2s ease 0s;
  }

  .resources-wrapper a.hover:hover::after, .resources-wrapper a.hover:focus::after {
      opacity: 1;
      transform: translateX(0px);
  }


  .resources-wrapper .tag{font-size: 1em; color: #81b315; margin: 0 0 3px;  font-family: "DIN Next W01 Medium";}
  .resources-wrapper .title{font-size: 1.4em; margin: 0; color: #343438; font-family: "DIN Next W01 Medium"; padding-top: 0 !important;}
  .resources-wrapper p.description{margin: 7px 0 15px;}



/*
**
**    Home Page Styling
**
*/


/*
.home .resources-wrapper .tag {
    margin: 0px;
}
*/
.home #news{padding: 0px 30px;}

.home .resources-wrapper p.description {
    margin: 0px 0px 7px;
}

.home #news .resources-wrapper .title {
    padding-bottom: 2px;
}

.home .resources-wrapper .item:first-child{margin-top: 10px;}
.home .resources-wrapper .item{margin-top: 25px;}



@media only screen and (max-width: 1000px) {

    .resources-wrapper .heading{
      margin-top: 10px;
      float: none;
      margin: 0 auto;
      display:block;
      width: 454px;
    }

    .resources-wrapper .link_wrapper {
      margin-top: 20px;
    }

    .resources-wrapper .owl-next, .resources-wrapper .owl-prev{
        display: block !important;
    } 


}

@media only screen and (max-width: 600px) {
    .resources-wrapper .heading {
        font-size: 3em;
        width: auto;
        float: left;
    }

    .resources-wrapper .link_wrapper {
        display: inline-block;
        justify-content: inherit;
    }

    .resources-wrapper .link_wrapper .links:first-child {
      margin-top: 0;
    }

    .resources-wrapper .link_wrapper .links {
        float: left;
        clear: left;
        margin: 20px 0 0;
    }



}

		</style>
			<section class="resources-wrapper">
				<?php if($hp == null): ?>
				<div class='row2'>
					
					<div class="eyebrow">Resources</div>
					<div class='clear'></div>	
					<?php else: ?>
					<div class='row'>
					        <div class="span_6 title">
                                <h2 class='eyebrow eng'>Resources</h2>
                                <a href="<?php echo get_permalink(695); ?>">[ More Resources ]</a>
                            </div>

					<?php endif; ?>
					<div class='span_12 last'>
						<div class="link_wrapper">

							<?php $numOfResources = $this->numOfResources(); ?>

							<?php if($numOfResources <= 3): ?>
								<style>
									.owl-next, .owl-prev{display: none !important;}
								</style>
							
							<?php endif; ?>

							<?php if($numOfResources <= 2): ?>
								<style>
									@media only screen and (max-width: 1000px) {
									    .resources-wrapper .owl-next, .resources-wrapper .owl-prev{
									        display: none !important;
									    } 
									}
									</style>
							<?php endif; ?>
							<div id="resources" class="resources links">
								<?php
								$resources = $this->getResources();
								foreach($resources as $resource):
									if($hp == null):
										$link = get_field( "resource-type", $resource['resource']->ID ) == "external" ? get_field( "link", $resource['resource']->ID ) : $resource['resource']->guid;
										$title = get_field( "resource-type", $resource['resource']->ID ) == "external" ? get_field( "title", $resource['resource']->ID ) : $resource['resource']->post_title;
								
										$resourceObj = new Resource(get_field( "content_type", $resource['resource']->ID ), $title, get_field( "description", $resource['resource']->ID ), $link, get_field( "link_title", $resource['resource']->ID ));
										$resourceObj->displayResource();
									else:
										$link = get_field( "resource-type", $resource->ID ) == "external" ? get_field( "link", $resource->ID ) : $resource->guid;
										$title = get_field( "resource-type", $resource->ID ) == "external" ? get_field( "title", $resource->ID ) : $resource->post_title;

										$resourceObj = new Resource(get_field( "content_type", $resource->ID ), $title, get_field( "description", $resource->ID ), $link, get_field( "link_title", $resource->ID ));
										$resourceObj->displayResource();
									endif;


								endforeach;
								?>
								</div>
							<div class="clear"></div>
						</div>
						<div class='clear'></div>
					</div>
				<div class="clear"></div>
				</div>
			</section>
		<?php
	}




	public function displayHP(){

		?>
		<section class="resources-wrapper" style='padding-bottom:0;'>
		<?php
            query_posts(array( 
                'post_type' => 'marketing_material',
                'showposts' => 2                                
                ));  
    
            while (have_posts()) : the_post();
					$link = get_field( "resource-type",  get_the_ID() ) == "external" ? get_field( "link",  get_the_ID() ) : $resource['resource']->guid;
					$title = get_field( "resource-type",  get_the_ID() ) == "external" ? get_field( "title",  get_the_ID() ) : $resource['resource']->post_title;

					$resourceObj = new Resource(get_field( "content_type",  get_the_ID() ), $title, get_field( "description",  get_the_ID() ), $link, get_field( "link_title",  get_the_ID() ));
					$resourceObj->displayResource();
            endwhile;
		?>
		</section>
		<?php

		 wp_reset_postdata();


	}





	public function displayPressReleases(){

		?>
		<section class="resources-wrapper" style='padding-bottom:0;'>
		<?php
            query_posts(array( 
                'post_type' => 'press_release',
                'showposts' => 2                                
            ));  
    
            while (have_posts()) : the_post();
					$date = get_field( "date_published",  get_the_ID() );
					$shortDescription = get_field( "short_description",  get_the_ID() );

					$resourceObj = new Resource($date, get_the_title(), $shortDescription, get_permalink() , "Read More");
					$resourceObj->displayResource();
            endwhile;
		?>
		</section>
		<?php

		 wp_reset_postdata();

	}

	public function getEvents(){


            query_posts(array( 
                'post_type' => 'events',
                'showposts' => 5                              
            ));  
            $count = 0;
			while (have_posts()) : the_post();
				$eventInfo = get_fields(get_the_ID());	
		    	if($eventInfo['multiday_event']){
		        	$eventEndTimestamp = strtotime($eventInfo['event_end_date']);
		    	}else{
		        	$eventEndTimestamp = strtotime($eventInfo['event_start_date']);
		    	}

            	if((time() - (24 * 60 * 60)) <= $eventEndTimestamp){
            		$count++;
            	}
			endwhile; 	

			return $count;
	}

	public function displayEvents(){

            query_posts(array( 
                'post_type' => 'events',
                'showposts' => 5                               
            )); 



            ?>

		<section class="resources-wrapper" style='padding-bottom:0;'>
<?php
		 while (have_posts()) : the_post();
		    // Get custom fields


		 $eventInfo = get_fields(get_the_ID());

		    if($eventInfo['multiday_event']){
		        $eventEndTimestamp = strtotime($eventInfo['event_end_date']);
		        $timestamp = strtotime($eventInfo['event_end_date']);
		        $timestamp = $timestamp + $key;

                $dateString = $eventInfo['event_start_date']." - ".$eventInfo['event_end_date'];
		    }else{
		        $eventEndTimestamp = strtotime($eventInfo['event_start_date']);
		        $timestamp = strtotime($post->$eventInfo['event_start_date']);
		        $timestamp = $timestamp + $key;


		        $dateString = $eventInfo['event_start_date'];
		    }


            if($eventInfo['event_type'] == "event"){
                $eventType = "Event";
            }else{
                $eventType = "Webinar";
            }


            if((time() - (24 * 60 * 60)) <= $eventEndTimestamp){

                $resourceObj = new Resource($eventType." | ".$dateString, get_the_title(), $this->truncate($eventInfo['event_description'], 200), $eventInfo['link_url'] , $eventInfo['upcoming_button_text']);
				$resourceObj->displayResource();

			}
		endwhile;

		?>
	</section>
		<?php
	}


	private function truncate($text, $chars = 200) {
	    $text = $text." ";
	    $text = substr($text,0,$chars);
	    $text = substr($text,0,strrpos($text,' '));
	    $text = $text."...";
	    return $text;
	}
}
?>
	
