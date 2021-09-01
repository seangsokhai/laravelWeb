@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        <ul class="nav align-items-center">
            <li class="nav-item">
                <h5>Show Team</h5>
            </li>
            <li class="nav-item ml-auto">
                <a class="btn btn-success btn-sm nav-link" href="{{ route('admin.team.index') }}">
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
                            {{ $team->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Full Name
                        </th>
                        <td>
                            {{ $team->full_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                           Position
                        </th>
                        <td>
                            {{ $team->position ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Facebook Link
                        </th>
                        <td>
                            {{ $team->facebook_link }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Twitter Link
                        </th>
                        <td>
                            {{ $team->twitter_link }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Linkin Link
                        </th>
                        <td>
                            {{ $team->linkin_link }}
                        </td>
                    </tr>
                    <tr>
                        <th class="align-middle">
                            Profile
                        </th>
                        <td>
                            <img src="{{ asset($team->profile) }}" alt="Profile" width="300px" class="img-fluid">
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection