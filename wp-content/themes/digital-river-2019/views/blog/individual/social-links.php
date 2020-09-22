<div class="social-links blog social-icons hidden-xxs hidden-xs hidden-sm showDesktop pad-b-md-0">
	<a  target="_blank"
		rel="nofollow"
		ga-on="click"
		ga-event-label="Twitter"
		ga-event-category="Social Icons"
		ga-event-action="share"
		title="<?= __("Share on Twitter", "digital-river-2019") ?>"
		href="http://twitter.com/share?text=<?= urlencode(get_the_title()) ?>&url=<?= get_permalink() ?>">
		<div class="social-icon"><?= ContentFormatter::svg("icons_Twitter", ["color"=>"#03b5e8", "size"=>18]); ?></div>
	</a>
	<a  target="_blank"
		rel="nofollow"
		ga-event-label="LinkedIn"
		ga-event-category="Social Icons"
		ga-event-action="share"
		title="<?= __("Share on LinkedIn", "digital-river-2019") ?>"
		href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?= urlencode(get_the_title()) ?>"
	>
		<div class="social-icon"><?= ContentFormatter::svg("icons_LinkedIn", ["color"=>"#03b5e8", "size"=>18]); ?></div>
	</a>
	<a  target="_blank"
		rel="nofollow"
		ga-event-label="Email"
		ga-event-category="Social Icons"
		ga-event-action="share"
		title="<?= __("Share via Email", "digital-river-2019") ?>"
		href="mailto:?subject=<?= get_the_title() ?>&amp;body=<?= __("Check out this article I found on the Digital River blog ","digital-river-2019"); ?><?php the_permalink(); ?>." 
	>
		<div class="social-icon"><?= ContentFormatter::svg("icons_EmailEnvelopeDarker", ["color"=>"#03b5e8", "size"=>30]); ?></div>
	</a>
</div>
