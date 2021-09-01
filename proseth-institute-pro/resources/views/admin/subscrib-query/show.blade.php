@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        <ul class="nav align-items-center">
            <li class="nav-item">
                <h5>Show Subscrib Query</h5>
            </li>
            <li class="nav-item ml-auto">
                <a class="btn btn-success btn-sm nav-link" href="{{ route('admin.subscrib-query.index') }}">
                    <<<<< Back To Subscrib Query
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
                            {{ $subscrib_query->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Course
                        </th>
                        <td>
                            {{ $subscrib_query->course->title}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Schedule Code
                        </th>
                        <td>
                            {{ $subscrib_query->schedule->code}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Full Name
                        </th>
                        <td>
                            {{ $subscrib_query->full_name}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Gender
                        </th>
                        <td>
                            {{ $subscrib_query->gender }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Phone Number
                        </th>
                        <td>
                            {{ $subscrib_query->phone_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Email
                        </th>
                        <td>
                            {{ $subscrib_query->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Message
                        </th>
                        <td>
                            {{ $subscrib_query->message }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection