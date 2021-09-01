@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        <h5>Edit Slide</h5>
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.slide.update", [$slide->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label class="required" for="title">Title</label>
                    <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" value="{{ $slide->title }}" type="text" name="title" id="title" value="{{ old('title') }}" step="1" required>
                    @if($errors->has('title'))
                        <div class="invalid-feedback">
                            {{ $errors->first('title') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.lesson.fields.weekday_helper') }}</span>
                </div>

                <div class="form-group col-md-6">
                    <label class="required" for="title">Select Page</label>
                    <select name="page_id" id="" class="form-control">
                        <option value="1" {{ $slide->page_id == '1'?'selected':'' }}>Home Page</option>
                        <option value="2" {{ $slide->page_id == '2'?'selected':'' }}>About Page</option>
                        <option value="3" {{ $slide->page_id == '3'?'selected':'' }}>Course Page</option>
                        <option value="4" {{ $slide->page_id == '4'?'selected':'' }}>Blog Page</option>
                        <option value="5" {{ $slide->page_id == '5'?'selected':'' }}>Contact Page</option>
                        <option value="6" {{ $slide->page_id == '6'?'selected':'' }}>Calendar Page</option>
                    </select>
                    @if($errors->has('page_id'))
                        <div class="invalid-feedback">
                            {{ $errors->first('page_id') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.lesson.fields.weekday_helper') }}</span>
                </div>
            </div>

            <div class="form-group">
                <label class="required" for="title">Sub Title</label>
                <input class="form-control {{ $errors->has('sub_title') ? 'is-invalid' : '' }}" value="{{ $slide->sub_title }}" type="text" name="sub_title" id="sub_title" value="{{ old('sub_title') }}" step="1" required>
                @if($errors->has('sub_title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sub_title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.lesson.fields.weekday_helper') }}</span>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label class="required" for="title">Link</label>
                    <input class="form-control {{ $errors->has('link') ? 'is-invalid' : '' }}" type="text" value="{{ $slide->link }}" name="link" id="link" value="{{ old('link') }}" step="1" required>
                    @if($errors->has('link'))
                        <div class="invalid-feedback">
                            {{ $errors->first('link') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.lesson.fields.weekday_helper') }}</span>
                </div>
    
                <div class="form-group col-md-6">
                    <label class="required" for="title">Title Button</label>
                    <input class="form-control {{ $errors->has('title_button') ? 'is-invalid' : '' }}" value="{{ $slide->title_button }}" type="text" name="title_button" id="title_button" value="{{ old('title_button') }}" step="1" required>
                    @if($errors->has('title_button'))
                        <div class="invalid-feedback">
                            {{ $errors->first('title_button') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.lesson.fields.weekday_helper') }}</span>
                </div>
            </div>

            <div class="form-group">
                <label class="required" for="title">Backgroup Images</label>
                <div id="image-preview" class="image-preview" style="background-image: url('{{ asset($slide->image) }}')">
                    <label for="image-upload" id="image-label">Choose File</label>
                    <input type="file" value="{{ $slide->image }}" name="image" id="image-upload" />
                </div>
                @if($errors->has('image'))
                    <div class="invalid-feedback">
                        {{ $errors->first('image') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.lesson.fields.weekday_helper') }}</span>
            </div>

            <div class="form-group">
                <button class="btn btn-success" type="submit">
                    Update
                </button>
                <a class="btn btn-danger" href="{{ route('admin.slide.index') }}">Cancel</a>
            </div>
        </form>
    </div>
</div>



@endsection