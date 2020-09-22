let _$;

let forms;

export function init($) {
    forms = [...document.querySelectorAll('form[id^="mktoForm_"]')];

    if (!forms.length) {
        return;
    }

    _$ = $;

    forms.forEach(f => loadForm(f));
}

function loadForm(f) {
    if (f.dataset.formid) {
        MktoForms2.loadForm("//app-sj03.marketo.com", "348-QUY-258", f.dataset.formid);
    }
}