import * as WOW from '../../../../../node_modules/wow.js/dist/wow';

let els;

let _$;

export function init($) {
	_$ = $;

	els = document.querySelectorAll('.wow');

	if (!els.length) {
		return;
	}

	function afterReveal(el) {
		el.addEventListener('animationend', function (event) {
			_$('.wow').each(function () {
				_$(this).css('opacity', 1);
			});
		});
	}

	new WOW({
		callback: afterReveal
	}).init()
}
