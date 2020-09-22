	jQuery(document).ready(function($){



		var next = true;
		var itemClick = false;

		$(".embed-container iframe, .embed-container object, .embed-container embed").css("height","101%");

		var currentIndex;
		var clickedIndex;
		var clickedCurrent;
		var tallest = 0;
		$(".client").not(".client_quote_box").each(function(){
			var $thisHeight = $(this).height();

			if($thisHeight > tallest){
				tallest = $thisHeight;
			}
		})
		tallest += 30;
		$(".client").height(tallest);

	

		$('.flexslider').flexslider({
	        animation: 'slide',
	        animationSpeed: 600,
			after: function(slider){
				var slider1 = slider.data('flexslider');
				slider1.resize();
			},
			controlNav: false,
			directionNav: true,
			prevText: "Previous",
			nextText: "Next"
	    });
		
		var owl = $("#featured_logos");
		owl.on("initialized.owl.carousel", function(event){
			console.log("dr");
			var videoHeight = $(".featured").children(".video_wrapper").height();
			$(".featured_wrapper").find(".featured_area").height(videoHeight);
			setTimeout(function(){
				$(".embed-container iframe, .embed-container object, .embed-container embed").css("height","100%");
			},5000);
	   })

	   var count = 0;
	   var lastCount;

	   owl.owlCarousel({
			items : 5,
			margin:40,
	  		mouseDrag: false,
	    	responsive:{
	        	0:{items:1},
	        	600:{items:3},
	        	1000:{items:5}
	        },
			pagination:false,
			loop:true,
			rtl: true,
			smartSpeed : 600
		});

		var pauseOwl = new Array();	
		var stop = false;
   		function nextOwl(j) {
   			
   			if(next == true){

			    $("#video_"+j).vimeo("paused", function(data){ 
					pauseOwl.push(data);
	    			if(j < 5){
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
	
		setTimeout(function(){
			nextOwl(1);
  		}, 7000);

	var previousSlide = $("#featured_5");
	owl.on("changed.owl.carousel", function(event){
		
  			currentIndex = event.item.index;

  			$(".item").addClass("gray");

  			if(currentIndex != clickedIndex && clickedIndex != null){
  				owl.trigger('next.owl.carousel');
  			}else if(currentIndex == clickedIndex){
  				clickedIndex = null;
  				setTimeout(function(){
  					next = true;
  				}, 7000);
  			}

  	

  			if(clickedIndex == null){

  				$('div[data-index='+currentIndex+']').removeClass("gray");
  				console.log(previousSlide.attr("id"));
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


	function slide_transition(element){
			var left = element.width();
		  	element.css({zIndex:3,left:-left});
		  	element.animate({left:0},600,function(){
		  		previousSlide.css({zIndex:1});
		  		element.css({zIndex:2});
		  		previousSlide = element;
		  	});


		  	//element.find("p").fadeIn(700);
	}

	$('.item').on("click",function(){	
		var windowWidth = $(window).width();
		if(windowWidth >= 1000){
			next = false;
			clickedIndex = $(this).data( "index" );
			if(currentIndex != clickedIndex){
				for(var i=1; i<=5; i++){
	    			 $("#video_"+i).vimeo("pause");
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


},jQuery);
	
