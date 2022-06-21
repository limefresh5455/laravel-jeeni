$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function getFormattedDate(month) {
    $date = new Date();
    $date.setMonth($date.getMonth()+month);
    return $.datepicker.formatDate('dd/mm/yy', $date);
}

function browseInitComplete($columns) {
    let colCount = $columns[0].length;
    $columns.every(function () {
        let column = this;
        let input;
        if (column.index() !== 0 && column.index() !== colCount-1)  {
            console.log(column.dataSrc());

            if(column.dataSrc() === 'role_id') {
                input = drawSelect('Role', $roles);
            } else if(column.dataSrc() === 'is_active') {
                input = drawSelect('Status', $status);
            } else if(column.dataSrc() === 'Is_final') {
                input = drawSelect('Final', $isFinal);
            } else if(column.dataSrc() === 'user_id') {
                input = drawSelect('User', $users);
            } else if(column.dataSrc() === 'showcase_id') {
                input = drawSelect('Showcase', $showcases);
            } else if(column.dataSrc() === 'email_id') {
                input = drawSelect('Email', $emailTemplates);
            } else if(column.dataSrc() === 'status') {
                input = drawSelect('Status', $emailStatus);
            } else {
                input = '<input type="text" class="form-control" />';
            }

            $(input).appendTo($(column.footer()).empty())
                .on('change', function () {column.search($(this).val()).draw();
            });
        }
    });
    $('#dataTable thead').append($('#dataTable tfoot tr.mepl-filters'));
    $('#dataTable thead tr.mepl-filters select').select2();
}

function drawSelect($title, $options) {
    $select = '<select class="form-control">';
    $select += '<option value="">'+$title+'</option>';
    $.each($.parseJSON($options), function(key, option) {
        $select += '<option value="'+option.id+'">'+option.name+'</option>';
    });
    $select += '</select>';
    return $select;
}

function toggleLoader(loaderType) {
    if(loaderType === 'show'){
        $('#voyager-loader').removeAttr('style').removeClass('hide');
    } else if(loaderType === 'hide'){
        $('#voyager-loader').attr('style', 'left: 125px;display: none;').addClass('hide');
    }
}

function appendSelectDropdown(selector, options, append = false) {
    if(append === true) {
        $appendOption = new Option(options.text, options.id, false, true);
        $(selector).append($appendOption).trigger('change');
    } else {
        $(selector).html('').select2({data: options});
    }
}
