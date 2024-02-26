<!doctype html>
<html lang="en">

<head>

    <!-- Bootstrap Css -->
    <link href="{{ asset('vendor/foxia/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css">
    <!-- Icons Css -->
    <link href="{{ asset('vendor/foxia/css/icons.min.css') }}" rel="stylesheet" type="text/css">
    <!-- App Css-->
    <link href="{{ asset('vendor/foxia/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css">

</head>

<body>

    @yield('body')


    <!-- JAVASCRIPT -->
    <script src="{{ asset('vendor/foxia/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/foxia/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/foxia/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('vendor/foxia/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('vendor/foxia/libs/node-waves/waves.min.js') }}"></script>

    <script src="{{ asset('vendor/foxia/js/app.js') }}"></script>

</body>

</html>
