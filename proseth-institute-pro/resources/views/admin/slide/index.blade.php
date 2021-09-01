@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <ul class="nav align-items-center">
            <li class="nav-item">
                <h5>Slide Show</h5>
            </li>
            <li class="nav-item ml-auto">
                @can('slide_create')
                    <a class="btn btn-success btn-sm" href="{{ route("admin.slide.create") }}">
                        Add New
                    </a>
                @endcan
            </li>
        </ul>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-slide" id="slide-table">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            ID
                        </th>
                        <th>
                            Title
                        </th>
                        <th>
                            Sub Title
                        </th>
                        <th>
                            Page
                        </th>
                        <th width="200">
                            Image
                        </th>
                        <th class="action">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($slide as $key => $slide)
                        <tr data-entry-id="{{ $slide->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $slide->id ?? '' }}
                            </td>
                            <td>
                                {{ $slide->title ?? '' }}
                            </td>
                            <td>
                                {{ $slide->sub_title ?? '' }}
                            </td>
                            <td>
                                @switch($slide->page_id)
                                    @case(1)
                                        <span> Home Page </span>

                                        @break
                                    @case(2)

                                        <span>About Page </span>

                                        @break
                                    @case(3)

                                        <span>Course Page </span>

                                        @break
                                    @case(4)

                                        <span>Blog Page </span>

                                        @break
                                    @case(5)

                                        <span>Contact Page</span>

                                        @break
                                    @case(6)

                                        <span>Calendar Page </span>

                                        @break


                                @endswitch
                            </td>
                            <td>
                                <img src="{{ asset($slide->image)}}" alt="" class="img-fluid">
                            </td>
                            <td class="action">
                                <div class="dropdown">
                                    <a class="" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-outdent"></i>
                                    </a>

                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        @can('slide_show')
                                        <a class="dropdown-item" href="{{ route('admin.slide.show', $slide->id) }}">
                                            <i class="fas fa-eye"></i>
                                            {{ trans('global.view') }}
                                        </a>
                                        @endcan

                                        @can('slide_edit')
                                        <a class="dropdown-item" href="{{ route('admin.slide.edit', $slide->id) }}">
                                            <i class="fas fa-edit"></i>
                                            {{ trans('global.edit') }}
                                        </a>
                                        @endcan

                                        @can('slide_delete')

                                        <form action="{{ route('admin.slide.destroy', $slide->id) }}" method="POST"
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
    @can('slide_delete')
    let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
    let deleteButton = {
        text: deleteButtonTrans,
        url: "{{ route('admin.slide.massDestroy') }}",
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
  $('.datatable-slide:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection