<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{ asset('images/avatar.png') }}" type="image/png" rel="shortcut icon">
    <title>@yield('page_title')</title>
    <!-- Bootstrap -->
    @yield('css')
    <link href="{{ asset('vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="{{ asset('css/custom.min.css') }}" rel="stylesheet">
    <!-- Estilos personalizados -->
    <link href="{{ asset('css/estilos.css') }}" rel="stylesheet">
    <!-- Elementos tipo fecha -->
    <link href="{{ asset('vendors/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css') }}"
        rel="stylesheet">
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="index.html" class="site_title" 
                        style="
                                font-size: 13px;
                                width: 100%;
                                line-height: 59px;
                                display: block;
                                height: 55px;
                                margin: 0;
                                padding-left: 10px;
                                display: flex;
                                align-items: center"
                        ><img src="{{asset('/images/avatar.png') }}" alt="" style="width: 3rem;"><span>Movimientos Activos Facilisimo</span></a>
                    </div>

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <div class="profile_info">
                            <span>Bienvenido,</span>
                            {{-- <h2>{{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}</h2> --}}
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <!-- /menu profile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    @include('partials.menu')
                    <!-- /sidebar menu -->
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">
                <div class="nav_menu">
                    <nav>
                        <ul class="nav navbar-nav navbar-right">
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                                    aria-expanded="false">
                                    {{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu pull-right">
                                    <li>
                                        <a href="javascript:void(0)"
                                            onclick="document.getElementById('logout-form').submit()">
                                            <i class="fa fa-sign-out pull-right"></i> Salir</a>
                                        <form id="logout-form" method="POST" action="{{ route('logout') }}">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col" role="main">
                <div class="">
                    @yield('header')
                    <div class="clearfix"></div>
                    <div class="row"
                        style="width: 102%;
                            margin-right:  13px;
                            margin-left: -22px">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2>@yield('title')</h2>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <h2>@yield('content')</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /page content -->

            <!-- footer content -->
            {{-- <footer>
                <div class="pull-right">
                    Movimientos Activos V 1.0
                </div>
                <div class="clearfix"></div>
            </footer> --}}
            <!-- /footer content -->
        </div>
    </div>
    <!-- Form Delete -->
    <form id="delete" style="display: none" method="POST">
        @csrf
        @method('delete')
    </form>
    <!-- Token para peticiones Ajax -->
    <form id="token" style="display: none">
        @csrf
    </form>
    
<script>
    var base_url = "{{ Config::get('constants.RUTA_APP') }}";
    var pathname = "{{ url()->current() }}";
</script>
<!-- jQuery -->
<script src="{{ asset('vendors/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('vendors/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('vendors/fastclick/lib/fastclick.js') }}"></script>
<!-- NProgress -->
<script src="{{ asset('vendors/nprogress/nprogress.js') }}"></script>
<!-- datetimepicker -->
<script src="{{ asset('vendors/moment/min/moment.min.js') }}"></script>
<script src="{{ asset('vendors/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}"></script>
<!-- Custom Theme Scripts -->
<script src="{{ asset('js/custom.min.js') }}"></script>
<!-- Sweet Alert 2 -->
<script src="{{ asset('js/SweetAlert2.js') }}"></script>
<!-- Funciones -->
<script src="{{ asset('js/funciones.js') }}"></script>

<script>
    $("#fecha").datetimepicker({
        format: "YYYY-MM-DD"
    });
</script>
@if (session('estado') == 'Ok')
    <script>
        Swal.fire(
            "{{ session('mensaje') }}",
            "",
            "success"
        );
    </script>
@endif
@if (session('estado') == 'NO')
    <script>
        Swal.fire(
            "{{ session('mensaje') }}",
            "",
            "error"
        );
    </script>
@endif
@yield('js')
</body>
</html>
