$("#seeMorePosts").submit(function(e){

	e.preventDefault();

	var $this = $(this);

	$.ajax({
		url: global.ajaxurl,
		type: 'post',
		data: $this.serializeArray(),
		success: function( result ) {
			var result = JSON.parse(result);
			console.log(result);
			var count = parseInt($this.find('[name="count"]').val());
			$this.find('[name="count"]').val(result.count);
			if(result.see_more === false) $this.find('[type="submit"]').hide();
			$("#blogContent").append(result.result);
		}
	});
});
