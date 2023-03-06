<!DOCTYPE html>

<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8">
    <title>{{$PageTitle}} {{($PageTitle !="")? "|":""}} {{ Helper::GeneralSiteSettings("site_title_" . @Helper::currentLanguage()->code) }}</title>
    <link href="{{ global_asset('assets/frontend/css/links.css') }}" rel="stylesheet"/>
    <!-- Favicon and Touch Icons -->
    @if(Helper::GeneralSiteSettings("style_fav") !="")
        <link href="{{ global_asset(Helper::GeneralSiteSettings('style_fav')) }}" rel="shortcut icon" type="image/png">
    @else
        <link href="{{ global_asset('uploads/settings/nofav.png') }}" rel="shortcut icon" type="image/png">
    @endif
</head>

<body>
    @if(Helper::GeneralSiteSettings("style_apple") !="")
        <img id="userPhoto" src="{{ global_asset(Helper::GeneralSiteSettings('style_fav')) }}">
    @else
        <img id="userPhoto" src="{{ URL::to('uploads/settings/nofav.png') }}">
    @endif

    @if(Helper::GeneralWebmasterSettings("social_menu_id") >0)
        <?php
        // Get list of footer menu links by group Id
        $FooterMenuLinks = Helper::MenuList(Helper::GeneralWebmasterSettings("social_menu_id"));
        ?>
        @if(count($FooterMenuLinks)>0)
            <div id="links">
                <?php
                $link_title_var = "title_" . @Helper::currentLanguage()->code;
                $link_title_var2 = "title_" . \Config::get('app.locale');
                $slug_var = "seo_url_slug_" . @Helper::currentLanguage()->code;
                $slug_var2 = "seo_url_slug_" . \Config::get('app.locale');
                ?>
                @foreach($FooterMenuLinks as $FooterMenuLink)
                    <?php
                    if ($FooterMenuLink->$link_title_var != "") {
                        $link_title = $FooterMenuLink->$link_title_var;
                    } else {
                        $link_title = $FooterMenuLink->$link_title_var2;
                    }
                    ?>
                    @if($FooterMenuLink->type==3 || $FooterMenuLink->type==2)
                        {{-- Get Section Name as a link --}}
                        <a class="link" href="{{ Helper::sectionURL($FooterMenuLink->cat_id) }}">{{ $link_title }}</a>
                    @elseif($FooterMenuLink->type==1)
                        {{-- Direct link --}}
                        <?php
                        if (@Helper::currentLanguage()->code != \Config::get('app.locale')) {
                            $f3c = mb_substr($FooterMenuLink->link, 0, 3);
                            if ($f3c == "htt" || $f3c == "www") {
                                $this_link_url = $FooterMenuLink->link;
                            } else {
                                $this_link_url = url(@Helper::currentLanguage()->code . "/" . $FooterMenuLink->link);
                            }
                        } else {
                            $this_link_url = url($FooterMenuLink->link);
                        }
                        ?>
                        <a class="link" href="{{ $this_link_url }}">{{ $link_title }}</a>
                    @endif
                @endforeach
            </div>
        @endif
    @endif
</body>
</html>