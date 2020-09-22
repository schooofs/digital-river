<?php
/**
 * Digital River Single view template.
 *
 * @package AMP
 */

/**
 * Context.
 *
 * @var AMP_Post_Template $this
 */

$this->load_parts( array( 'html-start' ) );

$this->load_parts( array( 'header' ) );

?>
<article class="amp-wp-article">

    <?php CustomAmp\AmpBlogController::featured_image(); ?>


	<header class="amp-wp-article-header">
	  <h1 class="amp-wp-title"><?php echo esc_html( $this->get( 'post_title' ) ); ?></h1>
	  <p class="author-meta"><?php _e("By:  ", "digital-river");the_field('main-author'); ?></p>
	</header>
	
	<div class="amp-wp-article-content">
		<p class="modified-date"><?php _e("Last modified: ","digital-river") . the_modified_date('F j, Y'); ?></p>
		<hr>
		<?php CustomAmp\AmpBlogController::social_share(); ?>
		
		<?php echo $this->get( 'post_amp_content' ); ?>

	</div>
	
</article>

<?php CustomAmp\AmpBlogController::custom_footer(); ?>

<?php
$this->load_parts( array( 'html-end' ) );
