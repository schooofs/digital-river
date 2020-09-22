// $('#exampleProfile').owlCarousel({
//     loop:true,
//     nav:true,
//     margin:10,
//     autoplay:true,
//     autoplayHoverPause:true,
//     responsiveClass:true,
//     responsive:{
//         0:{
//             items:1,
//             nav:true
//         },
//         600:{
//             items:3,
//             nav:false
//         },
//         1000:{
//             items:3,
//             nav:true,
//             loop:true,
//         }
//     }
// })

// $(function() {
//     $('#exampleProfile').jcarousel({

//     });
//     $('#exampleProfile').jcarousel('scroll', '+=2');
// });

// $('#carousel-reviews').carousel({
//   interval: 2000,
// });

// for every slide in carousel, copy the next slide's item in the slide.
// Do the same for the next, next item.
// $('#carousel-reviews .item').each(function(){
//   var next = $(this).next();
//   if (!next.length) {
//     next = $(this).siblings(':first');
//   }
//   next.children(':first-child').clone().appendTo($(this));
  
//   if (next.next().length>0) {
//     next.next().children(':first-child').clone().appendTo($(this));
//   } else {
//   	$(this).siblings(':first').children(':first-child').clone().appendTo($(this));
//   }
// });