<?php get_header(); ?>

<style type="text/css">.wrapper-404{max-width: 400px;margin: auto;text-align: center;}h1.my-404{font-size: 8em;line-height: 10rem;}</style>
<div class="wrapper-404 pad-t-xxs-12 marg-b-xxs-12">
	<h1 class="my-404 marg-b-xxs-1">404</h1>
	<h2 class="marg-b-xxs-3"> <?= __("Page not found", "digital-river") ?> </h2>
	<p class="marg-b-xxs-4"> <?= __("The page you are looking for moved, removed, 
	renamed or might never exist.", "digital-river") ?></p>
	<div>
		<a href="<?php bloginfo('home'); ?>" class="btn btn-primary"> <?= __("Return to home", "digital-river") ?> </a>
	</div>
</div>

<?php get_footer(); ?>