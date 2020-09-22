<?php
/**
 * Template Name: Template B
 */
?>
<?php get_header(); ?>
<?php get_template_part('masthead'); ?>

    <!-- Content Container -->
    <section id="template_b" class="content_container">
        <div class="left_border"></div>
        <div class="container">
            <div class="row">
                <section class="main_content span_8 col">
                    <div class="container">
                        <div class="span_12">
                        <?php
                        $cat = get_the_category( $post->orig_id );
                        if ((!empty($cat) || $post->post_content) && !get_field('hide_title')) :
                        ?>
                        <div class="body_title"><?php the_title(); ?></div>
                        <?php endif; ?>
                    
                        
                            <?php if ($post) : ?>
                                <div class="splitter"></div>
                                <div class="content post_content"><?php echo apply_filters('the_content', $post->post_content); ?></div>
                                <!-- <div class="content post_content"><?php //echo (get_the_content()) ? get_the_content(): $post->post_content; ?></div> -->
                            <?php endif; ?>

                            <?php if (get_field('show_latest_post')) : ?>
                            <div class="widget row">
                                <section class="latest_post col">
                                    <div class="splitter"></div>
                                    <?php
                                    $latest_post = get_field('latest_news_post');
                                    $latest_post->fields = get_fields($latest_post->ID);
                                    $latest_post_object  = get_post($latest_post->ID);
                                    $latest_post_excerpt = $latest_post->fields['intro_text'];
                                    ?>
                                    <div class="header"><?php echo get_field('latest_post_header'); ?></div>
                                    <div class="clear"></div>
                                    <?php $latest_post_link = ($latest_post->fields['external_link'])?: get_permalink($latest_post->ID); ?>
                                    <a href="<?php echo $latest_post_link; ?>" class="title" style="font-style:normal;"><?php echo $latest_post->post_title; ?></a>
                                    <p><?php echo $latest_post_excerpt; ?></p>
                                    <a href="<?php echo $latest_post_link; ?>" class="link"><?php echo get_field('latest_post_read_more_link'); ?></a>
                                    <div class="splitter"></div>
                                </section>
                                <div class="clear"></div>
                            </div>
                            <?php endif; ?>

                        <?php 
                           $cat = get_the_category( $post->orig_id );
                           if (!empty($cat)) {
                               $post_category = $cat[0];
                               $criteria = (array)$post_category;
                               $cid = $criteria['cat_ID'];
                           }
                           ?>
                           <?php if(empty($cat)) { ?>
                            <?php dynamic_sidebar_cache('template_b_content'); ?>
                            <?php } ?>
                            <div class="clear"></div>
                        </div>
                    </div>
                </section>
                <div class="border_left"></div>

                <!-- Sidebar -->
                <section class="rail span_4 last col">
                    <?php
                    change_sidebar_context();
                    dynamic_sidebar_cache('template_b_right_sidebar');
                    revert_sidebar_context();
                    ?>
                    <div class="clear"></div>
                </section>
            </div>
            <div class="clear"></div>
        </div>
    </section>
<?php get_footer(); ?>
