<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">

    <link rel="shortcut icon" href="{{ asset('assets/frontend/image/favicon-dilesin.png') }}" type="image/x-icon">

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

    <style>
        .swal2-container {
            z-index: 100;
            margin-top: 80px
        }

        .navbar .navbar-nav a:hover {
            color: #131313 !important;
        }

        .nav .nav-item .nav-link {
            color: #131313 !important;
            font-weight: 500;
            font-size: 14px;
            padding: 10px 15px;
            border-radius: 5px;
        }

        .nav .nav-item .nav-link.active {
            background-color: #0087F6 !important;
            color: #fff !important;
        }
    </style>
</head>

<body>
    <x-ui.app-header />
    <div class="container">
        <div class="row">
            @include('sweetalert::alert')

            <div class="col-sm-12 col-lg-3 col-md-4">
                <div class="card border-0 shadow-sm">
                    <div class="card-header">
                        Profil Kamu
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-side flex-column">
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('student/dashboard') ? 'active' : '' }}"
                                    href="{{ route('student.dashboard') }}">Dashboard</a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('student/kelas') ? 'active' : '' }}"
                                    href="{{ route('student.course') }}">
                                    Kelas
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-lg-9 col-md-8 mt-5 mt-lg-0">
                <div class="card border-0 shadow-sm  mt-lg-0 mt-md-0">
                    <div class="card-header">
                        {{ $title }}
                    </div>
                    <div class="card-body">
                        {{ $slot }}
                    </div>
                </div>

            </div>
        </div>
    </div>


    @stack('addonScript')
</body>

</html>
