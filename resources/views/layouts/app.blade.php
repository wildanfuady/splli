<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Aplikasi Bengkel Motor Berkah Bersama SP.LLI</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <link rel="icon" href="{{ asset('logo.jpg') }}">
    <meta name=description content="Sistem Informasi Administrasi Temu Pakar untuk Web Admin dan REST FULL API">
	<meta name=keyword content="temu pakar, temupakar">
	<meta name=robots content="max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    <link rel="canonical" href="{{ url('/') }}" >
    <meta property="og:type" content="website" >
    <meta property="og:title" content="Aplikasi Administrasi Temu Pakar" >
    <meta property="og:description" content="Sistem Informasi Administrasi Temu Pakar untuk Web Admin dan REST FULL API">
    <meta property="og:keyword" content="temu pakar, temupakar" >
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:site_name" content="Temu Pakar" >
    <meta property="og:image" content="{{ asset('logo.jpg') }}" >
    <meta property="og:image:secure_url" content="{{ asset('logo.jpg') }}">
    <meta property="og:image:width" content="100">
    <meta property="og:image:height" content="100">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css"/>

    <!-- AdminLTE -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.0.5/css/adminlte.min.css"/>

    <!-- iCheck -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/icheck-bootstrap/3.0.1/icheck-bootstrap.min.css"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/css/bootstrap-toggle.css"/>

    {{-- Select 2 --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css"/>
    <link rel="stylesheet" href="https://adminlte.io/themes/dev/AdminLTE/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css"/>

    @yield('third_party_stylesheets')

    @stack('page_css')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
    <!-- Main Header -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown user-menu">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                    <img src="{{ asset('logo.jpg') }}"
                         class="user-image img-circle elevation-2" alt="User Image">
                    <span class="d-none d-md-inline">{{ Auth::user()->name }}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <!-- User image -->
                    <li class="user-header bg-primary">
                        <img src="data:image/png;base64,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"
                             class="img-circle elevation-2"
                             alt="User Image">
                        <p>
                            {{ Auth::user()->name }}
                            <small>Member since {{ Auth::user()->created_at->format('M. Y') }}</small>
                        </p>
                    </li>
                    <!-- Menu Footer-->
                    <li class="user-footer">
                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                        <a href="#" class="btn btn-default btn-flat float-right"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Sign out
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>

    <!-- Left side column. contains the logo and sidebar -->
@include('layouts.sidebar')

<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <section class="content">
            @yield('content')
        </section>
    </div>

    <!-- Main Footer -->
    <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
            <b>Version</b> 0.0.1
        </div>
        <strong>Copyright &copy; 2020-{{ date('Y') }} <a href="{{ url('/') }}">Bengkel Motor SP.LLI</a>.</strong> All rights
        reserved.
    </footer>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- AdminLTE App -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.0.5/js/adminlte.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script src="https://adminlte.io/themes/dev/AdminLTE/plugins/select2/js/select2.full.min.js"></script>

@yield('third_party_scripts')
@stack('third_party_scripts')
@stack('page_scripts')
</body>
</html>
