$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

toastr.options = {
    "closeButton": true,
};

function getPageLengthDatatable() {
    return [
        [50, 100, 250, 500, -1],
        [50, 100, 250, 500, "All"]
    ];
}

function getLanguageDatatable(lang) {
    if (lang == 'de')
        return baseUrl + '/assets/lang/' + lang + '.json';
    else
        return '';
}

function deleteValueSet(id) {
    $("#id").val(id);
}

function getDom() {
    return "B<'row'<'col-md-8 col-sm-12'l><'col-md-4 col-sm-12'f>><'table-responsive't><'row'<'col-md-8 col-sm-12'i><'col-md-4 col-sm-12'p>>r";
}

function getButtonExport() {
    return ['csv', 'excel', 'pdf', 'print'];
}

function ajaxfunc(url, data, type, callback) {

    $.ajax({
        url: url,
        type: type,
        data: data,
        success: function(data) {
            //NProgress.done();
            callback(data)
        },
        error: function(xhr, status, error, data) {
            //NProgress.done();
            errorHandle(xhr.status, xhr)
                //errorHandle(xhr.responseJSON.status,xhr)
        }
    });
}