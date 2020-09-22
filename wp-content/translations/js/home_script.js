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




 	$("#owl-demo").owlCarousel({
		autoPlay: 3000, //Set AutoPlay to 3 seconds
		items : 5,
		itemsMobile : [350,1],
		pagination:false
	});

	owl = $("#owl-demo").data('owlCarousel');
	owl.stop();

	$(window).scroll(function(){
		   if($(window).scrollTop() >= 783){
				  owl.play();
			}
	});


})
