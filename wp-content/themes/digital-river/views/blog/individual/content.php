<div class="pad-t-xxs-3 pad-b-xxs-3 blog-content-wrapper">
	<div class="row">
		<div class="col-sm-12">
			<div class="row">
				<div class="col-xxs-10 col-xxs-offset-1 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3 post-wrapper">
					<?php while ( have_posts() ) : the_post(); ?>
                    <a href="/blog/" class="h6 txt-lightBlue" style="cursor: pointer;"><?= __("< Back to blog","digital-river") ?></a>
						<p class="marg-t-xxs-2"><?php _e("Last modified: ","digital-river") . the_modified_date('F j, Y'); ?></p>
						<hr>
                    <div class="social-links blog social-icons hidden-md hidden-lg hidden-xl pad-b-md-0" style="float:left;">
                        <a  target="_blank"
                            rel="nofollow"
                            ga-on="click"
                            ga-event-label="Twitter"
                            ga-event-category="Social Icons"
                            ga-event-action="share"
                            title="<?= __("Share on Twitter", "digital-river") ?>"
                            href="http://twitter.com/share?text=<?= urlencode(get_the_title()) ?>&url=<?= get_permalink() ?>">
                            <div class="social-icon"><?= ContentFormatter::svg("icons_Twitter", ["color"=>"#03b5e8", "size"=>18]); ?></div>
                        </a>
                        <a  target="_blank"
                            rel="nofollow"
                            ga-event-label="LinkedIn"
                            ga-event-category="Social Icons"
                            ga-event-action="share"
                            title="<?= __("Share on LinkedIn", "digital-river") ?>"
                            href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?= urlencode(get_the_title()) ?>"
                        >
                            <div class="social-icon"><?= ContentFormatter::svg("icons_LinkedIn", ["color"=>"#03b5e8", "size"=>18]); ?></div>
                        </a>
                        <a  target="_blank"
                            rel="nofollow"
                            ga-event-label="Email"
                            ga-event-category="Social Icons"
                            ga-event-action="share"
                            title="<?= __("Share via Email", "digital-river") ?>"
                            href="mailto:?subject=<?= get_the_title() ?>&amp;body=<?= __("Check out this article I found on the Digital River blog ","digital-river"); ?><?php the_permalink(); ?>." 
                        >
                            <div class="social-icon"><?= ContentFormatter::svg("icons_EmailEnvelopeDarker", ["color"=>"#03b5e8", "size"=>30]); ?></div>
                        </a>
                    </div>
					<?php the_content() ?>
					<?php endwhile; ?>
					<?php /*
					<div class="panel panel-default bg-blue">
						<div class="panel-body">
							<div class="row">
								<div class="col-md-10 col-md-offset-1 pad-t-md-3 pad-b-md-3 pad-l-md-7 pad-r-md-7">
									<div class="h4">Testing this.</div>
									<p>Engage new users and convert them to active customers with our series of message templates.</p>
									<style>#mktoForm_4487 label{color:#ffffff;}</style>
									<?= $contact_us_form ?>
								</div>
							</div>
						</div>
					</div>
					*/ ?>
				</div>
			</div>
		</div>
	</div>
</div>
