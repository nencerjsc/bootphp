<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Administrator</title>
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('adminlte/plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('adminlte/dist/css/style.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('adminlte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('adminlte/dist/css/adminlte.min.css')}}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script type="text/javascript" src="{{ url('adminlte/dist/plugin/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- overlayScrollbars -->
    <script src="{{asset('adminlte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('adminlte/dist/js/adminlte.js')}}"></script>
{{--    <link rel="stylesheet" href="{{ asset('adminlte/plugins/select2/css/select2.min.css') }}">--}}
{{--    <script src="{{ asset('adminlte/plugins/select2/js/select2.min.js') }}"></script>--}}
    <!-- PAGE SCRIPTS -->
    <script src="{{asset('adminlte/dist/js/pages/dashboard2.js')}}"></script>
    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">
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
                    type : "post",
                    dataType:"text",
                    data : {
                        action : 'updateToggle',
                        table : $(this).attr('data-table'),
                        col : $(this).attr('data-col'),
                        id: $(this).attr('data-id')
                    },
                }).done(function() {

                });
            });
        });
    </script>
</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed text-sm">
<div class="wrapper">
    @include('System::backend.partials.header')
    @include('System::backend.partials.sidebar')
    @yield('content')

    @include('System::backend.partials.footer')
    @include('System::backend.partials.righttoggle')
    <div class="control-sidebar-bg"></div>
</div>

</body>
</html>
