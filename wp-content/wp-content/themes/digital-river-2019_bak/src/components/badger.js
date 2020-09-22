import BadgerAccordion from 'badger-accordion/dist/badger-accordion';

let els;

let _$;

export function init($) {
	_$ = $;

	els = [...document.querySelectorAll('.js-badger-accordion')];

	if (!els.length) {
		return;
	}

	els.forEach(el => new BadgerAccordion(el));
}