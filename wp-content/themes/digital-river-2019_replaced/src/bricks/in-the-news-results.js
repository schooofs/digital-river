let _$;
let brick;
let viewMore;
let actionUrl;

export function init($) {
	_$ = $;

	brick = document.querySelector('.brick-in-the-news-results');

	if (!brick) {
		return;
	}

	viewMore = brick.querySelector('.view-more button');

	actionUrl = viewMore.dataset.action;

	viewMore.disabled = isViewMoreDisabled(brick.dataset.max);

	events();
}

function events() {
	viewMore.addEventListener('click', onViewMore);
}

function onViewMore() {
	const page = brick.dataset.page;
	const limit = brick.dataset.limit;
	const max = brick.dataset.max;
	const year = document.querySelector('#news-year-filter').value;

		_$.post({
		url: actionUrl,
		dataType: 'json',
		data: {year, page, limit},
		complete: res => {
			_$(brick).find('.container:first-child').append(res.responseText);
			brick.dataset.page++;
			viewMore.disabled = isViewMoreDisabled(max);
		}
	});
}

function isViewMoreDisabled(max) {
	return brick.dataset.page >= +max;
}