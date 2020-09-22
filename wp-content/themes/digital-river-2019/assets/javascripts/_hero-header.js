$(document).on("click",".buttonScroll",function() {
   var $parent = $(this).closest('.heroHeader');
    $('html, body').animate({
        scrollTop: ($parent.height() + $parent.offset().top)
    }, 500);
});