<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Test</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script type="text/javascript" src="{{ asset('assets/js/jquery-1.11.0.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/bootstrap-filestyle.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/admin/js/main.js') }}" defer></script>
    <script type="text/javascript" src="{{ asset('assets/admin/js/bootstrap-datepicker.js') }}"></script>
    <link type="text/css" href="{{ asset('assets/admin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" >
    <link type="text/css" href="{{ asset('assets/admin/css/sb-admin.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('assets/admin/css/select2.min.css') }}" rel="stylesheet" />
    <link type="text/css" href="{{ asset('assets/admin/css/jquery.dataTables.min.css') }}" rel="stylesheet" />
    <link type="text/css" href="{{ asset('assets/admin/css/bootstrap-datepicker.css') }}" rel="stylesheet" />
</head>

<body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">
        <a class="navbar-brand mr-1" href="{{ route('employees.index') }}">Test task</a>
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0"></form>
        <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown no-arrow mx-1">
                <a href="{{ route('logout') }}" class="nav-link" role="button" data-toggle="tooltip" data-placement="left"
                   title="Logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="fas fa-sign-out-alt"></i>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </nav>

    <div id="wrapper">

        <ul class="sidebar navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('employees.index') }}">
                    <div class="row">
                        <div class="col-2"><i class="fas fa-users"></i></div>
                        <div class="col-10"><span>Employees</span></div>
                    </div>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('positions.index') }}">
                    <div class="row">
                        <div class="col-2"><i class="fas fa-book"></i></div>
                        <div class="col-10"><span>Positions</span></div>
                    </div>
                </a>
            </li>
        </ul>

        <div id="content-wrapper">

            @include('blocks.status')

            <div class="container-fluid">
                @yield('content')
            </div>

        </div>

    </div>

    <script src="{{ asset('assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/demo/jquery.mask.js') }}" type="text/javascript" defer></script>

</body>

</html>

