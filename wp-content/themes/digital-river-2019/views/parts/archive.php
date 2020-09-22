<?php foreach($posts as $key => $post): ?>
    <div class="clearfix marg-t-xxs-2 marg-b-xxs-2 marg-b-md-0 <?= $key > 3 ? " hidden view-less-posts" : null ?>">
       <?php if($post['media_logo'] !== null): ?>
              <img src="<?= $post['media_logo'] ?>" class="img-responsive" />
        <?php endif; ?>
        <span><?= $post['date']?></span>
        <a href="<?= $post['link'] ?>" <?= $post['target'] ?>>
            <div class="h5 marg-b-md-2"><?= $post['title'] ?></div>
        </a>
    </div>
<?php endforeach; ?>
<div class="col-sm-10 col-sm-offset-1 pad-t-xxs-3 text-center <?= count($posts) <= 4 ? " hidden " : null ?>">
    <button id="eventArchive" class="btn btn-primary view-all eventArchive">View All</button>
</div>