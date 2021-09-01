@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        <ul class="nav align-items-center">
            <li class="nav-item">
                <h5>Email</h5>
            </li>
        </ul>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-email" id="email">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            ID
                        </th>
                        <th>
                            Full Name
                        </th>
                        <th>
                            Email Address
                        </th>
                        <th>
                            Phone Number
                        </th>
                        <th>
                            Subject
                        </th>
                        <th>
                            Message
                        </th>
                        <th>
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($email as $key => $email)
                        <tr data-entry-id="{{ $email->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $email->id ?? '' }}
                            </td>
                            <td>
                                {{ $email->full_name }}
                            </td>
                            <td>
                                {{ $email->email_address }}
                            </td>
                            <td>
                                {{ $email->phone_number }}
                            </td>
                            <td>
                                {{ $email->subject }}
                            </td>
                            <td>
                                {{ $email->message }}
                            </td>
                            <td class="action">
                                <div class="dropdown">
                                    <a class="" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-outdent"></i>
                                    </a>

                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        @can('email_show')
                                        <a class="dropdown-item" href="{{ route('admin.email.show', $email->id) }}">
                                            <i class="fas fa-eye"></i>
                                            {{ trans('global.view') }}
                                        </a>
                                        @endcan

                                        @can('email_delete')

                                        <form action="{{ route('admin.email.destroy', $email->id) }}" method="POST"
                                            onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                            style="display: inline-block; width: 100%;">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <button type="submit" class="dropdown-item" value="">
                                                <i class="far fa-trash-alt"></i>
                                                {{ trans('global.delete') }}
                                            </button>
                                        </form>
                                        @endcan
                                    </div>
                                </div>
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
    @can('email_delete')
    let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
    let deleteButton = {
        text: deleteButtonTrans,
        url: "{{ route('admin.email.massDestroy') }}",
        className: 'btn-danger',
        action: function (e, dt, node, config) {
        var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
            return $(entry).data('entry-id')
        });

        if (ids.length === 0) {
            alert('{{ trans('global.datatables.zero_selected') }}')

            return
        }

        if (confirm('{{ trans('global.areYouSure') }}')) {
            $.ajax({
            headers: {'x-csrf-token': _token},
            method: 'POST',
            url: config.url,
            data: { ids: ids, _method: 'DELETE' }})
            .done(function () { location.reload() })
        }
        }
    }
    dtButtons.push(deleteButton)
    @endcan

  $.extend(true, $.fn.dataTable.defaults, {
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  $('#email:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection