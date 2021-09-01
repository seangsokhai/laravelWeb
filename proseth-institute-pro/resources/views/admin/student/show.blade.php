@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        <ul class="nav align-items-center">
            <li class="nav-item">
                <h5>Show Student</h5>
            </li>
            <li class="nav-item ml-auto">
                <a class="btn btn-success btn-sm nav-link" href="{{ route('admin.student.index') }}">
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
                            {{ $student->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Course
                        </th>
                        <td>
                            {{ $student->course->title}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Schedule Code
                        </th>
                        <td>
                            {{ $student->schedule->code}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Full Name
                        </th>
                        <td>
                            {{ $student->full_name}}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Gender
                        </th>
                        <td>
                            {{ $student->gender }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Company or School
                        </th>
                        <td>
                            {{ $student->company_or_school }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Position or Subject
                        </th>
                        <td>
                            {{ $student->position_or_subject }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Phone Number
                        </th>
                        <td>
                            {{ $student->phone_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Email
                        </th>
                        <td>
                            {{ $student->email }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection