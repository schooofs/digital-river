<?php
/**
 * Template Name: Home
 */
?>
<?php get_header(); ?>

<style type="text/css">
	body {
        font-size: 1em !important;

    }

	#clients .title h2, #news .title h2, .icon .title h2{
		line-height: .5em !important;
		padding-top: 10px !important;
	}

</style>




                <div  class="flexslider"  style="height: 686px;">
                    <ul class="slides">
                        <?php foreach(get_field('slides') as $slide) : ?>
                            <li class="content">
															<?php $link = ($slide['external_link'])?: $slide['link']; ?>
															<a <?php if($slide['new_tab']) echo 'target="_blank"'; ?> href=" <?php  echo $link; ?>" class="slide_link">
                                <div class="container">
                                    <div class="row">
                                            <section class="span_10_slide slide">
                                                <section class="header" style=" color: <?php echo $slide['headingcolor']; ?>; "><?php echo $slide['heading']; ?></section>

																								<?php

																								 if($slide['button_display'][0] == "Add" || $slide['button_display'] == "Add") : ?>
																								<section class="link" style=" background-color: <?php echo $slide['button_color']; ?> " ><?php echo $slide['link_title']; ?></section>
																							<?php endif ?>
																				  </section>
                                    </div>
                                </div>
                            <?php if ($slide['background_image']) : ?>
                                <img src="<?php echo $slide['background_image']; ?>" class="not-mobile slide_image">
                                <img src="<?php echo $slide['mobile_background_image']; ?>" class="mobile slide_image">
                            <?php endif; ?>
													</a>
                            </li>
                        <?php endforeach; ?>

                    </ul>

                </div>

    <div id="main_content">
    	<section id="why-work">
        	<div class="wrapper">
                <div class="left_col">
					<?php while(have_rows('why_work_section') ) : the_row(); ?>
                        <h1><?php the_sub_field('header'); ?></h1>
                        <p><?php the_sub_field('description'); ?></p>
                        <a href="<?php the_sub_field('cta_link'); ?>"><div class='work-cta'><?php the_sub_field('cta_label'); ?></div></a>
                    <?php endwhile; ?>
                </div>
                <div class="right_col">
                   	<?php while(have_rows('capabilities') ) : the_row(); ?>
            				<div class="icon <?php the_sub_field('custom_css_classes'); ?> ">
                        	<div class="icon-wrapper">
                                <?php $icon = get_sub_field('icon'); ?>
                    			<img alt='<?php echo $icon['alt']; ?>' src=" <?php echo $icon['url']; ?> " />
                        	</div>
                            <div class="title">
                                <h2> <?php echo the_sub_field('title'); ?> </h2>
                                <a href=" <?php the_sub_field('link'); ?>">[ <?php the_sub_field('link_title'); ?> ]</a>
                            </div>
                            <p> <?php the_sub_field('description'); ?> </p>
                        </div>
                 	<?php endwhile; ?>
                </div> <!-- End of right_col -->
            </div> <!-- End of wrapper -->
        </section> <!-- End of why work section -->
        <section id="clients">
        	<div class="wrapper">
            	<div class="title">
                  <h2>Clients</h2>
                  <a href="<?php echo site_url('/clients/' ,'http'); ?>">[  More Clients  ]</a>
                </div>


                    <div id="owl-demo" class="clients-wrapper">

                        <?php foreach(get_field('client_logos') as $client_logo) : ?>
                            <div class='item'>
                                <img src="<?php echo $client_logo['logo']; ?>" />
                            </div>
                        <?php endforeach; ?>

                 </div> <!-- End of clients-wrapper -->
            </div> <!-- End of wrapper -->
        </section> <!-- End of clients section -->
		<section id="news">
        	<div class="wrapper">
            	<?php while(have_rows('bottom_bar') ) : the_row(); ?>
                    <div class="col-3 <?php echo the_sub_field('custom_css_classes'); ?> ">
                        <div class="title">
                            <h2><?php the_sub_field('title'); ?></h2>
                            <a href="<?php the_sub_field('link'); ?>">[ <?php the_sub_field('link_title'); ?> ]</a>
                        </div>
                        <?php while(have_rows('posts') ) : the_row(); ?>
                        	<div class="story">
                            <h3>
                            <?php if( get_sub_field('external_link') ){
								echo "<a target='_blank' href=' ";
								the_sub_field('external_link');
								echo "'>";
								the_sub_field('link_title');
								echo "</a>";
							}else if( get_sub_field('link') ){
								echo "<a target='_blank' href=' ";
								the_sub_field('link');
								echo "'>";
								the_sub_field('link_title');
								echo "</a>";
							}else{
								the_sub_field('link_title');
							} ?>

							</h3>
                                 <p><?php the_sub_field('description'); ?></p>
                            </div> <!-- End of story -->
                        <?php endwhile; ?>
                        </div> <!-- End of col-3 -->
                <?php endwhile; ?>
            </div> <!-- End of wrapper -->
        </section> <!-- End of news section -->
       <section id="work-for">
       	<?php while(have_rows('work_for_us_section') ) : the_row(); ?>
        	<div class='wrapper'>
                <div class="left_col">
                    <h1><?php the_sub_field('header'); ?></h1>
                </div>
                <div class='right_col'>
                	<p><?php the_sub_field('body'); ?></p>
                    <a href=" <?php the_sub_field('cta_button_link'); ?> "><div class='work-cta'><?php the_sub_field('cta_button_text'); ?></div></a>
                </div>
            </div>
       <?php endwhile; ?>
       </section>
    </div> <!-- End of main-content -->

<?php get_footer(); ?>
