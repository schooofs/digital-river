$(document).on('click', '.client-slider .owl-dot', function(event) {
	dataLayer.push({
		'client-box-slider-name':$(this).closest(".client-slider").data("name"),
		'client-box-slider-action': 'dot-click',
		'event': 'client-box-slider'
	});
});

$('.client-slider').on('dragged.owl.carousel', function(event) {
	dataLayer.push({
		'client-box-slider-name':$(event.target).data("name"),
		'client-box-slider-action': 'dragged',
		'event': 'client-box-slider'
	});
});