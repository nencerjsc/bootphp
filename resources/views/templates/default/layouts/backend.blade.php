<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <link rel="stylesheet" href="{{url('adminlte/dist/plugin/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ url('adminlte/dist/fonts/fontawesome/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ url('adminlte/dist/plugin/animate.css') }}">
    <link rel="stylesheet" href="{{url('adminlte/dist/css/style.css')}}">
    <link rel="stylesheet" href="{{url('adminlte/plugins/select2/css/select2.css')}}">

    <style>
        :root {
            --color-main: #2F822F;
            --color-hover: #135b13;
            --color-link: #007bff;
            --color-hover-link: #0953a2;
            --color-border: #e9e9e9;
            --text-dark: #343a40;
            --text-muted: #6c757d;
            --text-gray: #A0AEC0;
            --text-sidebar: #c2c7d0;
            --bg-body: #e9e9e9;
            --bg-light: #f8f9fa;
            --bg-white: #fff;
            --bg-sidebar: #121b22;
            --bg-hover_sidebar: #0a395a66;
        }
    </style>
    {{--    script--}}
    <script type="text/javascript" src="{{ url('adminlte/dist/plugin/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ url('adminlte/dist/plugin/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <script type="text/javascript" src="{{ url('adminlte/dist/js/theme-script.js') }}"></script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $(document).ready(function(){
            $(".Switch").on('click',function() {
                $.ajax({
                    url: "{{ url('/').'/'.$backendUrl.'/ajax' }}",
                    type : "POST",
                    dataType:"text",
                    data : {
                        table : $(this).attr('data-table'),
                        col : $(this).attr('data-col'),
                        id: $(this).attr('data-id'),
                    },
                }).done(function() {

                });
            });
        });
    </script>
</head>
<body>
<div class="template-administrator open-sidebar">
    @include('frontend.default.layouts.sidebar-admin')
    {{--    header--}}
    <header id="header" class="header">
        <div class="navbar pr-0 pr-lg-0 navbar-expand">
            <a href="javascript:void(0)" class="toggleSidebar hamburger-icon">
                <i class="fal fa-bars"></i>
            </a>
            <ul class="navbar-nav w-100 mb-0">
                <li class="nav-item d-none d-lg-block">
                    <a class="nav-link" href="javascript:void(0)">Trang chủ</a>
                </li>
                <li class="nav-item dropdown ml-auto">
                    <a class="dropdown-toggle text-decoration-none d-flex align-items-center text-black-50" href="#"
                       id="toggle-user" data-toggle="dropdown" aria-expanded="false">
                        <img class="rounded-circle" src="{{ url('adminlte/dist/img/avatar5.png') }}">
                        <span class="ms-2">{{ Auth::user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="toggle-user">
                        <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"> {{ __('Logout') }}</a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </ul>
                </li>
            </ul>
        </div>
    </header>
    <!-- *** Main *** -->
    <div class="main" id="main">
        @yield('content')
    </div>
</div>

</body>
</html>
