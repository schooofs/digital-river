<div class="bg-lightGray leadership-outer-wrapper">
	<div id="leadership" style="position:relative; top:-85px;"></div>
	<div class="row leadership-wrapper">
		<div class="leadership-inner-wrapper">
			<div class="col-xxs-10 col-xxs-offset-1 col-lg-6 col-md-7 col-md-offset-0 pad-l-md-4 col-xl-6 col-lg-offset-1 pad-l-xl-2 pad-t-xxs-2 pad-b-xxs-2 pad-r-md-0">
				<div class="leadership-overview">
					<h2 class="tag pad-b-xxs-2"><?= __("Meet the<br> team", "digital-river") ?></h2>
					<ul class="list-unstyled leadership">
						<?php foreach($team_members as $key => $team_member): ?>
							<li class="leader clearfix pad-l-xxs-1 pad-t-xxs-1 pad-b-xxs-1 read-leader-bio" data-bio="<?= $key ?>" data-image="<?= $team_member['team_member_image']['url']; ?>">
								<div class="pull-left leader-title">
									<div class="h4 marg-b-xxs-0 read-leader-bio" data-bio="<?= $key ?>" data-image="<?= $team_member['team_member_image']['url']; ?>"><strong><?= $team_member['team_fl_names']; ?></strong></div>
									<p class="leader-title read-leader-bio" data-bio="<?= $key ?>" data-image="<?= $team_member['team_member_image']['url']; ?>"><?= $team_member['team_title']; ?></p>
								</div>
								<div class="pull-right marg-r-xxs-2">
									<div class="btn btn-primary read-leader-bio" data-bio="<?= $key ?>" data-image="<?= $team_member['team_member_image']['url']; ?>">Read bio</div>
								</div>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>
				<div class="leadership-bios pad-r-xxs-1">
					<div class="close-bio h1">&times;</div>
					<?php foreach($team_members as $key => $team_member): ?>
						<div class="leadership-bio" style="display:none;" data-bio="<?= $key ?>">
							<div class="h4 marg-b-xxs-0"><strong><?= $team_member['team_fl_names']; ?></strong></div>
							<p><?= $team_member['team_title']; ?></p>
							<?= $team_member['team_bio_link_text'] ?>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
			<div class="col-sm-6 col-lg-5 col-xl-5  pad-l-xxs-0 hidden-sm hidden-xs hidden-xxs">
				<img class="leader-image img-responsive lazy"  data-original="<?= $team_members[0]['team_member_image']['url'] ?>" alt="<?=$team_members[0]['team_member_image']['alt'] ?>" />
			</div>
		</div>
	</div>
</div>
<style>@media(max-width:500px) {.leader-title {width:100%;}}</style>
