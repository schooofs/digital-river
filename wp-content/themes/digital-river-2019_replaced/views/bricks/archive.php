<div class="pad-t-xxs-6 pad-b-xxs-6">
	<div class="row">
		<div class="col-xxs-10 col-xxs-offset-1 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 archive-wrapper">
			<?= $title ?>
			<div class="clearfix">
				<form class="archive pull-left form-inline  marg-t-xxs-1">
					<label>View by year:</label>
					<select class="form-control input-sm " name="year">
						<?php foreach($years as $year): ?>
							<option value="<?= $year ?>"><?= $year ?></option>
						<?php endforeach; ?>
					</select>
					<input type="hidden" name="post_type" value="<?= $post_type ?>" ?>
					<input type="hidden" name="action" value="get_archive" />
				</form>
			</div>
			<div class="archive-results">
				<?php View::make("parts/archive", [
                    "posts" => $posts
                ]) ?>
			</div>
		</div>
	</div>
</div>

