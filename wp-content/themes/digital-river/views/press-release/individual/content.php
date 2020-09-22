<?php if ( function_exists('yoast_breadcrumb') ): ?>
<div class="row">
	<div class="col-xxs-10 col-xxs-offset-1">
		<?php yoast_breadcrumb('<div class="pad-t-xxs-4 pad-t-sm-2 pad-b-xxs-2" id="breadcrumbs">','</div>'); ?>
	</div>
</div>
<?php endif; ?>
<div class="marg-t-xxs-6 marg-b-xxs-6">
	<div class="row">
		<div class="col-xxs-10 col-xxs-offset-1 col-md-8 col-md-offset-2 post-wrapper">
			<?php while ( have_posts() ) : the_post(); ?>
				<?php the_title('<h1 class="h3 marg-b-xxs-1">', '</h1>') ?>
				<hr>
				<?php the_content() ?>
			<?php endwhile; ?>
		</div>
	</div>
</div>