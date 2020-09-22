$(document).scroll(function() {
  var y = $(this).scrollTop();
  if (y > 500) {
    $('.bottom-sticky-nav').fadeIn();
  } 
});