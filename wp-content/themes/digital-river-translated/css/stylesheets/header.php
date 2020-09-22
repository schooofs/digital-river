<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<?php if( is_page_template(Manager::$business_brick_template) ): ?>
		<link rel="icon" type="image/png" href="/wp-content/themes/code42/img/legacy/business/favicon.png" />
	<?php else: ?>
		<link rel="shortcut icon" href="/wp-content/themes/code42/img/crashplan/favicon.ico" />
	<?php endif; ?>
	
	<title><?php wp_title(); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

<script>
	(function(d) {
	var config = {
	  kitId: 'hou4pqk',
	  scriptTimeout: 3000,
	  async: true
	},
	h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='//use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
	})(document);
</script>
	

	<?php wp_head(); ?>

	<?php do_action('code_42_header'); ?>	


	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-775547-18', 'auto');
	  ga('send', 'pageview');

	</script>
	
</head>
<body class="crashplan  <?php echo get_field("body_classes", get_the_ID()); ?>">

<div class="page-wrapper">

	<?php do_action("code42_header"); ?>

	<?php
	/*	
	<div class="main-nav text-size-6" id="mainNav">
		<nav role="navigation">
			<?php
				//do_action("nav-tiers");
			?>

			<ul class="main-nav-tier1 business-nav">
				<li>
					<span class="main-nav-tier1-headline">
						FOR BUSINESS
					</span>
					<ul class="main-nav-tier2">
						
							<li>
								
									<a href="/business/">CrashPlan for Business</a>
								
							</li>
						
							<li>
								
									<a href="/business/overview.html">Overview</a>
								
							</li>
						
							<li>
								
									<a href="/business/stackup.html">How We Stack Up</a>
								
							</li>
						
							<li>
								
									<a href="/business/features.html">Features</a>
								
							</li>
						
							<li>
								
									<a href="/business/mobile/">Mobile Features</a>
								
							</li>
						
							<li>
								
									<a href="/business/compare.html">Product Comparison</a>
								
							</li>
						
							<li>
								
									<a href="/trial/select/">Try It Free</a>
								
							</li>
						
							<li>
								
									<a href="/business/#download">Download</a>
								
							</li>
						
							<li>
								
									<a target="_blank" class="pro-link" href="https://www.crashplanpro.com/console/">Sign In</a>
								
							</li>
						
							<li>
								
									<a target="_blank" href="http://support.code42.com/Administrator/3.6_And_4.0/Planning/PRO_FAQs">FAQ</a>
								
							</li>
						
							<li>
								
									<a target="_blank" href="http://www.code42.com/r/support/">Support</a>
								
							</li>
							
					</ul>
				</li>
			</ul>
			<ul class="main-nav-tier1 home-nav">
				<li>
					<span class="main-nav-tier1-headline"><?php _e("For Home"); ?></span>
					<ul class="main-nav-tier2">
							<li><a href="/crashplan/">CrashPlan Backup</a></li>
							<li>
								
									<span class="main-nav-tier2-headline">Features</span>
									<ul class="main-nav-tier3">
										
											<li><a href="/crashplan/features/">Overview</a></li>
										
											<li><a href="/crashplan/features/mobile/">Mobile</a></li>
										
											<li><a href="/crashplan/features/backup-destinations/">Backup Destinations</a></li>
										
											<li><a href="/crashplan/features/customer-champions/">Customer Champions</a></li>
										
											<li><a href="/crashplan/features/security/">Security</a></li>
										
									</ul>
								
							</li>
						
							<li>
								
									<span class="main-nav-tier2-headline">News</span>
									<ul class="main-nav-tier3">
										
											<li><a href="/crashplan/talk/reviews/">In the News</a></li>
										
											<li><a href="/crashplan/talk/stories/">Customer Stories</a></li>
										
									</ul>
								
							</li>
						
							<li>
								
									<a href="/crashplan/features/compare/">Product Comparison</a>
								
							</li>
						
							<li>
								
									<a href="/store/">Store</a>
								
							</li>
						
							<li>
								
									<a href="/crashplan/download/">Download</a>
								
							</li>
						
							<li>
								
									<a target="_blank" href="https://www.crashplan.com/account/login.vtl">Sign In</a>
								
							</li>
						
							<li>
								
									<a target="_blank" href="http://www.code42.com/r/support/">Support</a>
								
							</li>
							
					</ul>
				</li>
			</ul>
		</nav>
		<button id="navCloseBtn" title="Close navigation"></button>
	</div>
	*/
	?>
	<div class="main-content" role="main">

			
			

			
		

	<header id="mainHeader" class="main-header clearfix <?php echo (get_field("header_space", get_the_ID())[0] == "true")? " main-header-lightbg ":" main-header-darkbg "; ?>">
<?php
/*
	<div class="c42-header-wrapper">
		<a class="c42-product-header-logo" href="/"><!--[if lt IE 9]><img src="/wp-content/themes/code42/img/code42/logo-code42-inlined.png" /><![endif]--><!--[if gt IE 8]><!--><svg viewBox="0 0 141 32" width="141px" height="32px" class="logo-code42-inlined">
	<path class="logo-icon" d="M16,24c-4.4,0-8-3.6-8-8c0-4.4,3.6-8,8-8c3.7,0,6.8,2.6,7.7,6H32V0H0v32h32V18h-8.3 C22.8,21.4,19.7,24,16,24z"/>
	<g class="logo-text">
		<path d="M43.6,16L43.6,16c0-3.8,2.8-7,6.8-7c2.4,0,3.9,0.9,5.2,2.1l-1,1.1c-1.1-1.1-2.4-1.8-4.2-1.8 c-3,0-5.2,2.4-5.2,5.5v0c0,3.1,2.2,5.5,5.2,5.5c1.8,0,3.1-0.7,4.3-1.9l1,1c-1.4,1.4-2.9,2.4-5.4,2.4C46.4,22.9,43.6,19.9,43.6,16 z"/>
		<path d="M61.2,16L61.2,16c0-3.7,2.8-7,6.9-7c4.1,0,6.8,3.2,6.8,6.9c0,0,0,0,0,0c0,3.7-2.8,6.9-6.9,6.9 C63.9,22.9,61.2,19.7,61.2,16z M73.3,16L73.3,16c0-3.1-2.2-5.6-5.3-5.6s-5.3,2.5-5.3,5.5v0c0,3.1,2.2,5.5,5.3,5.5 C71.1,21.5,73.3,19.1,73.3,16z"/>
		<path d="M82,9.3h4.7c4.2,0,7.1,2.9,7.1,6.7v0c0,3.8-2.9,6.7-7.1,6.7H82V9.3z M86.6,21.3c3.4,0,5.6-2.3,5.6-5.3v0 c0-3-2.2-5.3-5.6-5.3h-3.1v10.6H86.6z"/>
		<path d="M100.8,9.3h9.7v1.4h-8.2v4.6h7.3v1.4h-7.3v4.7h8.3v1.4h-9.8V9.3z"/>
		<path d="M123.8,19.5h-7.1l-0.4-1.1l7.6-9.3h1.3v9.1h2.1v1.3h-2.1v3.2h-1.5V19.5z M123.8,18.2v-6.9l-5.6,6.9H123.8 z"/>
		<path d="M131.4,21.5l4.9-4.3c2.1-1.8,2.8-2.9,2.8-4.2c0-1.6-1.2-2.6-2.7-2.6c-1.5,0-2.5,0.8-3.6,2.3l-1.1-0.8 c1.2-1.8,2.5-2.9,4.8-2.9c2.4,0,4.2,1.6,4.2,3.8v0c0,2-1,3.2-3.4,5.2l-3.6,3.2h7.1v1.4h-9.4V21.5z"/>
	</g>
</svg>
<!--<![endif]--></a>
		<ul class="c42-global-header-links">
			<li><a href="/about/">Company</a></li>
			<li><a target="_blank" href="http://www.code42.com/r/support/">Support</a></li>
		</ul>
	</div>

	*/

	?>
	<div class="main-header-content">

		

	<?php if(is_page_template(Manager::$business_brick_template)){ ?>
		<a class="main-header-logo main-header-logo-full" href="/en-us/business/">
			<!--[if lt IE 9]><img src="/img/legacy/business/logo-business-header.png" /><![endif]--><!--[if gt IE 8]><!-->
			<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="398.2px" height="55.5px" viewBox="107 367 398.2 55.5" enable-background="new 107 367 398.2 55.5" xml:space="preserve">
				<polygon fill="#00B4ED" points="177.7,372.2 167,383.1 172.2,383.1 172.2,411.9 117.7,411.9 117.7,377.7 130.6,377.7 135.8,383.1 
					159.3,383.1 170.2,372.2 141.2,372.2 135.8,367 107,367 107,422.5 182.9,422.5 182.9,383.1 188.3,383.1 "></polygon>
				<g>
					<path fill="#464C59" d="M202.7,397.5L202.7,397.5c0-7.7,5.7-14.1,13.6-14.1c5,0,7.9,1.7,10.4,4.2l-2,2.2c-2.2-2.2-4.7-3.7-8.4-3.7
						c-5.9,0-10.4,5-10.4,11.1l0,0c0,6.2,4.5,11.1,10.4,11.1c3.7,0,6.2-1.5,8.7-4l2,2c-2.7,3-5.9,4.7-10.9,4.7
						C208.4,411.4,202.7,405.2,202.7,397.5z"></path>
					<path fill="#464C59" d="M239.3,383.9H251c3.2,0,5.9,1,7.7,2.7c1.2,1.2,2,3.2,2,5.2l0,0c0,4.5-3,7.2-7.4,7.9l8.2,11.1h-3.7
						l-7.9-10.4l0,0h-7.7v10.4h-3v-27H239.3z M250.7,397.7c4,0,6.9-2,6.9-5.5l0,0c0-3.2-2.5-5.2-6.9-5.2h-8.4V398h8.4V397.7z"></path>
					<path fill="#464C59" d="M285.2,383.6h3l12.4,27.3h-3.2l-3.2-7.2h-14.6l-3.2,7.2H273L285.2,383.6z M292.6,401l-6.2-13.9l-6.2,13.9
						H292.6z"></path>
					<path fill="#464C59" d="M310.7,406.9l2-2.2c2.7,2.5,5.5,3.7,9.2,3.7c3.7,0,5.9-2,5.9-4.7l0,0c0-2.5-1.2-4-6.9-5.2
						c-6.2-1.2-9.2-3.5-9.2-7.7l0,0c0-4.2,3.7-7.4,8.9-7.4c4,0,6.7,1.2,9.4,3.2l-1.7,2.2c-2.5-2-5-3-7.7-3c-3.5,0-5.7,2-5.7,4.5l0,0
						c0,2.5,1.5,4,7.4,5.2s8.7,3.5,8.7,7.7l0,0c0,4.7-4,7.7-9.2,7.7C317.4,411.1,313.9,409.9,310.7,406.9z"></path>
					<path fill="#464C59" d="M344.2,383.9h3v11.9h15.6v-11.9h3v27h-3v-12.1h-15.6v12.1h-3V383.9z"></path>
					<path fill="#464C59" d="M380.8,383.9H391c6.2,0,10.2,3.2,10.2,8.7l0,0c0,5.7-5,8.9-10.7,8.9H384v9.4h-3v-27H380.8z M390.5,398.5
						c4.5,0,7.4-2.5,7.4-5.9l0,0c0-4-3-5.9-7.2-5.9h-6.9v11.9H390.5z"></path>
					<path fill="#464C59" d="M413.3,383.9h3v24.3h15.1v2.7H413v-27H413.3z"></path>
					<path fill="#464C59" d="M454.9,383.6h3l12.4,27.3h-3.2l-3.2-7.2h-14.6l-3.2,7.2h-3.2L454.9,383.6z M462.6,401l-6.2-13.9l-6.2,13.9
						H462.6z"></path>
					<path fill="#464C59" d="M482.2,383.9h3l17.1,21.6v-21.6h3v27h-2.5l-17.3-22.1v22.1h-3v-27H482.2z"></path>
				</g>
			</svg>
			<!--<![endif]-->
		</a>
	<?php }else{ ?>
		<a class="main-header-logo main-header-logo-full" href="/en-us/">
			<!--[if lt IE 9]><img src="/wp-content/themes/code42/img/crashplan/logo-crashplan-header.png" /><![endif]--><!--[if gt IE 8]><!-->
			<svg width="398.2px" height="55.5px" viewBox="107 367 398.2 55.5">
				<polygon fill="#78B900" points="177.7,372.2 167,383.1 172.2,383.1 172.2,411.9 117.7,411.9 117.7,377.7 130.6,377.7 135.8,383.1 159.3,383.1 170.2,372.2 141.2,372.2 135.8,367 107,367 107,422.5 182.9,422.5 182.9,383.1 188.3,383.1 "/>
				<g>
					<path fill="#464C59" d="M202.7,397.5L202.7,397.5c0-7.7,5.7-14.1,13.6-14.1c5,0,7.9,1.7,10.4,4.2l-2,2.2c-2.2-2.2-4.7-3.7-8.4-3.7 c-5.9,0-10.4,5-10.4,11.1l0,0c0,6.2,4.5,11.1,10.4,11.1c3.7,0,6.2-1.5,8.7-4l2,2c-2.7,3-5.9,4.7-10.9,4.7 C208.4,411.4,202.7,405.2,202.7,397.5z"/>
					<path fill="#464C59" d="M239.3,383.9H251c3.2,0,5.9,1,7.7,2.7c1.2,1.2,2,3.2,2,5.2l0,0c0,4.5-3,7.2-7.4,7.9l8.2,11.1h-3.7 l-7.9-10.4l0,0h-7.7v10.4h-3v-27H239.3z M250.7,397.7c4,0,6.9-2,6.9-5.5l0,0c0-3.2-2.5-5.2-6.9-5.2h-8.4V398h8.4V397.7z"/>
					<path fill="#464C59" d="M285.2,383.6h3l12.4,27.3h-3.2l-3.2-7.2h-14.6l-3.2,7.2H273L285.2,383.6z M292.6,401l-6.2-13.9l-6.2,13.9 H292.6z"/>
					<path fill="#464C59" d="M310.7,406.9l2-2.2c2.7,2.5,5.5,3.7,9.2,3.7c3.7,0,5.9-2,5.9-4.7l0,0c0-2.5-1.2-4-6.9-5.2 c-6.2-1.2-9.2-3.5-9.2-7.7l0,0c0-4.2,3.7-7.4,8.9-7.4c4,0,6.7,1.2,9.4,3.2l-1.7,2.2c-2.5-2-5-3-7.7-3c-3.5,0-5.7,2-5.7,4.5l0,0 c0,2.5,1.5,4,7.4,5.2s8.7,3.5,8.7,7.7l0,0c0,4.7-4,7.7-9.2,7.7C317.4,411.1,313.9,409.9,310.7,406.9z"/>
					<path fill="#464C59" d="M344.2,383.9h3v11.9h15.6v-11.9h3v27h-3v-12.1h-15.6v12.1h-3V383.9z"/>
					<path fill="#464C59" d="M380.8,383.9H391c6.2,0,10.2,3.2,10.2,8.7l0,0c0,5.7-5,8.9-10.7,8.9H384v9.4h-3v-27H380.8z M390.5,398.5 c4.5,0,7.4-2.5,7.4-5.9l0,0c0-4-3-5.9-7.2-5.9h-6.9v11.9H390.5z"/>
					<path fill="#464C59" d="M413.3,383.9h3v24.3h15.1v2.7H413v-27H413.3z"/>
					<path fill="#464C59" d="M454.9,383.6h3l12.4,27.3h-3.2l-3.2-7.2h-14.6l-3.2,7.2h-3.2L454.9,383.6z M462.6,401l-6.2-13.9l-6.2,13.9 H462.6z"/>
					<path fill="#464C59" d="M482.2,383.9h3l17.1,21.6v-21.6h3v27h-2.5l-17.3-22.1v22.1h-3v-27H482.2z"/>
				</g>
			</svg><!--<![endif]-->
		</a>
	<?php } ?>
		

		<?php do_action("main_header_nav"); ?>


</header>

			
		<?php if(is_page_template(Manager::$business_brick_template)){ ?>
			<div id="content">
		<?php }else{ ?>
			<div id="pageContent" class="page-content <?php echo (get_field("header_space", get_the_ID())[0] == "true")? " add-header-space ":null; ?>">
		<?php } ?>		
			
