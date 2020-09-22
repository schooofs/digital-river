var $yearBoxes = $('.year-boxes');
$yearBoxes.owlCarousel({
    loop:false,
    nav:false,
    dots: false,
    // navText: ['<img width="50" height="50" src="/wp-content/themes/digital-river-2019/assets/images/icons_ArrowSingleLeftWhite.svg" />','<img width="50" height="50" src="/wp-content/themes/digital-river-2019/assets/images/icons_ArrowSingleRightWhite.svg" />'],
    margin:10,
    // autoplay:true,
    // autoplayHoverPause:true,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
        },
        600:{
            items:1,
        },
        1000:{
            items:1,
            // loop:true,
        }
    }
});
$yearBoxes.on('changed.owl.carousel', function(event) {
    var current = event.item.index;
    var currentYear = $(event.target).find(".owl-item").eq(current).find(".year-box").data("year");
    $(".year-selector").find('.year').removeClass("active");
    $(".year-selector").find('.year[data-year="'+currentYear+'"]').addClass("active");
});
$(".year-selector").find('.year').on('click', function() {
    var year = $(this).data("year");
    var index = $yearBoxes.find('.year-box[data-year="'+year+'"]').parent(".owl-item").index();
    $yearBoxes.trigger('to.owl.carousel', index);
});