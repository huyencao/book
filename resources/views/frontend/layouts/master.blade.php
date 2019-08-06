<!DOCTYPE html>
<html lang="en">

<head>
    <title> GCO-Book </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('public/frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/frontend/css/swiper.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/frontend/css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('public/frontend/css/jquery.mmenu.all.css') }}">
    <link rel="stylesheet" href="{{ asset('public/frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('public/frontend/css/responsive.css') }}">
</head>

<body>
    @include('frontend.layouts.header')
    @yield('content')
    @include('frontend.layouts.footer')
</body>
<script type="text/javascript" src="{{ asset('public/frontend/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('public/frontend/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('public/frontend/js/jquery.mmenu.all.js') }}"></script>
<script src="{{ asset('public/frontend/js/swiper.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('frontend/js/main.js') }}"></script>

</html>
