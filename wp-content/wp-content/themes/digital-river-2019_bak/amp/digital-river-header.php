<?php
/**
 * Digital River Header template part.
 *
 * @package AMP
 */

?>
<header id="top" class="amp-wp-header">
	<div>
		<a href="<?php echo esc_url( $this->get( 'home_url' ) ); ?>">
			<?php $site_icon_url = $this->get( 'site_icon_url' ); ?>
			<?php if ( $site_icon_url ) : ?>
				<amp-img src="<?php echo esc_url( $site_icon_url ); ?>" width="100" height="100" class="amp-wp-site-icon"></amp-img>
			<?php endif; ?>
		</a>
	</div>
</header>
