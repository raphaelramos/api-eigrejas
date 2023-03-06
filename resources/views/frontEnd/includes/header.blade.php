@if (@Auth::check())
    @if(!Helper::GeneralSiteSettings("site_status"))
        <div class="text-center bg-warning">
            <div class="row m-b-0">
                <div class="h6">
                    {{__('backend.websiteClosedForVisitors')}}
                </div>
            </div>
        </div>
    @endif
@endif
<header>
    <div class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ route("Home") }}">
                    @if(Helper::GeneralSiteSettings("style_logo_" . @Helper::currentLanguage()->code) !="")
                        <img class="logo" alt="{{ Helper::GeneralSiteSettings("site_title_" . @Helper::currentLanguage()->code) }}" src="{{ URL::to(Helper::GeneralSiteSettings("style_logo_" . @Helper::currentLanguage()->code)) }}" itemtype="https://schema.org/Organization" itemscope>
                    @else
                        <img src="{{ URL::to('uploads/settings/nologo.png') }}" itemtype="https://schema.org/Organization" itemscope>
                    @endif

                </a>
            </div>
            @include('frontEnd.includes.menu')
        </div>
    </div>
</header>
