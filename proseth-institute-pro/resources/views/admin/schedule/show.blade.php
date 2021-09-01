@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        <ul class="nav align-items-center">
            <li class="nav-item">
                <h5>Show Coure</h5>
            </li>
            <li class="nav-item ml-auto">
                <a class="btn btn-success btn-sm nav-link" href="{{ route('admin.course.index') }}">
                    <<<<< Back To Coure
                </a>
            </li>
        </ul>
    </div>

    <div class="card-body">
        <div class="form-group">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            ID
                        </th>
                        <td>
                            {{ $course->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Sub Category
                        </th>
                        <td>
                            {{ $course->SubCategory->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Title
                        </th>
                        <td>
                            {{ $course->title ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Course Overview
                        </th>
                        <td>
                            {!! $course->Course_over_view ?? '' !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Course Audience
                        </th>
                        <td>
                            {!! $course->course_audience ?? '' !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Course Outline
                        </th>
                        <td>
                            {!! $course->course_outline ?? '' !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Course Completion
                        </th>
                        <td>
                            {!! $course->course_completion ?? '' !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Course Prerequisites
                        </th>
                        <td>
                            {!! $course->course_prerequisites ?? '' !!}
                        </td>
                    </tr>
                    <tr>
                        <th class="align-middle">
                            Profile
                        </th>
                        <td>
                            <img src="{{ asset($course->image) }}" alt="Profile" width="300px" class="img-fluid">
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection