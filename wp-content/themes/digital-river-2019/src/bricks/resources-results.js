let _$;
let brick;
let viewMore;
let actionUrl;


export function init($) {
	_$ = $;

	brick = document.querySelector('.brick-resources-results');

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
	const topic = document.querySelector('#resource-topic').value;
	const type = document.querySelector('#resource-type').value;
	const picks = !!brick.dataset.picks;
	const offsetAdjust = brick.dataset.offsetAdjust;

		_$.post({
		url: actionUrl,
		dataType: 'json',
		data: {topic, type, page, limit, picks, offsetAdjust},
		complete: res => {
			_$(brick).find('.results-container .row').append(res.responseText);
			brick.dataset.page++;
			viewMore.disabled = isViewMoreDisabled(max);
		}
	});
}

function isViewMoreDisabled(max) {
	return brick.dataset.page >= +max;
}