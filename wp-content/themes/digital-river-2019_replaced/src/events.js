import * as mainNavigation from './components/main-navigation';
import * as mast from './components/mast';
import * as search from './components/search';
import * as drSlider from './components/dr-slider';

export function init() {
	events();
}

function events() {
	window.addEventListener('scroll', () => requestAnimationFrame(onScroll));
	window.addEventListener('resize', () => requestAnimationFrame(onResize));
	document.addEventListener('keyup', onKeyUp);
}

function onKeyUp(e) {
	switch (e.keyCode) {
		case 27:
			search.onClose();
			break;
		default:
			return;
	}
}

function onScroll(e) {
	mast.onScroll();
}

function onResize(e) {
	mainNavigation.onResize();
	search.onResize();
	drSlider.onResize();
}