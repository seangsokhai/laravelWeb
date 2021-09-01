@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        <h5>Edit Blog</h5>
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.blog.update", [$blog->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-row">

                <div class="form-group col-md-6">
                    <label class="required" for="blogCategory_id">Select Blog Category</label>
                    <select class="form-control select2 {{ $errors->has('blogCategory_id') ? 'is-invalid' : '' }}" name="blogCategory_id" id="blogCategory_id" required>
                        @foreach($blogCategory as $id => $bc)
                            <option value="{{ $id }}" {{ $id == $blog->blogCategory_id ? 'selected' : '' }}>{{ $bc }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('blogCategory_id'))
                        <div class="invalid-feedback">
                            {{ $errors->first('blogCategory_id') }}
                        </div>
                    @endif
                </div>

                <div class="form-group col-md-6">
                    <label class="required" for="blogTag_id">Select Blog Tag</label>
                    <select class="form-control select2 {{ $errors->has('blogTag_id') ? 'is-invalid' : '' }}" name="blogTag_id[]" id="blogTag_id" multiple required>
                        @foreach($blogTag as $id => $bt)
                            <option value="{{ $id }}" {{ (in_array($id, old('blogTag_id', [])) || $blog->blogTag->contains($id)) ? 'selected' : '' }}>{{ $bt }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('blogTag_id'))
                        <div class="invalid-feedback">
                            {{ $errors->first('blogTag_id') }}
                        </div>
                    @endif
                </div>
            </div>
            
            <div class="form-row">

                <div class="form-group col-md-12">
                    <label class="required" for="title">Title</label>
                    <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ $blog->title }}" step="1" required>
                    @if($errors->has('title'))
                        <div class="invalid-feedback">
                            {{ $errors->first('title') }}
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <input class="form-control {{ $errors->has('user_id') ? 'is-invalid' : '' }}" type="hidden" value="{{ $user->id }}" name="user_id" id="user_id" value="{{ old('user_id') }}" step="1" required>
                    @if($errors->has('user_id'))
                        <div class="invalid-feedback">
                            {{ $errors->first('user_id') }}
                        </div>
                    @endif
                </div>

                <div class="form-group col-md-12">
                    <label class="required" for="description">Description</label>
                    <textarea class="form-control editor" id="" name="description" required>{{ $blog->description }}</textarea>
                    @if($errors->has('description'))
                        <div class="invalid-feedback">
                            {{ $errors->first('description') }}
                        </div>
                    @endif
                </div>

                <div class="form-group col-md-12">
                    <label class="required" for="image">Image</label>
                    <div id="image-preview" class="image-preview" style="width: 263px; height: 158px;background-image: url('{{ asset($blog->image) }}'); ">
                        <label for="image-upload" id="image-label">Choose File</label>
                        <input type="file" name="image" id="image-upload"/>
                    </div>
                    @if($errors->has('image'))
                        <div class="invalid-feedback">
                            {{ $errors->first('image') }}
                        </div>
                    @endif
                </div>

            </div>
            
            <div class="form-group">
                <button class="btn btn-success" type="submit">
                    {{ trans('global.save') }}
                </button>
                <a class="btn btn-danger" href="{{ route('admin.blog.index') }}">Cancel</a>
            </div>
        </form>
    </div>
</div>



@endsection