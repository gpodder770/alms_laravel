<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    @yield('title')
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description">
    <meta content="Themesbrand" name="author">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('vendor/foxia/images/favicon.ico') }}">

    <!-- Bootstrap Css -->
    <link href="{{ asset('vendor/foxia/css/bootstrap.min.css') }} " id="bootstrap-style" rel="stylesheet"
        type="text/css">
    <!-- Icons Css -->
    <link href="{{ asset('vendor/foxia/css/icons.min.css') }} " rel="stylesheet" type="text/css">
    <!-- App Css-->
    <link href="{{ asset('vendor/foxia/css/app.min.css') }} " id="app-style" rel="stylesheet" type="text/css">
    <!-- Custom Css-->
    <link href="{{ asset('css/custom.css') }} " rel="stylesheet" type="text/css">
    @stack('css')

    <style>
        .table thead th {
            background: var(--bs-bg-gradient);
            color: white;
            font-weight: 700;
        }
    </style>

</head>

<body data-topbar="colored" data-layout="horizontal">

    <!-- Loader -->
    {{-- <div id="preloader"><div id="status"><div class="spinner"></div></div></div> --}}

    <!-- Begin page -->
    <div id="layout-wrapper">

        @include('employee.header.header')

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                @yield('body')
            </div>
            <!-- End Page-content -->



            <footer class="footer text-center">
                ©
                <script>
                    document.write(new Date().getFullYear())
                </script> Foxia <span class="d-none d-sm-inline-block"> - Crafted with <i
                        class="mdi mdi-heart text-danger"></i> by Themesbrand.</span>
            </footer>
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- Right Sidebar -->
    @include('employee.header.right_side')
    <!-- /Right-bar -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- JAVASCRIPT -->
    <script src="{{ asset('vendor/foxia/libs/jquery/jquery.min.js') }} "></script>
    <script src="{{ asset('vendor/foxia/libs/bootstrap/js/bootstrap.bundle.min.js') }} "></script>
    <script src="{{ asset('vendor/foxia/libs/metismenu/metisMenu.min.js') }} "></script>
    <script src="{{ asset('vendor/foxia/libs/simplebar/simplebar.min.js') }} "></script>
    <script src="{{ asset('vendor/foxia/libs/node-waves/waves.min.js') }} "></script>

    <script src="{{ asset('vendor/foxia/libs/morris.js/morris.min.js') }} "></script>

    <script src="{{ asset('vendor/foxia/libs/raphael/raphael.min.js') }} "></script>


    <script src="{{ asset('vendor/foxia/libs/peity/jquery.peity.min.js') }} "></script>

    <script src="{{ asset('vendor/foxia/js/pages/dashboard.init.js') }} "></script>

    <script src="{{ asset('vendor/foxia/js/app.js') }} "></script>

    @stack('script')

</body>

</html>
