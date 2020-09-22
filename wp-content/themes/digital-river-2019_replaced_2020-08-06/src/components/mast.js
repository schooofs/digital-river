let mast;
let triggerEl;
let progressNav;
let triggerHeight;
let shrinkMast = false;

let _$;

export function init($) {
	_$ = $;

	mast = document.getElementById('mast');

	if (!mast) {
		return;
	}

	triggerEl = document.querySelector('.brick-hero') || document.querySelector('.brick-home-widget');
	progressNav = document.querySelector('.dr_progress-navigation');

	triggerHeight = triggerEl ?
		triggerEl.offsetHeight - mast.offsetHeight - (progressNav ? progressNav.offsetHeight : 0) :
		window.innerHeight;

	onScroll();

	events();
}

function events() {}

export function onScroll() {
	if (!mast) {
		return;
	}

	const newShrinkMast = window.scrollY >= triggerHeight;
	const changed = newShrinkMast !== shrinkMast;

	if (changed) {
		shrinkMast = newShrinkMast;
		document.body.classList[shrinkMast ? 'add' : 'remove']('shrink-mast');
	}
}