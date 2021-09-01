@extends('layouts.admin')
@section('content')
<div class="card">
    <div class="card-header">
        <ul class="nav align-items-center">
            <li class="nav-item">
                <h5>Sub Category</h5>
            </li>
            <li class="nav-item ml-auto">
                @can('subCategory_create')
                    <a class="btn btn-success btn-sm" href="{{ route("admin.sub-category.create") }}">
                        Add New
                    </a>
                @endcan
            </li>
        </ul>
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-subCategory" id="subCategory-table">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            ID
                        </th>
                        <th>
                            Main Catagory
                        </th>
                        <th>
                            Title
                        </th>
                        <th>
                            Description
                        </th>
                        <th>
                            Logo
                        </th>
                        <th class="action">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($subCategory as $key => $subCategory)
                        <tr data-entry-id="{{ $subCategory->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $subCategory->id ?? '' }}
                            </td>
                            <td>
                                {{ $subCategory->mainCategory->title }}
                            </td>
                            <td>
                                {{ $subCategory->title ?? '' }}
                            </td>
                            <td>
                                {{ $subCategory->des ?? '' }}
                            </td>
                            <td width="100">
                                <img src="{{ asset($subCategory->image)}}" alt="Logo" class="img-fluid">
                            </td>
                            <td class="action">
                                <div class="dropdown">
                                    <a class="" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-outdent"></i>
                                    </a>

                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">

                                        @can('subCategory_edit')
                                        <a class="dropdown-item" href="{{ route('admin.sub-category.edit', $subCategory->id) }}">
                                            <i class="fas fa-edit"></i>
                                            {{ trans('global.edit') }}
                                        </a>
                                        @endcan

                                        @can('subCategory_delete')

                                        <form action="{{ route('admin.sub-category.destroy', $subCategory->id) }}" method="POST"
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
    @can('subCategory_delete')
    let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
    let deleteButton = {
        text: deleteButtonTrans,
        url: "{{ route('admin.sub-category.massDestroy') }}",
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
  $('#subCategory-table:not(.ajaxTable)').DataTable({ buttons: dtButtons })
    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
        $($.fn.dataTable.tables(true)).DataTable()
            .columns.adjust();
    });
})

</script>
@endsection