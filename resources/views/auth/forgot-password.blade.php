@extends('dashboard.layouts.auth')
@section('title', __('backend.forgotPassword'))
@section('content')
    <div class="center-block w-xxl p-t-3">
        <div class="p-a-md box-color r box-shadow-z4 text-color">
            <div class="text-center">
                @if(Helper::GeneralSiteSettings("style_logo_" . @Helper::currentLanguage()->code) !="")
                    <img class="app-logo" src="{{ Helper::GeneralSiteSettings('style_logo_' . @Helper::currentLanguage()->code) }}">
                @else
                    <img src="{{ URL::to('uploads/settings/nologo.png') }}">
                @endif
            </div>
            <div class="m-y text-muted text-center">
                {{ __('backend.forgotPassword') }}
            </div>
            <div class="text-muted text-left">
                <p class="text-xs m-t">{{ __('backend.enterYourEmail') }}</p>
            </div>
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <form name="reset" method="POST" action="{{ route('password.email') }}">
                {{ csrf_field() }}
                <div class="md-form-group"> 
                    <input type="email" name="email" value="{{ old('email') }}" class="md-input" required>
                    <label>{{ __('backend.yourEmail') }}</label>
                </div>
                @if(Session::has('errors'))
                    <div class="alert alert-danger m-b-0">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                        @foreach(Session::get('errors')->all() as $key=>$error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif
                <button type="submit" class="btn primary btn-block p-x-md">{{ __('backend.sendPasswordResetLink') }}</button>
            </form>

            <p id="alerts-container"></p>
            <div class="p-v-lg text-center">{{ __('backend.returnTo') }} <a href="{{ url('/'.\Config::get('app.backend_path').'/login') }}"
                                                                            class="text-primary _600">{{ __('backend.signIn') }}</a>
        </div>
        </div>
    </div>
@endsection

