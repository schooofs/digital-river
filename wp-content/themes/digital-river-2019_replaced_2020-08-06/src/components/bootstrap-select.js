let $els;

let _$;

export function init($) {
	_$ = $;

	$els = _$('.selectpicker');

	if (!$els.length) {
		return;
	}

	$els.selectpicker();
}


