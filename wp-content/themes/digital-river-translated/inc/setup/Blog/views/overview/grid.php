<div class="container">
	<div class="bg-white" style="position:relative; min-height:1000px;">
		<div class="placehold-grid">
			<?php for ($i = 0; $i < 6; $i++): ?>
	            <div class="card card-hr col-md-4 col-sm-6 col-xs-12">
	              <div class="loader-wrapper">
	                <div class="loader"></div>
	              </div>
	              <div class="card-inner">
	                <div class="card-image bg-lightGray" style="height:230px"></div>
	                <div class="content-wrapper"></div>
	                <div class="med txt-black category bg-lightGray option no-margin" style="height:30px; width:110px;"></div>
	              </div>
	            </div>
	        <?php endfor; ?>
		</div>
		<div class="grid clearfix">
			<?php
			    $posts = BlogItem::getItems($category, null, 9, 0, $feature_id);
			    BlogItem::displayItems($posts, $is_category);
			?>
		</div>
	</div>
</div>