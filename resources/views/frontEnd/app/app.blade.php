@extends('frontEnd.app.layout')

@section('content')

    <!--============= Header Section Starts Here =============-->
    <header class="header-section">
        <div class="container">
            <div class="header-wrapper">
                <div class="logo">
                    <a href="/">
                        <img src="{{ global_asset('assets/app/images/logo/logo.png') }}" alt="logo">
                    </a>
                </div>
                <div class="header-bar d-lg-none">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
    </header>
    <!--============= Header Section Ends Here =============-->


    <!--============= Banner Section Starts Here =============-->
    <section class="app-download-section">
        <div class="app-bg bg_img" data-background="{{ global_asset('assets/app/images/banner/app-bg.png') }}">
        </div>
        <div class="oh app-download">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="app-download-content cl-white">
                            <h5 class="cate">Um app. Várias igrejas.</h5>
                            <h1 class="title">Comuicação e Gestão</h1>
                            <p>
                                Conecte a sua Igreja
                            </p>
                            <div class="app-button-group">
                                <a href="{{\Config::get('front.play_store')}}" class="app-button">
                                    <img src="{{ global_asset('assets/app/images/button/google.png') }}" alt="button">
                                </a>
                                <a href="{{\Config::get('front.apple_store')}}" class="app-button">
                                    <img src="{{ global_asset('assets/app/images/button/apple.png') }}" alt="button">
                                </a>
                            </div>
                            <span class="joined">Junte-se ao time #eigrejas</span>
                            <h2 class="amount"><span class="counter">1,234</span></h2>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="banner-1-slider-wrapper">
                            <div class="banner-1-slider owl-carousel owl-theme">
                                <div class="banner-thumb">
                                    <img src="{{ global_asset('assets/app/images/banner/app/app1.png') }}" alt="banner">
                                </div>
                                <div class="banner-thumb">
                                    <img src="{{ global_asset('assets/app/images/banner/app/app2.png') }}" alt="banner">
                                </div>
                                <div class="banner-thumb">
                                    <img src="{{ global_asset('assets/app/images/banner/app/app3.png') }}" alt="banner">
                                </div>
                                <div class="banner-thumb">
                                    <img src="{{ global_asset('assets/app/images/banner/app/app1.png') }}" alt="banner">
                                </div>
                                <div class="banner-thumb">
                                    <img src="{{ global_asset('assets/app/images/banner/app/app2.png') }}" alt="banner">
                                </div>
                                <div class="banner-thumb">
                                    <img src="{{ global_asset('assets/app/images/banner/app/app3.png') }}" alt="banner">
                                </div>
                            </div>
                            <div class="ban-click">
                                <div class="thumb">
                                    <img src="{{ global_asset('assets/app/images/banner/click2.png') }}" alt="banner">
                                </div>
                                <span class="cl-white">Tela</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============= Banner Section Ends Here =============-->

@endsection