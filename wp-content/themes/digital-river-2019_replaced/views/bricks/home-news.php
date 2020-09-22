<div class="brick-home-news" id="<?= $anchor ?>"<?php if ($progress_nav_enabled) {
    echo ' data-progress-nav="active"';
} ?>>
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <h2><?= $blog_heading ?></h2>

                <div class="dr_card blog">
                    <div class="img-background"
                         style="background-image: url(<?= $blog->custom['small_image']['url'] ?>)"></div>
                    <h4><?= $blog->post_title ?></h4>
                    <p><?= $blog->post_excerpt ?> - <a href="<?= get_permalink($blog->ID) ?>"><?=
                            $cta_text_single ?></a></p>
                    <a href="<?= get_home_url() . '/resources' ?>" class="btn btn-sm"><?= $cta_text_landing ?></a>
                </div>
            </div>

            <div class="col-md-7">
                <h2><?= $news_events_heading ?></h2>

                <div class="dr_card">
                    <h3><?= $press_releases_heading ?></h3>

                    <h4><?= $press_release->post_title ?></h4>
                    <p><?= $press_release->post_excerpt ?> - <a href="<?= get_permalink($press_release->ID) ?>"
                                                                target="_blank"><?=
                            $cta_text_single ?></a></p>
                    <a href="<?= get_home_url() . '/about-us/news-and-events' ?>" class="btn btn-sm"><?=
                        $cta_text_landing
                        ?></a>
                </div>

                <div class="dr_card">
                    <h3><?= $events_heading ?></h3>

                    <h4><?= $event->post_title ?></h4>
                    <p><?= $event->post_excerpt ?> - <a href="<?= $event->custom['link_url'] ?>"><?=
                            $cta_text_single ?></a></p>
                    <a href="<?= get_home_url() . '/about-us/news-and-events' ?>" class="btn btn-sm"><?=
                        $cta_text_landing
                        ?></a>
                </div>
            </div>
        </div>
    </div>
</div>
