@extends('dashboard.layouts.page')
@section('title', "404")

@section('content')
    <!--============= Error In Section Starts Here =============-->
    <div class="error-section bg_img" data-background="{{ global_asset('assets/app/images/404/404-bg.jpg') }}">
        <div class="container">
            <div class="man1">
                <img src="{{ global_asset('assets/app/images/404/man_01.png') }}" alt="404" class="wow bounceInUp" data-wow-duration=".5s" data-wow-delay=".5s">
            </div>
            <div class="man2">
                <img src="{{ global_asset('assets/app/images/404/man_02.png') }}" alt="404" class="wow bounceInUp" data-wow-duration=".5s">
            </div>
            <div class="error-wrapper wow bounceInDown" data-wow-duration=".7s" data-wow-delay="1s">
                <h1 class="title">404</h1>
                <h3 class="subtitle">{{ __('backend.notFound') }}</h3>
                <a href="{{ URL::previous() }}" class="button-5">{{ __('backend.returnTo') }}</a>
            </div>
        </div>
    </div>
    <!--============= Error In Section Ends Here =============-->
@endsection