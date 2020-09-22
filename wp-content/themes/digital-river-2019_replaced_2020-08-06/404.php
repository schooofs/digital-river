<?php get_header(); ?>

<style type="text/css">.wrapper-404{max-width: 400px;margin: 12rem auto 6rem;text-align: center; }h1.my-404{font-size: 8em;line-height: 10rem;}</style>
<div class="wrapper-404 pad-t-xxs-12 marg-b-xxs-12">
	<h1 class="my-404 marg-b-xxs-1">404</h1>
	<h2 class="marg-b-xxs-3"> <?= __("Oops! Page not found", "digital-river-2019") ?> </h2>
	<p class="marg-b-xxs-4"> <?= __("The page you are looking for moved, removed, 
	renamed or might never exist.", "digital-river-2019") ?></p>
	<div>
		<a href="<?php bloginfo('home'); ?>" class="btn"> <?= __("Return home", "digital-river-2019") ?> </a>
	</div>
</div>

<?php get_footer(); ?>