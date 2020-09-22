<style>

	.year-selector-wrapper{
		padding: 12px 10px 10px;
		border-left: solid 3px <?= $green; ?>;
	}

	form{
		margin: 0;
	}

</style>
<div class="slide">
	<div class="container">
		<div class="row">
			<div class="col-md-8">

				<div class="year-selector-wrapper h4 light">
					<form method="GET">
				        <?php _e('View by year', 'digital-river'); ?>     
				        <select name="show_year" id="year">
				        	<?php foreach($years as $year) { ?>
		                        <option value="<?= $year ?>" <?= ($selected_year == $year) ? ' selected="selected" ' : null ?>><?= $year ?></option>
	                        <?php } ?>
	                    </select>
	                </form>
			    </div>

				<?php

				foreach($post_list as $post)
					$post->display();							

				?>
			</div>
			<div class="col-md-4">
			         
				<div class="h3 option no-margin-btm"><?php _e('See Also', 'digital-river'); ?></div>
				<ul class="list-unstyled">
					<li><a class="arrow" href="/company/newsroom/press-releases/"><?php _e('Press Releases', 'digital-river'); ?></a></li>
					<li><a class="arrow" href="/company/newsroom/media-coverage/"><?php _e('Media Coverage', 'digital-river'); ?></a></li>
				</ul>

			  	<div class="h3 option no-margin-btm"><?php _e('Media&nbsp;Inquiries', 'digital-river'); ?></div>
				<p>The goal of Digital River’s global public relations team is to provide you with timely
				 information and interesting story ideas. To help you find the right information for your story, 
				 please send email inquiries to&nbsp;<a href="mailto:publicrelations@digitalriver.com">Public Relations</a>.</p>
				<p>
					<strong>Gerri Dyrek</strong><br>
					Group VP,&nbsp;Corporate Communications<br>
					<abbr title="Phone">P:</abbr> +1 952 225 3719
				</p>
				<p>
					<strong>Kristin McKenzie</strong><br>
					Associate Director,&nbsp;Corporate Communications<br>
					<abbr title="Phone">P:</abbr> +1 952 225 3718
				</p>
			</div>
		</div>
	</div>
</div>

<script>
    jQuery(function($) {
        $('#year').on("change", function() {

            $(this).closest("form").submit();

        });
    });
</script>