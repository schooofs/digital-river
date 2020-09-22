// @koala-prepend "_jquery.js"
// @koala-prepend "vendor/_cookie.js"
// @koala-prepend "vendor/_jquery.lazyload.js"
// @koala-prepend "vendor/_owl.carousel.min.js"
// @koala-prepend "vendor/_vimeo.js"
// @koala-prepend "_bootstrap.js"
// @koala-prepend "_video-functionality.js"
// @koala-prepend "_leadership.js"
// @koala-prepend "_hero-header.js"
// @koala-prepend "_footer.js"
// @koala-prepend "components/_hero-header.js"
// @koala-prepend "components/_clicky.js"
// @koala-prepend "components/_news-events.js"
// @koala-prepend "components/_timeline.js"
// @koala-prepend "components/_blog.js"
// @koala-prepend "components/_contact-us-tab.js"
// @koala-prepend "_upcoming-events.js"
// @koala-prepend "components/_archive-ajax.js"
// @koala-prepend "components/_case-study-cross-sell.js"
// @koala-prepend "components/cookie.js"

$("body").tooltip({
    selector: '[data-toggle="tooltip"]'
});


if ($('.blog.social-icons').length > 0) {
	var $productContainer = $(".post-wrapper");
	$('.blog.social-icons.showDesktop').affix({
	  offset: {
	  	top: function() {
	  		return $productContainer.offset().top
	  	},
	  	bottom: function() {
	  		return $("body").height() - ($productContainer.offset().top + $productContainer.outerHeight());
	  	}
	  }
	});
}

jQuery(document).ready(function($){

    $(".infographic-wrapper .infographic-label").on("click", function(){
        $(this).parent(".infographic-wrapper").find(".infographic").addClass("active");
        $(this).remove();
    });

    $(".close-video").on("click", function(){
        $(".videos-modal").modal('hide');
    });
      
     $(".demo-now").on("click", function(){
         $(".bottom-sticky-nav").addClass("active");
         $(".bottom-sticky-nav-backdrop").addClass("active");
         $(this).toggleClass("active");
         $(".contact-us").removeClass("active");
    });

    $(".lazy").lazyload({
        threshold : 500,
        effect : "fadeIn"
    });

	$('.button').click(function(){
	  var buttonId = $(this).attr('id');
	  $('#modal-container').removeAttr('class').addClass(buttonId);
	  $('body').addClass('modal-active');
	})

	$('#modal-container').click(function(){
	  $(this).addClass('out');
	  $('body').removeClass('modal-active');
	});

});

$(".resource.animate:bottom-of-viewport").addClass("fly"); 
$("#flexibleMonetization:in-viewport").addClass("fly");
$("#cloudCommerce:in-viewport").addClass("fly");
$("#fullServiceModels:in-viewport").addClass("fly");
$(window).on("scroll", function(){
    $(".resource.animate:bottom-of-viewport").addClass("fly").trigger('classChange');
    $(".client-feature:in-viewport").addClass("fly");
    $("#flexibleMonetization:bottom-of-viewport").addClass("fly");
    $("#cloudCommerce:bottom-of-viewport").addClass("fly");
    $("#fullServiceModels:bottom-of-viewport").addClass("fly");
    $('#offeringsSVG:bottom-of-viewport').addClass('go');
});

var widowWidth = $(window).width();
if(widowWidth > 1500) {
    var stagePadding = 120;
} else if(widowWidth > 1200) {
    var stagePadding = 50;
} else if(widowWidth > 1000) {
    var stagePadding = 0;
} else if(widowWidth > 768) {
    var stagePadding = 0;
} else {
    var stagePadding = 0;
}

$('.client-slider').each(function(){

    $(this).owlCarousel({
    	loop:true,
        margin:15,
        stagePadding: stagePadding,
        nav:false,
        dots:true,
        startPosition: ($(this).data("start") !== undefined ? ($(this).data("start")-1) : 0),
        autoplay:false,
        autoplayTimeout:5000,
        responsive:{
            0:{
                items:1
            },
            690:{
                items:2
            },
            768:{
                items:1
            },
            1000:{
                items:1
            }
        }
    });
});


$('.client-features-slider').owlCarousel({
    loop:false,
    margin:10,
    nav:false,
    dots:true,
    autoplay:false,
    responsive:{
        0:{
            items:1
        },
        690:{
            items:2
        },
        1050:{
            items:3,
            dots:false
        }
    }
});

$('#theCurrent-news-slider').owlCarousel({
    loop:true,
    margin:10,
    nav:false,
    dots:false,
    singleItem: true,
    autoplay:false,
    responsive:{
        0:{
            items:1
        },
        690:{
            items:2
        },
        1050:{
            items:1
        }
    }
});

$(".search").on("click", function() {
    $(this).closest(".main-nav").addClass("active");
    $(".search-field").focus();
});

$(".exit-search").on("click", function() {
    $(this).closest(".main-nav").removeClass("active");
});

$(".search-field").on("focus", function() {
    $(".suggestions").show();
});

$(".search-field").on("blur", function() {
    $(".suggestions").hide();
});

var maxHeight = 0;
$(".equalHeight").each(function(){
  maxHeight = $(this).height() > maxHeight ? $(this).height() : maxHeight;
}).height(maxHeight);


$('#success-slider').owlCarousel({
    loop:true,
    margin:10,
    dots: false,
    center: true,
    nav: true,
    navText: ['<img width="50" height="50" src="/wp-content/themes/digital-river-2019/assets/images/mycommerce/square-blue-arrow-left.svg" />','<img width="50" height="50" src="/wp-content/themes/digital-river-2019/assets/images/mycommerce/square-blue-arrow-right.svg" />'],
    responsive:{
        0:{
            items:1
        },
        690:{
            items:1
        },
        1050:{
            items:1
        }
    }
});

// "File" input types
/*
    By Osvaldas Valutis, www.osvaldas.info
    Available for use under the MIT License
*/
;( function( $, window, document, undefined )
{
    $( '.inputfile' ).each( function() {
        var $input   = $( this ),
            $label   = $input.next( 'label' ),
            labelVal = $label.html();

        $input.on( 'change', function( e ) {
            var fileName = '';

            if( this.files && this.files.length > 1 )
                fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
            else if( e.target.value )
                fileName = e.target.value.split( '\\' ).pop();

            if( fileName )
                $label.find('span').html( fileName );
            else
                $label.html( labelVal );
        });

        // Firefox bug fix
        $input
        .on( 'focus', function(){ $input.addClass( 'has-focus' ); })
        .on( 'blur', function(){ $input.removeClass( 'has-focus' ); });
    });
})( jQuery, window, document );

$(".blogSelectMobile option").each(function() {

    var $el = $(this);

    if($el.hasClass("active")) {
        $el.attr("selected", "selected");
    }

});

$(".blogSelectMobile").change(function() {

  window.location = $(this).find("option:selected").val();
  
});

$('#requestDemo').click(function() { 
	window.location = '/request-demo';
	return false;
});
