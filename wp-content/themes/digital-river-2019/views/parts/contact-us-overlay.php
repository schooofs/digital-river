<div class="bottom-sticky-nav-backdrop"></div>
<div class="clearfix bottom-sticky-nav navbar-fixed-bottom">
	<div class="bottom-sticky-nav-inner pad-b-xxs-1 pad-b-sm-4" style="background-color:#ffffff;">
		<div class="text-center text-center hidden-xxs hidden-xs">
			<div class="icon">
				<div class="icon-circle contact-us">
					<?= ContentFormatter::svg("icons_ChatPopUp", ["color"=>"#ffffff"]) ?>
				</div>
				<div class="contact-us-label txt-blue"><?= __("Contact Sales", "digital-river-2019") ?></div>
			</div>
			<div class="icon">
				<?php if(get_page_by_path( 'request-demo' , OBJECT )): ?>
				<a href="/request-demo/"> 
				<?php endif; ?>
				<div class="icon-circle <?php if(get_page_by_path( 'request-demo' , OBJECT ) === null): ?> trigger-contact-us demo <?php endif; ?>">
					<?= ContentFormatter::svg("icons_DoubleArrows", ["color"=>"#ffffff"]) ?>
				</div>
				<div class="contact-us-label txt-blue"><?= __("Request a Demo", "digital-river-2019") ?></div>
				<?php if(get_page_by_path( 'request-demo' , OBJECT )): ?> 
				</a>
				<?php endif ?>
			</div>
		</div>
		<div class="row contact-us-options">
			<div class="col-xs-10 col-xs-offset-1 col-md-8 col-md-offset-2">
				<div class="row initial-options">
					<div class="col-sm-5 col-md-5 col-lg-5 col-xs-12 marg-t-xxs-2 border-r">
						<div class="inner-wrapper pad-l-xxs-3">
							<div class="h4 marg-b-xs-1"><?= __("Sales Inquiries", "digital-river-2019") ?></div>
							<p class="p marg-b-xs-2"><?= __("Interested in Digital River ecommerce solutions for your business?", "digital-river-2019") ?></p>
							<p class="p"> <a href="#" class="btn btn-primary get-started-btn"> <?= __("Get Started", "digital-river-2019") ?> </a></p>
						</div>
					</div>

					<div class="col-sm-7 col-md-7 col-lg-7 col-xs-12 marg-t-xxs-2">
						<div class="inner-wrapper pad-l-xxs-3">
							<div class="h4 marg-b-xs-1"><?= __("Shopper Support", "digital-river-2019") ?></div>
							<p class="p marg-b-xs-2"><?= __('For an unknown "DR+" charge on your billing statement or for assistance with an order.', "digital-river-2019") ?></p>
							<p class="p"> 
                                 
                                <a href="<?php if(get_page_by_path( 'shopper-support' , OBJECT )): ?> /shopper-support/ <?php endif; ?> <?php if(get_page_by_path( 'shopper-support' , OBJECT ) === null): ?> /#/ <?php endif; ?> "  class="btn btn-primary <?php if(get_page_by_path( 'shopper-support' , OBJECT ) === null): ?> trigger-contact-us demo get-started-btn <?php endif; ?>">
                                    <?= __("Find out details", "digital-river-2019") ?> </a>
                                
                            </p>
						</div> 
					</div>
				</div>
				<div class="row get-started-form"> <!-- Original popping form -->
					<div class="col-xxs-10 col-xxs-offset-1 col-xs-12 col-xs-offset-0">
						<div class="contact-us text-right pad-l-xxs-1 pad-r-xxs-1 h1 visible-xs visible-xxs marg-t-xxs-0 marg-b-xxs-0 pull-right" style="font-size: 6rem; cursor:pointer;">×</div>
						<p class="pad-t-xxs-2 pad-t-sm-0"><?= __("Fill out the form so we can get in touch.", "digital-river-2019") ?></p>
					</div>
					<div class="col-xxs-10 col-xxs-offset-1 col-xs-12 col-xs-offset-0">
                        <?php View::make("parts/contact-us-form", [
                            "mkto_form_id" => get_field("marketo_form_id", 'option')
                        ]); ?>
					</div>
				</div> <!-- end of Original popping form -->
			</div>
		</div>
	</div>
</div>

<style type="text/css">
	.get-started-form{display: none;}
	.shopper-support-display{display: none;}
	.contact-us-options .border-r{border-right: 1px solid #ccc;}
	@media screen and (max-width: 768px){.contact-us-options .border-r{border-right: none;}}
</style>
<script type="text/javascript">$(document).ready(function(){$(".get-started-btn").click(function(){$(".get-started-form").show();$(".initial-options").hide();});});</script>

