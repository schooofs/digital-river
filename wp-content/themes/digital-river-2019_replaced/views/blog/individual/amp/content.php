<div class="pad-t-xxs-3 pad-b-xxs-3 blog-content-wrapper">
	<div class="row">
		<div class="col-sm-12">
			<div class="row">
				<div class="col-md-6 col-md-offset-3 post-wrapper">
					<?php while ( have_posts() ) : the_post(); ?>
						<p>
							<span><?php _e("Written by: ","digital-river-2019") . the_author_link(); ?></span>
						</p>
						<hr>
						<?php the_content() ?>
					<?php endwhile; ?>
				</div>
			</div>
		</div>
	</div>
</div>