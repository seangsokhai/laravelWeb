@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        <h5>Edit Course</h5>
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.course.update", [$course->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label class="required" for="title">Title</label>
                    <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ $course->title }}" step="1" required>
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
                            <option value="{{ $id }}" {{ $id == $course->subCategory_id ? 'selected' : '' }}>{{ $s }}</option>
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
                    <textarea class="form-control editor" name="course_over_view" required>{{ $course->course_over_view }}</textarea>
                    @if($errors->has('course_over_view'))
                        <div class="invalid-feedback">
                            {{ $errors->first('course_over_view') }}
                        </div>
                    @endif
                </div>

                <div class="form-group col-md-6">
                    <label class="required" for="title">Course Audience</label>
                    <textarea class="form-control editor" name="course_audience" required>{{ $course->course_audience }}</textarea>
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
                    <textarea class="form-control editor" name="course_outline" required>{{ $course->course_outline }}</textarea>
                    @if($errors->has('course_outline'))
                        <div class="invalid-feedback">
                            {{ $errors->first('course_outline') }}
                        </div>
                    @endif
                </div>

                <div class="form-group col-md-6">
                    <label class="required" for="title">Course Completion</label>
                    <textarea class="form-control editor" name="course_completion" required>{{ $course->course_completion }}</textarea>
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
                    <textarea class="form-control editor" name="course_prerequisites" required>{{ $course->course_prerequisites }}</textarea>
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
                    <div id="image-preview" class="image-preview" style="width: 300px; height: 180px; background-image: url('{{ asset($course->image)}}')">
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