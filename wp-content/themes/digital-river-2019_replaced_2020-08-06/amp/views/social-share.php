<div class="amp-share">
	<!-- Twitter -->
	<a href="https://twitter.com/share?text=<?php echo urlencode( $title ) ?>&amp;url=<?php echo $encoded_url ?>" target="_blank">
		<amp-img alt="Share this post on Twitter"
		src="<?php echo $home_url ?>/wp-content/themes/digital-river-2019/amp/img/icons_Twitter.jpg"
		width="30"
		height="30">
		</amp-img>
	</a> 

	<!-- LinkedIn -->
	<a target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $encoded_url?>&title= <?php echo urlencode( $title )?>" >
		<amp-img alt="Share this post on LinkedIn"
		src="<?php echo $home_url?>/wp-content/themes/digital-river-2019/amp/img/icons_LinkedIn.jpg"
		width="30"
		height="30">
		</amp-img>
	</a> 

	<!-- Email -->
	<a href="mailto:?subject=<?php echo $title?>&amp;body=<?php _e('Check out this article I found on the Digital River blog ','digital-river-2019'); echo $encoded_url?>">
		<amp-img alt="Share this post on through Email"
		src="<?php echo $home_url?>/wp-content/themes/digital-river-2019/amp/img/icons_Mail.jpg"
		width="30"
		height="30">
		</amp-img>
	</a>
</div>