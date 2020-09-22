msieversion = function() {
    var ua = window.navigator.userAgent;
    var msie = ua.indexOf("MSIE ");

    if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)) {
        return parseInt(ua.substring(msie + 5, ua.indexOf(".", msie)));
    } else {
        return false;
    }

    return false;
}


jQuery(document).ready(function ($) {

  $(".resources").each(function(){
        var numOfItems = $(this).find(".detailed-list-item").length;
        if(numOfItems > 1){
            $(this).owlCarousel({
                    items : numOfItems,
                    margin:40,
                    mouseDrag: true,
                    responsiveClass:true,
                    navText: ['<img width="20" src="'+global.template_dir+'/img/resources-arrow-left.svg" class="prev" title="Previous" />', '<img width="20" src="'+global.template_dir+'/img/resources-arrow-right.svg" class="next" title="Next" />'],
                    responsive:{
                        0:{items: 1},
                        600:{items: 2},
                        1000:{items: 3}
                    },
                    loop:true,
                    smartSpeed : 600,
                    nav: true,
                    dots: false
            });
        }
    });





    $(".hamburger").on("click",function(){
        $("#nav-wrapper").toggle();
        $(this).toggleClass("active");
    });

    $(".menu-expand").on("click",function(){
        $(this).find(".fa").toggle();
        $(this).siblings(".sub-menu").toggleClass("active");
        $(this).parent().find(".full-sub-menu").toggleClass("active");
    });



    /*
    **  Start Search Functionality
    */
    $("#search_form").on("click", function(){
        $(this).toggleClass("active");
        $("#top-nav").toggleClass("search_active");

        $(this).find(".search_box").focus();
        $("#search_form").off();
    });

    /*
    **  End Search Functionality
    */


    var init_clients_slider = function($clientsSlider){

        $clientsSlider.owlCarousel({
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
        });

    }



    $(".clients-slider").each(function(){
        init_clients_slider($(this));
    });



if(typeof $().packery == 'function'){

    $grid = $('.interactive-grid');
    if($grid.length != 0){
        $grid.packery({
            itemSelector: '.interact-wrapper',
            gutter: 0
        });
    }
    


  $(document).on("click", ".interact", function(){
    var $this = $(this);
    var $this_grid = $this.parents(".interactive-grid");

    $this.parents(".interactive-grid-wrapper").addClass("active");

    if($this_grid.find(".grid-item-wrapper.active").length > 0){
      close_grid_item($this_grid.find(".grid-item-wrapper.active"));
      $this.parents(".interactive-grid-wrapper").addClass("active");
    }

    $(".grid-item-wrapper").not(this).each(function(){
      if($(this).hasClass("active")){
          $(this).removeClass("active");
      }
    });
    $this.clone().insertAfter($this).addClass("placeholder").find(".grid-item").empty();

    $this.addClass("active");
    $this.toggleClass("interact");

    $grid.packery('reloadItems');
  });

  var close_grid_item = function($this_grid_item){

      $this_grid_item.parents(".interactive-grid-wrapper").removeClass("active");

      var left = $(".interactive-grid").find(".placeholder").css("left");
      var top = $(".interactive-grid").find(".placeholder").css("top");

      $this_grid_item.css({left:left, top:top});
      $this_grid_item.removeClass("active");
      $this_grid_item.addClass("interact");

      $("iframe.video").each(function(){
        $(this).vimeo("pause");
      });

      $(".interactive-grid").find(".placeholder").remove();

      $grid.packery('reloadItems');
  }



  $(document).on("click",".interactive-grid .active .close", function(){
      close_grid_item($(this).parents(".grid-item-wrapper"));
  });

  var resizeTimer;
  $(window).on('resize', function(e) {
    clearTimeout(resizeTimer);
    resizeTimer = setTimeout(function() {
      $grid.packery("layout");
    }, 250);

  });
}



	var map;
	var marker;

    function updateMap() {
        var mapOptions = {zoom:13,center: new google.maps.LatLng(44.900322, -93.410808),mapTypeId: google.maps.MapTypeId.ROADMAP,panControl: false,zoomControl: false, mapTypeControl: false,scaleControl: false,streetViewControl: false,scrollwheel: false}

        map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);
        var styles = [{'featureType': 'all','elementType': 'all',stylers: [{saturation: -100}]}]
        map.setOptions({styles: styles});

        var markerCoordinates1 =new google.maps.LatLng(44.900322,  -93.410808);
        marker = new google.maps.Marker({position: markerCoordinates1, map: map, icon: '/wp-content/themes/digital-river/img/map-marker.png'});
    }

    if(typeof(document.getElementById('map_canvas')) != 'undefined' && document.getElementById('map_canvas') != null){
        google.maps.event.addDomListener(window, 'load', updateMap);
    }

    function getLocation(url) {
        a = document.createElement('a');

        a.href =  url;
        var path = a.pathname;
        return path;
    }

    var path = window.location.pathname;
    $("a").mousedown(function() {
        var href = getLocation($(this).attr("href"));
    // disable ga when GA not active
    //    ga('send', 'event', path, href);
    }); 



    // Show login menu
    var timer,
        util_open = false,
        language_open = false;

    $('.header_navigation .dropdown-item > a').on("click", function(e) {
        e.preventDefault();
    })


    // var dropped = false;
    // $("body").click(function(event) {
    //     var string = event.target.className;
    //     if(dropped == true && string != "dropdown-button" && string != "dropdown-button expanded" ){
    //         $(".dropdown-item").children('a').removeClass('expanded');
    //         $(".menu-item-language").children('a').removeClass('expanded');
    //         $(".dropdown-item").children('.sub-menu').stop().slideUp(100);
    //         $(".menu-item-language").children('.sub-menu').stop().slideUp(100);
    //         dropped = false;
    //     }
    // });



    $(".dropdown-item").children('a').addClass('dropdown-button');
    $(".menu-item-language").children('a').addClass('dropdown-button');

    $('.top-nav .dropdown-item, .top-nav .menu-item-language-current').on("click",function(e) {
        var $this = $(this); 

        if ( e.target.nodeName != "A" && $(e.target).parents(".sub-menu").length === 0 ) {
            e.preventDefault();
        }

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


    var lastScrollTop = 0;



	causeRepaintsOn = $(".header, .link");
    // Blog middle column resize
    $(window).resize(function() {

		if($(window).width() < 425){
				// the map in the footer gets off center for some reason when changing the width of the page
				// recenter the map
			if(typeof map !== 'undefined' && typeof marker !== 'undefined'){
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


    var toggleContactUs = function(){
        $(this).parents(".tab-content").toggleClass("active");
    }

    var initializeForm = function($form){
        $form.find("input,textarea").each(function(){
            if($(this).val() != ""){
                $(this).parents(".form-group.overlap").addClass("active");
            }
        });
    }

    $(".contact-us").each(function(){
        initializeForm($(this));
    });


    $(".tab").on("click", toggleContactUs);
    $(".hit-box").on("click", toggleContactUs);
    $(".tab-content .close").on("click", toggleContactUs);

    $(".form-group.overlap label").on("click", function(){
        $(this).parents(".form-group.overlap").find("input, textarea").focus();
    });

    $(".form-group.overlap input, .form-group.overlap textarea").on("input", function(){
        if($(this).val() != ""){
            $(this).parents(".form-group.overlap").addClass("active");
        }else{
            $(this).parents(".form-group.overlap").removeClass("active");
        }
    });


    $(".form-group.overlap input, .form-group.overlap textarea").blur(function(){
        if($(this).val() == ""){
            $(this).parents(".form-group.overlap").removeClass("active");
        }
    });



    $(".contact-us").submit(function(event){
        event.preventDefault();
    });

    getUrlParameter = function(sParam) {
        var sPageURL = decodeURIComponent(window.location.search.substring(1)),
            sURLVariables = sPageURL.split('&'),
            sParameterName,
            i;

        for (i = 0; i < sURLVariables.length; i++) {
            sParameterName = sURLVariables[i].split('=');

            if (sParameterName[0] === sParam) {
                return sParameterName[1] === undefined ? true : sParameterName[1];
            }
        }
    };

     readCookie = function(name) {
        var cookiename = name + "=";
        var ca = document.cookie.split(';');
        for(var i=0;i < ca.length;i++) {
            var c = ca[i];
            while (c.charAt(0)==' ') c = c.substring(1,c.length);
            if (c.indexOf(cookiename) == 0) return c.substring(cookiename.length,c.length);
        }
        return null;
    }


     createCookie = function(name,value,days) {
        if (days) {
            var date = new Date();
            date.setTime(date.getTime()+(days*24*60*60*1000));
            var expires = "; expires="+date.toGMTString();
        }
        else var expires = "";
        document.cookie = name+"="+value+expires+"; path=/";
    }

     eraseCookie = function(name) {
        createCookie(name,"",-1);
    }


    var url_parameters = [
        {"utm_name":"utm_source", "form_name" : "Campaign_Source"},
        {"utm_name":"utm_medium", "form_name" : "Campaign_Medium"},
        {"utm_name":"utm_campaign", "form_name" : "Campaign_ID"},
        {"utm_name":"utm_term", "form_name" : "Campaign_Term"},
        {"utm_name":"utm_content", "form_name" : "campaignContent"},
    ];
    
setTimeout(function(){

    for(var i=0; i < url_parameters.length; i++){

        var param_value = getUrlParameter(url_parameters[i].utm_name);
        if(param_value != undefined){
            eraseCookie(url_parameters[i].utm_name);
            createCookie(url_parameters[i].utm_name, param_value, 365);
        }

        var cookie_value = readCookie(url_parameters[i].utm_name);
        if(cookie_value != undefined && cookie_value != "undefined" && cookie_value != null){
            $('input[name="'+url_parameters[i].form_name+'"]').val(cookie_value);
        }

    }

},4000);


    $(".contact-us").each(function(){
        $(this).find("input[type='hidden']").each(function(){
            var value = getUrlParameter($(this).attr("name"));
            if(value != undefined){
                $(this).val(value);
            }
        });
    });


    if(readCookie('_mkto_trk') != null){
        jQuery('input[name="cookie"]').val(readCookie('_mkto_trk'));
    }

    var item_loaded = false;
    var int = setInterval(function() {
        if ( !readCookie('_mkto_trk') ) return;
        clearInterval(int);
        item_loaded = true;
        prefill_mkto_form();
    }, 50);

    setTimeout(function() {
        if (!item_loaded) {
            clearInterval(int);
            console.log('error');
        }
    }, 10e3);

    var prefill_mkto_form = function(){
        var mkto_cookie = readCookie('_mkto_trk').split("&")[1].split(":")[1];
        var data = {};
        data.action = "get_form_values";
        data.cookie = mkto_cookie;
        jQuery.post(global.ajax, data, function(response) {
            jQuery.each(jQuery.parseJSON( response ), function(key, value) {

                if(jQuery('.' + key).is("select")){
                    countrySelect.val(value).change();
                }else if(jQuery('[name="' + key + '"]').attr("type") == "radio"){
                    jQuery('[name="' + key + '"][value="' + value + '"]').prop("checked", true);
                }else{
                    if(jQuery('[name="' + key + '"]').val() == ""){
                        jQuery('[name="' + key + '"]').val(value);
                    }
                }
                jQuery('[name="' + key + '"]').parents(".form-group.overlap").addClass("active");
            });
        });
    }

    var validateEmail = function(email) {
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    }

    var validateTel = function(tel){
        var intRegex = /[0-9 -()+]+$/;
        if((tel.length < 6) || (!intRegex.test(tel))){
            return false;
        }

        return true;
    }


    var hightlightFields = function($form){
        var error = 0;

        $form.find("input, textarea, select").each(function(){
            if($(this).attr("type") != "hidden" && $(this).val() == ""){
                $(this).parents(".form-group").addClass("error");
                $(this).tooltip("show");
                error++;
            }
            if($(this).attr("type") == "email" && !validateEmail($(this).val()) ){
                $(this).parents(".form-group").addClass("error");
                $(this).tooltip("show");
                error++;
            }
            if($(this).attr("type") == "tel" && !validateTel($(this).val())){
                $(this).parents(".form-group").addClass("error");
                $(this).tooltip("show");
                error++;
            }
        });

        var radio_error = true;
        if($form.find(".radio-wrapper").length > 0){
            $form.find(".radio-wrapper").each(function(){
                if($(this).find("input").is(':checked') == true){
                    radio_error = false;
                }
            });
        }else{
            radio_error = false;
        }

        if(radio_error == true){
            $(".radio-group").addClass("error");
            $(".radio-group").tooltip("show");
            error++;
        }

        if(error > 0){
            return false;
        }

        return true;

    }

    if(typeof $().tooltip == 'function'){
        $('input[type="text"], input[type="tel"], input[type="email"], textarea, select').tooltip({
            trigger : "manual",
            title : "Required"
        });

        $('.radio-group').tooltip({
            trigger : "manual",
            title : "Required"
        });
    }


    $(".contact-us").find("input, textarea").focus(function(){
        var $this = $(this);
        
        $this.tooltip('hide');
        $this.parents(".form-group").removeClass('error');
    });

    $(".contact-us").find('[name="Business_Unit__c"]').on("change",function(){
        var $this = $(this);

        $this.parents(".radio-group").tooltip('hide');
        $this.parents(".form-group").removeClass('error');
    });


    $(".contact-us").find(".select2-selection").on("click", function(){
        var $this = $(this);
        
        $this.tooltip('hide');
        $this.parents(".form-group").removeClass('error');
    });

    if(typeof $().select2 == 'function'){
        countrySelect = $('.select2.country').select2({
            placeholder: "Select a country",
            theme: "bootstrap",
            width: "resolve",
        }).on('select2:open', function (e) {
            $(this).siblings(".tooltip").remove();
            $(this).parents(".form-group").removeClass("error");
        });
    }

$(".submit_form").on("click", function(e){

    var data = {};
    var asset = false;
    if($(this).parents(".contact-us").find("[name='asset']").length == 1){
        data.action = $(this).parents(".contact-us").find("[name='asset']").val();
        asset = true;
    }else{
        data.action = 'add_foobar';
    }

    var contact_form_fields = $(this).parents(".contact-us").serializeArray();
           
    if(!hightlightFields($(this).parents(".contact-us"))){
        return false;
    }

    for(var i = 0; i < contact_form_fields.length; i++){
        data[contact_form_fields[i].name] = contact_form_fields[i].value;
    }

    var $formWrapper = $(this).parents(".form-wrapper");
    var form_wrapper_height = $formWrapper.height();
    $formWrapper.height(form_wrapper_height);
    $formWrapper.addClass("loading");
    $formWrapper.append('<div class="loading-icon loading"><i class="fa fa-spinner fa-pulse fa-5x fa-fw margin-bottom"></i><span class="sr-only">Loading...</span></i>');

    $.post(global.ajax, data, function(response) {

        console.log(response);

        response = jQuery.parseJSON(response);

        var data2 = {};
        data2.action = "associate_lead";
        data2.lead_id = response.lead;
        data2.cookie  = jQuery("input[name='cookie']").val();

        if(typeof tealium_convert != undefined){
            tealium_convert();
        }

        $.post(global.ajax, data2, function(response2) {});

            if(asset == false){
                $formWrapper.addClass("success");
                $(".loading-icon").html('<p class="text-center"><i class="fa-5x dr-check" aria-hidden="true"></i></p><h1 class="text-center">Thank you!</h1><p class="lead text-center">A representative will contact you soon.</p>');
                    
                setTimeout(function(){
                    $(".tab-content").removeClass("active");
                 
                    setTimeout(function(){
                        $formWrapper.removeClass("loading");
                        $formWrapper.removeClass("success");
                        $(".loading-icon").remove();
                    },2000);
                },3000);
            }else{
                $formWrapper.addClass("asset-success");
                $formWrapper.html(response.success);
                
                setTimeout(function(){
                    $(".download-wrapper").css("height", ($formWrapper.height() - 200)+"px");
                },0)

            }
        });
    });
});
