<?php
/**
 * Template Name: Template B
 */



function display_brick_page()
{
	GeneralMasterheader::display(array(
		'headline' => 'Press Releases',
		'subtitle' => 'See what’s happening with Digital River. Read our company news, global editorial pieces and industry recognitions.',
		'header_tag' => 'h2'
	) );

    ?>
    <div class="slide">
	    <div class="container">
	    	<div class="row">
	    		<div class="col-md-8">
	    			<h1 class="h2"><?= get_the_title(); ?></h1>
	    			<?= wpautop(get_the_content()); ?>
	    		</div>
	    		<div class="col-md-4">
					<div class="h3 option no-margin-btm"><?php _e('See Also', 'digital-river'); ?></div>
					<ul class="list-unstyled">
						<li><a class="arrow" href="/company/newsroom/press-releases/"><?php _e('Press Releases', 'digital-river'); ?></a></li>
						<li><a class="arrow" href="/company/newsroom/media-coverage/"><?php _e('Media Coverage', 'digital-river'); ?></a></li>
					</ul>

				  	<div class="h3 option no-margin-btm"><?php _e('Media&nbsp;Inquiries', 'digital-river'); ?></div>
					<p>The goal of Digital River’s global public relations team is to provide you with timely
					 information and interesting story ideas. To help you find the right information for your story, 
					 please send email inquiries to&nbsp;<a href="mailto:publicrelations@digitalriver.com">Public Relations</a>.</p>
					<p>
						<strong>Gerri Dyrek</strong><br>
						Group VP,&nbsp;Corporate Communications<br>
						<abbr title="Phone">P:</abbr> +1 952 225 3719
					</p>
					<p>
						<strong>Kristin McKenzie</strong><br>
						Associate Director,&nbsp;Corporate Communications<br>
						<abbr title="Phone">P:</abbr> +1 952 225 3718
					</p>
	    		</div>
	    	</div>
	    </div>
    </div>
    <?php
}

add_action( 'media_page', 'wp_head',  1 );
add_action( 'media_page', array('TopNavigation', 'display'),  5 );
add_action( 'media_page', 'display_brick_page',   10);
add_action( 'media_page', array('Footer', 'display_footer'),  20 );
add_action( 'media_page', array('ContactFormTab', 'display'), 25 );
add_action( 'media_page', 'wp_footer',  60 );

do_action('media_page');