  $("#mycommerce-slider").owlCarousel({
    stopOnHover : true,
    loop: true,
    overflow: false,
    navigation: true,
    paginationSpeed : 1000,
    goToFirstSpeed : 2000,
    singleItem : true,
    margin:35,
    autoHeight : true,
    transitionStyle:"fade",
    autoplay: false,
    navText: ['<img width="50" height="50" class="arrows" src="/wp-content/uploads/2018/01/slider_white-left.png" />','<img width="50" height="50" class="arrows" src="/wp-content/uploads/2018/01/slider_white-right.png" />'],
    responsive:{
        0:{
            items:1
        },
        600:{
            items:2
        },
        780:{
            items:2
        },
        1200:{
             items:4
        }
    }
  });