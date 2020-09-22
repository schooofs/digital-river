<div class="<?= $background_color ?> 
			<?= ($spacing_top !== "default") ? " pad-t-xs-".$spacing_top." ":"" ?> 
			<?= ($spacing_bottom !== "default") ? " pad-b-xs-".$spacing_bottom." ":"" ?>" 
			<?php if(isset($background_image)){echo 'style="background-image:url(\''.$background_image.'\')"';} ?>>
	<div class="row" style="background: #dedede; /* For browsers that do not support gradients */
  background: -moz-linear-gradient(left, transparent 0%, rgba(222, 255, 222, 0.5) 49%, transparent 100%);
  /* FF3.6+ */
  background: -webkit-gradient(linear, left top, right top, color-stop(0%, transparent), color-stop(49%, rgba(222, 222, 222, 0.5)), color-stop(100%, transparent)));
  /* Chrome,Safari4+ */
  background: -webkit-linear-gradient(left, transparent 0%, rgba(222, 222, 222, 0.5) 49%, transparent 100%);
  /* Chrome10+,Safari5.1+ */
  background: -o-linear-gradient(left, transparent 0%, rgba(222, 222, 222, 0.5) 49%, transparent 100%);
  /* Opera 11.10+ */
  background: -ms-linear-gradient(left, transparent 0%, rgba(222, 222, 222, 0.5) 49%, transparent 100%);
  /* IE10+ */
  background: linear-gradient(to right, transparent 0%, rgba(222, 222, 222, 0.5) 49%, transparent 100%);">
		<div class="col-sm-6 col-sm-offset-3">
			<h2 class="tag marg-b-xxs-2">Recent<br>Blogs</h2>
			<div class="row">
				<div class="col-md-12 col-xs-6 pad-l-xxs-1 pad-r-xxs-1 pad-l-sm-2 pad-r-sm-2">
					<div class="row" >
						<?php foreach($recentPosts as $key => $recentPost): ?>
							<div class="clearfix <?= ($key > 0) ? ' marg-t-md-2 ':' marg-t-md-0 ' ?> marg-t-xxs-2 marg-b-xxs-2 marg-b-md-0 col-sm-12">
								<div class="col-md-3">
									<img class="img-responsive" src="<?= esc_url($recentPost['image']['url']) ?>" width="150" height="50" />
								</div>
								<div class="col-md-9">
									<?= $recentPost['date']?> | <?= $recentPost['cat']?>
									<p><?= $recentPost['title'] ?></p>
								</div>
							
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="blogContent" class="row marg-t-xxs-2 marg-b-xxs-2">
	<div class="col-md-10 col-md-offset-1">
		<div class="row blog-posts">
			<?php foreach($recentPosts as $key => $recentPost): ?>
				<?php if($key === 6): ?>
					<div class="col-md-12">
						<div class="bg-lightGray pad-t-xxs-6 pad-b-xxs-6 marg-t-xxs-2 marg-b-xxs-2">
							<?php // $editors_pick ?>
						</div>
					</div>
				<?php endif ?>
			<?php endforeach; ?>
		</div>
	</div>
</div>
<div class="text-center marg-t-xxs-4 marg-b-xxs-6">
	<form id="seeMorePosts">
		<input name="action" type="hidden" value="see_more_posts" />
		<input name="count" type="hidden" value="<?= count($recentPosts) ?>" />
		<input name="cat" type="hidden" value="<?= count($recentPosts) ?>" />
		<input type="submit" class="btn btn-primary" value="<?= __('See More', 'digital-river-2019') ?>">
	</form>
</div>

