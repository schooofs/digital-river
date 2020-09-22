<?php
/**
 * Template Name: Template WHY DR
 */
?>
<?php get_header(); ?>
<?php get_template_part('masthead'); ?>
<style type="text/css">

 .eyebrow {
    margin: 30px 0px 0px;
}

.section a{font-family: Arial, sans-serif;}

.service-content .sub-service .header{font-size: 28px !important;}

.service-content .sub-service .header a {
    color: #009AD7;
    text-decoration: none;
    font-family: 'DIN 1451 W01 Engschrift';
}

	    .why-digital-river{line-height:1 ;}


	.left_border{width:100% !important;}
	.section{height:auto; overflow:hidden; border-top: solid 1px rgb(151,215,0); padding-top:15px; margin-top:75px; }
	.section:first-child{border-top: none}
	.section:last-child{margin-bottom:75px;}
	.section .eyebrow-wrapper{ margin-top:0px;}
	.section .eyebrow-wrapper{width:auto; height:auto; padding:5px; margin-bottom:45px; margin-top:25px;}
	.section:first-child .eyebrow-wrapper{margin-top:0px;}

	.section .left-side{width:360px; height:auto; float:left; padding:15px; line-height: 1.3;}
	.section .right-side{width:705px; height:auto; float:right;}

	#first {width:705px; height:250px; float:right; }

	#first  .mission-values-wrapper{
		background-color: #F4F4F4;
		padding: 10px;
		height: auto;
		width: 655px;
		overflow:hidden;
		font-family: 'DIN 1451 W01 Engschrift';
		text-transform:uppercase;
	}
	#first  .mission-values-wrapper .mission-wrapper{
		width: 283px;
		float: left;
		padding-right: 18px;
		border-right: solid 2px #009ad7;
		margin-left: 20px;
	}
	#first  .mission-values-wrapper .values-wrapper{
		width: 283px;
		float: left;
		margin-right: 20px;
		margin-left: 20px;
	}
	#first .mission-values-wrapper .mission-wrapper .header, .section .right-side .mission-values-wrapper .values-wrapper .header{
		font-size:26px;
		color:#009ad7;
	}
	#first  .mission-values-wrapper .mission-wrapper .copy, .section .right-side .mission-values-wrapper .values-wrapper .copy{
		font-size:34px;
		color:#231f20;
	}

	#first .slogan-wrapper{width:100%; height:auto;}
	#first  .slogan-wrapper .slogan-word{width:215px; padding-top:30px; padding-left:10px; padding-bottom:0px;  float:left; color:#FFF; font-family: 'DIN 1451 W01 Engschrift'; text-transform:uppercase; text-align:center; font-size:65px; height:53px;}
	#expert{background-color:#009ad7;}
	#global{background-color:#a8ca1f;}
	#growth{background-color:#585656;}

	#second {width:705px; height: 554px; }

	.section .right-side .snapshot-wrapper{width:675px; height:auto; overflow:hidden; padding:15px; background-color:#F4F4F4;}
	.section .right-side .snapshot-wrapper .header{font-family:'DIN 1451 W01 Engschrift'; text-transform:uppercase; font-size:26px; color:#009ad7}
	.section .right-side .snapshot-wrapper .tag{font-size:16px; width:100%; font-family:Arial,sans-serif;}
	.section .right-side .snapshot-wrapper .left-list, .section .right-side .snapshot-wrapper .right-list{width:327px; float:left; }
	.section .right-side .snapshot-wrapper .left-list ul, .section .right-side .snapshot-wrapper .right-list ul{margin:0; margin:10px; font-family:Arial,sans-serif; }
	.section .right-side .snapshot-wrapper .left-list li, .section .right-side .snapshot-wrapper .right-list li{list-style-type: disc; margin-top:4px;}

 	.section .right-side .five-columns{width:100%; height:auto;}
	.section .right-side .five-columns .columns{width:129px; height: 353px; overflow:hidden; padding:5px; background-color:#009ad7; float:left;
	margin-left:1px; margin-right:1px;  position: relative; }
	.section .right-side .five-columns .columns:first-child{margin-left:0px; width:130px;}
	.section .right-side .five-columns .columns:last-child{margin-right:0px; width:130px;}
	.section .right-side .five-columns .columns .header{ width:100%; margin-top:10px; color:#FFF;  font-size:18px; font-family: 'DIN1451W01-Mittelschrif'; text-transform:uppercase; }
	.section .right-side .five-columns .columns .copy{ width: 100%; margin-top:31px; font-size:15px; height:200px; }
	
.ja .section .right-side .five-columns .columns .header {
    font-size: 14px;
}

	#subscriptions .copy{margin-top:48px;}
	#currencies .copy{margin-top:15px;}
	.section .right-side .five-columns .columns-number{width:139px; padding-top:5px; background-color:#009ad7; float:left; color:#FFF; font-size:76px; text-align:center; margin-left:1px; margin-right:1px; font-family: 'DIN 1451 W01 Engschrift'; text-transform:uppercase; bottom: -10px; position: absolute; right: 4px; }
	.section .right-side .five-columns .columns-number:first-child{margin-left:0px; width:140px;}
	.section .right-side .five-columns .columns-number:last-child{margin-right:0px; width:140px;}

	.section .commerce-service{width:100%; height: 521px; overflow:hidden; font-family: 'DIN 1451 W01 Engschrift'; text-transform:uppercase; color:#807e82; }
	.section .commerce-service .service{width:276px; margin-left:6px; margin-right:6px; background-color:#f4f4f4; height:515px; position:absolute;}
	.section .service2{width:276px; margin-left:6px; margin-right:6px; background-color:#f4f4f4; height:495px; float:left;}
	.section .commerce-service .service:first-child{margin-left:0px;}
	.section .commerce-service .service:last-child{margin-right:0px;}
	.section  .service2 .icon, .section .commerce-service .service .icon{width:150px; height:150px; margin-top:40px; margin-right:auto; margin-left:auto; text-transform:uppercase;  overflow:hidden;}
	.section  .service2 .header, .section .commerce-service .service .header{width:100%; text-align:center; font-size:30px; margin-top:25px; font-family: 'DIN 1451 W01 Engschrift'; text-transform:uppercase; color:#807e82;}
	<?php if (ICL_LANGUAGE_CODE == 'de' || ICL_LANGUAGE_CODE == 'ja'){ ?>
	.section  .service2 .button-wrapper, .section .commerce-service .service .button-wrapper{margin-top:25px; width:150px; height:30px; margin-left:auto; margin-right:auto;}
	<?php }else{ ?>
	.section  .service2 .button-wrapper, .section .commerce-service .service .button-wrapper{margin-top:25px; width:100px; height:30px; margin-left:auto; margin-right:auto;}
	<?php } ?>
	.section  .service2 .links-wrapper{margin-top:25px; width:auto; height:150px; margin-left:auto; margin-right:auto; }
	.section  .service2 .links-wrapper a{font-family:"HelveticaNeueW01-55Roma"; font-weight:normal; font-style:inherit; font-size:14px; float:left; margin-top:5px; text-decoration:none; color:#009AD7; width:85%; margin-left:15%;}
	.section  .service2 .links-wrapper a:hover{text-decoration:underline;}
	#experience .button-wrapper{margin-top:85px;}
	#marketing .button-wrapper{margin-top:85px;}
	#infrastructure .button-wrapper{margin-top:55px;}
	#payments .button-wrapper{margin-top:115px; }
	.section .service2:last-child .button-wrapper, .section .commerce-service .service:last-child .button-wrapper{margin-top:63px; }
	.section .service2 .button-wrapper input, .section .commerce-service .service .button-wrapper input{
			  position: relative;
		  vertical-align: top;
		  width: 100%;
		  height: 100%;
		  padding: 0;
		  font-size: 14px;
		  color: white;
		  text-align: center;
		  background: #585656;
		  color:#fff;
		  border: 0;
		  cursor: pointer;
		  border-radius:2px;

	}
.service-content .sub-service .copy ul{margin-left:20px; margin-top:5px; margin-bottom:2px; }
.service-content .sub-service .copy li{list-style-type: disc; margin-top:3px;}
.service-content .sub-service .header { text-align: left; }
.service-content .sub-service .header a { color: #009ad7; text-decoration: none; }
.service-content .sub-service .header a:hover { text-decoration: underline; }

	.marketing-expanded .service-content{width:847px; float:right; height:395px;  padding-top:35px; opacity:0;
		filter:Alpha(opacity=00);}
	.marketing-expanded .service-content .sub-service{width:250px; height:115px; float:left; text-align:left; margin-left:24px; margin-top:70px; 		}
	.marketing-expanded .service-content .sub-service .header{font-family: 'DIN 1451 W01 Engschrift'; text-transform:uppercase; color:#807e82; font-size:28px;}
	.marketing-expanded .service-content .sub-service .copy{margin-top:10px;  font-family:Arial, sans-serif; text-transform:none;}

	.experience-expanded .service-content{width:847px; float:right; height:395px; 	opacity:0;
		filter:Alpha(opacity=00); }
	.experience-expanded .service-content .sub-service{width:250px; height:115px; float:left;margin-left:24px; margin-top:25px; 	}
	.experience-expanded .service-content .sub-service .header{ font-family: 'DIN 1451 W01 Engschrift'; text-transform:uppercase; color:#807e82; font-size:28px;}
	.ja .experience-expanded .service-content .sub-service .header{ font-size:22px;}
	.experience-expanded .service-content .sub-service .copy{margin-top:10px;  font-family:Arial, sans-serif; text-transform:none;}
	.experience-expanded .service-content .sub-service .copy ul{margin-top:10px;}

	.infrastructure-expanded .service-content{width:847px; float:right; height:395px; padding-top:0px; opacity:0;
		filter:Alpha(opacity=00);}
	.infrastructure-expanded .service-content .sub-service{width:250px; height:115px; float:left; margin-left:24px; margin-top:25px; 		}
	.infrastructure-expanded .service-content .sub-service .header{ font-family: 'DIN 1451 W01 Engschrift'; text-transform:uppercase; color:#807e82; font-size:28px;;}
	.infrastructure-expanded .service-content .sub-service .copy{margin-top:10px;  font-family:Arial, sans-serif text-transform:none;}
	.infrastructure-expanded .service-content .sub-service .copy ul{margin-top:10px;}

	.payments-expanded .service-content{width:847px; float:right; height:395px;  padding-top:35px; opacity:0;
		filter:Alpha(opacity=00);}
	.payments-expanded .service-content .sub-service{width:250px; height:115px; float:left;  margin-left:24px; margin-top:70px; 		}
	.payments-expanded .service-content .sub-service .header{   font-family: 'DIN 1451 W01 Engschrift'; text-transform:uppercase; color:#807e82; font-size:28px;}
	.payments-expanded .service-content .sub-service .copy{margin-top:10px;  font-family:Arial, sans-serif; text-transform:none;}
	.payments-expanded .service-content .sub-service .copy ul{margin-top:10px;}


	#marketing{border-top:solid 5px #FF245E;}
	#experience{border-top:solid 5px #A8CA1F; left:284px;}
	#infrastructure{border-top:solid 5px #FF6600; left:568px;}
	#payments{border-top:solid 5px #009AD7; left:852px;}

	.commerce-service-expanded{
		width:1140px;
		height:	521px;
		position:absolute;
	}
 .marketing-expanded,  .experience-expanded,  .infrastructure-expanded,  .payments-expanded{
		width:276px;
		height:0px;
		position:absolute;
		display:none;
		opacity:0;
		filter:Alpha(opacity=00);
		background-color:#f4f4f4;
		top:600px;
		left:0px;
		overflow:hidden;
		z-index:0;
	}
	.marketing-expanded{border-top: solid 5px #FF245E;}
	.experience-expanded{border-top: solid 5px  #A8CA1F; left:289px;}
	.infrastructure-expanded{border-top: solid 5px #FF6600;left:573px;}
	.payments-expanded{border-top: solid 5px #009AD7; left:857px; }
	#third{width:100%; height:630px; position:relative; overflow:hidden; }
	#fourth, #five, #six{width:100%; height:auto;}
	#fourth{ margin-top:75px;}
    #fourth .copy, #five .copy, #six .copy{width:100%; height:auto; margin-bottom:20px; line-height: 1.3;}
	
	#five{margin-bottom:75px;}
	#six{margin-bottom:75px;}

	.copy .icon{width:80px; height:80px; float:left; clear:left; margin:5px; margin-right:20px;}
	.copy .icon img{width:auto; height:auto; max-width:80px; max-height:80px;}

	#fourth .ROI{width:300px; height:100px; background-color:#EBEBEB; padding: 15px;}




		@media only screen and (max-width : 1550px){
			.copy_wrapper{
				margin-top: 100px !important;
			}
		}

		@media only screen and (max-width : 1400px){
			.copy_wrapper{
				margin-top: 30px !important;
			}
		}


		@media only screen
	and (max-width : 985px)
	and (min-width : 700px) {

		.section .service2 {
			width: 100%;
		}

		.section .service2 .header, .section .commerce-service .service .header {
			width: 50%;
			margin-top: 10px;
		}

		.section .service2 .icon, .section .commerce-service .service .icon {
			margin-top: 10px;
			margin-right: auto;
			margin-left: 19%;
		}
	}



	@media only screen
	and (max-width : 985px) {
		.section .left-side {
			width: 80%;
			padding-left: 10%;
			padding-right: 10%;
		}

		#first .mission-values-wrapper .mission-wrapper .copy, .section .right-side .mission-values-wrapper .values-wrapper .copy {
			line-height: 0.85;
		}

		#first {
			margin-top:25px;
			float: none;
			margin-left: auto;
			margin-right: auto;
			clear: both;
		}

		.section .right-side {
			margin-top:25px;
			width: 705px;
			height: auto;
			float: none;
			margin-left: auto;
			margin-right: auto;
			clear: both;
		}

		.section .eyebrow-wrapper {
			width: 80%;
			margin-bottom: 45px;
			margin-top: 25px;
			margin-left: 10%;
		}

		#first {
			width: 80%;
			height: auto;
			float: right;
			margin-left: 10%;
			margin-right: 10%;
		}

		#first .mission-values-wrapper {
			width: 100%;
			padding: 0px;
		}

		#first .mission-values-wrapper .mission-wrapper, #first .mission-values-wrapper .values-wrapper {
			width: 90%;
			float: left;
			padding-right: 5%;
			padding-left: 5%;
			border-right: none;
			margin-top:10px;
			margin-bottom:10px;

		}

		#first .slogan-wrapper .slogan-word {
			width: 100%;
			font-size: 64px;
			height: auto;
			background-color:transparent;
		}

		#first .slogan-wrapper #expert{color:#009ad7; background-color:transparent;}
		#first .slogan-wrapper #global{color:#a8ca1f; background-color:transparent;}
		#first .slogan-wrapper #growth{color:#585656; background-color:transparent;}

		#second, #fourth, #five, #six	{
						margin-left: 10%;
			margin-right: 10%;
			width: 80%;
		}


		#fourth .eyebrow-wrapper, #five .eyebrow-wrapper, #six .eyebrow-wrapper{
			margin-left:0px;
		}

		#second {

			height: 554px;

			padding: 0px;
		}
		.section .right-side .snapshot-wrapper {
			width: 100%;
			padding: 5px 0px;
			margin-top:20px;
		}
		.section .right-side .snapshot-wrapper .header, .section .right-side .snapshot-wrapper .tag {
		    margin-left: 15px;
		}


		.section .right-side .snapshot-wrapper .left-list, .section .right-side .snapshot-wrapper .right-list {
			width: 100%;
		}

		.section .right-side .five-columns .columns, .section .right-side .five-columns .columns:first-child, .section .right-side .five-columns .columns:last-child {
			width: 100%;
			margin-top: 5px;
			height: auto;
			padding: 0px;
		}

		.section .right-side .five-columns .columns .header {
			width: 90%;
			margin-left:5%;
			margin-right:5%;
		}

		.section .right-side .five-columns .columns .copy {
		    width: 50%;
		    height: auto;
		    padding-left: 5%;
		    padding-right: 5%;
		    padding-bottom: 5%;
		}

		.section .right-side .five-columns .columns-number {
			height: 75px;
			float: right;
		}

		.section .right-side .snapshot-wrapper .left-list ul, .section .right-side .snapshot-wrapper .right-list ul {
    			margin-left: 30px;
		}

		.service{display:none;}
		.marketing-expanded{display:block;}
		.experience-expanded{display:block;}
		.infrastructure-expanded{display:block;}
		.payments-expanded{display:block;}
		.marketing-expanded .service2{}



		.section .service2 .icon, .section .commerce-service .service .icon {
			margin-top: 10px;
			margin-right: auto;
			margin-left: auto;
			width: 100px;
			height: 100px;
		}

		.section .service2 .header, .section .commerce-service .service .header {
			width: 100%;
			margin-top: 10px;
		}

		.section .service2 .links-wrapper {
			width: auto;
			height: 150px;
			margin-left: auto;
			margin-right: auto;
			margin-top: 13px;
		}

		.marketing-expanded, .experience-expanded, .infrastructure-expanded, .payments-expanded {
			width: 300px;
			height: auto;
			position: relative;
			opacity: 1;
			background-color: #F4F4F4;
			overflow: hidden;
			z-index: 1;
			top: 0px;
			left: 0px;
			margin-top: 20px;
			margin-left: auto;
			margin-right: auto;
			float: none;
		}

		.section .service2 {
			margin-left: auto;
			margin-right: auto;
			background-color: #F4F4F4;
			height: auto;
			float: none;
			width: 250px;
		}

		.section .commerce-service {
			height: auto;
		}

		#third {
			height: auto;
		}

		.section .service2 .links-wrapper {
			height: 60px;
		}

			.section .service2 .links-wrapper a:last-child{
				display:none;
			}

		 .service-content {
			display:none;
		}

	}


	.client_success .heading{
  color: #343438;
  font-size: 3.85em;
  float: left;
  margin-left: 40px;
  line-height: 1em;
  letter-spacing: 0.5px;
  margin-top: 10px;
}

.client_success .heading span{
  float:left;
  clear:left;
}

.client_success .link_wrapper{
  float:right;
  width: 62%;
}

.client_success .link_wrapper .links{
  width:33.33%;
  float:left;
}

.client_success .link_wrapper .links .header{
  font-size: 1.4em;
    color: #343438;
}

.client_success .link_wrapper .links li{
  list-style: none;
  margin: 15px 0;
}

.client_success .link_wrapper .links li a{
  font-family: "HelveticaNeueW01-55Roma",sans-serif;
  font-size: 1.1em;
  color:#00a7e1;
  text-decoration: none;
}


.featured_area {
height: inherit;
}

.featured_area .featured {
    position: relative;
}


    </style>

   



    <script type="text/javascript">


    function getUrlParameter(sParam){
	    var sPageURL = window.location.search.substring(1);
	    var sURLVariables = sPageURL.split('&');
	    for (var i = 0; i < sURLVariables.length; i++) 
	    {
	        var sParameterName = sURLVariables[i].split('=');
	        if (sParameterName[0] == sParam) 
	        {
	            return sParameterName[1];
	        }
	    }
	}         

    jQuery(document).ready(function(){

    	jQuery(".embed-container iframe").css("width","101%");
    	setTimeout(function(){
    		jQuery(".embed-container iframe").css("width","100%");
    	},3000)
    	
    	var videoToPlay = getUrlParameter('video');
    	if(videoToPlay == 1){

    		jQuery(window).scrollTop(jQuery("#toVideo").offset().top-100);
    		jQuery("#video_1").vimeo("play");
    	}
    });


	var firstClick = false;
	var animationReady =false;
	jQuery(document).on("click","input",function(){


			var clickedId = jQuery(this).attr("id");
			var clickedService = clickedId.replace("-button","")
			var serviceHeight = jQuery("#"+clickedService).height()+150;
			jQuery("#third").animate({height:"770px"},200);
				 var leftPosition = jQuery("#"+clickedService).css("left");
						var selectedBorderTopColor = jQuery("#"+clickedService).css("border-top-color");
								jQuery("#third .service .header").animate({fontSize:"28px"},1000);
							jQuery("#third #infrastructure .header").css({marginTop:"8px"});
							jQuery("#third #payments .header").css({marginTop:"36px"});
				jQuery("#third .service .icon, #third .service  .button-wrapper").animate({opacity:0, height:"0px", marginTop:"0px",padding:"0px"},1000, function(){
						jQuery("#third .service .icon, #third .service  .button-wrapper").css({display:"none"});
				});


				jQuery("#third .service").animate({height:"100px", top:serviceHeight},1000 );
				jQuery("#"+clickedService).animate({borderTopWidth:"15px",top:"-=10px"})



					jQuery("."+clickedService+"-expanded").css({display:"block"});

	/*				jQuery("#"+clickedService +" .header").appendTo(".expansion");
					jQuery("#"+clickedService +" .icon").appendTo(".expansion");
					jQuery("#"+clickedService +" .button-wrapper").appendTo(".expansion");*/


					jQuery("."+clickedService+"-expanded").delay(1000).animate({height:"545px",top:"105px", opacity:1},1000, function(){
						jQuery("."+clickedService+"-expanded").animate({width:"1135px", left:"0px"},1000);
						jQuery("."+clickedService+"-expanded .service-content").delay(1000).animate({opacity:1},500);

						jQuery("#third .service").css({cursor:"pointer"});
						 firstClick = true;
						 animationReady = true;
					});





		})

		jQuery(document).on("mouseenter",".service",function(){
			var color = jQuery(this).css("border-top-color");
			var thisId = jQuery(this).attr("id");
				if(firstClick == true){

					jQuery("#"+thisId).animate({backgroundColor:color},100);
					jQuery("#"+thisId+" .header").animate({ color:"#FFF"},100);
				}
		})

			jQuery(document).on("mouseleave",".service",function(){
				var thisId = jQuery(this).attr("id");
			if(firstClick == true){
				jQuery("#"+thisId).animate({backgroundColor:"#F4F4F4"},100);
				jQuery("#"+thisId+" .header").animate({ color:"#807e82"},100);
			}
		})

		jQuery(document).on("click",".service",function(){
				var nextId = jQuery(this).attr("id");

			if(firstClick == true && animationReady == true){
				animationReady = false;
				jQuery(".marketing-expanded,  .experience-expanded,  .infrastructure-expanded,  .payments-expanded").each(function(){

					if(jQuery(this).css('display') != 'none'){
						var thisClass = jQuery(this).attr("class");



						var thisService = thisClass.replace("-expanded","");
						if(thisService != nextId){
							var leftPosition = jQuery("#"+thisService).css("left");
							leftPosition = leftPosition.replace("px","");
							leftPosition = Number(leftPosition)
							if(leftPosition != 0){leftPosition += 5;}
							jQuery("."+thisService+"-expanded .service-content").animate({opacity:0},1);
							jQuery("."+thisClass).animate({width:"276px", left:leftPosition},1000, function(){
							jQuery("#"+thisService).delay(500).animate({borderTopWidth:"5px",top:"+=10px"},500)
								jQuery("."+thisClass).animate({height:"0",top:"650px", opacity:0},1000, function(){

										jQuery("."+thisClass).css({display:"none"});
										jQuery("."+nextId+"-expanded").css({display:"inline"});

									jQuery("#"+nextId).animate({borderTopWidth:"15px",top:"-=10px"},500)
								jQuery("."+nextId+"-expanded").animate({height:"545px",top:"105px", opacity:1},1000, function(){
									jQuery("."+nextId+"-expanded .service-content").delay(1000).animate({opacity:1},500);
									jQuery("."+nextId+"-expanded").animate({width:"1135px", left:"0px"},1000, function(){
										animationReady = true;
									})

								});
							})
						});
						}else{animationReady = true;}
					}
				})
			}
		})





</script>


<!-- Content Container -->
<section  class="content_container why-digital-river">



    <div class="left_border"></div>

    <div class="container">
        <div class="row">




    <div class="section">
      <div class="eyebrow-wrapper">
          <div class="eyebrow"><?php _e('Our Story','digital-river');?></div>
       </div>
        <div class="left-side">
		
		<p>
        	<?php _e( 'We offer ecommerce, payments and top online marketing services to companies of all sizes, in nearly every corner of the world. Digital River is the leading global provider of Commerce-as-a-Service solutions, supporting a best-in-class shopper experience across all devices and complete order management. Our scalable cloud-based multi-tenant SaaS ecommerce platform is backed by more than 20 years of ecommerce experience with a low up-front investment and enables speed to market.', 'digital-river' ); ?>
        </p>
<br>																																		
    	<p>
 <?php _e( 'Our expertise enables clients to maximize revenue as well as reduce the costs and risks of running an online business. We provide top payment solutions to support a local shopping experience in global markets and more payment options than any other company. Our digital marketing agency drives additional growth through advanced analytics and online marketing services, as well as our modular pricing model and growing partner network.', 'digital-river' ); ?>
 		</p>
 		<br>
<?php icl_link_to_element(27,'page',__('Learn More About Us', 'digital-river' )) ?>
        </div>
        <div class="right-side" id="second">

            <div class="snapshot-wrapper">
            	<div class="header"> <?php _e( 'An Average Day', 'digital-river' ); ?></div>
                <div class="tag"> <?php _e( 'Here’s a snapshot of an average day supported by Digital River teams and systems:', 'digital-river' ); ?></div>
                <div class="left-list">
                	<ul>
                    	<li> <?php _e( 'Support 2.3 billion API calls', 'digital-river' ); ?></li>
                        <li> <?php _e( 'Send over 3 million emails', 'digital-river' ); ?></li>
                        <li> <?php _e( 'Create 5 transaction authorizations per second', 'digital-river' ); ?></li>
                    </ul>
                </div>
                <div class="right-list">
                	<ul>
                    	<li> <?php _e( 'Serve 60 million pages', 'digital-river' ); ?></li>
                        <li> <?php _e( 'Process 300,000 orders', 'digital-river' ); ?></li>
                        <li> <?php _e( 'Host more than 6 TB of digital content', 'digital-river' ); ?></li>
                        <li> <?php _e( 'Ship products into 170+ countries', 'digital-river' ); ?></li>
                    </ul>
                </div>
            </div>

           <div class="five-columns">
                <div class="columns">
                    <div class="header"> <?php _e( 'Online Transactions', 'digital-river' ); ?></div>
                    <div class="copy"><p><?php _e( 'Our world-class ecommerce and payments platforms process $34 billion in online transactions each year.', 'digital-river' ); ?></p></div>
                    <div class="columns-number"><span style='font-size: 22px; display: block; width: 14px; float: left; margin-left: 38px; margin-top: 10px;'>$</span><span style='font-size: 53px; display: block; width: 72px; float: left; letter-spacing:-3px;'>34</span><span style='font-size: 22px; float: left; display: block;margin-top: 10px;'>B</span></div>
                </div>
                <div class="columns">
                    <div class="header"> <?php _e( 'Site Display Languages', 'digital-river' ); ?></div>
                    <div class="copy"> <p><?php _e( 'We’re not just multilingual - we speak global. Our enterprise global commerce platform hosts client websites in 30 different languages.', 'digital-river' ); ?></p></div>
                    <div class="columns-number"><span style='font-size: 53px; margin-left: 45px; display: block; width: 100px; float: left; letter-spacing:-3px;'>30</span></div>
                </div>
                <div class="columns" id="currencies">
                    <div class="header" > <?php _e( 'Top Payments', 'digital-river' ); ?></div>
                    <div class="copy"><p> <?php _e( 'We can support 175 global currencies and over 200 global payment methods.', 'digital-river' ); ?></p></div>
                    <div class="columns-number"><span style='font-size: 53px; margin-left: 25px; display: block; width: 100px; float: left; letter-spacing:-3px;'>200</span></div>
                </div>
                <div class="columns" >
                    <div class="header"> <?php _e( 'Ecommerce Experts', 'digital-river' ); ?></div>
                    <div class="copy"><p> <?php _e( 'We have 1,300+ ecommerce experts in 27 offices around the world to enable you operate in 243 countries and territories.', 'digital-river' ); ?></p></div>
                    <div class="columns-number"><span style='font-size: 53px; margin-left: 8px; display: block; width: 100px; float: left; letter-spacing:-3px;'>1300</span></div>
                </div>
                <div class="columns"  id="subscriptions">
                    <div class="header"> <?php _e( 'Subscriptions', 'digital-river' ); ?></div>
                    <div class="copy"> <p><?php _e( 'Digital River manages 11M+ active online product subscriptions with 8M active subscribers.', 'digital-river' ); ?></p></div>
                    <div class="columns-number"><span style='font-size: 53px; display: block; width: 58px; float: left; letter-spacing:-3px; margin-left:56px;'>11</span><span style='font-size: 22px; float: left; display: block;margin-top: 10px;'>M</span></div>
                </div>
        </div>



</div>
    </div>

    <div class="section" id="third">
        <div class="eyebrow-wrapper">
            <div class="eyebrow"> <?php _e( 'Commerce as a Service', 'digital-river' ); ?></div>
        </div>


        <div class="commerce-service">
        	<div class="service" id="marketing">
            	<div class="icon"><img src="<?php echo get_image_path('marketing.png'); ?>" /></div>
                <div class="header"> <?php _e( 'Marketing <br /> Services', 'digital-river' ); ?></div>
                <div class="button-wrapper"><input id="marketing-button" value="<?php _e('Learn More','digital-river'); ?>" type="button" /></div>
            </div>
            <div class="service" id="experience">
            	<div class="icon"><img src="<?php echo get_image_path('Experience.png'); ?>" /></div>
                <div class="header"> <?php _e( 'Commerce <br /> Experience', 'digital-river' ); ?></div>
                <div class="button-wrapper"><input id="experience-button" value="<?php _e('Learn More','digital-river'); ?>" type="button" /></div>

            </div>
            <div class="service" id="infrastructure">
           		<div class="icon"><img src="<?php echo get_image_path('Infrastructure.png'); ?>" /></div>
                <div class="header"> <?php _e( 'Commerce <br />Business<br /> Infrastructure', 'digital-river' ); ?></div>
                <div class="button-wrapper"><input id="infrastructure-button" value="<?php _e('Learn More','digital-river'); ?>" type="button" /></div>
            </div>
            <div class="service" id="payments">
            	<div class="icon"><img src="<?php echo get_image_path('payments.png'); ?>" /></div>
                <div class="header"> <?php _e( 'Payments', 'digital-river' ); ?></div>
                <div class="button-wrapper" ><input id="payments-button" value="<?php _e('Learn More','digital-river'); ?>" type="button" /></div>
            </div>


        	<div class="marketing-expanded">
            <div class="service2" >
                         <div class="icon"><img src="<?php echo get_image_path('marketing.png'); ?>" /></div>
                        <div class="header"><?php _e( 'Marketing <br /> Services', 'digital-river' ); ?></div>
                    <div class="links-wrapper">
                    	<?php icl_link_to_element(651,'page', __( 'All Marketing Solutions ', 'digital-river' ).'>'); ?>
                        <?php 
                        	if(ICL_LANGUAGE_CODE == 'en'):
                        		icl_link_to_element(11239,'page',__('Request A Demo ', 'digital-river' ).'>'); 
                        	else:
                        		icl_link_to_element(8144,'page',__('Request A Demo ', 'digital-river' ).'>'); 
                        	endif;
                        ?>
                        <?php icl_link_to_element(27,'page', __( 'Contact Us ', 'digital-river' ).'>'); ?>
                    </div>

                </div>
                 <div class="service-content">
                            <div class="sub-service">
                                <div class="header"><?php _e('Site Search','digital-river');?></div>
                                <div class="copy"> <?php _e( 'Manage your pay-per-click ads to get the most out of your marketing budget.', 'digital-river' ); ?></div>
                            </div>
                            <div class="sub-service">
                                <div class="header"><?php _e('Email', 'digital-river' ); ?></div>
                                <div class="copy"> <?php _e( 'Create highly targeted and relevant messages that connect with your customers.', 'digital-river' ); ?></div>
                            </div>
                           <div class="sub-service">
                                <div class="header"><?php _e('Affiliate', 'digital-river' ); ?></div>
                                <div class="copy"> <?php _e( 'Leverage a marketplace of pay-for-performance publishers to drive revenue.', 'digital-river' ); ?></div>
                            </div>

                         <div class="sub-service">
                                <div class="header"><?php _e('Display', 'digital-river' ); ?></div>
                                <div class="copy"> <?php _e( 'Drive brand awareness and incremental conversions through targeted ad campaigns.', 'digital-river' ); ?></div>
                            </div>
                            <div class="sub-service">
                                <div class="header"><?php _e('Analysis', 'digital-river' ); ?></div>
                                <div class="copy"> <?php _e( 'Monitor key performance indicators to identify optimization opportunities.', 'digital-river' ); ?></div>
                            </div>
                           <div class="sub-service">
                                <div class="header"><?php _e('Site Optimization', 'digital-river' ); ?></div>
                                <div class="copy"> <?php _e( 'Use statistically-valid testing to form a foundation for continuous improvement.', 'digital-river' ); ?></div>
                            </div>
                        </div>

            </div>
            <div class="experience-expanded">
               <div class="service2" >
                   <div class="icon"><img src="<?php echo get_image_path('Experience.png'); ?>" /></div>
                    <div class="header"> <?php _e( 'Commerce <br /> Experience', 'digital-river' ); ?></div>
                    <div class="links-wrapper">
                    	<?php icl_link_to_element(673,'page',__('All Commerce Solutions ', 'digital-river' ).'>'); ?>
                        <?php 
                        	if(ICL_LANGUAGE_CODE == 'en'):
                        		icl_link_to_element(11239,'page',__('Request A Demo ', 'digital-river' ).'>'); 
                        	else:
                        		icl_link_to_element(8144,'page',__('Request A Demo ', 'digital-river' ).'>'); 
                        	endif;
                        ?>
                        <?php icl_link_to_element(27,'page',__('Contact Us ', 'digital-river' ).'>'); ?>
                    </div>
                </div>



                 <div class="service-content">
                            <div class="sub-service">
                                <div class="header"> <?php _e( 'Shopping Cart', 'digital-river' ); ?></div>
                                <div class="copy">
                                	<ul>
                                    	<li> <?php _e( 'Optimized for conversion', 'digital-river' ); ?></li>
                                        <li> <?php _e( 'Supports digital and physical', 'digital-river' ); ?></li>
                                    </ul>
                                </div>

                            </div>
                            <div class="sub-service">
                                <div class="header"> <?php _e( 'WCMS', 'digital-river' ); ?></div>
                                <div class="copy">
                                	<ul>
                                    	<li> <?php _e( 'Flexible framework', 'digital-river' ); ?></li>
                                        <li> <?php _e( 'Device detection', 'digital-river' ); ?></li>
                                        <li> <?php _e( 'Responsive design', 'digital-river' ); ?></li>
                                        <li> <?php _e( 'Catalog', 'digital-river' ); ?></li>
                                    </ul>
                                </div>
                            </div>
                           <div class="sub-service">
                                <div class="header"> <?php _e( 'Virtual products', 'digital-river' ); ?></div>
                                <div class="copy">
                                	  <ul>
                                    	<li> <?php _e( 'Compare pages', 'digital-river' ); ?></li>
                                        <li> <?php _e( 'Configure-to-order', 'digital-river' ); ?></li>
                                    </ul>
                                </div>
                            </div>

                         <div class="sub-service">
                                <div class="header"> <?php _e( 'Searchandising', 'digital-river' ); ?></div>
                                <div class="copy">
                                	 <ul>
                                    	<li> <?php _e( 'Sponsored products', 'digital-river' ); ?></li>
                                        <li> <?php _e( 'Faceted navigation', 'digital-river' ); ?></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="sub-service">
                                <div class="header"><?php _e('Merchant and Promotions', 'digital-river' ); ?></div>
                                <div class="copy">
                                	<ul>
                                    	<li> <?php _e( 'Supports most promotion types', 'digital-river' ); ?></li>
                                        <li> <?php _e( 'Social integration', 'digital-river' ); ?></li>
                                    </ul>
                                </div>
                            </div>
                           <div class="sub-service">
                                <div class="header"> <?php _e( 'Localization', 'digital-river' ); ?></div>
                                <div class="copy">
                                	 <ul>
                                    	<li> <?php _e( 'GEO/IP detection', 'digital-river' ); ?></li>
                                        <li> <?php _e( 'Support for any language', 'digital-river' ); ?></li>
                                        <li> <?php _e( 'Optimized for local consumer', 'digital-river' ); ?></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="sub-service">
                                <div class="header"> <?php _e( 'Recommendation and Personalization', 'digital-river' ); ?></div>
                                <div class="copy">
                                	 <ul>
                                    	<li> <?php _e( 'Related items', 'digital-river' ); ?></li>
                                        <li> <?php _e( 'Private stores', 'digital-river' ); ?></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="sub-service">
                                <div class="header"><?php _e( 'A/B Testing', 'digital-river' ); ?></div>
                                <div class="copy">
                                	 <ul>
                                    	<li> <?php _e( 'Merchandising, pricing, design, user experience,  effectiveness testing', 'digital-river' ); ?></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="sub-service">
                                <div class="header"> <?php _e( 'Pricing', 'digital-river' ); ?></div>
                                <div class="copy">
                                	 <ul>
                                    	<li> <?php _e( 'Volume discounts', 'digital-river' ); ?></li>
                                        <li> <?php _e( 'Tiered pricing', 'digital-river' ); ?></li>
                                        <li> <?php _e( 'Purchase plans', 'digital-river' ); ?></li>
                                    </ul>
                                </div>
                            </div>


                            <div class="sub-service">
                                <div class="header"> <?php _e( 'Admin Tools', 'digital-river' ); ?></div>
                                <div class="copy">
                                	 <ul>
                                    	<li> <?php _e( 'Intuitive web-based toolset manages commerce experience', 'digital-river' ); ?></li>
                                    </ul>
                                </div>
                            </div>


                        </div>



            </div>
            <div class="infrastructure-expanded">
               <div class="service2" >
            	<div class="icon"><img src="<?php echo get_image_path('Infrastructure.png'); ?>" /></div>
                <div class="header"> <?php _e( 'Commerce <br />Business<br />Infrastructure', 'digital-river' ); ?></div>
                <div class="links-wrapper">
                    	<?php icl_link_to_element(11179,'page',__('Find Out More ', 'digital-river' ).'>'); ?>
                        <?php icl_link_to_element(27,'page',__('Contact Us ', 'digital-river' ).'>'); ?>
                </div>
                </div>


         <div class="service-content">
                            <div class="sub-service">
                                <div class="header"> <?php _e( 'Merchant and Seller of Record', 'digital-river' ); ?></div>
                                <div class="copy">
                                	<ul>
                                    	<li> <?php _e( 'MOR and SOR solutions available', 'digital-river' ); ?></li>
                                        <li> <?php _e( 'Digital River assumes risk', 'digital-river' ); ?></li>
                                    </ul>
                                </div>

                            </div>
                            <div class="sub-service">
                                <div class="header"><?php _e('Local Legal Entities', 'digital-river' ); ?></div>
                                <div class="copy">
                                	<ul>
                                    	<li> <?php _e( 'In complex countries', 'digital-river' ); ?></li>
                                        <li> <?php _e( 'Local expertise and payment methods', 'digital-river' ); ?></li>
                                    </ul>
                                </div>
                            </div>
                           <div class="sub-service">
                                <div class="header"><?php _e('Proactive Fraud Management', 'digital-river' ); ?></div>
                                <div class="copy">
                                	  <ul>
                                    	<li> <?php _e( 'In-house fraud system learns over time', 'digital-river' ); ?></li>
                                    </ul>
                                </div>
                            </div>

                         <div class="sub-service">
                                <div class="header"><?php _e('Full-Service Tax Solution', 'digital-river' ); ?></div>
                                <div class="copy">
                                	 <ul>
                                    	<li> <?php _e( 'Manage audit risk', 'digital-river' ); ?></li>
                                        <li> <?php _e( 'Day-to-day compliance', 'digital-river' ); ?></li>
                                        <li> <?php _e( 'Offshore tax structure', 'digital-river' ); ?></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="sub-service">
                                <div class="header"><?php _e('Order Management', 'digital-river' ); ?></div>
                                <div class="copy">
                                	<ul>
                                    	<li> <?php _e( 'Order and financial data managements', 'digital-river' ); ?></li>
                                        <li> <?php _e( 'Fulfillment and logistics', 'digital-river' ); ?></li>
                                    </ul>
                                </div>
                            </div>
                           <div class="sub-service">
                                <div class="header"><?php _e('Cloud Enablement', 'digital-river' ); ?></div>
                                <div class="copy">
                                	 <ul>
                                    	<li> <?php _e( 'Subscriptions', 'digital-river' ); ?></li>
                                        <li> <?php _e( 'Usage-based billing', 'digital-river' ); ?></li>
                                        <li> <?php _e( 'Inter-term billing', 'digital-river' ); ?></li>
                                        <li> <?php _e( 'Cloud billing', 'digital-river' ); ?></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="sub-service">
                                <div class="header"> <?php _e( 'Business Intelligence', 'digital-river' ); ?></div>
                                <div class="copy">
                                	 <ul>
                                    	<li> <?php _e( 'Analytics', 'digital-river' ); ?></li>
                                        <li> <?php _e( 'Reporting', 'digital-river' ); ?></li>
                                        <li> <?php _e( 'Predictive modeling', 'digital-river' ); ?></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="sub-service">
                                <div class="header"> <?php _e( 'Security and Compliance', 'digital-river' ); ?></div>
                                <div class="copy">
                                	 <ul>
                                    	<li> <?php _e( 'PCI', 'digital-river' ); ?></li>
                                        <li> <?php _e( 'SOX', 'digital-river' ); ?></li>
                                        <li> <?php _e( 'SSAE16', 'digital-river' ); ?></li>
                                        <li> <?php _e( 'WEEE', 'digital-river' ); ?></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="sub-service">
                                <div class="header"> <?php _e( 'Customer Service', 'digital-river' ); ?></div>
                                <div class="copy">
                                	 <ul>
                                    	<li> <?php _e( 'Call center support', 'digital-river' ); ?></li>
                                        <li> <?php _e( 'Escalation management', 'digital-river' ); ?></li>
                                    </ul>
                                </div>
                            </div>


                            <div class="sub-service">
                                <div class="header"> <?php _e( 'Integrated Services', 'digital-river' ); ?></div>
                                <div class="copy">
                                	 <ul>
                                    	<li> <?php _e( 'Consultative client service through site launch', 'digital-river' ); ?></li>
                                    </ul>
                                </div>
                            </div>


                        </div>


            </div>
            <div class="payments-expanded">
               <div class="service2" >
            	<div class="icon"><img src="<?php echo get_image_path('payments.png'); ?>" /></div>
                <div class="header"> <?php _e( 'Payments', 'digital-river' ); ?></div>
                <div class="links-wrapper">
                    	<?php icl_link_to_element(12399,'page',__('All Payment Solutions', 'digital-river' ).' >'); ?> 
                        <?php 
                        	if(ICL_LANGUAGE_CODE == 'en'):
                        		icl_link_to_element(11239,'page',__('Request A Demo ', 'digital-river' ).'>'); 
                        	else:
                        		icl_link_to_element(8144,'page',__('Request A Demo ', 'digital-river' ).'>'); 
                        	endif;
                        ?>
                        <?php icl_link_to_element(27,'page',__('Contact Us ', 'digital-river' ).'>'); ?>
                </div>
                </div>

                  <div class="service-content">
                                                    <div class="sub-service">
                                        <div class="header"><?php _e('Gateway Services', 'digital-river' ); ?></div>
                                        <div class="copy">
                                            <ul>
                                                <li> <?php _e( 'Facilitate global transactions', 'digital-river' ); ?></li>
                                                <li> <?php _e( 'Settlement and reconciliation', 'digital-river' ); ?></li>
                                            </ul>
                                        </div>

                                    </div>
                                    <div class="sub-service">
                                        <div class="header"> <?php _e( 'Full-Service Acquiring', 'digital-river' ); ?></div>
                                        <div class="copy">
                                            <ul>
                                                <li> <?php _e( 'Transaction management', 'digital-river' ); ?></li>
                                                <li> <?php _e( 'Merchant solutions', 'digital-river' ); ?></li>
                                                <li> <?php _e( 'Shared risk', 'digital-river' ); ?></li>
                                            </ul>
                                        </div>
                                    </div>
                                   <div class="sub-service">
                                        <div class="header"> <?php _e( 'PSP Services', 'digital-river' ); ?></div>
                                        <div class="copy">
                                              <ul>
                                                <li> <?php _e( 'Sub-merchant relationships through world payments', 'digital-river' ); ?></li>
                                                <li> <?php _e( 'Shared risk', 'digital-river' ); ?></li>
                                            </ul>
                                        </div>
                                    </div>

                                 <div class="sub-service">
                                        <div class="header"> <?php _e( 'IN-COUNTRY MERCHANT', 'digital-river' ); ?></div>
                                        <div class="copy">
                                             <ul>
                                                <li> <?php _e( 'Merchant of record', 'digital-river' ); ?></li>
                                                <li> <?php _e( 'Transaction management', 'digital-river' ); ?></li>
                                                <li> <?php _e( 'Assumed risk', 'digital-river' ); ?></li>
                                            </ul>
                                        </div>
                                    </div>
                </div>
            </div>


    </div>

        </div>


    <div class="section" id="fourth">
        <div class="eyebrow-wrapper">
            <div class="eyebrow"> <?php _e( 'Total Cost of Ownership', 'digital-river' ); ?></div>
        </div>

        <div class="copy">
        	<p>
        <?php _e( 'Maintaining an agile ecommerce system that is easy to implement, run, and support, while meeting customer, regulatory, and fiduciary requirements involves highly complex expertise and significant operational costs. This type of integrated Commerce-as-a-Service operation requires management of a broad range of day-to-day functions for the technology platform, website integration, marketing solutions, payment processing, and related complex business infrastructure needs—operations that increase your total cost of business.', 'digital-river' ); ?> 
       	</p>
       </div>

       <div class="copy">
       	<p>
        <?php _e( 'Digital River’s multitenant SaaS-based global ecommerce platform, combined with our end-to-end solution offerings, enables customers to easily manage all maintenance, support and execution capabilities for a successful ecommerce business. Enjoy the privilege and flexibility of outsourcing your ecommerce operations so you can focus on other areas of your business. With Digital River’s flexible business model, and expertise in global commerce, your entry into new markets will increase your annual revenue and lower your costs.', 'digital-river' ); ?>
       	</p>
       </div>

    </div>
    <div class="section" id="five">
        <div class="eyebrow-wrapper">
            <div class="eyebrow"> <?php _e( 'A Mobile Approach', 'digital-river' ); ?></div>
        </div>

        <div class="copy">
        <p>
        <?php _e( 'Across our commerce, payments and marketing offerings there is a cohesive strategy around mobile technology. We offer responsive, adaptive, device-specific web design solutions based on client need—all new websites we create are responsive out of the box. Digital River continues to invest in mobile-specific APIs to integrate with customer apps and partner applications. We’ve expanded our partner relationships in the app development and design community to facilitate comprehensive services to our clients.', 'digital-river' ); ?>
       	</p>
       </div>

       <div class="copy">
        <p>
        <?php _e( 'Our portfolio of leading mobile payments offerings continues to expand, providing our clients with a variety of payment options to choose from. As the mobile app landscape continues to evolve, you can rely on Digital River to stay ahead of the curve and provide all the right solutions to keep you competitive in the market.', 'digital-river' ); ?></div>
    	</p>
    </div>

        <div class="section" id="six">
        <div class="eyebrow-wrapper">
            <div class="eyebrow"> <?php _e( 'Client Success', 'digital-river' ); ?></div>
        </div>
  	
        <div class="copy">
      	<p>
 		<?php _e( 'Client satisfaction and success is paramount to our business model. Digital River’s client-centric approach focuses on maintaining long-term client relationships through dedicated and experienced account managers to help your ecommerce business reach its full potential. Digital River’s Client Service Team—comprised of dedicated client marketing and account managers—offers you ecommerce expertise to optimize your marketing and promotions, and manage product information and store operations. We focus on enhancing your customers’ shopping experience to build and maintain a strong customer base. Your account team will ensure your unique business needs are being met and managed to the highest standard.', 'digital-river' ); ?>
 		</p>
 		<?php if(ICL_LANGUAGE_CODE == 'en') : ?>
 			<p>
            	 <!-- Translated Content -->
            	 <a href="/wp-content/uploads/2014/08/Digital-River-Client-Success-Value-Brief.pdf"><?php _e('Read more.','digital-river'); ?></a>
        	</p>
         <?php endif; ?>
      </div>

       <div class="copy" id='toVideo'>
       		<p>
       		<?php icl_link_to_element(27,'page',__('Contact Us', 'digital-river' )); ?> <?php _e( 'today to start your relationship with Digital River.', 'digital-river' ); ?> 
       		</p>
       </div>
 		</p>
    </div>



        </div>
    </div>



<style>.featured_area .featured {
	width: 100%;
	position: absolute;
	top: 0px;
}

.featured_logos{
  background: #333;
}

.featured_wrapper{
  width:100%;
  position: relative;
}

#featured_logos{
  background:#ebebeb;
  padding: 30px 20px 15px;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;  
  box-sizing: border-box; 
}

#featured_logos img{height: auto; width: auto; max-width: 100%; max-height: 150px; display: block; margin: 0 auto;}

.featured_area{
  width:100%;
  position: relative;

}

.featured_area .featured{
  background:#00a7e1;
  width: 100%;
  position: absolute;
  top: 0px;
}

.video_wrapper{width: 59%; float: left;}


  .embed-container { position: relative; padding-bottom: 56.25%; height: 0; overflow: hidden; max-width: 100%; }
  .embed-container iframe, .embed-container object, .embed-container embed { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }


.featured_area .copy_wrapper{
  margin: 50px auto 0;
  padding: 0 3%;
  width: 41%;
  float: left;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;  
  box-sizing: border-box; 
}

.featured_area .copy_wrapper .quote{
    font-size: 30px;
    line-height: 1;
  color:#FFF;
  margin: 0px 10px 25px;
  display: table;
    height: 300px;
  overflow: hidden;

}

.featured_area .quote div{
  display: table-cell;
  vertical-align: middle;
}

.featured_area .quoter p{
    color:#FFF;
    margin: 0px 10px 5px;
    font-size: 28px;
    line-height: 1;
}



.tab_wrapper{
  height: 0;
  position: relative;
}

.tab_wrapper .tab{
  width: 53px;
  position: absolute;
  right: 111px;
  z-index: 100;
  top:-3px;
  height:30px;
}


.tab_wrapper .tab img{width:100%;}




#triangle-bottomleft{float: left; width: 0; height: 0; border-bottom: 30px solid #009AD7; border-right: 15px solid #FFF;}



@media only screen and (max-width: 1400px) {
 .featured_area .copy_wrapper{margin: 5px auto 0px; padding: 0 3%;}
 .featured_area .copy_wrapper .quote{font-size: 34px; height: 300px;}
 .featured_area .copy_wrapper .quoter p{font-size: 24px;}

}

@media only screen and (max-width: 1200px) {
 .featured_area .copy_wrapper .quote{font-size: 32px; height: 265px; }
 .featured_area .copy_wrapper .quoter p{font-size: 20px;}
}

@media only screen and (max-width: 1100px) {
  .featured_area .copy_wrapper .quote{font-size: 26px; height: 240px;}
}

@media only screen and (max-width: 1000px) {
  .featured_area .copy_wrapper .quote{font-size: 24px; height: 170px;}
  .featured_area p {display: none;}
  .featured_area .video_wrapper{width:100%;}
  .tab_wrapper .tab{right: 13%;}
  .tab_wrapper .tab{top:0;}
  .featured_area .copy_wrapper {display: none;}
}

@media only screen and (max-width: 600px) {
  .tab_wrapper .tab{right: 46%;}
}</style>
    

	<div class='featured_wrapper'>
		<div class='featured_area'>
			<div class='featured' id='featured_1'>
				<div class='video_wrapper'>
					<div class='embed-container'>

						<?php

							if(ICL_LANGUAGE_CODE == 'de'):
								$videoId = "129235671";
							elseif(ICL_LANGUAGE_CODE == 'ja'):
								$videoId = "133778569";
							elseif(ICL_LANGUAGE_CODE == 'zh-hans'):
								$videoId = "133777861";
							else:
								$videoId = "129235671";
							endif;

						?>


						<iframe id="video_1" src="https://player.vimeo.com/video/<?php echo $videoId; ?>?api=1&amp;player_id=video_1" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe> 
					</div>
				</div>
				<div class='copy_wrapper' style='margin-top: 150px;'>
					<div class='quote light'>As the leading global provider of Commerce-as-a-Service solutions, our scalable solutions are backed by 20+ years of ecommerce experience and offer low up-front investment and quick time to market.</div>
				</div>
				<div class='clear'></div>
			</div>
			
			<div class='clear'></div>
		</div>
		<div class='clear'></div>
	</div>


<script>
jQuery(document).ready(function($){
var next = true;
var itemClick = false;
numOfVideos = $(".featured").length;

$(".embed-container iframe, .embed-container object, .embed-container embed").css("height","101%");

var currentIndex;
var clickedIndex;
var clickedCurrent;
dataIndex = numOfVideos;



if(numOfVideos > 1){

        owl = $("#featured_logos");
        owl.on("initialized.owl.carousel", function(event){
            var videoHeight = $(".featured").children(".video_wrapper").height();
            $(".featured_wrapper").find(".featured_area").height(videoHeight);
            setTimeout(function(){
                $(".embed-container iframe, .embed-container object, .embed-container embed").css("height","100%");
            },5000);
       });

       var count = 0;
       var lastCount;

       var tabsAt1000 = numOfVideos;
       var tabsAt600 = 3;
       var tabsAt0 = 1;

       owl.owlCarousel({
            items : numOfVideos,
            margin:40,
            mouseDrag: false,
            responsive:{
                0:{items: tabsAt0},
                600:{items: tabsAt600},
                1000:{items: tabsAt1000}
            },
            pagination:false,
            navigation:false,
            loop:true,
            rtl: true,
            smartSpeed : 600
        });

               setTimeout(function(){
                    nextOwl(1);
                }, 7000);

            var previousSlide = $('[data-featuredindex="'+numOfVideos+'"]');
            owl.on("changed.owl.carousel", function(event){
                    
                    currentIndex = event.item.index;

                    dataIndex = $(event.target).find(".item").eq(currentIndex).data("index");

                    $(event.target).find(".item").addClass("gray");

                    if(dataIndex != clickedIndex && clickedIndex != null){
                        owl.trigger('next.owl.carousel');
                    }else if(dataIndex == clickedIndex){
                        clickedIndex = null;
                        setTimeout(function(){
                            next = true;
                        }, 7000);
                    }

                    if(clickedIndex == null){

                        $(".featured").not(previousSlide).css("z-index",1);
                        
                        var width = $(window).width();
                
                        slide_transition($('.featured[data-featuredindex="'+dataIndex+'"]'));

                        var windowWidth = $(window).width();
                        if(windowWidth < 1000){
                            $(".tab svg").css({fill:"#00a7e1"});
                        }
                    }


                    currentIndex = event.item.index;

    $(".item").addClass("gray");


    if(clickedIndex == null){

        $('div[data-index='+currentIndex+']').removeClass("gray");
        $(".featured").not(previousSlide).css("z-index",1);
        
        var width = $(window).width();
        var featured_1 = $("#featured_1");
        var featured_2 = $("#featured_2");
        var featured_3 = $("#featured_3");
        var featured_4 = $("#featured_4");
        var featured_5 = $("#featured_5");

        if(width >= 1000){
            if(currentIndex == 5){
                slide_transition(featured_1);
            }else if(currentIndex == 6){
                slide_transition(featured_2);
            }else if(currentIndex == 7){
                slide_transition(featured_3);
            }else if(currentIndex == 8){
                slide_transition(featured_4);
            }else{
                slide_transition(featured_5);
            }
        }else if(width >= 600){
            if(currentIndex == 3){
                slide_transition(featured_1);
            }else if(currentIndex == 4){
                slide_transition(featured_2);
            }else if(currentIndex == 5){
                slide_transition(featured_3);
            }else if(currentIndex == 6){
                slide_transition(featured_4);
            }else{
                slide_transition(featured_5);
            }
        }else{
            if(currentIndex == 7){
                slide_transition(featured_1);
            }else if(currentIndex == 3){
                slide_transition(featured_2);
            }else if(currentIndex == 4){
                slide_transition(featured_3);
            }else if(currentIndex == 5){    
                slide_transition(featured_4);
            }else{
                slide_transition(featured_5);
            }
        }

        var windowWidth = $(window).width();
        if(windowWidth < 1000){
            $(".tab svg").css({fill:"#00a7e1"});
        }
    }
            
            })

}else{
    var videoHeight = $(".featured").children(".video_wrapper").height();
    $(".featured_wrapper").find(".featured_area").height(videoHeight);
    setTimeout(function(){
        $(".embed-container iframe, .embed-container object, .embed-container embed").css("height","100%");
    },3000);
}

var pauseOwl = new Array(); 
var stop = false;
function nextOwl(j) {
    if(next == true){
        $('[data-videoindex="'+j+'"]').vimeo("paused", function(data){ 

            pauseOwl.push(data);
            if(j < numOfVideos){
                nextOwl(j+1);
            }else{
                if($.inArray(false, pauseOwl) == -1){
                    if(itemClick == false){
                        owl.trigger('next.owl.carousel');
                    }else{
                        itemClick == true;  
                    }
                }else{
                    stop = true;
                }
                pauseOwl = [];
                if(stop == false){
                    setTimeout(function(){
                        nextOwl(1);
                    }, 7000);
                }
            }
        })
    }
}

function slide_transition(element){
        var left = element.width();
        element.css({zIndex:3,left:-left});
        element.animate({left:0},600,function(){
            previousSlide.css({zIndex:1});
            element.css({zIndex:2});
            previousSlide = element;
        });
}
 
$('#featured_logos .item').on("click",function(){   
    var windowWidth = $(window).width();
    if(windowWidth >= 1000){
        next = false;
        clickedIndex = $(this).data( "index" );

        if(dataIndex != clickedIndex){
            for(var i=1; i<=numOfVideos; i++){
                 $('[data-videoindex="'+i+'"]').vimeo("pause");
            } 
            next = true;
            stop = true;
            itemClick = true;
            owl.trigger('next.owl.carousel');
        }

    }
});


$(window).resize(function(){
    var videoHeight = $(".featured").children(".video_wrapper").height();
    $(".featured_wrapper").find(".featured_area").height(videoHeight);
});
});
</script>


</section>
<?php get_footer(); ?>
