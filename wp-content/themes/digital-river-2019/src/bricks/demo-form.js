let brick;
let emailInput;

let _$;

export function init($) {
	_$ = $;

	brick = document.querySelector('.brick-demo-form');

	if (!brick) {
		return;
	}

	const params = (new URL(document.location)).searchParams;
	const email = params.get('e');

	if (email) {
		const interval = setInterval(() => {
			emailInput = brick.querySelector('#Email');

			if (emailInput) {
				clearInterval(interval);
				emailInput.value = email;
			}
		}, 200);
	}
}
