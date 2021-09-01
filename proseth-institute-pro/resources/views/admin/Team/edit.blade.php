@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        <h5>Edit Team</h5>
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.team.update", [$team->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label class="required" for="full_name">Full Name</label>
                    <input class="form-control {{ $errors->has('full_name') ? 'is-invalid' : '' }}" type="text" value="{{ $team->full_name }}" name="full_name" id="full_name" value="{{ old('full_name') }}" step="1" required>
                    @if($errors->has('full_name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('title') }}
                        </div>
                    @endif
                </div>
                <div class="form-group col-md-6">
                    <label class="required" for="position">Position</label>
                    <input class="form-control {{ $errors->has('position') ? 'is-invalid' : '' }}" type="text" value="{{ $team->position }}"  name="position" id="position" value="{{ old('position') }}" step="1" required>
                    @if($errors->has('position'))
                        <div class="invalid-feedback">
                            {{ $errors->first('position') }}
                        </div>
                    @endif
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label class="required" for="facebook_link">Facebook Link</label>
                    <input class="form-control {{ $errors->has('facebook_link') ? 'is-invalid' : '' }}" type="text" value="{{ $team->facebook_link }}"  name="facebook_link" id="facebook_link" value="{{ old('facebook_link') }}" step="1" required>
                    @if($errors->has('facebook_link'))
                        <div class="invalid-feedback">
                            {{ $errors->first('facebook_link') }}
                        </div>
                    @endif
                </div>
    
                <div class="form-group col-md-4">
                    <label class="required" for="twitter_link">Twitter Link</label>
                    <input class="form-control {{ $errors->has('twitter_link') ? 'is-invalid' : '' }}" type="text" value="{{ $team->twitter_link }}"  name="twitter_link" id="twitter_link" value="{{ old('twitter_link') }}" step="1" required>
                    @if($errors->has('twitter_link'))
                        <div class="invalid-feedback">
                            {{ $errors->first('twitter_link') }}
                        </div>
                    @endif
                </div>

                <div class="form-group col-md-4">
                    <label class="required" for="linkin_link">Linkin Link</label>
                    <input class="form-control {{ $errors->has('linkin_link') ? 'is-invalid' : '' }}" type="text" value="{{ $team->linkin_link }}"  name="linkin_link" id="linkin_link" value="{{ old('linkin_link') }}" step="1" required>
                    @if($errors->has('linkin_link'))
                        <div class="invalid-feedback">
                            {{ $errors->first('linkin_link') }}
                        </div>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label class="required" for="profile">Profile</label>
                <div id="image-preview" class="image-preview" style="width: 300px; height: 300px; background-image: url('{{ asset($team->profile)}}')">
                    <label for="image-upload" id="image-label">Choose File</label>
                    <input type="file" value="{{ $team->profile }}"  name="profile" id="image-upload"/>
                </div>
                @if($errors->has('profile'))
                    <div class="invalid-feedback">
                  
                        {{ $errors->first('profile') }}
                    </div>
                @endif
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