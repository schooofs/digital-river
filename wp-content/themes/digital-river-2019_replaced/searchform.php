<span class="pad-l-xxs-2 exit-search pull-right h1 hidden-sm hidden-xxs hidden-xs" aria-hidden="true">×</span>
<form role="search" method="get" class="search-form form-inline pull-right" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div class="form-group">
		<label class="pull-left search_field-inner-wrapper">
			<span class="sr-only"><?php echo _x( 'Search for:', 'label', 'digital-river-2019' ); ?></span>
			<input type="search" class="search-field form-control" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'digital-river-2019' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
		</label>
		<button type="submit" class="btn btn-primary btn-search pull-left"><span class="screen-reader-text"><?php echo _x( 'Search', 'submit button', 'digital-river-2019' ); ?></span></button>
	</div>
</form>