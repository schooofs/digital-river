let brick;
let speakers;
let close;
let mainNav;
let progressNav;

let _$;

export function init($) {
	_$ = $;

	brick = document.querySelector('.brick-speakers');

	if (!brick) {
		return;
	}

	speakers = [...brick.querySelectorAll('.speaker')];
	close = [...brick.querySelectorAll('.close')];
	mainNav = document.querySelector('.navbar');
	progressNav = document.querySelector('.dr_progress-navigation');

	events();
}

function events() {
	speakers.forEach(s => s.addEventListener('click', () => onOpen(s)));
	close.forEach(c => c.addEventListener('click', onClose));
}

function onOpen(speaker) {
	speaker.classList.add('active');

	const brickTop = brick.offsetTop;
	const panelContentTop = brick.querySelector('.speaker.active + .speaker-panel .container').offsetTop;
	const padding = 32; // Offset value for readability

	window.scrollTo({
		behavior: 'smooth',
		top: brickTop + panelContentTop - mainNav.offsetHeight - (progressNav ? progressNav.offsetHeight : 0) - padding,
		left: 0
	});
}

function onClose() {
	brick.querySelector('.speaker.active').classList.remove('active');
}