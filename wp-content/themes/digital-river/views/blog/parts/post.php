<div class="blog-posts">
	<a class="no-decoration" href="<?= get_permalink($post->ID) ?>" title="<?= $post->post_title ?>">
	    <?php $small_image = get_field("small_image", $post->ID); ?>
	    <?php if($small_image != false): ?>
	    	<img alt="<?= $small_image['alt'] ?>" data-original="<?= $small_image['url'] ?>" class="img-responsive lazy" />
		<?php endif; ?>
		<div class="panel-body">
			<div class="h5">
				<span class="txt-lightBlue"><?= get_the_date('F j, Y', $post->ID) ?> <?= ($category !== null) ? " | " . $category : '' ?></span>
			</div>
			<h5><?= $post->post_title ?></h5>
			<!--<span class="txt-gray"></span>-->
		</div>
	</a>
</div>

<!--goes inside of span tag
	__("By:  ", "digital-river") . get_the_author($post->ID);
	-->
