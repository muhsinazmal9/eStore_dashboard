<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="nobleUI Dashboard">
    <meta name="author" content="Muhsin Azmal">
    <meta name="keywords" content="">

    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <!-- End fonts -->

    <!-- core:css -->
    <link rel="stylesheet" href="{{ asset('assets_backend') }}/vendors/core/core.css">
    <!-- endinject -->

    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('assets_backend') }}/vendors/flatpickr/flatpickr.min.css">
    <!-- End plugin css for this page -->

    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('assets_backend') }}/fonts/feather-font/css/iconfont.css">
    <link rel="stylesheet" href="{{ asset('assets_backend') }}/vendors/flag-icon-css/css/flag-icon.min.css">
    <!-- endinject -->

    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('assets_backend') }}/css/demo1/style.min.css">
    <!-- End layout styles -->

    <link rel="shortcut icon" href="{{ asset('assets_backend') }}/images/favicon.png">
</head>

<body class="vh-100 d-flex justify-content-center align-items-center">
    @if (Route::has('login'))
    <div class="d-flex align-items-center">
        @auth
            <h1>
                <a href="{{ url('/home') }}">Dashboard</a>
            </h1>
        @else
            <h1>
                <a href="{{ route('login') }}">Log in</a>
            </h1>
            <span class="align-middle"> ---------- OR -----------</span>
            @if (Route::has('register'))
                <h1>
                    <a href="{{ route('register') }}">Register</a>
                </h1>
            @endif
        @endauth
    </div>
@endif

    <!-- core:js -->
    <script src="{{ asset('assets_backend') }}/vendors/core/core.js"></script>
    <!-- endinject -->

    <!-- Plugin js for this page -->
    <script src="{{ asset('assets_backend') }}/vendors/flatpickr/flatpickr.min.js"></script>
    <script src="{{ asset('assets_backend') }}/vendors/apexcharts/apexcharts.min.js"></script>
    <!-- End plugin js for this page -->

    <!-- inject:js -->
    <script src="{{ asset('assets_backend') }}/vendors/feather-icons/feather.min.js"></script>
    <script src="{{ asset('assets_backend') }}/js/template.js"></script>
    <!-- endinject -->

    <!-- Custom js for this page -->
    <script src="{{ asset('assets_backend') }}/js/dashboard-light.js"></script>
    <!-- End custom js for this page -->

</body>

</html>
