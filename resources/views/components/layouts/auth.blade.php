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
    <!--================= style css =================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app/css/style.css') }}">
    <!--================= Custom Spacing css =================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app/css/custom-spacing.css') }}">
    <!--================= Responsive css =================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('app/css/responsive.css') }}">
</head>

<body>
    <!--================= Wrapper Start Here =================-->
    <div class="react-wrapper">
        <div class="react-wrapper-inner">
            <div class="react-login-page react-signup-page pt---120 pb---120">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="login-right-form">
                                {{ $slot }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--================= Wrapper End Here =================-->
</body>

</html>
