jQuery(document).ready(function( $ ) {
	    // Home page carousel

    $('.flexslider').flexslider({
        animation: 'slide',
        animationSpeed: 1500,
			after: function(slider){
				var slider1 = slider.data('flexslider');
				slider1.resize();
			 }
    });


    $(".flexslider").css({height:"inherit"});



	var owl = $("#owl-demo");
  	owl.owlCarousel({
			autoplayTimeout:3000, //Set AutoPlay to 3 seconds
			autoplay:true,
			items : 5,
			itemsMobile : [350,1],
			pagination:false,
			loop:true
	});

	owl.trigger('autoplay.stop.owl');

	$(window).scroll(function(){
		   if($(window).scrollTop() >= 783){
				  owl.trigger('autoplay.play.owl',[3000]);
			}
	});


})
