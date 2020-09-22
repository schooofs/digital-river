$(function() {
    $(".buttonFooter").on('click', function() {
        $("html, body").animate({
            scrollTop: 0
        }, 1000);
    });

    $(".footer-menu").on("click", function(){
    	$(this).toggleClass("active");
    });
});

