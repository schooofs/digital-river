<?php if ( function_exists('yoast_breadcrumb') ): ?>


<main class="news-detail">
	<div class="container">
		<div class="row">
			<div class="col-xs-12">
				<?php yoast_breadcrumb('<div class="" id="breadcrumbs">','</div>'); ?>
			</div>
		</div>
	</div>


	<?php endif; ?>

	<div class="container">
	<div class="row">
			<div class="col-xs-12">
				<?php while ( have_posts() ) : the_post(); ?>
				<?php the_title('<h1 class="h3 marg-b-xxs-1">', '</h1>') ?>
				<hr>
				<?php the_content() ?>
				<?php endwhile; ?>
			</div>

		</div>
	</div>
</main>