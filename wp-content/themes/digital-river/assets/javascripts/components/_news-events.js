
    $(document).on("click",".archive-results .view-all", function(){
        $( this ).closest(".archive-results").find(".hidden").removeClass("hidden");
        $( this ).closest(".archive-results").find(".view-all").addClass("view-less");
        $(".view-less").html("View Less");
    });

    $(document).on("click",".archive-results .view-less", function(){ 
    	$( this ).closest(".archive-results").find(".view-less-posts").addClass("hidden");
    	$( this ).closest(".archive-results").find(".view-all").removeClass("view-less");
    	$(".view-all").html("View All");

	});