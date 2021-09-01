@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        <ul class="nav align-items-center">
            <li class="nav-item">
                <h5>Show Email</h5>
            </li>
            <li class="nav-item ml-auto">
                <a class="btn btn-success btn-sm nav-link" href="{{ route('admin.email.index') }}">
                    <<<<< Back To Email
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
                            {{ $email->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Full Name
                        </th>
                        <td>
                            {{ $email->full_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Email Address
                        </th>
                        <td>
                            {{ $email->email_address }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Phone Number
                        </th>
                        <td>
                            {{ $email->phone_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Subject
                        </th>
                        <td>
                            {{  $email->subject  }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Message
                        </th>
                        <td>
                            {{ $email->message }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection