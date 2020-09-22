<div class="blog-heading <?= (isset($image) && $image !== null) ? '  ' : ' brick bg-blue ' ?>">

	<?php
	echo "<pre>";
	print_r($image);
	echo "</pre>";
	?>
	<?php if(isset($image) && $image !== null): ?>
		<amp-img layout="responsive" class="img-responsive" src="<?= $image['url'] ?>" alt="<?= $image['alt'] ?>" />
	<?php endif; ?>
	<div>
	
		<div class="heading text-center">
			<div class="row">
				<div class="col-sm-10 col-sm-offset-1"><?php the_title('<h1 class="h3 marg-b-xxs-1">', '</h1>') ?></div>
			</div>
		</div>
	</div>
</div>