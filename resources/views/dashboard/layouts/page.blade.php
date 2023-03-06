<!DOCTYPE html>
<html>

<head itemtype="http://schema.org/WPHeader" itemscope>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="theme-color" content="#202342">

    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{ global_asset('assets/app/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ global_asset('assets/app/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ global_asset('assets/app/css/animate.css') }}">
    <link rel="stylesheet" href="{{ global_asset('assets/app/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ global_asset('assets/app/css/owl.min.css') }}">
    <link rel="stylesheet" href="{{ global_asset('assets/app/css/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ global_asset('assets/app/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ global_asset('assets/app/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ global_asset('assets/app/css/main.css') }}">

    <link rel="icon" href="{{ global_asset('assets/app/images/favicon.png') }}" type="image/x-icon">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ global_asset('assets/app/images/icon-180.png') }}">
    <link rel="manifest" href="{{ global_asset('assets/app/manifest.webmanifest') }}">
</head>

<body data-spy="scroll" data-target="#faq-menu" data-offset="150">
    <!--============= ScrollToTop Section Starts Here =============-->
    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <a href="#0" class="scrollToTop"><i class="fas fa-angle-up"></i></a>
    <div class="overlay"></div>
    <!--============= ScrollToTop Section Ends Here =============-->

    <!--============= Header Section Starts Here =============-->
    <!-- <header class="header-section" itemtype="http://schema.org/WPHeader" itemscope>
        <div class="container">
            <div class="header-wrapper">
                <div class="logo">
                    <a href="/">
                        <img id="logo" src="{{ global_asset('assets/app/images/logo/logo.png') }}" alt="logo e-igrejas" itemtype="http://schema.org/Organization" itemscope>
                    </a>
                </div>
            </div>
        </div>
    </header> -->
    <!--============= Header Section Ends Here =============-->

    @yield('content')

    <script src="{{ global_asset('assets/app/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ global_asset('assets/app/js/modernizr-3.6.0.min.js') }}"></script>
    <script src="{{ global_asset('assets/app/js/plugins.js') }}"></script>
    <script src="{{ global_asset('assets/app/js/bootstrap.min.js') }}"></script>
    <script src="{{ global_asset('assets/app/js/magnific-popup.min.js') }}"></script>
    <script src="{{ global_asset('assets/app/js/jquery-ui.min.js') }}"></script>
    <script src="{{ global_asset('assets/app/js/wow.min.js') }}"></script>
    <script src="{{ global_asset('assets/app/js/waypoints.js') }}"></script>
    <script src="{{ global_asset('assets/app/js/nice-select.js') }}"></script>
    <script src="{{ global_asset('assets/app/js/owl.min.js') }}"></script>
    <script src="{{ global_asset('assets/app/js/counterup.min.js') }}"></script>
    <script src="{{ global_asset('assets/app/js/paroller.js') }}"></script>
    <script src="{{ global_asset('assets/app/js/main.js') }}"></script>

</body>

</html>