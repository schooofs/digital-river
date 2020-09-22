let els;

let _$;

export function init($) {
	_$ = $;

	els = [...document.querySelectorAll('.post-wrapper')];

	if (!els.length) {
		return;
	}

	window.$('.lazy').lazyload({
		threshold: 500,
		effect: 'fadeIn'
	});

	_$('.resource.animate:bottom-of-viewport').addClass('fly');
	_$('#flexibleMonetization:in-viewport').addClass('fly');
	_$('#cloudCommerce:in-viewport').addClass('fly');
	_$('#fullServiceModels:in-viewport').addClass('fly');

	events();
}

function events() {
	_$('.infographic-wrapper .infographic-label').on('click', function () {
		_$(this).parent('.infographic-wrapper').find('.infographic').addClass('active');
		_$(this).remove();
	});

	_$('.close-video').on('click', function () {
		_$('.videos-modal').modal('hide');
	});

	_$('.demo-now').on('click', function () {
		_$('.bottom-sticky-nav').addClass('active');
		_$('.bottom-sticky-nav-backdrop').addClass('active');
		_$(this).toggleClass('active');
		_$('.contact-us').removeClass('active');
	});

	_$('.button').click(function () {
		let buttonId = _$(this).attr('id');
		_$('#modal-container').removeAttr('class').addClass(buttonId);
		_$('body').addClass('modal-active');
	});

	_$('#modal-container').click(function () {
		_$(this).addClass('out');
		_$('body').removeClass('modal-active');
	});

	_$(window).on('scroll', function () {
		_$('.resource.animate:bottom-of-viewport').addClass('fly').trigger('classChange');
		_$('.client-feature:in-viewport').addClass('fly');
		_$('#flexibleMonetization:bottom-of-viewport').addClass('fly');
		_$('#cloudCommerce:bottom-of-viewport').addClass('fly');
		_$('#fullServiceModels:bottom-of-viewport').addClass('fly');
		_$('#offeringsSVG:bottom-of-viewport').addClass('go');
	});
}