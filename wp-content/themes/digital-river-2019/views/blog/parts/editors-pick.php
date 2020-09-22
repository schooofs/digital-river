<div class="col-md-12">
	<div class="txt-gray h5"><?= __("Editor's Pick", "digital-river-2019"); ?></div>
	<div class="h3"><?= $post->post_title ?></div>
	<p><?= $post->post_excerpt ?></p>
	<a class="btn btn-primary" href="<?= get_permalink($post->ID) ?>"><?= __("View Post","digital-river-2019") ?></a>
</div>