import * as Hammer from 'hammerjs';

let els;
let sliders = [];
let isMobile;

let _$;

const debounceTime = 400;
const breakpoint = 992;

export function init($) {
	_$ = $;

	els = [...document.querySelectorAll('.dr-slider')];

	if (!els.length) {
		return;
	}

	isMobile = window.innerWidth < breakpoint;

	els.forEach((slider, i) => {
		sliders[i] = {
			pos: 0,
			sliderInner: slider.querySelector('.dr-slider-inner'),
			itemsPerSlide: !isMobile ? slider.dataset.itemsPerSlide : 1,
			prev: slider.querySelector('.dr-slider-controls .prev'),
			next: slider.querySelector('.dr-slider-controls .next'),
			pipsParent: slider.querySelector('.dr-slider-pips'),
			pip: slider.querySelector('.dr-slider-pips button'),
			sliding: false
		};

		configSlider(i);
		configStage(slider, i);
	});
}

export function onResize() {
	if (!els.length) {
		return;
	}

	const isMobileNew = window.innerWidth < breakpoint;
	const breakpointChange = isMobileNew !== isMobile;

	isMobile = isMobileNew;

	if (breakpointChange) {
		init(_$);
	}
}

function configSlider(i) {
	sliders[i].items = [...sliders[i].sliderInner.querySelectorAll('.dr-slide')];
	sliders[i].numSlides = Math.ceil(sliders[i].items.length / sliders[i].itemsPerSlide);
	sliders[i].pipsParent.innerHTML = '';

	for (let j = 0; j < sliders[i].numSlides; j++) {
		const el = sliders[i].pip.cloneNode();
		sliders[i].pipsParent.appendChild(el);
	}

	sliders[i].pips = [...sliders[i].pipsParent.querySelectorAll('button')];

	sliders[i].sliderInner.style.width = (sliders[i].numSlides * 100) + '%';

	updatePips(i);
	registerEvents(i);
	updateArrows(i);
	setSliderPos(i);
}

function configStage(slider, i) {
	const hammer = new Hammer.Manager(slider);

	hammer.add( new Hammer.Pan({ direction: Hammer.DIRECTION_HORIZONTAL, threshold: 10 }) );

	hammer.on('panleft', () => changePos(i, sliders[i].pos + 1));
	hammer.on('panright', () => changePos(i, sliders[i].pos - 1));
}

function registerEvents(i) {
	sliders[i].prev.addEventListener('click', () => changePos(i, sliders[i].pos - 1));
	sliders[i].next.addEventListener('click', () => changePos(i, sliders[i].pos + 1));
	sliders[i].pips.forEach((p, index) => p.addEventListener('click', () => changePos(i, index)));
}

function setSliderPos(i) {
	sliders[i].sliderInner.style.left = (-sliders[i].pos * 100) + '%';
	setTimeout(() => sliders[i].sliding = false, debounceTime);
}

function updateArrows(i) {
	sliders[i].prev.disabled = sliders[i].pos === 0;
	sliders[i].next.disabled = sliders[i].pos === sliders[i].numSlides - 1;
}

function updatePips(i) {
	sliders[i].pips.forEach(p => p.classList.remove('active'));
	sliders[i].pips[sliders[i].pos].classList.add('active');
}

function changePos(i, newPos) {
	if (newPos >= 0 && newPos < sliders[i].pips.length && !sliders[i].sliding) {
		sliders[i].sliding = true;
		sliders[i].pos = newPos;
		updateArrows(i);
		updatePips(i);
		setSliderPos(i);
	}
}