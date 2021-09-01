@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        <h5>Edit Student</h5>
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.student.update", [$student->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label class="required" for="title">Select Course</label>
                    <select class="form-control select2 {{ $errors->has('course_id') ? 'is-invalid' : '' }}" name="course_id" id="course_id" required>
                        @foreach($course as $id => $c)
                            <option value="{{ $id }}" {{ $id == $student->course_id ? 'selected' : '' }}>{{ $c }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('course_id'))
                        <div class="invalid-feedback">
                            {{ $errors->first('course_id') }}
                        </div>
                    @endif
                </div>
                <div class="form-group col-md-6">
                    <label class="required" for="title">Select Schedule code</label>
                    <select class="form-control select2 {{ $errors->has('schedule_id') ? 'is-invalid' : '' }}" name="schedule_id" id="schedule_id">
                        @foreach($schedule as $id => $i)
                            <option value="{{ $id }}" {{ $id == $student->schedule_id ? 'selected' : '' }}>{{ $i }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('schedule_id'))
                        <div class="invalid-feedback">
                            {{ $errors->first('schedule_id') }}
                        </div>
                    @endif
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label class="required" for="first_name">First Name</label>
                    <input class="form-control {{ $errors->has('first_name') ? 'is-invalid' : '' }}" type="text" name="first_name" id="first_name" value="{{ $student->first_name }}" step="1" required>
                    @if($errors->has('first_name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('fisrt_name') }}
                        </div>
                    @endif
                </div>
                <div class="form-group col-md-6">
                    <label class="required" for="last_name">Last Name</label>
                    <input class="form-control {{ $errors->has('last_name') ? 'is-invalid' : '' }}" type="text" name="last_name" id="last_name" value="{{ $student->last_name }}" step="1" required>
                    @if($errors->has('last_name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('last_name') }}
                        </div>
                    @endif
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label class="required" for="gender">Gender</label>
                    <select class="form-control select2 {{ $errors->has('gender') ? 'is-invalid' : '' }}" name="gender" id="gender">
                        <option value="" selected disabled>please seclet</option>
                        <option value="male"{{ $student->gender == 'male'?'selected':'' }}>Male</option>
                        <option value="female" {{ $student->gender == 'female'?'selected':'' }}>Female</option>
                    </select>
                    @if($errors->has('gender'))
                        <div class="invalid-feedback">
                            {{ $errors->first('gender') }}
                        </div>
                    @endif
                </div>

                <div class="form-group col-md-6">
                    <label class="required" for="phone_number">Phnone Number</label>
                    <input class="form-control {{ $errors->has('phone_number') ? 'is-invalid' : '' }}" type="text" name="phone_number" id="phone_number" value="{{ $student->phone_number }}" step="1">
                    @if($errors->has('phone_number'))
                        <div class="invalid-feedback">
                            {{ $errors->first('phone_number') }}
                        </div>
                    @endif
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-12">
                    <label class="required" for="email">Email</label>
                    <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ $student->email }}" step="1">
                    @if($errors->has('email'))
                        <div class="invalid-feedback">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label class="required" for="company_or_school">Company or School</label>
                    <input class="form-control {{ $errors->has('company_or_school') ? 'is-invalid' : '' }}" type="text" name="company_or_school" id="company_or_school" value="{{ $student->company_or_school }}" step="1" required>
                    @if($errors->has('company_or_school'))
                        <div class="invalid-feedback">
                            {{ $errors->first('company_or_school') }}
                        </div>
                    @endif
                </div>

                <div class="form-group col-md-6">
                    <label class="required" for="position_or_subject">Position or Subject</label>
                    <input class="form-control {{ $errors->has('position_or_subject') ? 'is-invalid' : '' }}" type="text" name="position_or_subject" id="position_or_subject" value="{{ $student->position_or_subject }}" step="1" required>
                    @if($errors->has('position_or_subject'))
                        <div class="invalid-feedback">
                            {{ $errors->first('position_or_subject') }}
                        </div>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <button class="btn btn-success" type="submit">
                    {{ trans('global.save') }}
                </button>
                <a class="btn btn-danger" href="{{ route('admin.student.index') }}">Cancel</a>
            </div>
        </form>
    </div>
</div>



@endsection