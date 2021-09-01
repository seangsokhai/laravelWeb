@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        <ul class="nav align-items-center">
            <li class="nav-item">
                <h5>Show Instructor</h5>
            </li>
            <li class="nav-item ml-auto">
                <a class="btn btn-success btn-sm nav-link" href="{{ route('admin.instructor.index') }}">
                    <<<<< Back To Team
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
                            {{ $instructor->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Fisst Name
                        </th>
                        <td>
                            {{ $instructor->first_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Last Name
                        </th>
                        <td>
                            {{ $instructor->last_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Phone Number
                        </th>
                        <td>
                            {{ $instructor->phone_number ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Mail
                        </th>
                        <td>
                            {{ $instructor->mail ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Facebook Link
                        </th>
                        <td>
                            {{ $instructor->facebook_link }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Twitter Link
                        </th>
                        <td>
                            {{ $instructor->twitter_link }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Linkin Link
                        </th>
                        <td>
                            {{ $instructor->linkin_link }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Description
                        </th>
                        <td width="85%">
                            {!! $instructor->des !!}
                        </td>
                    </tr>
                    <tr>
                        <th class="align-middle">
                            Profile
                        </th>
                        <td>
                            <img src="{{ asset($instructor->profile) }}" alt="Profile" width="200px" class="img-fluid">
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection