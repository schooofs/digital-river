let _$;

let brick;

export function init($) {
	brick = document.querySelector('.brick-about-us-world');

	if (!brick) {
		return;
	}

	_$ = $;

	events();
}

function events() {
	_$('.regions a').on('click', onClick);
}

function onClick(e) {
	e.preventDefault();
	$('.showregion').hide();
	$('#' + $(this).data('id')).fadeIn();
}