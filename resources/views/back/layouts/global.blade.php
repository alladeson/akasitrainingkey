<!doctype html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Akasi Learning Key - @yield('title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset_own('front/img/customized/favicon.png') }}">
    <!-- CSS here -->
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset_own('back/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Bootstrap 4.6 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset_own('back/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset_own('back/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet"
        href="{{ asset_own('back/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css') }}">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="{{ asset_own('back/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset_own('back/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset_own('back/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset_own('back/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="{{ asset_own('back/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') }}">
    <!-- BS Stepper -->
    <link rel="stylesheet" href="{{ asset_own('back/plugins/bs-stepper/css/bs-stepper.min.css') }}">
    <!-- dropzonejs -->
    <link rel="stylesheet" href="{{ asset_own('back/plugins/dropzone/min/dropzone.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset_own('back/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset_own('back/plugins/summernote/summernote-bs4.min.css') }}">
    <!-- CodeMirror -->
    <link rel="stylesheet" href="{{ asset_own('back/plugins/codemirror/codemirror.css') }}">
    <link rel="stylesheet" href="{{ asset_own('back/plugins/codemirror/theme/monokai.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset_own('back/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset_own('back/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset_own('back/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    <!-- SweetAlert2 -->
    <link rel="stylesheet"
        href="https://adminlte.io/themes/v3/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/toastr/toastr.min.css">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset_own('back/css/adminlte.min.css') }}">

    <style>
        .primary-color {
            color: #ff0e0d !important;
        }
    </style>

    @yield('third_party_stylesheets')

    @yield('loader_stylesheets')

    @stack('page_css')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- pre loader area start -->
        @include('back.layouts.components._preloader')
        <!-- pre loader area end -->

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-default navbar-light">
            <!-- Left navbar links -->
            @include('back.layouts.components._left-navbar-links')
            <!-- Right navbar links -->
            @include('back.layouts.components._right-navbar-links')
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('back.layouts.components._main-sidebar-container')
        <!-- Main Sidebar Container End -->

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            @include('back.layouts.components._page-content-header')
            <!-- /.content-header -->
            <!-- Main content -->
            <section class="content ">
                @include('back.layouts.components._alerts')
                @yield('main-content')
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- modal-danger-area-start -->
        @include('back.layouts.components.modals._danger')
        <!-- modal-danger-area-end -->

        <!-- logout modal start -->
        @include('back.layouts.components.modals._logout')
        <!-- logout modal top end -->

        <!-- footer-area-start -->
        @include('back.layouts.components.footer')
        <!-- footer-area-end -->


        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- JS here -->
    <!-- jQuery -->
    <script src="{{ asset_own('back/plugins/jquery/jquery.min.js') }}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{ asset_own('back/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- popper -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset_own('back/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset_own('back/plugins/chart.js/Chart.min.js') }}"></script>
    <!-- Sparkline -->
    <script src="{{ asset_own('back/plugins/sparklines/sparkline.js') }}"></script>
    {{-- <!-- JQVMap -->
    <script src="{{ asset_own('back/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
    <script src="{{ asset_own('back/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script> --}}
    <!-- jQuery Knob Chart -->
    <script src="{{ asset_own('back/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
    <!-- Select2 -->
    <script src="{{ asset_own('back/plugins/select2/js/select2.full.min.js') }}"></script>
    <!-- Bootstrap4 Duallistbox -->
    <script src="{{ asset_own('back/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') }}"></script>
    <!-- InputMask -->
    <script src="{{ asset_own('back/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset_own('back/plugins/inputmask/jquery.inputmask.min.js') }}"></script>
    <!-- daterangepicker -->
    <script src="{{ asset_own('back/plugins/moment/moment.min.js') }}"></script>
    <script src="{{ asset_own('back/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- bootstrap color picker -->
    <script src="{{ asset_own('back/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset_own('back/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <!-- BS-Stepper -->
    <script src="{{ asset_own('back/plugins/bs-stepper/js/bs-stepper.min.js') }}"></script>
    <!-- Summernote -->
    <script src="{{ asset_own('back/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset_own('back/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- dropzonejs -->
    <script src="{{ asset_own('back/plugins/dropzone/min/dropzone.min.js') }}"></script>
    <!-- jquery-validation -->
    <script src="{{ asset_own('back/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset_own('back/plugins/jquery-validation/additional-methods.min.js') }}"></script>
    <!-- CodeMirror -->
    <script src="{{ asset_own('back/plugins/codemirror/codemirror.js') }}"></script>
    <script src="{{ asset_own('back/plugins/codemirror/mode/css/css.js') }}"></script>
    <script src="{{ asset_own('back/plugins/codemirror/mode/xml/xml.js') }}"></script>
    <script src="{{ asset_own('back/plugins/codemirror/mode/htmlmixed/htmlmixed.js') }}"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{ asset_own('back/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset_own('back/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset_own('back/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset_own('back/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset_own('back/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset_own('back/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset_own('back/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset_own('back/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset_own('back/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset_own('back/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset_own('back/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset_own('back/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <!-- SweetAlert2 -->
    <script src="https://adminlte.io/themes/v3/plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- Toastr -->
    <script src="https://adminlte.io/themes/v3/plugins/toastr/toastr.min.js"></script>
    <script>
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 5000
        });
    </script>
    <!-- AdminLTE App -->
    <script src="{{ asset_own('back/js/adminlte.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{ asset_own('back/js/demo.js') }}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    {{-- <script src="{{ asset_own('back/js/pages/dashboard.js') }}"></script> --}}

    <script>
        function logout(event) {
            if (event)
                event.preventDefault();
            $('#logoutModal').modal('show');

            if (false) {
                event.preventDefault();
                $(this).closest('form').submit();
            }
        }
    </script>

    @yield('third_party_scripts')
    @stack('page_scripts')
</body>

</html>
