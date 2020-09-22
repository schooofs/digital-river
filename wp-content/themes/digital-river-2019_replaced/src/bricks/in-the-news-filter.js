import * as ResultsBrick from './in-the-news-results';

let brick;
let el;
let actionUrl;

let _$;

export function init($) {
	_$ = $;

	brick = document.querySelector('.brick-in-the-news-filter');

	if (!brick) {
		return;
	}

	el = document.getElementById('news-year-filter');

	actionUrl = brick.dataset.action;

	events();
}

function events() {
	if (el) {
		_$(el).on('change', onChangeFilter);
	}
}

function onChangeFilter(e) {
	_$.post({
		url: actionUrl,
		dataType: 'json',
		data: {
			year: e.target.value
		},
		complete: res => {
			_$('.brick-in-the-news-results').replaceWith(res.responseText);
			ResultsBrick.init(_$);
		}
	});
}