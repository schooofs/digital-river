

jQuery(document).ready(function ($) {

    $(".hamburger").on("click",function(){
        $("#nav-wrapper").toggle();
        $(this).toggleClass("active");
    });

    $(".menu-expand").on("click",function(){
        $(this).find(".fa").toggle();
        $(this).siblings(".sub-menu").toggleClass("active");
    });

    $("#search_form").on("click", function(){
        $(this).toggleClass("active");
        $("#top-nav").toggleClass("search_active");

        $(this).find(".search_box").focus();
        $("#search_form").off();
    });




	var map;
	var marker;
    $(".dropdown-item").children('a').addClass('dropdown-button');
$(".menu-item-language").children('a').addClass('dropdown-button');

		function updateMap() {

			  var mapOptions = {zoom:13,center: new google.maps.LatLng(44.900322, -93.410808),mapTypeId: google.maps.MapTypeId.ROADMAP,panControl: false,zoomControl: false, mapTypeControl: false,scaleControl: false,streetViewControl: false,scrollwheel: false}

				map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);
				var styles = [{'featureType': 'all','elementType': 'all',stylers: [{saturation: -100}]}]
				map.setOptions({styles: styles});

				var markerCoordinates1 =new google.maps.LatLng(44.900322,  -93.410808);
				marker = new google.maps.Marker({position: markerCoordinates1, map: map, icon: 'http://digitalriver.com/wp-content/themes/digital-river-2019/img/map-marker.png'});

				}
				google.maps.event.addDomListener(window, 'load', updateMap);


function getLocation(url) {
        a = document.createElement('a');

    a.href =  url;
    var path = a.pathname;
    return path;
}

    var path = window.location.pathname;
    $("a").mousedown(function() {
        var href = getLocation($(this).attr("href"));

        ga('send', 'event', path, href);
    }); 


	if( /Android|webOS|iPhone|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {

	}else{
		$("#mobile-link").attr("href","/contact-us/");
	}

	$(".search_form, #search-label").on("click", function(){
		$("#search-label").remove();
		$(".search_icon").css({position:"absolute",top: "12px", left: "20px"});

		var object = document.getElementById("search_path");
    	object.setAttribute("fill", "#009AD7");
		
		$(".header_navigation .menu").children("li").animate({padding:"5px", paddingTop:"4px"});
		$("#search_form").animate({width:"170px"});
		$("#search").css({display:"inline"});
		$("#search").focus();

		

	})


    // Show login menu
    var timer,
        util_open = false,
        language_open = false;

    $('.header_navigation .dropdown-item > a').on("click", function(e) {
        e.preventDefault();
    })


var dropped = false;

$("body").click(function(event) {

     var string = event.target.className;


        if(dropped == true && string != "dropdown-button" && string != "dropdown-button expanded" ){
            $(".dropdown-item").children('a').removeClass('expanded');
            $(".menu-item-language").children('a').removeClass('expanded');
            $(".dropdown-item").children('.sub-menu').stop().slideUp(100);
            $(".menu-item-language").children('.sub-menu').stop().slideUp(100);
            dropped = false;
        }

})



    $('.header_navigation .dropdown-item, .header_navigation .menu-item-language').on("click",function(e) {
        var $this = $(this); 
        setTimeout(function(){
            if($this.hasClass("dropdown-item")){
                $(".menu-item-language").children('a').removeClass('expanded');
                $(".menu-item-language").children('.sub-menu').stop().slideUp(100);
                  dropped = false;
            
            }else if($this.hasClass("menu-item-language")){
                $(".dropdown-item").children('a').removeClass('expanded');
                $(".dropdown-item").children('.sub-menu').stop().slideUp(100);
                dropped = false;
            }

            if( ! $this.children('a').hasClass('expanded')){
                $this.children('a').addClass('expanded');
                $this.children('.sub-menu').addClass('active');
                $this.children('.sub-menu').stop().slideDown(100);
                 dropped = true;

            }else{
                dropped = false;
                $this.children('a').removeClass('expanded');
                $this.children('.sub-menu').stop().slideUp(100);
            }
        },300);
    })

    // Clears the timer
    $('.header_navigation .dropdown-item, .header_navigation .sub-menu').mouseenter(function() {
        clearTimeout(timer);
    });



$(window).on("scroll",function(){
		var scrollTop = $(window).scrollTop();
		if(scrollTop < 300){
			var newOpacity = 1 - (scrollTop/300);
			jQuery(document).find(".masthead_background").css({opacity:newOpacity});
		} 	
})


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


    var lastScrollTop = 0;


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

        var height_array = new Array();
        height_array[0] = $('#template_k .left_column, #template_b.blog .left_column').height();
        height_array[1] = $('#template_k .right_column, #template_b.blog .right_column').height();
        // $('#template_k .middle_column, #template_b.blog .middle_column').height(Math.max.apply(Math, height_array) + 60);
        $('#template_k .middle_column, #template_b.blog .middle_column').css('min-height', Math.max.apply(Math, height_array) + 60);




    });


    $(window).trigger('resize');





});
