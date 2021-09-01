@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        <h5>Setting</h5>
    </div>

    <div class="card-body">
        {!! Form::open(['url' => route('admin.setting.update',$setting->id), 'class' => 'needs-validation','files'=> true]) !!}
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label class="required" for="facebook_link">Facebook Link</label>
                    <input class="form-control" type="text" id="" value="{{ $setting->facebook_link }}" name="facebook_link" required>
                    @if($errors->has('facebook_link'))
                        <div class="invalid-feedback">
                            {{ $errors->first('facebook_link') }}
                        </div>
                    @endif
                </div>

                <div class="form-group col-md-6">
                    <label class="required" for="youtube_link">Youtube Link</label>
                    <input class="form-control" type="text" id="" value="{{ $setting->youtube_link }}" name="youtube_link" required>
                    @if($errors->has('youtube_link'))
                        <div class="invalid-feedback">
                            {{ $errors->first('youtube_link') }}
                        </div>
                    @endif
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label class="required" for="twitter_link">Twitter Link</label>
                    <input class="form-control" type="text" id="" value="{{ $setting->twitter_link }}" name="twitter_link" required>
                    @if($errors->has('twitter_link'))
                        <div class="invalid-feedback">
                            {{ $errors->first('twitter_link') }}
                        </div>
                    @endif
                </div>

                <div class="form-group col-md-6">
                    <label class="required" for="linkin_link">Linkin Link</label>
                    <input class="form-control" type="text" id="" value="{{ $setting->linkin_link }}" name="linkin_link" required>
                    @if($errors->has('linkin_link'))
                        <div class="invalid-feedback">
                            {{ $errors->first('linkin_link') }}
                        </div>
                    @endif
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label class="required" for="phone_number">Phone Number</label>
                    <input class="form-control" type="text" id="" value="{{ $setting->phone_number }}" name="phone_number" required>
                    @if($errors->has('phone_number'))
                        <div class="invalid-feedback">
                            {{ $errors->first('phone_number') }}
                        </div>
                    @endif
                </div>

                <div class="form-group col-md-6">
                    <label class="required" for="mail">Mail</label>
                    <input class="form-control" type="email" id="" value="{{ $setting->mail }}" name="mail" required>
                    @if($errors->has('mail'))
                        <div class="invalid-feedback">
                            {{ $errors->first('mail') }}
                        </div>
                    @endif
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label class="required" for="map">Map</label>
                    <input class="form-control" type="text" id="" value="{{ $setting->map }}" name="map" required> 
                    @if($errors->has('map'))
                        <div class="invalid-feedback">
                            {{ $errors->first('map') }}
                        </div>
                    @endif
                </div>

                <div class="form-group col-md-6">
                    <label class="required" for="address">Address</label>
                    <input class="form-control" type="text" id="" value="{{ $setting->address }}" name="address" required> 
                    @if($errors->has('address'))
                        <div class="invalid-feedback">
                            {{ $errors->first('address') }}
                        </div>
                    @endif
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-12">
                    <label class="required" for="open_daily">Open Daily</label>
                    <input class="form-control" type="text" id="" value="{{ $setting->open_daily }}" name="open_daily" rows="4" cols="50" required>
                    @if($errors->has('open_daily'))
                        <div class="invalid-feedback">
                            {{ $errors->first('open_daily') }}
                        </div>
                    @endif
                </div>
            </div>
            
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label class="required" for="footer_text">Footer Text</label>
                    <textarea class="form-control" type="text" id="" name="footer_text" rows="4" cols="50" required>{{ $setting->footer_text }}</textarea>
                    @if($errors->has('footer_text'))
                        <div class="invalid-feedback">
                            {{ $errors->first('footer_text') }}
                        </div>
                    @endif
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-12">
                    <label class="required" for="logo">Logo</label>
                    <div id="image-preview" class="image-preview" style="background-image: url('{{asset($setting->logo)}}')">
                        <label for="image-upload" id="image-label">Choose File</label>
                        <input type="file" type="text" name="logo" id="image-upload" />
                    </div>
                    @if($errors->has('logo'))
                        <div class="invalid-feedback">            
                            {{ $errors->first('logo') }}
                        </div>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <button class="btn btn-success" type="submit">
                    {{ trans('global.save') }}
                </button>
                <a class="btn btn-danger" href="{{ route('admin.setting') }}">Cancel</a>
            </div>
        {{ Form::close() }}
    </div>
</div>

@endsection

@section('scripts')

 
<script>
    
</script>
@endsection
