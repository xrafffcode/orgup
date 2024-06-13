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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        body {
            background-color: #f6f8fd !important;
        }

        .swal2-container {
            z-index: 99999;
            margin-top: 100px
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

    <div class="container py-5">
        <div class="row">
            @include('sweetalert::alert')

            <div class="col-sm-12 col-lg-3 col-md-3">
                <div class="card border-0 shadow-sm card-sidebar">
                    <div class="card-body">
                        <div class="user ">
                            <img src="{{ asset(Auth::user()->profile()->avatar) }}" class="avatar " alt="avatar">
                            <div class="info">
                                <h3 class="lh-base">
                                    {{ Auth::user()->profile()->name }}
                                </h3>
                            </div>
                        </div>

                        <div class="menus">
                            <div class="item {{ request()->is('student/dashboard') ? 'active' : '' }}">
                                <i class="fa fa-home"></i>
                                <p>
                                    <a href="{{ route('student.dashboard') }}">
                                        Dashboard
                                    </a>
                                </p>
                            </div>

                            <div class="item {{ request()->is('student/kelas') ? 'active' : '' }}">
                                <i class="fa fa-book"></i>
                                <p>
                                    <a href="{{ route('student.course') }}">
                                        Kelas
                                    </a>
                                </p>
                            </div>

                            <div class="item {{ request()->is('student/setting') ? 'active' : '' }}">
                                <i class="fa fa-cog"></i>
                                <p>
                                    <a href="{{ route('student.setting') }}">
                                        Pengaturan Profil
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-lg-9 col-md-8 mt-5 mt-lg-0">
                {{ $slot }}
            </div>
        </div>
    </div>

    <x-ui.app-footer />


    @stack('addonScript')
</body>

</html>
