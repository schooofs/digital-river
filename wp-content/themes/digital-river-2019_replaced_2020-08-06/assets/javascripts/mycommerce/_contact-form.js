$(document).ready(function(){
    $(".get-started-btn").click(function(){
        $(".get-started-form").show();
        $(".initial-options").hide();
    });
});


$(document).scroll(function() {
        var y = $(this).scrollTop();
        if (y > 325) {
        $(".fadeable").fadeIn();
        } 
});