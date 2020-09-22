let brick;
let link;

let _$;

export function init($) {
	_$ = $;

	brick = document.querySelector('.brick-home-widget');

	if (!brick) {
		return;
	}

	link = brick.querySelector('.mfSkip.next');

	events();
}

function events() {
	link.addEventListener('click', onClick);
}

function onClick() {
	window.scrollBy(0, -80);
}