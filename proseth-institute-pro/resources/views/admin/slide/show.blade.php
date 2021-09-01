@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        <h5>Show Slide</h5>
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.slide.index') }}">
                    <<<<< Back To Slide
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            ID
                        </th>
                        <td>
                            {{ $slide->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Title
                        </th>
                        <td>
                            {{ $slide->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                           Sub Title
                        </th>
                        <td>
                            {{ $slide->sub_title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Link
                        </th>
                        <td>
                            {{ $slide->link }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Button Title
                        </th>
                        <td>
                            {{ $slide->title_button }}
                        </td>
                    </tr>
                    <tr>
                        <th class="align-middle">
                            Background Image
                        </th>
                        <td>
                            <img src="{{ asset($slide->image) }}" alt="Background image" width="300px" class="img-fluid">
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection