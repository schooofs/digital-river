jQuery(document).ready(function($){
	$(".read-leader-bio").on("click", function(){
		var $parent = $(this).closest(".leadership-outer-wrapper");
		var $leadershipInner = $(this).closest(".leadership-inner-wrapper");
		var bio = $(this).data("bio");
		$parent.addClass("active bg-blue").removeClass("bg-lightGray");
		$parent.find(".leadership-bio").hide();
		$parent.find('.leadership-bio[data-bio="'+bio+'"]').show();
		$leadershipInner.addClass("flexbox-align-center").removeClass("flexbox-align-flex-end");
	});

	$(".close-bio").on("click", function(){
		var $parent = $(this).closest(".leadership-bios");
		var $leadershipInner = $(this).closest(".leadership-inner-wrapper");
		$leadershipInner.removeClass("flexbox-align-center").addClass("flexbox-align-flex-end");
		$parent.closest(".leadership-outer-wrapper").removeClass("bg-blue active").addClass("bg-lightGray");
	});

	$(".leader").on("mouseenter", function(){
		var $readBioDiv = $(this).find(".read-leader-bio");
		$(".leader-image").attr("src", $readBioDiv.data("image"));
	});
});