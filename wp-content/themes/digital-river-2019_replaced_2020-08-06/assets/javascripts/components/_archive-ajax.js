$('form.archive [name="year"]').on("change", function(e){

	e.preventDefault();
	
	var $parent = $(this).closest(".archive-wrapper");
	$.ajax({
		url: global.ajaxurl,
		type: 'post',
		data: $parent.find("form.archive").serializeArray(),
		success: function( result ) {
			$parent.find(".archive-results").html(result);
		}
	});
});