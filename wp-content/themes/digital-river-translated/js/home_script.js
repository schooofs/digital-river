
jQuery(document).ready(function( $ ) {



// function resizeHero(){ 
// 	var windowWidth = $(window).width();
// 	if(windowWidth >= 700){
// 		var height = $("#firstImage").height();
// 	}else{
// 		var height = $("#firstMobileImage").height();
// 	}

// 	$(".hero").height(height);
// 	$(".hero").find(".owl-stage").height(height);
// }


	var timer;
	$(window).bind('resize', function(){
	   timer && clearTimeout(timer);
	   timer = setTimeout(resizeHero, 500);
	});


	var hero = $(".flexslider");
  	hero.owlCarousel({
		autoplayTimeout:9000,
		autoplay:false,
		loop:true,
		callbacks: true,
		navigation: false,
		items:1,
		nav: false,
		dots: false
  	});


    $(document).on("click", ".owl-item", function(){
      if($(this).find("a").attr("href").match(/#/)){
          $(".canary").fadeIn(150);
          hero.trigger('stop.owl.autoplay');
        	$("#canary-video").vimeo("play");

      }
    });

    var $canary_video = $("#canary-video")

    $(".canary").on("click", function(){
        $(this).hide();
      	hero.trigger('play.owl.autoplay');
    	$canary_video.vimeo("pause");
    });

    $canary_video.on("play", function(){
	    console.log( "Video is playing" );
	     mktoMunchkin("348-QUY-258");
		 mktoMunchkinFunction('visitWebPage', {
		 	url: '/canary/started'
		 });
	});

	$canary_video.on("pause", function(){
		$canary_video.vimeo("getCurrentTime", function(data){
	    	console.log( "Video is paused at"+data+" seconds" );
			mktoMunchkin("348-QUY-258");
			mktoMunchkinFunction('visitWebPage', {
				url: '/canary/paused', params: 'time='+data+'seconds'
			});
		});
	});

	$canary_video.on("finish", function(){
	    console.log( "Video is done playing" );
		mktoMunchkin("348-QUY-258");
		mktoMunchkinFunction('visitWebPage', {
			url: '/canary/finished'
		});
	});

	

	var owl = $("#owl-demo");
  	owl.owlCarousel({
		autoplayTimeout:3000,
		autoplay:true,
		items : 5,
		responsiveClass:true,
	    responsive:{
	        0:{
	            items:1
	        },
	        350:{
	            items:2
	        },
	        550:{
	            items:3
	        },
	        800:{
	            items:5
	        }
	    },
		pagination:false,
		loop:true,
		lazyLoad: true,
		callbacks: true,
		nav: false,
		dots: false
	});

	owl.trigger('autoplay.stop.owl');

	var ctaTab = $(".tab-content");
	ctaTab.hide();
	$(window).scroll(function(){

		if($(window).scrollTop() >= 400){
			ctaTab.show();
		}else{
			if(!ctaTab.hasClass("active")){ 
				ctaTab.hide();
			}
		}
	   
	    if($(window).scrollTop() >= 783){
			  owl.trigger('autoplay.play.owl',[3000]);
		}
	});




})

