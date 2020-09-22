<?php
/**
 * Template Name: Template Industries
 */
?>
<?php get_header(); ?>
<?php get_template_part('masthead'); ?>

<style type="text/css">


	.top-wrapper, .clients-wrapper, .bottom-wrapper{font-family:"HelveticaNeueW01-55Roma";}
	.left_border{width:100% !important;}

	.clients-wrapper{width:100%; height:auto; border-left: solid 1px #b1b1b1; margin-top:75px; margin-bottom:75px;}
	.clients-wrapper .row{width: 100%; height: auto; overflow:hidden;}
	.clients-wrapper .row:first-child{border:none; }
	.clients-wrapper .row .client{width:33%; height:auto; float:left; overflow:hidden;}
	.clients-wrapper .row.first .client{ border-top: 1px solid #B1B1B1;}
	.clients-wrapper .row.middle .client{ border-top: 1px solid #B1B1B1; border-bottom: 1px solid #B1B1B1;}
	.clients-wrapper .row .client .header{width:100%; height:auto;   text-align:center; font-size:26px; font-family: 'DIN 1451 W01 Engschrift'; text-transform:uppercase;}
	.clients-wrapper .row .client .copy{width: 306px;
		margin-left: auto;
		margin-right: auto;
		text-align: center;
		margin-top: 10px;
		font-family:"HelveticaNeueW01-55Roma";
		font-size: 14px;
		line-height: 1.2;
	}
	#template_j	.clients-wrapper .row .client .cta-wrapper{margin:15px auto 0px; text-align:center;}
  	#template_j	.clients-wrapper .row .client .cta-wrapper a{font-family: "DIN 1451 W01 Engschrift", sans-serif; text-transform: uppercase; font-style: inherit; font-size: inherit; font-weight: inherit; color: #009ad7; font-size:1.2em; }



	.clients-wrapper .row .client .client-logo-wrapper{width: 100px; height:100px; margin-left:auto; margin-right:auto; margin-top: 35px;}
	.clients-wrapper .row .client .client-logo-wrapper .client-logo{width:auto; height:auto; max-width:100px; max-height:100px; margin:0 auto;}
	.clients-wrapper .row .client .client-action{width:200px; height:auto; margin-left:auto; margin-right:auto; margin-top:5px; margin-bottom:5px; text-align:center;}
	.clients-wrapper .row .client .client-action a{text-decoration:none; color:#009ad7;}
	.clients-wrapper .row .client .client-action a:hover{text-decoration:none; color:#009ad7;}
	.clients-wrapper .row .client .client-action a:visited{text-decoration:none; color:#009ad7;}
	.clients-wrapper .row .client-right{border-right:solid 1px #b1b1b1; }
	.clients-wrapper .row .client-middle{border-left:solid 1px #b1b1b1; border-right:solid 1px #b1b1b1;}

	.client-logo-wrapper {
		height: 25px;      /* equals max image height */
		width: 160px;
		white-space: nowrap;
		text-align: center; margin: 1em 0;
	}

	.client-logo-wrapper:before,
	.client-logo-wrapper_before {
		content: "";
		display: inline-block;
		height: 100%;
		vertical-align: middle;
	}

	.client-logo-wrapper img {
		vertical-align: middle;
		max-height: 25px;
		max-width: 160px;
	}


	@media only screen
	and (max-width : 1180px)
	and (min-width : 700px){
		.clients-wrapper .row .client-right{border-right:none; }
		.clients-wrapper .row .client-middle{border-left:none; border-right:none;}
		.clients-wrapper .row{border-top: none;}
		.clients-wrapper{border-top:none; border-left:none;}
		.even{background-color:#EEEEEE;}
		.clients-wrapper .row .client{border-bottom:none !important; }
		.clients-wrapper .row .client {
			width: 33%;
		}
		.clients-wrapper .row .client .copy {
			width: 225px;
		}
		.clients-wrapper .row .client{ border:none !important;}
	}


	@media only screen
	and (max-width : 700px){
		.clients-wrapper .row .client-right{border-right:none; }
		.clients-wrapper .row .client-middle{border-left:none; border-right:none;}
		.clients-wrapper .row{border-top: none;}
		.clients-wrapper{border-top:none; border-left:none;}
		.even{background-color:#EEEEEE;}
		.clients-wrapper .row .client{border-bottom:none !important; width:100%;}
				.clients-wrapper .row .client{ border:none !important;}

	}




</style>

<!--[if lte IE 8]>

<style type="text/css">
/* Move this to conditional comments */
.client-logo-wrapper {
    list-style:none;
    behavior: expression(
        function(t){
            t.insertAdjacentHTML('afterBegin','<span class="client-logo-wrapper_before"></span>');
            t.runtimeStyle.behavior = 'none';
        }(this)
    );
}
</style>

	<![endif]-->


<!-- Content Container -->
<section id="template_j" class="content_container">
    <div class="left_border"></div>
    <div class="container">
        <div class="row">




    <div class="clients-wrapper">
            <div class="row first">
                <div class="client client-left even">
					<div class="client-logo-wrapper">
						<a href=" <?php echo get_page_link(8881); ?> ">
							<img alt='<?php _e( 'Branded Manufacturing Industry Icon', 'digital-river-2019' ); ?>' class="client-logo" src="<?php echo get_image_path('Industries/Branded.png'); ?>" />
						</a>
					</div>
                    <div class="header"><?php _e( 'Branded Manufacturers', 'digital-river-2019' ); ?></div>
                    <div class="copy">
                    	<?php _e( 'Drive direct-to-consumer sales and complement existing channel relationships with our multichannel strategies.', 'digital-river-2019' ); ?>
                    </div>
					<div class="cta-wrapper">
							<a href=" <?php echo get_page_link(8881); ?> "><?php _e( '&#91; Learn More &#93;', 'digital-river-2019' ); ?></a>
					</div>
                </div>
                <div class="client client-middle odd">
                	<div class="client-logo-wrapper">
                		<img alt='<?php _e( 'Entertainment Industry Icon', 'digital-river-2019' ); ?>'  class="client-logo" src="<?php echo get_image_path('Industries/Entertainment.png'); ?>" />
                	</div>
                    <div class="header"><?php _e( 'Entertainment', 'digital-river-2019' ); ?></div>
                    <div class="copy">
                    	<?php _e( 'Stay well ahead of industry trends to generate more revenue from your music, movies, games and toys.', 'digital-river-2019' ); ?>
                    </div>
                </div>
                 <div class="client client-right even">
                	<div class="client-logo-wrapper">
                		<a href="<?php echo get_page_link(8530); ?>">
                			<img alt='<?php _e( 'Gaming Industry Icon', 'digital-river-2019' ); ?>' class="client-logo" src="<?php echo get_image_path('Industries/Gaming.png'); ?>">
                		</a>
                	</div>
                    <div class="header"><?php _e( 'Gaming', 'digital-river-2019' ); ?></a></div>
                    <div class="copy">
                    	<?php _e( 'Get your games in front of new players, strengthen loyalty with current gamers and expand into new global markets.', 'digital-river-2019' ); ?>
                    </div>
                    <div class="cta-wrapper">
							<a href=" <?php echo get_page_link(8530); ?> "><?php _e( '&#91; Learn More &#93;', 'digital-river-2019' ); ?></a>
					</div>
                </div>
            </div>

            <div class="row middle">
                <div class="client client-left odd">
                	<div class="client-logo-wrapper">
                		<a href='<?php echo get_page_link(9158); ?>'>
                			<img alt='<?php _e( 'Retail Industry Icon', 'digital-river-2019' ); ?>' class="client-logo" src="<?php echo get_image_path('Industries/Retail.png'); ?>" />
                		<a>
                	</div>
                    <div class="header"><?php _e( 'Retail', 'digital-river-2019' ); ?></div>
                    <div class="copy">
                    	<?php _e( 'Drive retail sales and enhance your existing relationships with our multichannel strategies.', 'digital-river-2019' ); ?>
                    </div>
                    <div class="cta-wrapper">
							<a href="<?php echo get_page_link(9158); ?> "><?php _e( '&#91; Learn More &#93;', 'digital-river-2019' ); ?></a>
					</div>
                </div>
                 <div class="client client-middle even">
                	<div class="client-logo-wrapper">
                		<a href='<?php echo get_page_link(9109); ?>'>
                			<img alt='<?php _e( 'Software Industry Icon', 'digital-river-2019' ); ?>' class="client-logo" src="<?php echo get_image_path('Industries/Software.png'); ?>" />
                		</a>
                	</div>
                    <div class="header"><?php _e( 'Software &amp; Services', 'digital-river-2019' ); ?></div>
                    <div class="copy">
                    	<?php _e( 'We understand the nuances of today’s on-demand software marketplace to drive greater global sales for clients.', 'digital-river-2019' ); ?>
                    </div>
                    <div class="cta-wrapper">
							<a href=" <?php echo get_page_link(9109); ?> "><?php _e( '&#91; Learn More &#93;', 'digital-river-2019' ); ?></a>
					</div>
                </div>
                <div class="client client-right odd">
                	<div class="client-logo-wrapper">
                		<img alt='<?php _e( 'Travel and Leisure Industry Icon', 'digital-river-2019' ); ?>' class="client-logo" src="<?php echo get_image_path('Industries/Travel.png'); ?>" />
                	</div>
                    <div class="header"><?php _e( 'Travel &amp; Leisure', 'digital-river-2019' ); ?></div>
                    <div class="copy">
                    	<?php _e( 'Global reach and payment options to effectively manage end-to-end traveler experience.', 'digital-river-2019' ); ?>
                    </div>
                </div>
            </div>



            <div class="row">
                  <div class="client client-left even" style='border-right:solid 1px #b1b1b1;'>
                	<div class="client-logo-wrapper">
                		<a href="<?php echo get_page_link(8472); ?>">
                			<img alt='<?php _e( 'Direct Selling Industry Icon', 'digital-river-2019' ); ?>' class="client-logo" src="<?php echo get_image_path('Industries/DirectSelling.png'); ?>">
                		</a>
                	</div>
                    <div class="header"><?php _e( 'Direct Selling', 'digital-river-2019' ); ?></div>
                    <div class="copy">
                    	<?php _e( 'Tailored solutions that increase speed to market, enable localization, and optimize revenue for businesses who sell direct.', 'digital-river-2019' ); ?>
                    </div>
                    <div class="cta-wrapper">
							<a href=" <?php echo get_page_link(8472); ?> "><?php _e( '&#91; Learn More &#93;', 'digital-river-2019' ); ?></a>
					</div>
                </div>

            </div>







    </div>








        </div>
    </div>
</section>
<?php get_footer(); ?>

<script type="text/javascript">

	jQuery(document).ready(function(){

		var client;
		var winner = 0;

		jQuery(".clients-wrapper").children('.row').each(function (){
			jQuery(this).children('.client').each(function (){
				client = jQuery(this).height();
				if(client > winner){
					winner = client;
				}

			})
			//adding some padding to the bottom of each .client
			winner += 5;
			jQuery(".clients-wrapper").children('.row').children('.client').css({height:winner+"px"});
			winner = 0;

		})

		var lastRow = jQuery(".clients-wrapper").children('.row').last();
		var lastClientClass = jQuery(lastRow).children('.client').last().attr("class");
		jQuery(lastRow).children('.client').css({borderBottom:"solid 1px #b1b1b1"})

		if( lastClientClass == "client client-left" ){
				jQuery(jQuery(lastRow).children('.client').last()).css({borderRight:"solid 1px #b1b1b1" });
		}
	})

</script>
