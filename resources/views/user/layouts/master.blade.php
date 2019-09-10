<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <base href="{{ asset('/') }}">
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- Favicons -->
    <link rel="shortcut icon" href="assets/lib/images/favicon.ico">
    <link rel="apple-touch-icon" href="assets/lib/images/icon.png">
    <!-- Google font (font-family: 'Roboto', sans-serif; Poppins ; Satisfy) -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,500,600,600i,700,700i,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
    <!-- Stylesheets -->
    <link rel="stylesheet" href="{{ asset('assets/lib/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/lib/css/plugins.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/lib/style.css') }}">
    <link rel="stylesheet" href="{{ asset(mix('css/custom.css')) }}">
</head>
<body>
    <!-- Main wrapper -->
    <div class="wrapper" id="wrapper">
        <!-- Header -->
        @include('user.layouts.menu')
        <!-- Content -->
        @yield('content')
    </div>
    <!-- //Main wrapper -->
    @include('user.layouts.footer')
    <script src="{{ mix('js/custom.js') }}"></script>
</body>
</html>
