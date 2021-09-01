$(function () {
    let copyButtonTrans = 'Copy'
    let csvButtonTrans = 'CSV'
    let excelButtonTrans = 'Excel'
    let pdfButtonTrans = 'PDF'
    let printButtonTrans = 'Print'
    // let colvisButtonTrans = '{{ trans('global.datatables.colvis') }}'
    let selectAllButtonTrans = 'Select all'
    let selectNoneButtonTrans = 'Deselect all'

    let languages = {
        'en': 'https://cdn.datatables.net/plug-ins/1.10.19/i18n/English.json'
    };

    $.extend(true, $.fn.dataTable.Buttons.defaults.dom.button, {
        className: 'btn'
    })
    $.extend(true, $.fn.dataTable.defaults, {
        language: {
            // url: languages['{{ app()->getLocale() }}']
            paginate: {
                next: '&#8594;', // or '→'
                previous: '&#8592;' // or '←' 
            }
        },
        columnDefs: [{
            orderable: false,
            className: 'select-checkbox',
            targets: 0
        }, {
            orderable: false,
            searchable: false,
            targets: -1
        }],
        select: {
            style: 'multi+shift',
            selector: 'td:first-child'
        },
        order: [],
        scrollX: true,
        pageLength: 100,
        dom: 'lBfrtip<"actions">',
        buttons: [{
            extend: 'selectAll',
            className: 'btn btn-info btn-sm',
            text: selectAllButtonTrans,
            exportOptions: {
                columns: ':visible'
            }
        },
        {
            extend: 'selectNone',
            className: 'btn btn-info btn-sm',
            text: selectNoneButtonTrans,
            exportOptions: {
                columns: ':visible'
            }
        },
        {
            extend: 'copy',
            className: 'btn-default btn-sm',
            text: copyButtonTrans,
            exportOptions: {
                columns: ':visible'
            }
        },
        {
            extend: 'csv',
            className: 'btn-default btn-sm',
            text: csvButtonTrans,
            exportOptions: {
                columns: ':visible'
            }
        },
        {
            extend: 'excel',
            className: 'btn-default btn-sm',
            text: excelButtonTrans,
            exportOptions: {
                columns: ':visible'
            }
        },
        {
            extend: 'pdf',
            className: 'btn-default btn-sm',
            text: pdfButtonTrans,
            exportOptions: {
                columns: ':visible'
            }
        },
        {
            extend: 'print',
            className: 'btn-default btn-sm',
            text: printButtonTrans,
            exportOptions: {
                columns: ':visible'
            }
        },
            // {
            //   extend: 'colvis',
            //   className: 'btn-default',
            //   text: colvisButtonTrans,
            //   exportOptions: {
            //     columns: ':visible'
            //   }
            // }
        ]
    });

});
var allEditors = document.querySelectorAll('.editor');
for (var i = 0; i < allEditors.length; ++i) {
    CKEDITOR.replace(allEditors[i], {
        filebrowserUploadUrl: "{{route('admin.upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
}