<meta charset="utf-8">
<title>{{$PageTitle}} {{($PageTitle !="")? "|":""}} {{ Helper::GeneralSiteSettings("site_title_" . @Helper::currentLanguage()->code) }}</title>
<meta name="description" content="{{$PageDescription}}"/>

<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<meta name="robots" content="noimageindex">

<meta property="fb:app_id" content="174562087980884" />
<meta property="og:url" content="{{ Request::fullUrl() }}" />
<meta property="og:title" content="{{$PageTitle}}" />
<meta property="og:description" content="{{$PageDescription}}" />

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

<link rel="canonical" href="{{ Helper::GeneralSiteSettings('site_url') }}<?= $_SERVER['REQUEST_URI'] ?>" />

@if(isset($Topic) and count(Helper::languagesList()) >1)
<!-- Check url by lang -->
@if(isset($Topic->seo_url_slug_pt))
<link rel="alternate" hreflang="pt" href="{{ URL::to($Topic->seo_url_slug_pt) }}" />
@endif
@if(isset($Topic->seo_url_slug_en))
<link rel="alternate" hreflang="en" href="{{ URL::to($Topic->seo_url_slug_en) }}" />
@endif
@if(isset($Topic->seo_url_slug_es))
<link rel="alternate" hreflang="es" href="{{ URL::to($Topic->seo_url_slug_es) }}" />
@endif
<!-- end check -->
@endif

<link rel="search" type="application/opensearchdescription+xml" title="Pesquisa {{ Helper::GeneralSiteSettings("site_title_" . @Helper::currentLanguage()->code) }}" href="opensearch.xml">
<link href="{{ global_asset('assets/frontend/css/bootstrap.min.css') }}" rel="stylesheet"/>
<link href="{{ global_asset('assets/frontend/css/fancybox/jquery.fancybox.css') }}" rel="stylesheet">
<link href="{{ global_asset('assets/frontend/css/jcarousel.css') }}" rel="stylesheet"/>
<link href="{{ global_asset('assets/frontend/css/flexslider.css') }}" rel="stylesheet"/>
<link href="{{ global_asset('assets/frontend/css/style.css?v=1') }}" rel="stylesheet"/>
<link href="{{ global_asset('assets/frontend/css/color.css') }}" rel="stylesheet"/>
<link href="{{ global_asset('assets/frontend/css/colors.css') }}" rel="stylesheet"/>
<link rel="stylesheet" href="{{ global_asset('css/app.css') }}" type="text/css"/>
<link rel="stylesheet" href="{{ global_asset('assets/frontend/js/owl-carousel/assets/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ global_asset('assets/frontend/js/owl-carousel/assets/owl.theme.default.min.css') }}">

@if( @Helper::currentLanguage()->direction=="rtl")
<link href="{{ global_asset('assets/frontend/css/rtl.css') }}" rel="stylesheet"/>
@endif

<!-- Favicon and Touch Icons -->
@if(Helper::GeneralSiteSettings("style_fav") !="")
    <link href="{{ global_asset(Helper::GeneralSiteSettings('style_fav')) }}" rel="shortcut icon" type="image/png">
@else
    <link href="{{ global_asset('uploads/settings/nofav.png') }}" rel="shortcut icon" type="image/png">
@endif
@if(Helper::GeneralSiteSettings("style_apple") !="")
    <link href="{{ global_asset(Helper::GeneralSiteSettings('style_apple')) }}" rel="apple-touch-icon" sizes="180x180">
@else
    <link href="{{ global_asset('uploads/settings/nofav.png') }}" rel="apple-touch-icon" sizes="180x180">
@endif

<meta property='og:title' content='{{$PageTitle}} {{($PageTitle =="")? Helper::GeneralSiteSettings("site_title_" . @Helper::currentLanguage()->code):""}}'/>
@if(@$Topic->photo_file !="")
    <meta property='og:image' content='{{ global_asset(@$Topic->photo_file) }}'/>
@elseif(Helper::GeneralSiteSettings("style_apple") !="")
    <meta property='og:image' content='{{ global_asset('uploads/settings/'.Helper::GeneralSiteSettings("style_apple")) }}'/>
@else
    <meta property='og:image' content='{{ global_asset('uploads/settings/nofav.png') }}'/>
@endif
<meta property="og:site_name" content="{{ Helper::GeneralSiteSettings("site_title_" . @Helper::currentLanguage()->code) }}">
<meta property="og:description" content="{{$PageDescription}}"/>
<meta property="og:url" content="{{ url()->full()  }}"/>
<meta property="og:type" content="website"/>

<script type="application/ld+json">
{
  "@context": "https://schema.org/",
  "@type": "WebSite",
  "name": "{{ Helper::GeneralSiteSettings("site_title_" . @Helper::currentLanguage()->code) }}",
  "url": "{{ url('')  }}",
  "potentialAction": {
    "@type": "SearchAction",
    "target": "{{ url('')  }}/search?q={search_term_string}",
    "query-input": "required name=search_term_string"
  }
}
</script>

@if(Helper::GeneralSiteSettings("css")!="")
    <style type="text/css">
        {!! Helper::GeneralSiteSettings("css") !!}
    </style>
@endif
{{-- Google Tags and google analytics --}}
@if($WebmasterSettings->google_tags_status && $WebmasterSettings->google_tags_id !="")
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','{!! $WebmasterSettings->google_tags_id !!}');</script>
    <!-- End Google Tag Manager -->
@endif
