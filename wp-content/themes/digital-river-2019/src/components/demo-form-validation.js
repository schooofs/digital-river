let el;
let submitButton;
let forms;

let _$;

export function init($) {
	_$ = $;

	el = document.querySelector('.demo-form');

	if (!el) {
		return;
	}

	submitButton = el.querySelector('#submitbutton');

	submitButton.disabled = false;

	// Fetch all the forms we want to apply custom Bootstrap validation styles to
	forms = [...document.querySelectorAll('.needs-validation')];

	events();
}

function events() {
	forms.forEach(f => f.addEventListener('submit', e => validateForm(f, e)))
}

function validateForm(f, e) {
	if (f.checkValidity() === false) {
		e.preventDefault();
		e.stopPropagation();
	}

	f.classList.add('was-validated');

	if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(f.elements.namedItem('email').value)) {
		f.elements.namedItem('email').classList.add('has-success');
	} else {
		f.elements.namedItem('email').classList.add('has-error');
	}
}
