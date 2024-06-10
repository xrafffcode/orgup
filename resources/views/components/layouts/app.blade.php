<!DOCTYPE html>
<html lang="zxx">

<head>
    <!--================= Meta tag =================-->
    <meta charset="utf-8">
    <title>{{ $title ?? config('app.name') }}</title>
    <meta name="description" content="">
    <!--================= Responsive Tag =================-->
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--================= Favicon =================-->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('app/images/orgup.png') }}">
    <!--================= Bootstrap V5 css =================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app/css/bootstrap.min.css') }}">
    <!--================= Menus css =================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app/css/menus.css') }}">
    <!--================= Animate css =================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app/css/animate.css') }}">
    <!--================= Owl Carousel css =================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app/css/owl.carousel.css') }}">
    <!--================= Elegant icon css  =================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app/fonts/elegant-icon.css"') }}">
    <!--================= Magnific Popup css =================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app/css/magnific-popup.css') }}">
    <!--================= Animations css =================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app/css/animations.css') }}">
    <!--================= style css =================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app/css/style.css') }}">
    <!--================= Custom Spacing css =================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app/css/custom-spacing.css') }}">
    <!--================= Responsive css =================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app/css/responsive.css') }}">

    <link rel="stylesheet" href="{{ asset('app/css/custom.css') }}">
</head>

<body>
    <x-ui.app-header />

    <!--================= Wrapper Start Here =================-->
    <div class="react-wrapper">
        <div class="react-wrapper-inner">
            {{ $slot }}
        </div>
    </div>
    <!--================= Wrapper End Here =================-->

    <!--================= Jquery latest version =================-->
    <script src="{{ asset('app/js/jquery.min.js') }}"></script>
    <!--================= Modernizr js =================-->
    <script src="{{ asset('app/js/modernizr-2.8.3.min.js') }}"></script>
    <!--================= Bootstrap js =================-->
    <script src="{{ asset('app/js/bootstrap.min.js') }}"></script>
    <!--================= Owl Carousel js =================-->
    <script src="{{ asset('app/js/owl.carousel.min.js') }}"></script>
    <!--================= Magnific Popup =================-->
    <script src="{{ asset('app/js/jquery.magnific-popup.min.js') }}"></script>
    <!--================= Counter up js =================-->
    <script src="{{ asset('app/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('app/js/waypoints.min.js') }}"></script>
    <!--================= Wow js =================-->
    <script src="{{ asset('app/js/wow.min.js') }}"></script>
    <script src="{{ asset('app/js/isotope.pkgd.min.js') }}"></script>
    <!--================= Imagesloaded.pkgd.min js =================-->
    <script src="{{ asset('app/js/imagesloaded.pkgd.min.js') }}"></script>
    <!--================= menus js =================-->
    <script src="{{ asset('app/js/menus.js') }}"></script>
    <!--================= Plugins js =================-->
    <script src="{{ asset('app/js/plugins.js') }}"></script>
    <!--================= Main js =================-->
    <script src="{{ asset('app/js/main.js') }}"></script>
</body>

</html>
