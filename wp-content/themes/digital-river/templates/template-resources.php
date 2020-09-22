<?php
/**
 * Template Name: Template resources
 */
?>
<?php get_header(); ?>
<?php get_template_part('masthead'); ?>


<section class="grid_wrapper">
			<div class="grid">
            
             <?php foreach(get_field('grid_box') as $grid_box) : ?>

				<div class="<?php echo $grid_box['width']; ?>">
                
                <?php 
					$num_of_boxes = count($grid_box['box']);
					 
					if($num_of_boxes >= 3){
						$boxCount = 3;
						$boxClass = "third";
					}else if($num_of_boxes == 2){
						$boxCount = 2;
						$boxClass = "half";
					}else{
						$boxCount = 1;
						$boxClass = "";
					}
					$count = 0;
					
				 ?>
                
					<?php foreach($grid_box['box'] as $box) : ?>
                 
                        <?php if($count <= 3) : ?>
                       
                        <figure class="<?php echo $box['effect'] . " " . $boxClass; ?>" style="background:<?php echo $box['color'] ?>" >
                            <img src="<?php echo $box['image']['url']; ?>" alt="<?php echo $box['image']['alt']; ?>" />
                            <figcaption>
                                <h2><span><?php echo $box['heading']; ?><span></h2>
                                <p><?php echo $box['copy']; ?></p>
                                
                                <?php $link = ($box['external_link'])?: $box['link']; ?>
                                <a target="<?php echo $box['target'] ?>" href="<?php echo $link; ?>"><?php echo $box['link_text']; ?></a>
                            </figcaption>
                        </figure>
                        <?php $count++; ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
				</div>
                
                <?php endforeach; ?>
               
             <div class="clear"></div>
			</div> <!-- /grid -->

</section><!-- /container -->

<section class="resource-wrapper">

<div class="resource-links">
	<div class="left-side">
		<div class="header">Thought Leadership</div>
		<ul>
			<li><a href="<?php echo site_url('/resources/commerce/','http'); ?>">Commerce</a></li>
			<li><a href="<?php echo site_url('/resources/payments/','http'); ?>">Payments</a></li>
			<li><a href="<?php echo site_url('/resources/marketing/','http'); ?>">Marketing</a></li>
			<li><a href="<?php echo site_url('/resources/global-markets/','http'); ?>">Global Markets</a></li>
		</ul>
		<ul class="three-links">
			<li><a href="<?php echo site_url('/resources/client-success-stories/','http'); ?>">Client Stories</a></li>
			<li><a href="<?php echo site_url('/resources/events-and-webinars/','http'); ?>">Events &amp; Webinars</a></li>
			<li><a href="<?php echo site_url('/resources/blog/','http'); ?>">Blog</a></li>
		</ul>
	</div>
	<div class="right-side">
		<div class="header">Developers Resources</div>
		<ul class="three-links">
			<li><a href="https://developers.digitalriver.com/user">Developers Portal</a></li>
			<li><a href="<?php echo site_url('/resources/developers-resources/demos/','http'); ?>">Demos</a></li>
			<li><a href="<?php echo site_url('/resources/developers-resources/developers-toolkits/','http'); ?>">Developers Toolkits</a></li>
		</ul>
	</div>
	<div class="clear"></div>
</div>
</section><!-- /resource-wrapper -->

<?php get_footer(); ?>
