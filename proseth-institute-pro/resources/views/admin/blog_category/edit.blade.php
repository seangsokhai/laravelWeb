@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        <h5>Edit Blog Category</h5>
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.blog_category.update", [$blogCategory->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label class="required" for="title">Title</label>
                    <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" value="{{ $blogCategory->title }}" type="text" name="title" id="title" step="1" required>
                    @if($errors->has('title'))
                        <div class="invalid-feedback">
                            {{ $errors->first('title') }}
                        </div>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-success" type="submit">
                    Update
                </button>
                <a class="btn btn-danger" href="{{ route('admin.blog_category.index') }}">Cancel</a>
            </div>
        </form>
    </div>
</div>



@endsection