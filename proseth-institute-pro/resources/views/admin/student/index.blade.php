@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <ul class="nav align-items-center">
            <li class="nav-item">
                <h5>Student</h5>
            </li>
            <li class="nav-item ml-auto">
                @can('student_create')
                    <a class="btn btn-success btn-sm" href="{{ route("admin.student.create") }}">
                        Add New
                    </a>
                @endcan
            </li>
        </ul>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-student" id="student-table">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            ID
                        </th>
                        <th>
                            Course
                        </th>
                        <th>
                            Schedule Code
                        </th>
                        <th>
                            Full Name
                        </th>
                        <th>
                            Gender
                        </th>
                        <th>
                            Company or School
                        </th>
                        <th>
                            position or subject
                        </th>
                        <th>
                            Phone Number
                        </th>
                        <th>
                            Email
                        </th>
                        <th class="action">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($student as $key => $student)
                        <tr data-entry-id="{{ $student->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $student->id ?? '' }}
                            </td>
                            <td>
                                <div class="three-line">
                                    {{ $student->course->title }}
                                </div>
                            </td>
                            <td>
                                {{ $student->schedule->code }}
                            </td>
                            <td>
                                {{ $student->full_name }}
                            </td>
                            <td>
                                {{ $student->gender }}
                            </td>
                            <td>
                                {{ $student->company_or_school }}
                            </td>
                            <td>
                                {{ $student->position_or_subject }}
                            </td>
                            <td>
                                {{ $student->phone_number }}
                            </td>
                            <td>
                                {{ $student->email }}
                            </td>
                            
                            <td class="action">
                                <div class="dropdown">
                                    <a class="" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-outdent"></i>
                                    </a>

                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">

                                        @can('student_show')
                                        <a class="dropdown-item" href="{{ route('admin.student.show', $student->id) }}">
                                            <i class="fas fa-eye"></i>
                                            {{ trans('global.view') }}
                                        </a>
                                        @endcan

                                        @can('student_edit')
                                        <a class="dropdown-item" href="{{ route('admin.student.edit', $student->id) }}">
                                            <i class="fas fa-edit"></i>
                                            {{ trans('global.edit') }}
                                        </a>
                                        @endcan

                                        @can('student_delete')

                                        <form action="{{ route('admin.student.destroy', $student->id) }}" method="POST"
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
    @can('student_delete')
    let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
    let deleteButton = {
        text: deleteButtonTrans,
        url: "{{ route('admin.student.massDestroy') }}",
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
  $('#student-table:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection