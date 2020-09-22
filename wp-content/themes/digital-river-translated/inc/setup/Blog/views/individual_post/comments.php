<section class="comment_section">
  <div class="view-comment-top"></div>
  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <div class="bg-white">
       	  <div class="row">
            <div class="col-sm-offset-1 col-sm-10">
              <div class="slide bottom-double">
      					<div class="comment-wrapper bg-lightGray" style="display:none;overflow: hidden;">
                  <?php if(count($comments) > 0): ?>
                    <section class="comments">
                       <div class="h2 eng text-center">Comments</div>
                      <?php foreach($comments as $comment): ?>
                    	  <article class="commen light">
                          <div class="comment-body bg-white"><?php echo $comment->comment_content ?></div>
                          <p class="light">by <?= $comment->comment_author ?> on <?= date('F j, Y', strtotime($comment->comment_date)) ?></p>
                        </article>
                      <?php endforeach; ?>
                    </section>
                  <?php else: ?>
                    <div class="h2 eng text-center" style="margin:20px 0">Leave a reply</div>
                  <?php endif; ?>
      						<form action="/wp-comments-post.php?wpe-comment-post=digitalriver" method="POST" id="commentform" class="comment-form bg-lightGray">
      							<input type="hidden" name="comment_parent" id="comment_parent" value="0">
      							<input type="hidden" name="icl_comment_language" value="en">
      							<div class="row">
      								<div class="col-sm-5">
      									<fieldset class="form-group small-half overlap">
      										<label for="exampleTextarea">Name</label>
      										<input class="form-control" maxlength="255" name="author" id="FirstName" type="text">
      									</fieldset>
      									<fieldset class="form-group small-half overlap">
      										<label for="exampleTextarea">Email</label>
      										<input class="form-control" maxlength="255" name="email" id="FirstName" type="text">
      									</fieldset>
      								</div>
      								<div class="col-sm-7">
      									<fieldset class="form-group overlap active">
      										<label class="textarea" for="exampleTextarea">Comment</label>
      										<textarea class="form-control" maxlength="1000" rows="4" name="comment" id="comment"></textarea>
      									</fieldset>
      								</div>
      								<input type="hidden" name="comment_post_ID" value="<?= get_the_ID() ?>" id="comment_post_ID">
      								<div class="col-sm-12 clearfix">
      									<input name="submit" type="submit" id="submit" class="submit btn btn-primary" value="Post Comment">
      									<span id="email-notes" class="pull-right"> Your email address will not be published. Required fields are marked <span class="required">*</span></span>
      								</div>
      							</div>
      						</form>
      					</div>
      					<div class="btn bg-lightGray eng h2 center-block option no-top-margin comment-btn"><span class="btn-toggle">View</span> Comments (<?php echo get_comments_number(); ?>)</div>
      				</div>
      			</div>
          </div>
        </div>
      </div>
		</div>
	</div>
</section>

<script>

jQuery(document).ready(function($){
    
    $('.comment-btn').on("click", function() {
      $('.comment-wrapper').slideToggle({
        duration: 500,
        easing: 'swing',
        start: function() {
          $('html, body').animate({
            scrollTop: $('.view-comment-top').offset().top
          });


        },
        complete: function() {
          if ($('.btn-toggle').text() == 'View') {
            $('.btn-toggle').text('Hide');
          } else {
            $('.btn-toggle').text('View');
          }
        }
      });
    });

});
  
</script>