@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        <h5>Edit Mian Category</h5>
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.main-category.update", [$mainCategory->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label class="required" for="title">Title</label>
                    <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" value="{{ $mainCategory->title }}" type="text" name="title" id="title" value="{{ old('title') }}" step="1" required>
                    @if($errors->has('title'))
                        <div class="invalid-feedback">
                            {{ $errors->first('title') }}
                        </div>
                    @endif
                </div>

                <div class="form-group col-md-12">
                    <label class="required" for="Description">Description</label>
                    <textarea class="form-control {{ $errors->has('des') ? 'is-invalid' : '' }}" value="{{ $mainCategory->des }}" type="text" name="des" id="des" value="{{ old('des') }}" step="1" required>{{ $mainCategory->des }}"</textarea>
                    @if($errors->has('des'))
                        <div class="invalid-feedback">
                            {{ $errors->first('des') }}
                        </div>
                    @endif
                </div>

                <div class="form-group col-md-12">
                    <label class="required" for="profile">Image</label>
                    <div id="image-preview" class="image-preview" style="width: 263px; height: 158px; background-image: url('{{ asset($mainCategory->image)}}')">
                        <label for="image-upload" id="image-label">Choose File</label>
                        <input type="file" value="{{ $mainCategory->image }}"  name="image" id="image-upload"/>
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
                    Update
                </button>
                <a class="btn btn-danger" href="{{ route('admin.main-category.index') }}">Cancel</a>
            </div>
        </form>
    </div>
</div>



@endsection