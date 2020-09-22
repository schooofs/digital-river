let brick;
let submit;
let blacklist;
const messages = {};

let _$;

export function init($) {
	_$ = $;

	brick = document.querySelector('.brick-home-hero');

	if (!brick) {
		return;
	}

	submit = brick.querySelector('#home-hero-button');
	blacklist = brick.dataset.blacklist.split(' ').map(s => `@${s}.`);
	blacklist.pop();
	messages['business'] = brick.dataset.messageBusiness;

	MktoForms2.loadForm('//app-sj03.marketo.com', '348-QUY-258', 6700, marketoSuccess);

	events();
}

function events() {
	MktoForms2.whenReady(marketoReady);

	submit.addEventListener('click', onSubmit);
}

function onSubmit() {
	$('button.mktoButton').click();
}

function marketoReady(form) {
	form.onValidate(() => {
		const email = form.vals().Email;

		if (email) {
			if (!isEmailGood(email)) {
				form.submitable(false);
				const emailElem = form.getFormElem().find('#Email');
				form.showErrorMessage(messages.business, emailElem);
			} else {
				form.submitable(true);
			}
		}
	});
}

function marketoSuccess(form) {
	form.onSuccess(function (values, followUpUrl) {
		if (followUpUrl) {
			window.location.href = 'request-demo/?e=' + values.Email;
		}
		return false;
	});
}

function isEmailGood(email) {
	for (let i = 0; i < blacklist.length; i++) {
		const domain = blacklist[i];

		if (email.indexOf(domain) !== -1) {
			return false;
		}
	}
	return true;
}
