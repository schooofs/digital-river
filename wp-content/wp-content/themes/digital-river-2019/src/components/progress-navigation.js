let el;
let bar;
let barCols;
let bricks;
let footer;
let mainNav;
let positions;

let _$;

export function init($) {
	_$ = $;

	el = document.querySelector('.dr_progress-navigation');

	if (!el) {
		return;
	}

	bar = el.querySelector('.dr_progress-bar span');
	barCols = [...el.querySelectorAll('.col')];
	footer = document.querySelector('.footer');
	mainNav = document.querySelector('.navbar');

	bricks = getEnabledBricks();

	mapPositions();

	calcPos();

	events();
}

function events() {
	window.addEventListener('scroll', () => requestAnimationFrame(calcPos));
	window.addEventListener('resize', () => requestAnimationFrame(calcPos));
}

function getEnabledBricks() {
	return [...document.querySelectorAll('div[id^="b_"]')]
		.filter(x => x.dataset.progressNav === 'active');
}

function mapPositions() {
	positions = bricks.map((b, i) => {
		const mastHeight = el.offsetHeight + 80;
		const top = b.offsetTop === 0 ? 0 : b.offsetTop - mastHeight;
		const nextTop = i === bricks.length - 1 ? document.body.offsetHeight : bricks[i + 1].offsetTop;
		const height = nextTop - b.offsetTop;
		return {top, height};
	});
}

function calcPos() {

	// Width of marker to marker
	const segmentWidth = barCols[0].offsetWidth;

	// Width of marker to window edge
	const segmentToEdgeWidth = barCols[0].offsetLeft + (segmentWidth / 2);

	const scrollPos = window.scrollY;

	let currentSegment = -1;

	positions.forEach(p => {
		if (scrollPos >= p.top) {
			currentSegment++;
		}
	});

	const partialWidth = currentSegment === -1 ? 0 :
		((scrollPos - positions[currentSegment].top) / positions[currentSegment].height) *
		(currentSegment + 1 !== bricks.length ? segmentWidth : segmentToEdgeWidth);

	const barWidth = segmentToEdgeWidth + (currentSegment * segmentWidth) + partialWidth;

	renderBar(barWidth);
	renderMarkers(currentSegment);
}

function renderBar(barWidth) {
	bar.style.width = barWidth + 'px';
}

function renderMarkers(currentSegment) {
	barCols.forEach(b => b.firstElementChild.classList.remove('active'));

	for (let i = 0; i < currentSegment + 1; i++) {
		barCols[i].firstElementChild.classList.add('active');
	}
}