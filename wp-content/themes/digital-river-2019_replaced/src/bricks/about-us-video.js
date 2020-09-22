let _$;

let brick;

export function init($) {
	brick = document.querySelector('.brick-about-us-video');

	if (!brick) {
		return;
	}

	_$ = $;

	_$('.dots:first-child').addClass('active');
	_$('.carousel-item:first-child').addClass('active');
}