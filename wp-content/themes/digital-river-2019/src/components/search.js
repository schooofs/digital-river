let el;
let toggle;
let isMobileMenu;
let searchActive = false;
let input;
let overlay;

const menuBreakpoint = 992;

let _$;

export function init($) {
	_$ = $;

	el = document.querySelector('.navbar-search');

	if (!el) {
		return;
	}

	toggle = el.querySelector('.search-toggle');
	input = el.querySelector('input');
	overlay = document.querySelector('.dr_overlay-mast')

	isMobileMenu = window.innerWidth < menuBreakpoint;

	events();
}

export function onClose() {
	if (searchActive) {
		onToggle();
	}
}

export function onResize() {
	const isMobileMenuNew = window.innerWidth < menuBreakpoint;
	const breakpointChange = isMobileMenu !== isMobileMenuNew;

	isMobileMenu = isMobileMenuNew;

	if (breakpointChange) {
		if (isMobileMenu) {
			searchActive = true;
			onToggle();
		}
	}
}

function events() {
	toggle.addEventListener('click', onToggle);
	overlay.addEventListener('click', onToggle);
}

function onToggle() {
	document.body.classList[searchActive ? 'remove' : 'add']('search-active');
	searchActive = !searchActive;
	input.focus();
}