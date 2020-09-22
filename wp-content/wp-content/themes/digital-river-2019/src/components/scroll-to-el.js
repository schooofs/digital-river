let els;
let mainNav;
let progressNav;

let _$;

export function init($) {
	_$ = $;

	els = [...document.querySelectorAll('.scroll-link')];

	mainNav = document.querySelector('.navbar');
	progressNav = document.querySelector('.dr_progress-navigation');

	checkQueryParams();

	events();
}

function events() {
	els.forEach(el => el.addEventListener('click', e => {
		e.preventDefault();
		scrollToEl(e.target.getAttribute('href'))
	}));
}

function checkQueryParams() {
	const urlParams = new URLSearchParams(location.search);

	urlParams.has('b') && scrollToEl('#' + urlParams.get('b'));
}

function scrollToEl(selector) {
	const target = document.querySelector(selector);

	if (!target) {
		return;
	}

	const top = target.offsetTop - window.scrollY - mainNav.offsetHeight - (progressNav ? progressNav.offsetHeight : 0);

	window.scrollBy({
		behavior: 'smooth',
		top,
		left: 0
	});
}