<div class="row marg-t-xxs-2 marg-b-xxs-2">
	<div class="col-xxs-10 col-xxs-offset-1">
		<div class="row" id="blogContent">
			<?php foreach($posts as $key => $post): ?>
				<?php if($key === 6): ?>
					<div class="col-md-12">
						<div class="bg-lightGray pad-t-xxs-3 pad-b-xxs-3 marg-t-xxs-2 marg-b-xxs-2 clearfix">
							<?= $editors_pick ?>
						</div>
					</div>
				<?php endif ?>
				<div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-0 col-lg-4 marg-t-xxs-2 marg-b-xxs-2">
					<?= $post ?>
				</div>
				<?= (($key + 1) % 2 === 0) ? '<div class="clearfix visible-md visible-sm"></div>' : '' ?>
				<?= (($key + 1) % 3 === 0) ? '<div class="clearfix hidden-md hidden-sm"></div>' : '' ?>
			<?php endforeach; ?>
		</div>
	</div>
</div>
<div class="text-center marg-t-xxs-4 marg-b-xxs-6">
    <?php if($see_more === true): ?>
        <form id="seeMorePosts">
            <input name="action" type="hidden" value="see_more_posts" />
            <input name="count" type="hidden" value="<?= count($posts) ?>" />
            <input name="cat" type="hidden" value="<?= $category ?>" />
            <input type="submit" class="btn btn-primary" value="<?= __('See More', 'digital-river') ?>">
        </form>
    <? endif; ?>
</div>