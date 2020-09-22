let el;
let step1;
let step1Form;
let step1Option;
let next;
let step2;
let $close;

let _$;

export function init($) {
	el = document.querySelector('#contact-form');

	if (!el) {
		return;
	}

	_$ = $;

	step1 = el.querySelector('.dr_step[data-step="1"]');
	step1Form = step1.querySelector('#contact-choice-form');
	step1Option = [...step1Form.querySelectorAll('input[name="contact-option"]')];
	next = step1Form.querySelector('button');
	step2 = el.querySelector('.dr_step[data-step="2"]');
	$close = _$(el.querySelector('.close'));

	events();
}

function events() {
	step1Option.forEach(o => o.addEventListener('change', () => next.disabled = false));
	step1.addEventListener('submit', onSubmit);
	_$(el).on('hidden.bs.modal', onClose);
}

function onSubmit(e) {
	e.preventDefault();

	let action;

	const data = new FormData(step1Form);
	for (let pair of data.entries()) {
		action = pair[1];
	}

	switch (action) {
		case 'billing':
			window.open('https://www.findmyorder.com/store?Action=DisplayEmailCustomerServicePage&Env=BASE&Locale=en_US&SiteID=findmyor');
			$close.trigger('click');
			break;
		case 'product':
			window.open('https://www.findmyorder.com/sstore?Action=DisplayHomePage&SiteID=findmyor&Locale=en_US', '_blank');
			$close.trigger('click');
			break;
		case 'sales':
			step1.classList.remove('active');
			step2.classList.add('active');
			break;
		default:
			return;
	}
}

function onClose() {
	setTimeout(() => {
		step2.classList.remove('active');
		step1.classList.add('active');
	}, 400);
}