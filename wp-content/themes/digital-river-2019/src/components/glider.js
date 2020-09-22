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
        perTouch: 5,
		perView: 5,
		breakpoints: {
			600: {
                perTouch: 1,
				perView: 1,
			}
		}
	}).mount();
}