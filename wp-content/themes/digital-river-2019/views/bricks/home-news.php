<div class="brick-home-news" id="<?= $anchor ?>"<?php if ($progress_nav_enabled) {
    echo ' data-progress-nav="active"';
} ?>>
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="dr_card blog">
                    <h2><?= $blog_heading ?></h2>
                    <div class="img-background"
                         style="background-image: url(<?= $blog->custom['small_image']['url'] ?>)"></div>
                    <h4><?= $blog->post_title ?></h4>
                    <p><?= $blog->post_excerpt ?> - <a class="link--fancy" href="<?= get_permalink($blog->ID) ?>"><?=
                            $cta_text_single ?> <i
                                    class="material-icons">arrow_forward</i></a></p>
                    <a href="<?= get_home_url() . '/resources' ?>"
                       class="btn btn-sm"><?= 'ALL ' . $blog_heading . ' POSTS'
                        ?></a>
                </div>
            </div>

            <div class="col-md-7">
                <h2><?= $news_events_heading ?></h2>

                <div class="dr_card">
                    <h3>
                        <span>
                            <svg width="8px" height="10px" viewBox="0 0 8 10" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <title>icon-press_release</title>
                            <g id="Design" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g id="Homepage-Current_Blocks-1" transform="translate(-713.000000, -3591.000000)">
                                    <g id="Group-8" transform="translate(-9.000000, 3224.000000)">
                                        <g id="Group-51" transform="translate(9.000000, 168.000000)">
                                            <g id="Group-50" transform="translate(165.000000, 88.000000)">
                                                <g id="Group-48" transform="translate(538.000000, 10.000000)">
                                                    <g id="Feature-1" transform="translate(2.000000, 68.000000)">
                                                        <g id="Group-38" transform="translate(0.000000, 26.000000)">
                                                            <g id="-Round-/-Action-/-description" transform="translate(6.000000, 6.000000)">
                                                                <polygon id="Path" points="0 0 12 0 12 12 0 12"></polygon>
                                                                <path d="M7.295,1.295 C7.105,1.105 6.85,1 6.585,1 L3,1 C2.45,1 2,1.45 2,2 L2,10 C2,10.55 2.445,11 2.995,11 L9,11 C9.55,11 10,10.55 10,10 L10,4.415 C10,4.15 9.895,3.895 9.705,3.71 L7.295,1.295 Z M7.5,9 L4.5,9 C4.225,9 4,8.775 4,8.5 C4,8.225 4.225,8 4.5,8 L7.5,8 C7.775,8 8,8.225 8,8.5 C8,8.775 7.775,9 7.5,9 Z M7.5,7 L4.5,7 C4.225,7 4,6.775 4,6.5 C4,6.225 4.225,6 4.5,6 L7.5,6 C7.775,6 8,6.225 8,6.5 C8,6.775 7.775,7 7.5,7 Z M6.5,4 L6.5,1.75 L9.25,4.5 L7,4.5 C6.725,4.5 6.5,4.275 6.5,4 Z" id="🔹Icon-Color" fill="#00A7E1" fill-rule="nonzero"></path>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                        </span>
                        <?= $press_releases_heading ?>
                    </h3>

                    <h4><?= $press_release->post_title ?></h4>
                    <p><?= $press_release->post_excerpt ?> - <a class="link--fancy"
                                                                href="<?= get_permalink($press_release->ID) ?>"
                                                                target="_blank"><?=
                            $cta_text_single ?> <i
                                    class="material-icons">arrow_forward</i></a></p>
                    <a href="<?= get_home_url() . '/about-us/news-and-events' ?>" class="btn btn-sm"><?=
                        'ALL ' . $press_releases_heading
                        ?></a>
                </div>

                <div class="dr_card">
                    <h3>
                        <span>
                            <svg width="10px" height="10px" viewBox="0 0 10 10" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <title>icon-events</title>
                            <g id="Design" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g id="Homepage-Current_Blocks-1" transform="translate(-712.000000, -3847.000000)">
                                    <g id="Group-8" transform="translate(-9.000000, 3224.000000)">
                                        <g id="Group-51" transform="translate(9.000000, 168.000000)">
                                            <g id="Group-50" transform="translate(165.000000, 88.000000)">
                                                <g id="Group-48" transform="translate(538.000000, 10.000000)">
                                                    <g id="Group-38" transform="translate(2.000000, 350.000000)">
                                                        <g id="-Round-/-Action-/-date_range" transform="translate(6.000000, 6.000000)">
                                                            <polygon id="Path" points="0 0 12 0 12 12 0 12"></polygon>
                                                            <path d="M9.5,2 L9,2 L9,1.5 C9,1.225 8.775,1 8.5,1 C8.225,1 8,1.225 8,1.5 L8,2 L4,2 L4,1.5 C4,1.225 3.775,1 3.5,1 C3.225,1 3,1.225 3,1.5 L3,2 L2.5,2 C1.945,2 1.505,2.45 1.505,3 L1.5,10 C1.5,10.55 1.945,11 2.5,11 L9.5,11 C10.05,11 10.5,10.55 10.5,10 L10.5,3 C10.5,2.45 10.05,2 9.5,2 Z M9.5,9.5 C9.5,9.775 9.275,10 9,10 L3,10 C2.725,10 2.5,9.775 2.5,9.5 L2.5,4.5 L9.5,4.5 L9.5,9.5 Z M3.5,5.5 L4.5,5.5 L4.5,6.5 L3.5,6.5 L3.5,5.5 Z M5.5,5.5 L6.5,5.5 L6.5,6.5 L5.5,6.5 L5.5,5.5 Z M7.5,5.5 L8.5,5.5 L8.5,6.5 L7.5,6.5 L7.5,5.5 Z" id="🔹Icon-Color" fill="#00A7E1" fill-rule="nonzero"></path>
                                                        </g>
                                                    </g>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                        </span>
                        <?= $events_heading ?>
                    </h3>

                    <h4><?= $event->post_title ?></h4>
                    <p><?= $event->post_excerpt ?> - <a class="link--fancy" href="<?= $event->custom['link_url'] ?>"><?=
                            $cta_text_single ?> <i
                                    class="material-icons">arrow_forward</i></a></p>
                    <a href="<?= get_home_url() . '/about-us/news-and-events' ?>" class="btn btn-sm"><?=
                        'ALL ' . $events_heading
                        ?></a>
                </div>
            </div>
        </div>
    </div>
</div>
