@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        <h5>Create Course</h5>
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.course.store") }}" enctype="multipart/form-data">
            @csrf

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label class="required" for="title">Title</label>
                    <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title') }}" step="1" required>
                    @if($errors->has('title'))
                        <div class="invalid-feedback">
                            {{ $errors->first('title') }}
                        </div>
                    @endif
                </div>

                <div class="form-group col-md-6">
                    <label class="required" for="title">Select Category</label>
                    <select class="form-control select2 {{ $errors->has('subCategory') ? 'is-invalid' : '' }}" name="subCategory_id" id="subCategory_id" required>
                        @foreach($subCategory as $id => $s)
                            <option value="{{ $id }}" {{ old('subCategory_id') == $id ? 'selected' : '' }}>{{ $s }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('subCategory'))
                        <div class="invalid-feedback">
                            {{ $errors->first('subCategory') }}
                        </div>
                    @endif
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label class="required" for="title">Course Overview</label>
                    <textarea class="form-control editor" name="course_over_view" required></textarea>
                    @if($errors->has('course_over_view'))
                        <div class="invalid-feedback">
                            {{ $errors->first('course_over_view') }}
                        </div>
                    @endif
                </div>

                <div class="form-group col-md-6">
                    <label class="required" for="title">Course Audience</label>
                    <textarea class="form-control editor" name="course_audience"></textarea>
                    @if($errors->has('course_audience'))
                        <div class="invalid-feedback">
                            {{ $errors->first('course_audience') }}
                        </div>
                    @endif
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label class="required" for="title">Course Outline</label>
                    <textarea class="form-control editor" name="course_outline"></textarea>
                    @if($errors->has('course_outline'))
                        <div class="invalid-feedback">
                            {{ $errors->first('course_outline') }}
                        </div>
                    @endif
                </div>

                <div class="form-group col-md-6">
                    <label class="required" for="title">Course Completion</label>
                    <textarea class="form-control editor" name="course_completion"></textarea>
                    @if($errors->has('course_completion'))
                        <div class="invalid-feedback">
                            {{ $errors->first('course_completion') }}
                        </div>
                    @endif
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-12">
                    <label class="required" for="title">Course Prerequisites</label>
                    <textarea class="form-control editor" name="course_prerequisites"></textarea>
                    @if($errors->has('course_prerequisites'))
                        <div class="invalid-feedback">
                            {{ $errors->first('course_prerequisites') }}
                        </div>
                    @endif
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-12">
                    <label class="required" for="image">Image</label>
                    <div id="image-preview" class="image-preview" style="width: 300px; height: 180px;">
                        <label for="image-upload" id="image-label">Choose File</label>
                        <input type="file" type="text" name="image" id="image-upload" />
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
                <a class="btn btn-danger" href="{{ route('admin.course.index') }}">Cancel</a>
            </div>
        </form>
    </div>
</div>



@endsection