@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        <h5>Create Blog Category</h5>
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.blog_category.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label class="required" for="title">Title</label>
                    <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title') }}" step="1" required>
                    @if($errors->has('title'))
                        <div class="invalid-feedback">
                            {{ $errors->first('title') }}
                        </div>
                    @endif
                </div>
            </div>


            <div class="form-group">
                <button class="btn btn-success" type="submit">
                    {{ trans('global.save') }}
                </button>
                <a class="btn btn-danger" href="{{ route('admin.blog_category.index') }}">Cancel</a>
            </div>
        </form>
    </div>
</div>



@endsection