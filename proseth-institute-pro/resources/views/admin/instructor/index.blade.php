@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <ul class="nav align-items-center">
            <li class="nav-item">
                <h5>Instructor</h5>
            </li>
            <li class="nav-item ml-auto">
                @can('instructor_create')
                    <a class="btn btn-success btn-sm" href="{{ route("admin.instructor.create") }}">
                        Add New
                    </a>
                @endcan
            </li>
        </ul>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-instructor" id="instructor-table">
                <thead>
                    <tr>
                        <th width="5">

                        </th>
                        <th>
                            ID
                        </th>
                        <th>
                            Full Name
                        </th>
                        {{-- <th>
                            Phone Number
                        </th>
                        <th>
                            Mail
                        </th> --}}
                        <th>
                            Description
                        </th>
                        <th>
                            Facebook Link
                        </th>
                        <th>
                            Twitter Link
                        </th>
                        <th>
                            Linkin Link
                        </th>
                        <th width="100">
                            Profile
                        </th>
                        <th class="action">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($instructor as $key => $instructor)
                        <tr data-entry-id="{{ $instructor->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $instructor->id ?? '' }}
                            </td>
                            <td>
                                {{ $instructor->full_name ?? '' }}
                            </td>
                            {{-- <td>
                                {{ $instructor->phone_number }}
                            </td>
                            <td>
                                {{ $instructor->mail }}
                            </td> --}}
                            <td>
                                <span class="three-line">{!! $instructor->des !!}</span>
                            </td>
                            <td>
                                {{ $instructor->facebook_link }}
                            </td>
                            <td>
                                {{ $instructor->twitter_link }}
                            </td>
                            <td>
                                {{ $instructor->linkin_link }}
                            </td>
                            <td width="100">
                                <img src="{{ asset($instructor->profile)}}" alt="profile" class="img-fluid">
                            </td>
                            <td class="action">
                                <div class="dropdown">
                                    <a class="" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-outdent"></i>
                                    </a>

                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        @can('team_show')
                                        <a class="dropdown-item" href="{{ route('admin.instructor.show', $instructor->id) }}">
                                            <i class="fas fa-eye"></i>
                                            {{ trans('global.view') }}
                                        </a>
                                        @endcan

                                        @can('team_edit')
                                        <a class="dropdown-item" href="{{ route('admin.instructor.edit', $instructor->id) }}">
                                            <i class="fas fa-edit"></i>
                                            {{ trans('global.edit') }}
                                        </a>
                                        @endcan

                                        @can('team_delete')

                                        <form action="{{ route('admin.instructor.destroy', $instructor->id) }}" method="POST"
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
    @can('instructor_delete')
    let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
    let deleteButton = {
        text: deleteButtonTrans,
        url: "{{ route('admin.instructor.massDestroy') }}",
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
  $('#instructor-table:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection