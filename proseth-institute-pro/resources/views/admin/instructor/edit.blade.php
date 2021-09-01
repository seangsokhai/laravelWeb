@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        <h5>Edit Instructor</h5>
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.instructor.update", [$instructor->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label class="required" for="first_name">First Name</label>
                    <input class="form-control {{ $errors->has('first_name') ? 'is-invalid' : '' }}" type="text" name="first_name" id="first_name" value="{{ $instructor->first_name }}" step="1" required>
                    @if($errors->has('first_name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('first_name') }}
                        </div>
                    @endif
                </div>

                <div class="form-group col-md-6">
                    <label class="required" for="last_name">Last Name</label>
                    <input class="form-control {{ $errors->has('last_name') ? 'is-invalid' : '' }}" type="text" name="last_name" id="last_name" value="{{ $instructor->last_name}}" step="1" required>
                    @if($errors->has('last_name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('last_name') }}
                        </div>
                    @endif
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label class="required" for="phone_number">Phone Number</label>
                    <input class="form-control {{ $errors->has('phone_number') ? 'is-invalid' : '' }}" type="text" name="phone_number" id="phone_number" value="{{ $instructor->phone_number }}" step="1" >
                    @if($errors->has('phone_number'))
                        <div class="invalid-feedback">
                            {{ $errors->first('phone_number') }}
                        </div>
                    @endif
                </div>

                <div class="form-group col-md-6">
                    <label class="required" for="mail">Mail</label>
                    <input class="form-control {{ $errors->has('mail') ? 'is-invalid' : '' }}" type="email" name="mail" id="mail" value="{{ $instructor->mail }}" step="1" >
                    @if($errors->has('mail'))
                        <div class="invalid-feedback">
                            {{ $errors->first('mail') }}
                        </div>
                    @endif
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label class="required" for="facebook_link">Facebook Link</label>
                    <input class="form-control {{ $errors->has('facebook_link') ? 'is-invalid' : '' }}" type="text" name="facebook_link" id="facebook_link" value="{{ $instructor->facebook_link }}" step="1" required>
                    @if($errors->has('facebook_link'))
                        <div class="invalid-feedback">
                            {{ $errors->first('facebook_link') }}
                        </div>
                    @endif
                </div>
    
                <div class="form-group col-md-4">
                    <label class="required" for="twitter_link">Twitter Link</label>
                    <input class="form-control {{ $errors->has('twitter_link') ? 'is-invalid' : '' }}" type="text" name="twitter_link" id="twitter_link" value="{{ $instructor->twitter_link }}" step="1" required>
                    @if($errors->has('twitter_link'))
                        <div class="invalid-feedback">
                            {{ $errors->first('twitter_link') }}
                        </div>
                    @endif
                </div>

                <div class="form-group col-md-4">
                    <label class="required" for="linkin_link">Linkin Link</label>
                    <input class="form-control {{ $errors->has('linkin_link') ? 'is-invalid' : '' }}" type="text" name="linkin_link" id="linkin_link" value="{{ $instructor->linkin_link }}" step="1" required>
                    @if($errors->has('linkin_link'))
                        <div class="invalid-feedback">
                            {{ $errors->first('linkin_link') }}
                        </div>
                    @endif
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-12">
                    <label class="required" for="description"> Description </label>
                    <textarea class="form-control editor {{ $errors->has('des') ? 'is-invalid' : '' }}" type="text" name="des" id="description" value="{{ $instructor->des }}" step="1" required>{{ $instructor->des }}</textarea>
                    @if($errors->has('des'))
                        <div class="invalid-feedback">
                            {{ $errors->first('des') }}
                        </div>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label class="required" for="profile">Profile</label>
                <div id="image-preview" class="image-preview" style="background-image: url('{{ asset($instructor->profile) }}');width: 200px; height: 200px">
                    <label for="image-upload" id="image-label">Choose File</label>
                    <input type="file" name="profile" id="image-upload"/>
                </div>
                @if($errors->has('profile'))
                    <div class="invalid-feedback">
                        {{ $errors->first('profile') }}
                    </div>
                @endif
            </div>

            <div class="form-group">
                <button class="btn btn-success" type="submit">
                    {{ trans('global.save') }}
                </button>
                <a class="btn btn-danger" href="{{ route('admin.instructor.index') }}">Cancel</a>
            </div>
        </form>
    </div>
</div>



@endsection