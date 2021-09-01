@extends('layouts.admin')
@section('content')

{{-- @if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif --}}
<div class="card">
    <div class="card-header">
        <h5>About Page</h5>
    </div>

    <div class="card-body">
        {!! Form::open(['url' => route('admin.about.update',$about->id), 'class' => 'needs-validation', 'files'=>true]) !!}
            @csrf
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label class="required" for="title">Over View</label>
                    <textarea class="form-control editor" id="" name="over_view" required> {{ $about->over_view }}</textarea>
                    @if($errors->has('over_view'))
                        <div class="invalid-feedback">
                            {{ $errors->first('over_view') }}
                        </div>
                    @endif
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label class="required" for="title">Our Mission</label>
                    <textarea class="form-control editor" id="" name="mission">{{ $about->mission }}</textarea>
                    @if($errors->has('mission'))
                        <div class="invalid-feedback">
                            {{ $errors->first('mission') }}
                        </div>
                    @endif
                </div>

                <div class="form-group col-md-6">
                    <label class="required" for="title">Our Vision</label>
                    <textarea class="form-control editor" id="" name="vision">{{ $about->vision }}</textarea>
                    @if($errors->has('vision'))
                        <div class="invalid-feedback">
                            {{ $errors->first('vision') }}
                        </div>
                    @endif
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label class="required" for="title">Our Value</label>
                    <textarea class="form-control editor" id="" name="value" required>{{ $about->value }}</textarea>
                    @if($errors->has('value'))
                        <div class="invalid-feedback">
                            {{ $errors->first('value') }}
                        </div>
                    @endif
                </div>

                <div class="form-group col-md-6">
                    <label class="required" for="title">Corporate Socail Responsibility</label>
                    <textarea class="form-control editor" name="csr" required>{{ $about->csr }}</textarea>
                    @if($errors->has('csr'))
                        <div class="invalid-feedback">
                            {{ $errors->first('csr') }}
                        </div>
                    @endif
                </div>

                <div class="form-group col-md-12">
                    <label class="required" for="title">Link Video</label>
                    <input class="form-control" value="{{ $about->link }}" name="link" required>
                    @if($errors->has('link'))
                        <div class="invalid-feedback">
                            {{ $errors->first('link') }}
                        </div>
                    @endif
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-12">
                    <label class="required" for="thumbnail">thumbnail</label>
                    <div id="image-preview" class="image-preview" style="background-image: url('{{asset($about->thumbnail)}}')">
                        <label for="image-upload" id="image-label">Choose File</label>
                        <input type="file" type="text" name="thumbnail" id="image-upload" />
                    </div>
                    @if($errors->has('thumbnail'))
                        <div class="invalid-feedback">            
                            {{ $errors->first('thumbnail') }}
                        </div>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <button class="btn btn-success" type="submit">
                    {{ trans('global.save') }}
                </button>
                <a class="btn btn-danger" href="{{ route('admin.slide.index') }}">Cancel</a>
            </div>
        {{ Form::close() }}
    </div>
</div>

@endsection

{{-- @push('scripts')
    <script>
        toastMixin.fire({
            animation: true,
            title: 'Successfully'
        });
    </script>
@endpush --}}