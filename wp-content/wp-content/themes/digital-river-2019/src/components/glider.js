import Glide from '@glidejs/glide'

let el;

let _$;

export function init($) {
	_$ = $;

	el = document.querySelector('.glide');
	
	if (!el) {
		return;
	}

	new Glide('.glide', {
		type: 'carousel',
		startAt: 0,
		perView: 5,
		breakpoints: {
			600: {
				perView: 1,
			}
		}
	}).mount();
}