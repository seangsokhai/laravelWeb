@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        <ul class="nav align-items-center">
            <li class="nav-item">
                <h5>Show Blog</h5>
            </li>
            <li class="nav-item ml-auto">
                <a class="btn btn-success btn-sm nav-link" href="{{ route('admin.blog.index') }}">
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
                            {{ $blog->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Blog Category
                        </th>
                        <td>
                            {{ $blog->blogCategory->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Blog Tag
                        </th>
                        <td>
                            {{ $blog->blogTag->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Title
                        </th>
                        <td>
                            {{ $blog->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Description
                        </th>
                        <td>
                            {!! $blog->description !!}
                        </td>
                    </tr>
                    <tr>
                        <th class="align-middle">
                            Image
                        </th>
                        <td>
                            <img src="{{ asset($blog->image) }}" alt="Image" width="200px" class="img-fluid">
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection