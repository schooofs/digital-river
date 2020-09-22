

jQuery(document).ready(function ($) {
	var map;
	var marker;

		function updateMap() {

			  var mapOptions = {zoom:13,center: new google.maps.LatLng(44.900322, -93.410808),mapTypeId: google.maps.MapTypeId.ROADMAP,panControl: false,zoomControl: false, mapTypeControl: false,scaleControl: false,streetViewControl: false,scrollwheel: false}

				map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);
				var styles = [{'featureType': 'all','elementType': 'all',stylers: [{saturation: -100}]}]
				map.setOptions({styles: styles});

				var markerCoordinates1 =new google.maps.LatLng(44.900322,  -93.410808);
				marker = new google.maps.Marker({position: markerCoordinates1, map: map, icon: 'http://drdev01.staging.wpengine.com/wp-content/themes/digital-river/img/map-marker.png'});

				}
				google.maps.event.addDomListener(window, 'load', updateMap);





	var callUsButton = "<a id='mobile-link' href='tel:+18005987450'><div class='mobile-call-us'><div class='phone-icon'></div></div></div>";
	var requestDemoButton = "<a href='/request-a-demo/'><div class='mobile-request-demo'>Request A Demo</div></a>";

	$("#sdrn_bar").append(callUsButton);
	$("#sdrn_bar").append(requestDemoButton);

	$("#search").attr("placeholder","Search...");




	if( /Android|webOS|iPhone|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {

	}else{
		$("#mobile-link").attr("href","/contact-us/");
	}

	$(".search_form, #search-label").on("click", function(){
		$("#search-label").remove();
		$("#search").css({display:"inline"});
		$(".search_form").css({width:"150px"});
		$("#search").animate({width:"125px", paddingLeft:"5px"},0);

	})


    if ($.browser.msie ){
        var ie_version = parseInt($.browser.version, 10);
        var ie_class = "ie " + ((ie_version>9) ? "ie10" : (ie_version>8) ? "ie9" : "");
        //log( ie_class );
        $("html").addClass(ie_class);
    }

    // Centers the slider nav
    $('.flex-control-nav.flex-control-paging').wrap("<div class='container' />");

    // Open Modals
    $('.modal_link').click(function(e) {
        e.preventDefault();
        var target = $(this).data('target');
        $(target).modal({
            overlayClose: true,
            opacity: 90,
            overlayCss: {
                backgroundColor: '#222021'
            },
            onShow: function(dialog) {
                // Get scroll distance
                var scrollTop     = $(window).scrollTop(),
                    elementOffset = $('#my-element').offset().top,
                    distance      = (elementOffset - scrollTop),
                    window_width  = $(window).width();

                dialog.container.css('height', 'auto');
                dialog.container.css('width', 'auto');
                var w2 = dialog.container.width();
                var w_left = (window_width/2) - (w2/2);

                // Set container position
                var top = distance + 50;
                dialog.container.css('left', w_left + 'px');
                dialog.container.css('top', top + 'px');
            }
        });
    });

    // Show login menu
    var timer,
        util_open = false,
        language_open = false;

    $('.header_navigation .dropdown-item > a').on("click", function(e) {
        e.preventDefault();
    })

    $('.header_navigation .dropdown-item').on("click",function(e) {
        if (util_open === false) {
            $(this).children('a').addClass('expanded');
            $(this).children('.sub-menu').addClass('active');
            $(this).children('.sub-menu').stop().slideDown();
            util_open = true;
        } else {
            $(this).trigger('mouseleave');
        }
    });

    // Hide navigation after period of time
    $('.header_navigation .dropdown-item, .header_navigation .sub-menu').mouseleave(function() {
        $(this).find(".expanded").removeClass('expanded');
        timer = setTimeout(function() {
            $('.header_navigation .sub-menu').slideUp(300, function() {
                $('.header_navigation .menu > li:nth-child(2) > a:first-child').removeClass('expanded');
                // $('.header_navigation .sub-menu').removeClass('active');
                util_open = false;
            });
        }, 100);
    });

    // Clears the timer
    $('.header_navigation .dropdown-item, .header_navigation .sub-menu').mouseenter(function() {
        clearTimeout(timer);
    });

	$('#main_navigation li').hover(

	  function () {
		$('ul', this).stop().slideDown(100);
	  },
	  function () {
		$('ul', this).stop().slideUp(100);

	  }

	);



	//expand and contract footer nav

$('.link-section .expand-contract').on("click", function () {
	//only execute on mobile
	if($(window).width() <= 425){
		var closed = $(this).hasClass("arrow-closed");

		if(closed == true){
			$($(this).siblings(".menu-wrapper")).stop().slideDown(100);
			$(this).removeClass("arrow-closed");
			$(this).addClass("arrow-opened");

		}else if(closed == false){
			$($(this).siblings(".menu-wrapper")).stop().slideUp(100);
			$(this).removeClass("arrow-opened");
			$(this).addClass("arrow-closed");

		}
	}

});


$(".link-section").on("click", function(){
	//only execute on mobile
	if($(window).width() <= 425){
			var $expandContract = $(this).children(".expand-contract");
			var closed = $expandContract.hasClass("arrow-closed");

			if(closed == true){
				$($expandContract.siblings(".menu-wrapper")).stop().slideDown(100);
				$expandContract.removeClass("arrow-closed");
				$expandContract.addClass("arrow-opened");

			}else if(closed == false){
				$($expandContract.siblings(".menu-wrapper")).stop().slideUp(100);
				$expandContract.removeClass("arrow-opened");
				$expandContract.addClass("arrow-closed");
			}

	}

		}).children("ul, li").on("click",function(event){
				 event.stopPropagation();
		})

		$('.rail_tabbed_content').sidebar_tabs();


    $('#home .accordion').mobile_home_accordion();
    $('.main_nav_button').mobile_menu({
        menu : '#main_mobile_navigation',
        hide_sub : true
    });
    $('.utility_nav_button').mobile_menu({
        menu : '#utility_mobile_navigation',
        hide_sub : false
    });

    // Social footer animations
    $('a.twitter').parent().hover(function() {
        $('a.twitter-on').stop().fadeIn(500);
    }, function() {
        $('a.twitter-on').fadeOut(500);
    });

    // Social footer animations
    $('a.vimeo').parent().hover(function() {
        $('a.vimeo-on').stop().fadeIn(500);
    }, function() {
        $('a.vimeo-on').fadeOut(500);
    });

    // Social footer animations
    $('a.rss').parent().hover(function() {
        $('a.rss-on').stop().fadeIn(200);
    }, function() {
        $('a.rss-on').fadeOut(200);
    });

    var lastScrollTop = 0;

    $('#global_submenu .body .industries .industry_link').hover(function() {


        $(this).stop().animate({
            'background-color': '#009ad7'
        });

        $(this).children('div.image').stop().animate({
            'margin-top': '-5px'
        });
    }, function() {
        $(this).stop().animate({
            'background-color': '#21272e'
        });
        $(this).children('div.image').stop().animate({
            'margin-top': '0px'
        });
    });

    // Redraws the images in the case studies logo container - Safari 5.x
    var safari_tab_fix = $('#case_studies .tab .logo_container img, #home #thirds_widget_area .header');
    safari_tab_fix.offsetHeight;


	$(".menu_title img").on("click",function(){
		 window.location = "http://www.digitalriver.com";
	})

	causeRepaintsOn = $(".header, .link");
    // Blog middle column resize
    $(window).resize(function() {

		if($(window).width() < 425){
				// the map in the footer gets off center for some reason when changing the width of the page
				// recenter the map
			if(typeof map !== 'undefined' && typeof marker !== 'undefined'){
				console.log(map);
				if(map.getCenter() != marker.getPosition()){
						var mapCenter = marker.getPosition();
						map.setCenter(mapCenter);
				}
			}
		}

		causeRepaintsOn.css("z-index", 1);

		if($(window).width() < 425){
				$(".mobile-request-demo").html("Demo");
		}else{
			if($(".mobile-request-demo").html() == "Demo"){
				$(".mobile-request-demo").html("Request A Demo");
			}

		}

        var height_array = new Array();
        height_array[0] = $('#template_k .left_column, #template_b.blog .left_column').height();
        height_array[1] = $('#template_k .right_column, #template_b.blog .right_column').height();
        // $('#template_k .middle_column, #template_b.blog .middle_column').height(Math.max.apply(Math, height_array) + 60);
        $('#template_k .middle_column, #template_b.blog .middle_column').css('min-height', Math.max.apply(Math, height_array) + 60);




    });


    $(window).trigger('resize');
});
