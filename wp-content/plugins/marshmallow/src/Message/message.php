<?php


if ( ! function_exists('options')) {

    require_once BASE_PATH . '/src/Admin/Menu/Options.php';

		function dr_get_option( $option_name ) {
            $optionsService = \DigitalRiver\container()->get('optionsService');
            return $optionsService->get_message_option($option_name);
		}

	if ( ! function_exists( 'dr_body_class' )) {
		function dr_body_class($classes) {
			$dr_push_page = dr_get_option('message_push');
			$dr_ramain_top = dr_get_option('message_top');
			$dr_close = dr_get_option('message_close');

			if ( $dr_push_page == 'yes') {
				$classes[] = 'dr-push-page';
			} else {
				$classes[] = 'dr-cover-page';
			}

			if ( $dr_close == 'yes' ) {
				$classes[] = 'dr-allow-close';
			}

			if ( $dr_ramain_top == 'yes' ) $classes[] = 'dr-ramain-top';

			return $classes;
		}
		add_filter('body_class','dr_body_class');
	}

	function dr() {

		$dr_ramain_top = dr_get_option('message_top');
		$drcd_use = dr_get_option('message_enable');

		$drcd_link_text = dr_get_option('message_link_text');
		$drcd_link_url = dr_get_option('message_link_url');
		$drcd_link_target = dr_get_option('message_link_target');

		$dr_link_text = dr_get_option('message_link_text');
		$dr_link_url = dr_get_option('message_link_url');
		$dr_link_target = dr_get_option('message_link_target');

		$dr_font_size = dr_get_option('message_font');
		$dr_background_color = dr_get_option('message_bgcolor');
		$dr_font_color = dr_get_option('message_textcolor');
		$dr_border_color = dr_get_option('message_bordercolor');
		$dr_link_color = dr_get_option('message_link_color');
		$dr_link_style = dr_get_option('message_link_style');
		$dr_button_color = dr_get_option('message_buttoncolor');

		$dr_custom_style = dr_get_option('message_customcss');

		$dr_link = '';
		if ( $dr_link_text != '' ) {
			$dr_link = ' <a class="'. $dr_link_style .'" href="'.esc_html($dr_link_url).' " target="'. $dr_link_target .'"" >'.$dr_link_text.'</a>';
		}

		$drcd_link = '';
		if ( $drcd_link_text != '' ) {
			$drcd_link = ' <a class="'. $dr_link_style .'" href="'.$drcd_link_url.' " target="'. $drcd_link_target .'"" >'.$drcd_link_text.'</a>';
		}
	?>
		<style>

			<?php if( $dr_background_color != '' ) : ?>
			#dr,
			.dr-action {
				background-color: <?php echo $dr_background_color; ?>;
			}
			<?php endif; ?>

			<?php if( $dr_font_color != '' ) : ?>
			#dr,
			.dr-action,
			body.dr-allow-close.dr-open .dr-close {
				color: <?php echo $dr_font_color; ?>;
			}
			<?php endif; ?>

			<?php if( $dr_font_size != '' ) : ?>
			#dr {
				font-size: <?php echo $dr_font_size; ?>px;
			}
			<?php endif; ?>

			<?php if( $dr_font_size > 20 ) : ?>
			#dr {
				line-height: 1.2;
			}
			<?php endif; ?>

			<?php if( $dr_border_color != '' ) : ?>
			#dr {
				border-color: <?php echo $dr_border_color; ?>;
			}
			<?php endif; ?>

			<?php if( $dr_border_color == '' ) : ?>
			#dr {
				border-width: 0;
			}
			<?php endif; ?>

			<?php if( $dr_link_color != '' ) : ?>
			#dr a {
				color: <?php echo $dr_link_color; ?>;
			}
			<?php endif; ?>

			<?php if( $dr_button_color != '' ) : ?>
			#dr .dr-button {
				background-color: <?php echo $dr_button_color; ?>;
			}
			<?php endif; ?>

			<?php if( $dr_custom_style != '' ) : ?>
				<?php echo $dr_custom_style ?>
			<?php endif; ?>
		</style>

		<div id="dr" class=" <?php echo $dr_ramain_top; ?> ">
			<div class="dr-inner">
				<?php
                    global $client;
                    if($client->show_custom_message){
                        $message = dr_get_option('message_text_custom');
                        $message = dr_template_map_replace($message, $client);
                    }else{
                        $message = dr_get_option('message_text_default');
                    }
					?>

				<div class="dr-message">
					<span class="dr-content"><?php echo esc_html($message); ?></span>
					<?php echo $dr_link; ?>
				</div>
					
			</div>
		</div>
		<?php 
			$dr_close = dr_get_option('message_close');
			$dr_action_class = 'dr-action';
			if ($dr_close == 'yes') {
				$dr_action_class = 'dr-close';
			}
		?>
		<span class="<?php echo $dr_action_class; ?>"></span>
	<?php }

	$dr_enable = dr_get_option('message_enable');
	add_action( 'wp_head', 'dr');
}

function dr_template_map_replace($text, $client) {
    $map = [
        'company_name' => $client->salesforce_account_name
    ];

    foreach($map as $template_string => $value) {
        $text = str_replace('{{'.$template_string.'}}', $value, $text);
    }

    return $text;
}
?>