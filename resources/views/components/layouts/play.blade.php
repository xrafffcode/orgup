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

    <nav class="course-navbar navbar  navbar-expand-lg navbar-light px-4 pt-3">
        <a class="navbar-brand me-0" href="{{ route('app.landing') }}">
            <img src="{{ asset('app/images/orgup.png') }}" alt="BuildWithAngga" width="50">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse ms-0 ms-lg-5" id="navbarNavAltMarkup">
            <div class="navbar-nav mt-3 mt-lg-0">
                <a href="{{ route('student.dashboard') }}" class="nav-link">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M9.57 5.92993L3.5 11.9999L9.57 18.0699M20.5 11.9999H3.67" stroke="currentColor"
                            stroke-width="2" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round">
                        </path>
                    </svg>
                    <span>Profil Saya</span>
                </a>
            </div>
        </div>
    </nav>

    <div class="container-fluid mt-2">
        {{ $slot }}
    </div>

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

    @stack('script')
</body>

</html>
