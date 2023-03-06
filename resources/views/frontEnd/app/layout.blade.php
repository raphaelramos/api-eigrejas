<!DOCTYPE html>
<html lang="pt-BR" prefix="og: https://ogp.me/ns# fb: https://ogp.me/ns/fb#">

<head itemtype="https://schema.org/WPHeader" itemscope>
    @include('frontEnd.app.includes.head')
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
    <header class="header-section" itemtype="https://schema.org/WPHeader" itemscope>
        <div class="container">
            <div class="header-wrapper">
                <div class="logo">
                    <a href="/">
                        <img id="logo" src="{{ global_asset('assets/app/images/logo/logo.png') }}" alt="logo e-igrejas" itemtype="https://schema.org/Organization" itemscope>
                    </a>
                </div>

                <div class="header-right">
                    <!-- <select class="select-bar">
                        <option value="pt">Pt</option>
                    </select> -->
                    <!-- <a href="coming-soon" class="header-button d-none d-sm-inline-block">Entrar</a> -->
                </div>
            </div>
        </div>
    </header>
    <!--============= Header Section Ends Here =============-->

    @yield('content')

    @include('frontEnd.app.includes.footer')
    
    @stack('scripts')

</body>

</html>