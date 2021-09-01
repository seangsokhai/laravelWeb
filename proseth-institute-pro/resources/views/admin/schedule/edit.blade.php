@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        <h5>Edit Schedule</h5>
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.schedule.update", [$schedule->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label class="required" for="title">Select Course</label>
                    <select class="form-control select2 {{ $errors->has('course_id') ? 'is-invalid' : '' }}" name="course_id" id="course_id" required>
                        @foreach($course as $id => $c)
                            <option value="{{ $id }}" {{ $id == $schedule->course_id ? 'selected' : '' }}>{{ $c }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('course_id'))
                        <div class="invalid-feedback">
                            {{ $errors->first('course_id') }}
                        </div>
                    @endif
                </div>
                <div class="form-group col-md-6">
                    <label class="required" for="title">Select Instructor</label>
                    <select class="form-control select2 {{ $errors->has('instructor_id') ? 'is-invalid' : '' }}" name="instructor_id" id="instructor_id" required>
                        @foreach($instructor as $id => $in)
                            <option value="{{ $id }}" {{ $id == $schedule->instructor_id ? 'selected' : '' }}>{{ $in }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('instructor_id'))
                        <div class="invalid-feedback">
                            {{ $errors->first('instructor_id') }}
                        </div>
                    @endif
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-12">
                    <label class="required" for="Code">Code</label>
                    <input class="form-control {{ $errors->has('code') ? 'is-invalid' : '' }}" type="text" name="code" id="code" value="{{ $schedule->code }}" step="1" required>
                    @if($errors->has('code'))
                        <div class="invalid-feedback">
                            {{ $errors->first('code') }}
                        </div>
                    @endif
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label class="required" for="Duration">Duration</label>
                    <input class="form-control {{ $errors->has('duration') ? 'is-invalid' : '' }}" type="text" name="duration" id="duration" value="{{ $schedule->duration }}" step="1" required>
                    @if($errors->has('duration'))
                        <div class="invalid-feedback">
                            {{ $errors->first('duration') }}
                        </div>
                    @endif
                </div>

                <div class="form-group col-md-6">
                    <label class="required" for="course_fee">Course fee</label>
                    <input class="form-control {{ $errors->has('course_fee') ? 'is-invalid' : '' }}" type="text" name="course_fee" id="course_fee" value="{{ $schedule->course_fee }}" step="1">
                    @if($errors->has('course_fee'))
                        <div class="invalid-feedback">
                            {{ $errors->first('course_fee') }}
                        </div>
                    @endif
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label class="required" for="start_date">Start Date</label>
                    <input class="form-control {{ $errors->has('start_date') ? 'is-invalid' : '' }}" type="date" name="start_date" id="start_date" value="{{ $schedule->start_date }}" step="1" required>
                    @if($errors->has('start_date'))
                        <div class="invalid-feedback">
                            {{ $errors->first('start_date') }}
                        </div>
                    @endif
                </div>

                <div class="form-group col-md-6">
                    <label class="required" for="end_date">End Date</label>
                    <input class="form-control {{ $errors->has('end_date') ? 'is-invalid' : '' }}" type="date" name="end_date" id="end_date" value="{{ $schedule->end_date }}" step="1" required>
                    @if($errors->has('end_date'))
                        <div class="invalid-feedback">
                            {{ $errors->first('end_date') }}
                        </div>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <button class="btn btn-success" type="submit">
                    {{ trans('global.save') }}
                </button>
                <a class="btn btn-danger" href="{{ route('admin.schedule.index') }}">Cancel</a>
            </div>
        </form>
    </div>
</div>



@endsection