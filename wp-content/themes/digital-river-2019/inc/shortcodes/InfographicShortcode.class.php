<?php

class InfographicShortcode
{
	public function __construct()
	{
		add_shortcode('infographic', [$this, 'callback']);
	}

	public function callback( $atts = array(), $content = null )
	{
		if (!isset($atts['src'])) {
			return false;
		}
		
		ob_start();
		?>
		<div class="infographic-wrapper text-center">
			<div class="infographic">
				<img style="border:solid 1px #eeeeee;" src="<?= $atts['src'] ?>" alt="<?= isset($atts['alt']) ? $atts['alt'] : null ?>" class="img-responsive" />
			</div>
			<div class="infographic-label btn btn-primary btn-block btn-lg"><?= ContentFormatter::svg("icons_ArrowDoubleDown", ["color" => "#ffffff", "size"=>20]) ." ". __("Expand", "digital-river-2019") ?></div>
		</div>
		<div class="marg-t-xxs-4">
			<h4>Copy and share on your website</h4>
			<pre style="font-size: 14px;"><?= esc_html('<p>') ?><br>  <?= esc_html('<strong>') ?><br>    <?= esc_html('<a href="' . get_permalink(get_the_ID()) . '">' . get_the_title(get_the_ID()) . '</a>') ?><br>    <?= __("by Digital River", "digital-river-2019") ?><br>  <?= esc_html('</strong>') ?><br>  <?= esc_html('<br><br>') ?><br>  <?= esc_html('<img src="' . $atts['src'] . '" width="640" border="0" alt="' . (isset($atts['alt']) ? $atts['alt'] : null) . '">') ?><br><?= esc_html('</p>') ?></pre>
		</div>
		<?php
		return ob_get_clean();
	}
}