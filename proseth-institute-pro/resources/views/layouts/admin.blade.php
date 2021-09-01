<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Proseth Institute</title>
    <link rel="shortcut icon" href="{{ url('images/logo/small-logo-proseth.jpg') }}" />
    {{-- Bootstrap --}}
    <link rel="stylesheet" href="{{ asset('plugin/admim/boostrap/bootstrap4.1.3.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <link href="{{ asset('plugin/admin/datatable/jquery.dataTables.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugin/admin/datatable/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugin/admin/datatable/buttons.dataTables.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugin/admin/datatable/select.dataTables.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugin/admin/datatable/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" />
    
    <link href="{{ asset('plugin/admin/select2/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugin/admin/coreui/coreui.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('plugin/admin/dropzone/dropzone.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/admin/main-style.css') }}" rel="stylesheet" />

    @yield('styles')
    {{-- @include('partials.vendor-style'); --}}
</head>

<body class="app header-fixed sidebar-fixed aside-menu-fixed pace-done sidebar-lg-show">
    
    @include('admin.partials.header')

    <div class="app-body">
        @include('admin.partials.menu')
        <main class="main">
            <div style="padding-top: 20px" class="container-fluid">
                {{-- @if (session('message'))
                    <div class="row mb-2">
                        <div class="col-lg-12">
                            <div class="alert alert-success" role="alert">{{ session('message') }}</div>
                        </div>
                    </div>
                @endif --}}
                @if ($errors->count() > 0)
                    <div class="alert alert-danger">
                        <ul class="list-unstyled">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @yield('content')

            </div>
        </main>
        <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </div>

    <script src="{{ asset('plugin/admin/jquery/jquery-3.6.0.min.js') }}"></script>

    <script src="{{ asset('vendor/unisharp/laravel-ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('plugin/admin/popper.min.js') }}"></script>
    <script src="{{ asset('plugin/admin/boostrap/bootstrap4.1.3.min.js') }}"></script>
    <script src="{{ asset('plugin/admin/coreui/coreui.min.js')}}"></script>

    <script src="{{ asset('plugin/admin/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugin/admin/datatable/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugin/admin/datatable/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('plugin/admin/datatable/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('plugin/admin/datatable/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('plugin/admin/datatable/buttons.print.min.js') }}"></script>
    <script src="{{ asset('plugin/admin/datatable/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('plugin/admin/datatable/dataTables.select.min.js') }}"></script>

    <script src="{{ asset('plugin/admin/pdfmake.min.js') }}"></script>
    <script src="{{ asset('plugin/admin/vfs_fonts.js') }}"></script>
    <script src="{{ asset('plugin/admin/jszip.min.js') }}"></script>

    <script src="{{ asset('plugin/admin/ckeditor.js') }}"></script>
    <script src="{{ asset('plugin/admin/moment.min.js') }}"></script>
    <script src="{{ asset('plugin/admin/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('plugin/admin/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('plugin/admin/dropzone/dropzone.min.js') }}"></script>

    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('js/admin/custom.js') }}"></script>
    <script src="{{ asset('plugin/admin/datatable/datatable.js') }}"></script>
    @yield('scripts')

    @if (session('message'))
    <script src="{{ asset('js/admin/alert.js') }}"></script>
    @endif


</body>

</html>
