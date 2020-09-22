<?php
class ContentFormatter {

	public static function button($link, $button_color, $label)
	{
		ob_start(); ?>

		<a class="btn <?= $button_color ?>" href="<?= $link ?>"><?= $label ?></a>

   		<?php return ob_get_clean();
	}

	public static function heading($seo_tag, $size, $tag, $heading, $uppercase = false, $extra_classes = null)
	{
		ob_start(); ?>
		<<?= $seo_tag ?> class="<?= ($tag === true) ? 'tag':'' ?> <?= ($uppercase === true) ? 'text-uppercase' : '' ?> <?= $size ?> <?= $extra_classes ?>"><?= $heading ?></<?= $seo_tag ?>>
   		<?php return ob_get_clean();
	}

	public static function link($link_args)
	{
		ob_start(); ?>
		<a <?php if($link_args['type_of_link'] === "external"){ echo ' target="_blank" rel="nofollow" href="'.$link_args['external_link'].'"';} ?>
		   <?php if($link_args['type_of_link'] === "dr"){ echo ' href="'.$link_args['page_link'].'"';} ?>
		   <?php if($link_args['type_of_link'] === "contact"){ echo ' style="cursor:pointer;" ';} ?>
		   <?php if($link_args['type_of_link'] === "video"){ echo ' data-vimeoid="' . get_field("vimeo_id",$link_args['video']) . '" data-toggle="modal" data-target=".videos-modal" ';} ?>
		   class="<?= $link_args['type_of_link'] === "video" ? ' play-video ':'' ?>
		   <?= ($link_args['type_of_link'] === "contact") ? ' trigger-contact-us ':'' ?>
		   <?= $link_args['button_or_link'] === 'button' ? ' btn btn-primary ':' text-uppercase ' ?>"
		   <?= $link_args['type_of_link'] === "video" ? '  role="button" ':'' ?>>
		   <?= $link_args['link_label'] ?>
		</a>
   		<?php
   		 return ob_get_clean();
	}

	public static function content($content)
	{
		ob_start();
		if($content === false) return false;
		?>
		<?php foreach($content as $content_item): ?>
			<?php if(isset($content_item['acf_fc_layout'])): ?>
				<?php if($content_item['acf_fc_layout'] === "heading"): ?>
					<?= self::heading($content_item['heading_seo_tag'],$content_item['heading_size'],$content_item['heading_tag'],$content_item['heading_heading'], $content_item['heading_uppercase']) ?>
				<?php elseif($content_item['acf_fc_layout'] === "link"): ?>
					<?= self::link($content_item) ?>
				<?php elseif($content_item['acf_fc_layout'] === "image"): ?>
					<?= self::image($content_item['image'], "img-responsive center-block ".$content_item['hide_at_breakpoint']) ?>
				<?php elseif($content_item['acf_fc_layout'] === "lead_paragraph"): ?>
					<p class="lead"><?= $content_item['lead_paragraph'] ?></p>
				<?php elseif($content_item['acf_fc_layout'] === "paragraph"): ?>
					<p><?= $content_item['paragraph'] ?></p>
				<?php elseif($content_item['acf_fc_layout'] === "lead_bullet_points"): ?>
					<ul class="lead">
						<?php foreach($content_item['lead_bullet_points'] as $bullet_point_item): ?>
							<li><?= $bullet_point_item['bullet_point']; ?></li>
						<?php endforeach; ?>
					</ul>
				<?php elseif($content_item['acf_fc_layout'] === "bullet_points"): ?>
					<ul>
						<?php foreach($content_item['bullet_points'] as $bullet_point_item): ?>
							<li><?= $bullet_point_item['bullet_point']; ?></li>
						<?php endforeach; ?>
					</ul>
				<?php elseif($content_item['acf_fc_layout'] === "button"): ?>
					<?php $link = ($content_item['is_external'] === 1) ? $content_item['link'] : get_permalink($content_item['page']->ID); ?>
					<?= self::button($link, $content_item['button_style'], $content_item['button_label']) ?>
				<?php endif; ?>
			<?php endif; ?>
		<?php endforeach; ?>

   		<?php return ob_get_clean();
	}

	public static function image($image, $classes = "img-responsive center-block")
	{
		ob_start(); ?>
		<img data-original="<?= $image['url'] ?>" alt="<?= $image['alt'] ?>" class="lazy <?= $classes ?>"  />
   		<?php return ob_get_clean();
	}


	public static function truncate($text)
	{
	    $text = str_replace("<p>", "", $text);
	    $text = str_replace("</p>", "", $text);
	    $chars = 125;
	    $text = $text." ";
	    $text = substr($text,0,$chars);
	    $text = substr($text,0,strrpos($text,' '));
	    $text = $text."...";
	    return $text;
	}

	public static function svg($file_name, $options = [])
	{
		$rand_num = rand ( 1, 100000 );
		ob_start(); ?>
		<div class="svg-wrapper svg-<?= $rand_num ?> <?= isset($options['class']) ? $options['class'] :"" ?>">
		<style>.svg-<?= $rand_num ?> svg * {<?= isset($options['color']) ? 'fill:'.$options['color'].' !important;':"" ?>} .svg-<?= $rand_num ?> svg #Invisible_Shape * {fill:transparent;}</style>
		<?php include "wp-content/themes/digital-river-2019/assets/images/svg/" . $file_name . ".svg"; ?>
		<?php if(isset($options['size'])) { ?><script>document.querySelector(".svg-<?= $rand_num ?> svg").setAttribute("height",  "<?= $options['size'] ?>");document.querySelector(".svg-<?= $rand_num ?> svg").setAttribute("width",  "<?= $options['size'] ?>");</script><?php } ?>
		</div>
	   <?php return ob_get_clean();
	}


}
