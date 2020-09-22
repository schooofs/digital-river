<?php
/**
 * Template Name: Template WHY DR
 */
?>
<?php get_header(); ?>
<?php get_template_part('masthead'); ?>
<style type="text/css">



	    .why-digital-river{line-height:1 ;}


	.left_border{width:100% !important;}
	.section{height:auto; overflow:hidden; border-top: solid 1px rgb(151,215,0); padding-top:15px; margin-top:75px;  font-family:"HelveticaNeueW01-55Roma";}
	.section:first-child{border-top: none}
	.section:last-child{margin-bottom:75px;}
	.section .eyebrow-wrapper{ margin-top:0px;}
	.section .eyebrow-wrapper{width:auto; height:auto; padding:5px; margin-bottom:45px; margin-top:25px;}
	.section:first-child .eyebrow-wrapper{margin-top:0px;}

	.section .eyebrow-wrapper .eyebrow{width:auto; height:auto; padding:5px; background-color:#A8CA1F; display: inline; font-family: "DIN1451W01-Mittelschrif"; text-transform: uppercase; font-size:18px;}
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
	.section .right-side .snapshot-wrapper .tag{font-size:16px; width:100%; font-family:"HelveticaNeueW01-55Roma";}
	.section .right-side .snapshot-wrapper .left-list, .section .right-side .snapshot-wrapper .right-list{width:327px; float:left; }
	.section .right-side .snapshot-wrapper .left-list ul, .section .right-side .snapshot-wrapper .right-list ul{margin:0; margin:10px; font-family:"HelveticaNeueW01-55Roma"; }
	.section .right-side .snapshot-wrapper .left-list li, .section .right-side .snapshot-wrapper .right-list li{list-style-type: disc; margin-top:4px;}

 	.section .right-side .five-columns{width:100%; height:auto; }
	.section .right-side .five-columns .columns{width:129px; height: 353px; overflow:hidden; padding:5px; background-color:#009ad7; float:left;
	margin-left:1px; margin-right:1px; }
	.section .right-side .five-columns .columns:first-child{margin-left:0px; width:130px;}
	.section .right-side .five-columns .columns:last-child{margin-right:0px; width:130px;}
	.section .right-side .five-columns .columns .header{ width:100%; margin-top:10px; color:#FFF;  font-size:18px; font-family: 'DIN1451W01-Mittelschrif'; text-transform:uppercase; }
	.section .right-side .five-columns .columns .copy{ width: 100%; margin-top:31px; font-size:15px; height:200px; }
	#subscriptions .copy{margin-top:48px;}
	#currencies .copy{margin-top:15px;}
	.section .right-side .five-columns .columns-number{width:139px; height:75px; padding-top:5px; background-color:#009ad7; float:left; color:#FFF; font-size:76px; text-align:center; margin-left:1px; margin-right:1px; font-family: 'DIN 1451 W01 Engschrift'; text-transform:uppercase; }
	.section .right-side .five-columns .columns-number:first-child{margin-left:0px; width:140px;}
	.section .right-side .five-columns .columns-number:last-child{margin-right:0px; width:140px;}

	.section .commerce-service{width:100%; height: 521px; overflow:hidden; font-family: 'DIN 1451 W01 Engschrift'; text-transform:uppercase; color:#807e82; }
	.section .commerce-service .service{width:276px; margin-left:6px; margin-right:6px; background-color:#f4f4f4; height:515px; position:absolute;}
	.section .service2{width:276px; margin-left:6px; margin-right:6px; background-color:#f4f4f4; height:495px; float:left;}
	.section .commerce-service .service:first-child{margin-left:0px;}
	.section .commerce-service .service:last-child{margin-right:0px;}
	.section  .service2 .icon, .section .commerce-service .service .icon{width:150px; height:150px; margin-top:40px; margin-right:auto; margin-left:auto; text-transform:uppercase;  overflow:hidden;}
	.section  .service2 .header, .section .commerce-service .service .header{width:100%; text-align:center; font-size:30px; margin-top:25px; font-family: 'DIN 1451 W01 Engschrift'; text-transform:uppercase; color:#807e82;}
	.section  .service2 .button-wrapper, .section .commerce-service .service .button-wrapper{margin-top:25px; width:100px; height:30px; margin-left:auto; margin-right:auto;}
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
	.marketing-expanded .service-content .sub-service .copy{margin-top:10px;  font-family:"HelveticaNeueW01-55Roma"; text-transform:none;}

	.experience-expanded .service-content{width:847px; float:right; height:395px; 	opacity:0;
		filter:Alpha(opacity=00); }
	.experience-expanded .service-content .sub-service{width:250px; height:115px; float:left;margin-left:24px; margin-top:25px; 	}
	.experience-expanded .service-content .sub-service .header{ font-family: 'DIN 1451 W01 Engschrift'; text-transform:uppercase; color:#807e82; font-size:28px;}
	.experience-expanded .service-content .sub-service .copy{margin-top:10px;  font-family:"HelveticaNeueW01-55Roma"; text-transform:none;}
	.experience-expanded .service-content .sub-service .copy ul{margin-top:10px;}

	.infrastructure-expanded .service-content{width:847px; float:right; height:395px; padding-top:0px; opacity:0;
		filter:Alpha(opacity=00);}
	.infrastructure-expanded .service-content .sub-service{width:250px; height:115px; float:left; margin-left:24px; margin-top:25px; 		}
	.infrastructure-expanded .service-content .sub-service .header{ font-family: 'DIN 1451 W01 Engschrift'; text-transform:uppercase; color:#807e82; font-size:28px;;}
	.infrastructure-expanded .service-content .sub-service .copy{margin-top:10px;  font-family:"HelveticaNeueW01-55Roma"; text-transform:none;}
	.infrastructure-expanded .service-content .sub-service .copy ul{margin-top:10px;}

	.payments-expanded .service-content{width:847px; float:right; height:395px;  padding-top:35px; opacity:0;
		filter:Alpha(opacity=00);}
	.payments-expanded .service-content .sub-service{width:250px; height:115px; float:left;  margin-left:24px; margin-top:70px; 		}
	.payments-expanded .service-content .sub-service .header{   font-family: 'DIN 1451 W01 Engschrift'; text-transform:uppercase; color:#807e82; font-size:28px;}
	.payments-expanded .service-content .sub-service .copy{margin-top:10px;  font-family:"HelveticaNeueW01-55Roma"; text-transform:none;}
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
    #fourth .copy, #five .copy, #six .copy{width:100%; height:auto; margin-top:40px; line-height: 1.3;}
	
	#five{margin-bottom:75px;}
	#six{margin-bottom:75px;}

	.copy .icon{width:80px; height:80px; float:left; clear:left; margin:5px; margin-right:20px;}
	.copy .icon img{width:auto; height:auto; max-width:80px; max-height:80px;}

	#fourth .ROI{width:300px; height:100px; background-color:#EBEBEB; padding: 15px;}


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
			width: 90%;
			height: auto;
			padding-left: 5%;
			padding-right: 5%;
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

    </style>

   



    <script type="text/javascript">


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
          <div class="eyebrow">Our Story</div>
       </div>
        <div class="left-side">
        	We offer commerce, payments and marketing services to companies of all sizes, in nearly every corner of the world. Digital River is the leading global provider of Commerce-as-a-Service solutions. And our scalable multi-tenant SaaS is backed by 20 years of ecommerce experience and has a low up-front investment as well as a fast time to market.
 <br>
 <br>
This expertise enables our clients to maximize revenue as well as reduce the costs and risks of running an online business. Our digital agency drives additional growth through direct response and email marketing services, as well as our newly implemented modular pricing model and growing partner network.
<br>
<br>
<a href="#">Learn More About Us</a>
        </div>
        <div class="right-side" id="second">

            <div class="snapshot-wrapper">
            	<div class="header">An Average Day</div>
                <div class="tag">Here’s a snapshot of an average Digital River day:</div>
                <div class="left-list">
                	<ul>
                    	<li>Support 1.5 billion API calls</li>
                        <li>Send over 3 million emails</li>
                        <li>Create 5 transaction authorizations per second</li>
                    </ul>
                </div>
                <div class="right-list">
                	<ul>
                    	<li>Serve 60 million pages</li>
                        <li>Process 300,000 orders</li>
                        <li>Host more than 6 TB of digital content</li>
                        <li>Ship products into 170+ countries</li>
                    </ul>
                </div>
            </div>

           <div class="five-columns">
                <div class="columns">
                    <div class="header">Online Transactions</div>
                    <div class="copy">Our commerce, payments and marketing platforms will handle an estimated $30 billion in online transactions this year.</div>
                    <div class="columns-number"><span style='font-size: 22px; display: block; width: 14px; float: left; margin-left: 38px; margin-top: 10px;'>$</span><span style='font-size: 90px; display: block; width: 72px; float: left; letter-spacing:-3px;'>30</span><span style='font-size: 22px; float: left; display: block;margin-top: 10px;'>B</span></div>
                </div>
                <div class="columns">
                    <div class="header">Site Display Languages</div>
                    <div class="copy">We’re not just multilingual - we speak global. Our commerce platform hosts client web sites in 30 different languages. Yes, 30.</div>
                    <div class="columns-number"><span style='font-size: 90px; margin-left: 45px; display: block; width: 100px; float: left; letter-spacing:-3px;'>30</span></div>
                </div>
                <div class="columns" id="currencies">
                    <div class="header" >Currencies and Payment Methods</div>
                    <div class="copy">We transact in 40 different currencies and support nearly 200 payment methods and integrate with third-party fulfillment agencies across regions of the world.</div>
                    <div class="columns-number"><span style='font-size: 90px; margin-left: 25px; display: block; width: 100px; float: left; letter-spacing:-3px;'>200</span></div>
                </div>
                <div class="columns" >
                    <div class="header">Commerce Experts</div>
                    <div class="copy">We have 1,300 commerce experts in 23 offices around the world ready to help you operate in 243 countries.</div>
                    <div class="columns-number"><span style='font-size: 90px; margin-left: 8px; display: block; width: 100px; float: left; letter-spacing:-3px;'>1300</span></div>
                </div>
                <div class="columns"  id="subscriptions">
                    <div class="header">Subscriptions</div>
                    <div class="copy">Digital River manages 11M+ active subscriptions and 8M active subscribers.</div>
                    <div class="columns-number"><span style='font-size: 90px; display: block; width: 58px; float: left; letter-spacing:-3px; margin-left:56px;'>11</span><span style='font-size: 22px; float: left; display: block;margin-top: 10px;'>M</span></div>
                </div>
        </div>



</div>
    </div>

    <div class="section" id="third">
        <div class="eyebrow-wrapper">
            <div class="eyebrow">Commerce as a Service</div>
        </div>


        <div class="commerce-service">
        	<div class="service" id="marketing">
            	<div class="icon"><img src="<?php echo get_image_path('marketing.png'); ?>" /></div>
                <div class="header">Marketing <br /> Services</div>
                <div class="button-wrapper"><input id="marketing-button" value="Learn More" type="button" /></div>
            </div>
            <div class="service" id="experience">
            	<div class="icon"><img src="<?php echo get_image_path('Experience.png'); ?>" /></div>
                <div class="header">Commerce <br /> Experience</div>
                <div class="button-wrapper"><input id="experience-button" value="Learn More" type="button" /></div>

            </div>
            <div class="service" id="infrastructure">
           		<div class="icon"><img src="<?php echo get_image_path('Infrastructure.png'); ?>" /></div>
                <div class="header">Commerce <br />Business<br /> Infrastructure</div>
                <div class="button-wrapper"><input id="infrastructure-button" value="Learn More" type="button" /></div>
            </div>
            <div class="service" id="payments">
            	<div class="icon"><img src="<?php echo get_image_path('payments.png'); ?>" /></div>
                <div class="header">Payments</div>
                <div class="button-wrapper" ><input id="payments-button" value="Learn More" type="button" /></div>
            </div>


        	<div class="marketing-expanded">
            <div class="service2" >
                         <div class="icon"><img src="<?php echo get_image_path('marketing.png'); ?>" /></div>
                        <div class="header">Marketing <br /> Services</div>
                    <div class="links-wrapper">
                    	<a href="<?php echo site_url('/solutions/marketing/','http'); ?> ">All Marketing Solutions ></a>
                        <a href="<?php echo site_url('/request-demo/','http'); ?> ">Request A Demo ></a>
                        <a href="<?php echo site_url('/company/contact-us/','http'); ?> ">Contact Us ></a>
                    </div>

                </div>
                 <div class="service-content">
                            <div class="sub-service">
                                <div class="header"><a href="http://www.digitalriver.com/solutions/marketing/search-engine-marketing/">Site Search</a></div>
                                <div class="copy">Manage your pay-per-click ads to get the most out of your marketing budget.</div>
                            </div>
                            <div class="sub-service">
                                <div class="header"><a href="http://www.digitalriver.com/solutions/marketing/email-programs/">Email</a></div>
                                <div class="copy">Create highly targeted and relevant messages that connect with your customers.</div>
                            </div>
                           <div class="sub-service">
                                <div class="header"><a href="http://www.digitalriver.com/solutions/marketing/affiliate-programs-and-networks/">Affiliate</a></div>
                                <div class="copy">Leverage a marketplace of pay-for-performance publishers to drive revenue.</div>
                            </div>

                         <div class="sub-service">
                                <div class="header"><a href="http://www.digitalriver.com/solutions/marketing/display-advertising/">Display</a></div>
                                <div class="copy">Drive brand awareness and incremental conversions through targeted ad campaigns.</div>
                            </div>
                            <div class="sub-service">
                                <div class="header"><a href="http://www.digitalriver.com/solutions/marketing/advanced-analytics/">Analysis</a></div>
                                <div class="copy">Monitor key performance indicators to identify optimization opportunities.</div>
                            </div>
                           <div class="sub-service">
                                <div class="header"><a href="http://www.digitalriver.com/solutions/marketing/site-optimization/">Site Optimization</a></div>
                                <div class="copy">Use statistically-valid testing to form a foundation for continuous improvement.</div>
                            </div>
                        </div>

            </div>
            <div class="experience-expanded">
               <div class="service2" >
                   <div class="icon"><img src="<?php echo get_image_path('Experience.png'); ?>" /></div>
                    <div class="header">Commerce <br /> Experience</div>
                    <div class="links-wrapper">
                    	<a href="<?php echo site_url('/solutions/commerce/','http'); ?> ">All Commerce Solutions ></a>
                        <a href="<?php echo site_url('/request-demo/','http'); ?> ">Request A Demo ></a>
                        <a href="<?php echo site_url('/company/contact-us/','http'); ?> ">Contact Us ></a>
                    </div>
                </div>



                 <div class="service-content">
                            <div class="sub-service">
                                <div class="header">Shopping Cart</div>
                                <div class="copy">
                                	<ul>
                                    	<li>Optimized for conversion</li>
                                        <li>Supports digital and physical</li>
                                    </ul>
                                </div>

                            </div>
                            <div class="sub-service">
                                <div class="header">WCMS</div>
                                <div class="copy">
                                	<ul>
                                    	<li>Flexible framework</li>
                                        <li>Device detection</li>
                                        <li>Responsive design</li>
                                        <li>Catalog</li>
                                    </ul>
                                </div>
                            </div>
                           <div class="sub-service">
                                <div class="header">Virtual products</div>
                                <div class="copy">
                                	  <ul>
                                    	<li>Compare pages</li>
                                        <li>Configure-to-order</li>
                                    </ul>
                                </div>
                            </div>

                         <div class="sub-service">
                                <div class="header">Searchandising</div>
                                <div class="copy">
                                	 <ul>
                                    	<li>Sponsored products</li>
                                        <li>Faceted navigation</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="sub-service">
                                <div class="header"><a href="http://www.digitalriver.com/solutions/commerce/merchandising/">Merchant and Promotions</a></div>
                                <div class="copy">
                                	<ul>
                                    	<li>Supports most promotion types</li>
                                        <li>Social integration</li>
                                    </ul>
                                </div>
                            </div>
                           <div class="sub-service">
                                <div class="header">Localization</div>
                                <div class="copy">
                                	 <ul>
                                    	<li>GEO/IP detection</li>
                                        <li>Support for any language</li>
                                        <li>Optimized for local consumer</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="sub-service">
                                <div class="header">Recommendation and Personalization</div>
                                <div class="copy">
                                	 <ul>
                                    	<li>Related items</li>
                                        <li>Private stores</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="sub-service">
                                <div class="header">A/B Testing</div>
                                <div class="copy">
                                	 <ul>
                                    	<li>Merchandising, pricing, design, user experience,  effectiveness testing</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="sub-service">
                                <div class="header">Pricing</div>
                                <div class="copy">
                                	 <ul>
                                    	<li>Volume discounts</li>
                                        <li>Tiered pricing</li>
                                        <li>Purchase plans</li>
                                    </ul>
                                </div>
                            </div>


                            <div class="sub-service">
                                <div class="header">Admin Tools</div>
                                <div class="copy">
                                	 <ul>
                                    	<li>Intuitive web-based toolset manages commerce experience</li>
                                    </ul>
                                </div>
                            </div>


                        </div>



            </div>
            <div class="infrastructure-expanded">
               <div class="service2" >
            	<div class="icon"><img src="<?php echo get_image_path('Infrastructure.png'); ?>" /></div>
                <div class="header">Commerce <br />Business<br />Infrastructure</div>
                <div class="links-wrapper">
                    	<a href="<?php echo site_url('/why-digital-river/commerce-business-infrastructure/','http'); ?> ">Find Out More ></a>
                        <a href="<?php echo site_url('/company/contact-us/','http'); ?> ">Contact Us ></a>
                </div>
                </div>


         <div class="service-content">
                            <div class="sub-service">
                                <div class="header">Merchant and Seller of Record</div>
                                <div class="copy">
                                	<ul>
                                    	<li>MOR and SOR solutions avalible</li>
                                        <li>Digital River assumes risk</li>
                                    </ul>
                                </div>

                            </div>
                            <div class="sub-service">
                                <div class="header"><a href="http://www.digitalriver.com/solutions/commerce/international-markets/">Local Legal Entities</a></div>
                                <div class="copy">
                                	<ul>
                                    	<li>In complex countries</li>
                                        <li>Local expertise and payment methods</li>
                                    </ul>
                                </div>
                            </div>
                           <div class="sub-service">
                                <div class="header"><a href="http://www.digitalriver.com/solutions/payments/risk-management-and-fraud/">Proactive Fraud Management</a></div>
                                <div class="copy">
                                	  <ul>
                                    	<li>In-house fraud system learns over time</li>
                                    </ul>
                                </div>
                            </div>

                         <div class="sub-service">
                                <div class="header"><a href="http://www.digitalriver.com/solutions/payments/global-tax-services/">Full-Service Tax Solution</a></div>
                                <div class="copy">
                                	 <ul>
                                    	<li>Manage audit risk</li>
                                        <li>Day-to-day compliance</li>
                                        <li>Offshore tax structure</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="sub-service">
                                <div class="header"><a href="http://www.digitalriver.com/solutions/commerce/physical-and-digital-fulfillment/">Order Management</a></div>
                                <div class="copy">
                                	<ul>
                                    	<li>Order and financial data managements</li>
                                        <li>Fulfillment and logistics</li>
                                    </ul>
                                </div>
                            </div>
                           <div class="sub-service">
                                <div class="header"><a href="http://www.digitalriver.com/solutions/commerce/subscription-services/">Cloud Enablement</a></div>
                                <div class="copy">
                                	 <ul>
                                    	<li>Subscriptions</li>
                                        <li>Usage-based billing</li>
                                        <li>Inter-term billing</li>
                                        <li>Cloud billing</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="sub-service">
                                <div class="header">Business Intelligence</div>
                                <div class="copy">
                                	 <ul>
                                    	<li>Analytics</li>
                                        <li>Reporting</li>
                                        <li>Predictive modeling</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="sub-service">
                                <div class="header">Security and Compliance</div>
                                <div class="copy">
                                	 <ul>
                                    	<li>PCI</li>
                                        <li>SOX</li>
                                        <li>SSAE16</li>
                                        <li>WEEE</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="sub-service">
                                <div class="header">Customer Service</div>
                                <div class="copy">
                                	 <ul>
                                    	<li>Call center support</li>
                                        <li>Escalation management</li>
                                    </ul>
                                </div>
                            </div>


                            <div class="sub-service">
                                <div class="header">Integrated Services</div>
                                <div class="copy">
                                	 <ul>
                                    	<li>Consultative client service through site launch</li>
                                    </ul>
                                </div>
                            </div>


                        </div>


            </div>
            <div class="payments-expanded">
               <div class="service2" >
            	<div class="icon"><img src="<?php echo get_image_path('payments.png'); ?>" /></div>
                <div class="header">Payments</div>
                <div class="links-wrapper">
                    	<a href="<?php echo site_url('/solutions/payments/','http'); ?> ">All Payment Solutions ></a>
                        <a href="<?php echo site_url('/request-demo/','http'); ?> ">Request A Demo ></a>
                        <a href="<?php echo site_url('/company/contact-us/','http'); ?> ">Contact Us ></a>
                </div>
                </div>

                  <div class="service-content">
                                                    <div class="sub-service">
                                        <div class="header"><a href="http://www.digitalriver.com/solutions/payments/payment-gateway/">Gateway Services</a></div>
                                        <div class="copy">
                                            <ul>
                                                <li>Facilitate global transactions</li>
                                                <li>Settlement and reconciliation</li>
                                            </ul>
                                        </div>

                                    </div>
                                    <div class="sub-service">
                                        <div class="header">Full-Service Acquiring</div>
                                        <div class="copy">
                                            <ul>
                                                <li>Transaction management</li>
                                                <li>Merchant solutions</li>
                                                <li>Shared risk</li>
                                            </ul>
                                        </div>
                                    </div>
                                   <div class="sub-service">
                                        <div class="header">PSP Services</div>
                                        <div class="copy">
                                              <ul>
                                                <li>Sub-merchant relationships through world payments</li>
                                                <li>Shared risk</li>
                                            </ul>
                                        </div>
                                    </div>

                                 <div class="sub-service">
                                        <div class="header">IN-COUNTRY MERCHANT</div>
                                        <div class="copy">
                                             <ul>
                                                <li>Merchant of record </li>
                                                <li>Transaction management</li>
                                                <li>Assumed risk</li>
                                            </ul>
                                        </div>
                                    </div>
                </div>
            </div>


    </div>

        </div>


    <div class="section" id="fourth">
        <div class="eyebrow-wrapper">
            <div class="eyebrow">Total Cost of Ownership</div>
        </div>

        <div class="copy">
        Maintaining an agile ecommerce system that is easy to implement, run, and support, while meeting customer, regulatory, and fiduciary requirements involves highly complex expertise and significant operational costs. This type of integrated Commerce-as-a-Service operation requires management of a broad range of day-to-day functions for the technology platform, website integration, marketing solutions, payment processing, and related complex business infrastructure needs—operations that increase your total cost of business.
       </div>

       <div class="copy">
       Digital River’s multitenant SaaS-based global ecommerce platform, combined with our end-to-end solution offerings, enables customers to easily manage all maintenance, support and execution capabilities for a successful ecommerce business. Enjoy the privilege and flexibility of outsourcing your ecommerce operations so you can focus on other areas of your business. With Digital River’s flexible business model, and expertise in global commerce, your entry into new markets will increase your annual revenue and lower your costs.
       </div>

    </div>
    <div class="section" id="five">
        <div class="eyebrow-wrapper">
            <div class="eyebrow">A Mobile Approach</div>
        </div>

        <div class="copy">
       Across our commerce, payments and marketing offerings there is a cohesive strategy around mobile technology. We offer responsive, adaptive, device-specific web design solutions based on client need—all new websites we create are responsive out of the box. Digital River continues to invest in mobile-specific APIs to integrate with customer apps and partner applications. We’ve expanded our partner relationships in the app development and design community to facilitate comprehensive services to our clients.
       </div>

       <div class="copy">
       Our portfolio of leading mobile payments offerings continues to expand, providing our clients with a variety of payment options to choose from. As the mobile app landscape continues to evolve, you can rely on Digital River to stay ahead of the curve and provide all the right solutions to keep you competitive in the market.
	   </div>

    </div>

        <div class="section" id="six">
        <div class="eyebrow-wrapper">
            <div class="eyebrow">Client Success</div>
        </div>

        <div class="copy">
Client satisfaction and success is paramount to our business model. Digital River’s client-centric approach focuses on maintaining long-term client relationships through dedicated and experienced account managers to help your ecommerce business reach its full potential. Digital River’s Client Service Team—comprised of dedicated client marketing and account managers—offers you ecommerce expertise to optimize your marketing and promotions, and manage product information and store operations. We focus on enhancing your customers’ shopping experience to build and maintain a strong customer base. Your account team will ensure your unique business needs are being met and managed to the highest standard. <a href="/wp-content/uploads/2014/08/Digital-River-Client-Success-Value-Brief.pdf">Read more.</a>
       </div>

       <div class="copy">
       		<a href="#">Contact Us</a> today to start your relationship with Digital River.
       </div>

    </div>







        </div>
    </div>
</section>
<?php get_footer(); ?>
