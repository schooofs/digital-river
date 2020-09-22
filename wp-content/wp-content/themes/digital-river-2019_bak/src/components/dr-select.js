let $els;
let _$;

export function init($) {
	_$ = $;

	$els = _$('.dr_select');

	if (!$els.length) {
		return;
	}

	$els.select2({
		minimumResultsForSearch: 20
	});
}