<?php if ( function_exists('yoast_breadcrumb') ): ?>
<div class="row">
    <div class="col-xxs-10 col-xxs-offset-1">
        <?php yoast_breadcrumb('<div
class="pad-t-xxs-4 pad-t-sm-2 pad-b-xxs-2" id="breadcrumbs">','</div>'); ?>
    </div>
</div>
<?php endif; ?>
<div class="pad-t-xxs-3 pad-b-xxs-3 blog-
content-wrapper">
    <div class="row">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-xxs-10 col-xxs-offset-1 col-
md-8 col-md-offset-2 col-lg-6 col-lg-offset-3 post-wrapper">
                    <?php while ( have_posts() ) : the_post(); ?>
                    <?php
the_title('<h1 class="h2">', '</h1>') ?>
                        <hr>
                        <?php the_content() ?>
                        <?php endwhile; ?>
                        <div class="infographic-wrapper text-center">
                            <div class="infographic"> <img style="border:solid 1px #eeeeee;" src="<?= $infographic['url'] ?>" alt="<?= isset($infographic['alt']) ? $infographic['alt'] : null ?>" class="img-responsive" />
                            </div>
                            <div class="infographic-label btn btn-secondary btn-block btn-lg">
                                <?= ContentFormatter::svg("icons_ArrowDoubleDown", ["color" => "#ffffff", "size"=>20]) ." ". __("Expand", "digital-river-2019") ?>
                            </div>
                        </div>
                        <div class="marg-t-xxs-4 marg-b-xxs-4 text-center">
                            <button class="btn btn-primary copy-embed-code" ga-on="click" ga-event-label="<?= $infographic['alt'] ?>" ga-event-category="Infographic" ga-event-action="Expand" value="Copy Embed Code" data-clipboard-text="<?= esc_html('<p><strong><a href=" ' . get_permalink(get_the_ID())
. ' ">' . get_the_title(get_the_ID()) . '</a>' . __("by Digital River ",
"digital-river ") . '</strong><br><br><img src=" ' .
$infographic['url '] . ' " width="640 " border="0 " alt=" ' .
(isset($infographic['alt ']) ? $infographic['alt '] : null) . ' ">') .
esc_html('</p>') ?>">Copy Embed Code</button>
                            <div style="display: none;" class="alert alert-success marg-t-xxs-3" role="alert"><strong>Success! </strong>You copied the embed code.</div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>