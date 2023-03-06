    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="theme-color" content="#202342">

    <title>{{$PageTitle}} {{($PageTitle !="")? "|":""}} {{ Helper::GeneralSiteSettings("site_title_" . @Helper::currentLanguage()->code) }}</title>
    <meta name="description" content="{{$PageDescription}}" />
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1" />
	<meta property="fb:app_id" content="174562087980884" />
    <meta property="og:url" content="{{ Request::fullUrl() }}" />
    <meta property="og:title" content="{{$PageTitle}}" />
    <meta property="og:description" content="{{$PageDescription}}" />
    <meta property="og:locale" content="pt_BR" />

    @if(isset($Topic) and $Topic->photo_file)
    <meta property="og:type" content="article" />
    <meta property="og:image" content="{{ URL::to($Topic->photo_file) }}" />
    @else
    <meta property="og:type" content="website" />
    <meta property="og:image" content="{{ global_asset('assets/app/images/logo/eigrejas.png') }}" />
    <meta property="og:image:width" content="600" />
    <meta property="og:image:height" content="600" />
    @endif

    <meta property="article:publisher" content="https://www.facebook.com/eigrejas.app.br/" />
    @if(isset($Topic) and $Topic->date)
    <meta property="article:published_time" content="{{ Helper::formatDateC($Topic->date)  }}" />
    @endif

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
    
    <!-- Facebook Pixel -->
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window, document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '551615982528687');
        fbq('track', 'PageView');
    </script>
    <!-- End Facebook Pixel -->