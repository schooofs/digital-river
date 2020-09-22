<?php
/**
 * Template Name: Template A
 */
?>
<?php get_header(); ?>
  <div id="template_a">

    <?php get_template_part('masthead'); ?>

    <div class="background">
      <div class="container">
        <!-- Widget -->
        <?php if (get_the_content()) : ?>
          <section class="widget_container">
            <div class="row">
              <div class="span_11">
                <?php the_content(); ?>
                <?php dynamic_sidebar_cache('template_a_content'); ?>
              </div>
            </div>
            <div class="clear"></div>
          </section>
        <?php endif; ?>

        <!-- Widgets -->
        <div class="row">
          <section class="span_4 col"><?php dynamic_sidebar_cache('template_a_widget_1'); ?></section>
          <section class="span_4 col"><?php dynamic_sidebar_cache('template_a_widget_2'); ?></section>
          <section class="span_4 col last"><?php dynamic_sidebar_cache('template_a_widget_3'); ?></section>
        </div>

        <!-- Flex -->
        <section class="flex clearfix"><?php dynamic_sidebar_cache('template_a_flex'); ?></section>
      </div>
      <div class="clear"></div>
    </div>
    <div class="clear"></div>
  </div>
<?php get_footer(); ?>