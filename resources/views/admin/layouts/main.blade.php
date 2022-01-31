<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset ( 'asset/plugins/fontawesome-free/css/all.min.css' ) }}">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css' ) }}">
    <link rel="stylesheet" href="{{ asset ( 'asset/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css' ) }}">
    <link rel="stylesheet" href="{{ asset ( 'asset/plugins/icheck-bootstrap/icheck-bootstrap.min.css' ) }}">
    <link rel="stylesheet" href="{{ asset ( 'asset/dist/css/adminlte.min.css' ) }}">
    <link rel="stylesheet" href="{{ asset ( 'asset/plugins/overlayScrollbars/css/OverlayScrollbars.min.css' ) }}">
    <link rel="stylesheet" href="{{ asset ( 'asset/plugins/daterangepicker/daterangepicker.css' ) }}">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
    </div>

    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <form action="{{ route ( 'logout' ) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-default">Logout</button>
                </form>
            </li>
        </ul>
    </nav>

    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="#" class="brand-link">
            <img src="{{ asset ( 'asset/images/b_logo.png' ) }}" alt="AdminLTE Logo" class="brand-image" style="opacity: .8">
            <span class="brand-text font-weight-light">Admin</span>
        </a>

        <div class="sidebar">
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-header">CARS</li>
                    <li class="nav-item">
                        <a href="{{ route ( 'admin.brand' ) }}" class="nav-link {{ request()->routeIs('admin.brand*') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Cars Brand</p>
                            <span class="badge badge-info right">@if ( App\Http\Controllers\admin\BrandController::countBrand() !== 0 ){{ App\Http\Controllers\admin\BrandController::countBrand() }}@endif</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route ( 'admin.models' ) }}" class="nav-link {{ request()->routeIs('admin.models*') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Cars Model</p>
                            <span class="badge badge-info right">@if ( App\Http\Controllers\admin\ModelsController::countModel() !== 0 ) {{ App\Http\Controllers\admin\ModelsController::countModel() }}@endif</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route ( 'admin.cars' ) }}" class="nav-link {{ request()->routeIs('admin.cars*') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Cars</p>
                            <span class="badge badge-info right">@if ( App\Http\Controllers\admin\CarsController::countCars() !== 0 ) {{ App\Http\Controllers\admin\CarsController::countCars() }}@endif</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>

    <div class="content-wrapper pt-4">
        <section class="content">
            <div class="container-fluid">
                @yield ( 'content' )
            </div>
        </section>
    </div>
    <footer class="main-footer">
        <strong>Copyright &copy; 2022</strong>
    </footer>

    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
</div>
<script src="{{ asset ( 'asset/plugins/jquery/jquery.min.js' ) }}"></script>
<script src="{{ asset ( 'asset/plugins/jquery-ui/jquery-ui.min.js' ) }}"></script>
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<script src="{{ asset ( 'asset/plugins/bootstrap/js/bootstrap.bundle.min.js' ) }}"></script>
<script src="{{ asset ( 'asset/plugins/chart.js/Chart.min.js' ) }}"></script>
<script src="{{ asset ( 'asset/plugins/sparklines/sparkline.js' ) }}"></script>
<script src="{{ asset ( 'asset/plugins/jqvmap/jquery.vmap.min.js' ) }}"></script>
<script src="{{ asset ( 'asset/plugins/jqvmap/maps/jquery.vmap.usa.js' ) }}"></script>
<script src="{{ asset ( 'asset/plugins/jquery-knob/jquery.knob.min.js' ) }}"></script>
<script src="{{ asset ( 'asset/plugins/moment/moment.min.js' ) }}"></script>
<script src="{{ asset ( 'asset/plugins/daterangepicker/daterangepicker.js' ) }}"></script>
<script src="{{ asset ( 'asset/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js' ) }}"></script>
<script src="{{ asset ( 'asset/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js' ) }}"></script>
<script src="{{ asset ( 'asset/plugins/bs-custom-file-input/bs-custom-file-input.min.js' ) }}"></script>
<script src="{{ asset ( 'asset/dist/js/adminlte.js' ) }}"></script>
<script src="{{ asset ( 'asset/dist/js/demo.js' ) }}"></script>
<script src="{{ asset ( 'asset/dist/js/pages/dashboard.js' ) }}"></script>
<script>
    $(function () {
        bsCustomFileInput.init();
    });
</script>
</body>
</html>
