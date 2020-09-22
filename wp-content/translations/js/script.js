jQuery(".fromName").select2({
    ajax: {
    url: "http://drwiki.digitalriverws.net:9000/person/autocomplete",
    dataType: 'json',
    delay: 250,
    data: function (params) {
        return {
            q: params.term, // search term
            //page: params.page
        };
    },
    processResults: function (data, page) {
        // parse the results into the format expected by Select2.
        // since we are using custom formatting functions we do not need to
        // alter the remote JSON data
        return {
            results: data.items
        };
    },
    cache: true
    },
    escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
    minimumInputLength: 2,
    templateResult: formatRepo, // omitted for brevity, see the source of this page
    templateSelection: formatNameSelection
});

jQuery(".toName").select2({
    ajax: {
    url: "http://drwiki.digitalriverws.net:9000/person/autocomplete",
    dataType: 'json',
    delay: 250,
    data: function (params) {
        return {
            q: params.term, // search term
            //page: params.page
        };
    },
    processResults: function (data, page) {
        // parse the results into the format expected by Select2.
        // since we are using custom formatting functions we do not need to
        // alter the remote JSON data
        return {
            results: data.items
        };
    },
    cache: true
    },
    escapeMarkup: function (markup) { return markup; }, // let our custom formatter work
    minimumInputLength: 2,
    templateResult: formatRepo, // omitted for brevity, see the source of this page
    templateSelection: formatNameSelection
});

function formatRepo (repo) {
    if (repo.loading) return "Loading";

    var markup = '<div class="clearfix">' + repo.name + ' (' + repo.id + ')</div>';
    return markup;
}
function formatNameSelection (repo) {
        return repo.name || repo.id ;
}