let el;
let dropdownParents;
let toggler;
let collapse;
let overlay;
let overlayActive = false;
let isMobileMenu;

const menuBreakpoint = 992;

let _$;

export function init($) {
	_$ = $;

	el = document.querySelector('.navbar');

	if (!el) {
		return;
	}

	dropdownParents = [...el.querySelectorAll('.menu-item-has-children > a.dropdown-toggle')];
	toggler = el.querySelector('.navbar-toggler');
	collapse = el.querySelector('.navbar-collapse');
	overlay = document.querySelector('.dr_overlay');

	isMobileMenu = window.innerWidth < menuBreakpoint;

	toggleParentDropdownFunction();
	events();
}

function events() {
	dropdownParents.forEach(el => el.addEventListener('click', onClick));
	toggler.addEventListener('click', onToggle);
	overlay.addEventListener('click', onClose);
}

function onClick(e) {
	if (window.innerWidth <= menuBreakpoint) {
		e.preventDefault();
	}

	if (e.target.href) {
		window.location.href = e.target.href;
	}
}

function onClose() {
	collapse.classList.remove('show', 'in');

	onToggle();
}

function onToggle() {
	if (!collapse.classList.contains('collapsing')) {
		document.body.classList[overlayActive ? 'remove' : 'add']('overlay-active');
		overlayActive = !overlayActive;
	}
}

export function onResize() {
	if (!el) {
		return;
	}

	const isMobileMenuNew = window.innerWidth < menuBreakpoint;
	const breakpointChange = isMobileMenu !== isMobileMenuNew;

	isMobileMenu = isMobileMenuNew;

	if (breakpointChange) {
		if (!isMobileMenu) {
			overlayActive = true;
		} else {
			overlayActive = toggler.getAttribute('aria-expanded') === 'false';
		}

		onToggle();
		toggleParentDropdownFunction();
	}
}

function toggleParentDropdownFunction() {
	dropdownParents.forEach(el => el.dataset.toggle = !isMobileMenu ? 'dropdown' : '');
}