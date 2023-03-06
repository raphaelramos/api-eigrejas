<?php
// Current Full URL
$fullPagePath = $_SERVER['REQUEST_URI'];
// URL after Root Path EX: admin/home
$urlAfterRoot = substr($fullPagePath,0,strrpos($fullPagePath,'/'));
$mnu_title_var = "title_" . @Helper::currentLanguage()->code;
$mnu_title_var2 = "title_" . \Config::get('app.locale');
?>

<nav id="sidebar">
    <div class="sidebar-header">
        <!-- brand -->
        <a class="navbar-brand" href="{{ route('adminHome') }}">
            <img src="{{ asset('assets/dashboard/images/logo.png') }}" alt="Control">
            <span class=" inline">{{ __('backend.control') }}</span>
        </a>
        <!-- / brand -->
    </div>

    <ul class="list-unstyled navbar-nav menu" ui-nav>
        <!-- <li class="nav-header">
            <small class="text-muted">{{ __('backend.main') }}</small>
        </li> -->

        <li>
            <a href="{{@Helper::adminPanel()}}">
                <span class="nav-icon">
                    <i class="material-icons">&#xe0b8;</i>
                </span>
                <span>{{ __('backend.panel') }}</span>
            </a>
        </li>

        <li>
            <a href="{{ route('adminHome') }}" onclick="location.href='{{ route('adminHome') }}'">
                <span class="nav-icon">
                    <i class="material-icons">&#xe871;</i>
                </span>
                <span>{{ __('backend.dashboard') }}</span>
            </a>
        </li>

        @if(Helper::GeneralWebmasterSettings("analytics_status"))
            @if(@Auth::user()->permissionsGroup->analytics_status)
                <?php
                $currentFolder = "analytics"; // Put folder name here
                $PathCurrentFolder = substr($urlAfterRoot, 0, strlen($currentFolder));

                $currentFolder2 = "ip"; // Put folder name here
                $PathCurrentFolder2 = substr($urlAfterRoot, 0, strlen($currentFolder2));

                $currentFolder3 = "visitors"; // Put folder name here
                $PathCurrentFolder3 = substr($urlAfterRoot, 0, strlen($currentFolder3));
                ?>
                <li {{ ($PathCurrentFolder==$currentFolder || $PathCurrentFolder2==$currentFolder2  || $PathCurrentFolder3==$currentFolder3) ? 'class=active' : '' }}>
                    <a href="#analyticsMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <span class="nav-icon">
                            <i class="material-icons">&#xe01b;</i>
                        </span>
                        <span>{{ __('backend.visitorsAnalytics') }}</span>
                    </a>
                    <ul class="collapse list-unstyled" id="analyticsMenu">
                        <li>
                            <a onclick="location.href='{{ route('analytics', 'date') }}'">
                                <span>{{ __('backend.visitorsAnalyticsBydate') }}</span>
                            </a>
                        </li>

                        <?php
                        $currentFolder = "analytics/country"; // Put folder name here
                        $PathCurrentFolder = substr($urlAfterRoot, 0, strlen($currentFolder));
                        ?>
                        <li {{ ($PathCurrentFolder==$currentFolder) ? 'class=active' : '' }}>
                            <a onclick="location.href='{{ route('analytics', 'country') }}'">
                                <span
                                    >{{ __('backend.visitorsAnalyticsByCountry') }}</span>
                            </a>
                        </li>

                        <?php
                        $currentFolder = "analytics/city"; // Put folder name here
                        $PathCurrentFolder = substr($urlAfterRoot, 0, strlen($currentFolder));
                        ?>
                        <li {{ ($PathCurrentFolder==$currentFolder) ? 'class=active' : '' }}>
                            <a onclick="location.href='{{ route('analytics', 'city') }}'">
                                <span
                                    >{{ __('backend.visitorsAnalyticsByCity') }}</span>
                            </a>
                        </li>

                        <?php
                        $currentFolder = "analytics/os"; // Put folder name here
                        $PathCurrentFolder = substr($urlAfterRoot, 0, strlen($currentFolder));
                        ?>
                        <li {{ ($PathCurrentFolder==$currentFolder) ? 'class=active' : '' }}>
                            <a onclick="location.href='{{ route('analytics', 'os') }}'">
                                <span
                                    >{{ __('backend.visitorsAnalyticsByOperatingSystem') }}</span>
                            </a>
                        </li>

                        <?php
                        $currentFolder = "analytics/browser"; // Put folder name here
                        $PathCurrentFolder = substr($urlAfterRoot, 0, strlen($currentFolder));
                        ?>
                        <li {{ ($PathCurrentFolder==$currentFolder) ? 'class=active' : '' }}>
                            <a onclick="location.href='{{ route('analytics', 'browser') }}'">
                                <span
                                    >{{ __('backend.visitorsAnalyticsByBrowser') }}</span>
                            </a>
                        </li>

                        <?php
                        $currentFolder = "analytics/referrer"; // Put folder name here
                        $PathCurrentFolder = substr($urlAfterRoot, 0, strlen($currentFolder));
                        ?>
                        <li {{ ($PathCurrentFolder==$currentFolder) ? 'class=active' : '' }}>
                            <a onclick="location.href='{{ route('analytics', 'referrer') }}'">
                                <span
                                    >{{ __('backend.visitorsAnalyticsByReachWay') }}</span>
                            </a>
                        </li>
                        <?php
                        $currentFolder = "analytics/hostname"; // Put folder name here
                        $PathCurrentFolder = substr($urlAfterRoot, 0, strlen($currentFolder));
                        ?>
                        <li {{ ($PathCurrentFolder==$currentFolder) ? 'class=active' : '' }}>
                            <a onclick="location.href='{{ route('analytics', 'hostname') }}'">
                                <span
                                    >{{ __('backend.visitorsAnalyticsByHostName') }}</span>
                            </a>
                        </li>
                        <?php
                        $currentFolder = "analytics/org"; // Put folder name here
                        $PathCurrentFolder = substr($urlAfterRoot, 0, strlen($currentFolder));
                        ?>
                        <li {{ ($PathCurrentFolder==$currentFolder) ? 'class=active' : '' }}>
                            <a onclick="location.href='{{ route('analytics', 'org') }}'">
                                <span
                                    >{{ __('backend.visitorsAnalyticsByOrganization') }}</span>
                            </a>
                        </li>
                        <?php
                        $currentFolder = "visitors"; // Put folder name here
                        $PathCurrentFolder = substr($urlAfterRoot, 0, strlen($currentFolder));
                        ?>
                        <li {{ ($PathCurrentFolder==$currentFolder) ? 'class=active' : '' }}>
                            <a onclick="location.href='{{ route('visitors') }}'">
                                <span
                                    >{{ __('backend.visitorsAnalyticsVisitorsHistory') }}</span>
                            </a>
                        </li>
                        <?php
                        $currentFolder = "ip"; // Put folder name here
                        $PathCurrentFolder = substr($urlAfterRoot, 0, strlen($currentFolder));
                        ?>
                        <li {{ ($PathCurrentFolder==$currentFolder) ? 'class=active' : '' }}>
                            <a href="{{ route('visitorsIP') }}">
                                <span
                                    >{{ __('backend.visitorsAnalyticsIPInquiry') }}</span>
                            </a>
                        </li>


                    </ul>
                </li>
            @endif
        @endif
        @if(Helper::GeneralWebmasterSettings("newsletter_status"))
            @if(@Auth::user()->permissionsGroup->newsletter_status)
                <?php
                $currentFolder = "contacts"; // Put folder name here
                $PathCurrentFolder = substr($urlAfterRoot, 0, strlen($currentFolder));
                ?>
                <li {{ ($PathCurrentFolder==$currentFolder) ? 'class=active' : '' }}>
                    <a href="{{ route('contacts') }}">
                        <span class="nav-icon">
                            <i class="material-icons">&#xe7ef;</i>
                        </span>
                        <span>{{ __('backend.newsletter') }}</span>
                    </a>
                </li>
            @endif
        @endif

        @if(Helper::GeneralWebmasterSettings("inbox_status"))
            @if(@Auth::user()->permissionsGroup->inbox_status)
                <?php
                $currentFolder = "webmails"; // Put folder name here
                $PathCurrentFolder = substr($urlAfterRoot, 0, strlen($currentFolder));
                ?>
                <li {{ ($PathCurrentFolder==$currentFolder) ? 'class=active' : '' }}>
                    <a href="{{ route('webmails') }}">
                        <span class="nav-icon">
                            <i class="material-icons">&#xe156;</i>
                        </span>
                        <span>{{ __('backend.siteInbox') }}
                            @if( Helper::webmailsNewCount() >0)
                                <badge class="label label-sm warn">{{ Helper::webmailsNewCount() }}</badge>
                            @endif
                        </span>

                    </a>
                </li>
            @endif
        @endif

        @if(Helper::GeneralWebmasterSettings("calendar_status"))
            @if(@Auth::user()->permissionsGroup->calendar_status)
                <?php
                $currentFolder = "calendar"; // Put folder name here
                $PathCurrentFolder = substr($urlAfterRoot, 0, strlen($currentFolder));
                ?>
                <li {{ ($PathCurrentFolder==$currentFolder) ? 'class=active' : '' }}>
                    <a href="{{ route('calendar') }}" onclick="location.href='{{ route('calendar') }}'">
                        <span class="nav-icon">
                            <i class="material-icons">&#xe616;</i>
                        </span>
                        <span>{{ __('backend.calendar') }}</span>
                    </a>
                </li>
            @endif
        @endif
        <li class="nav-header ">
            <small class="text-muted">{{ __('backend.siteData') }}</small>
        </li>

        <?php
        $data_sections_arr = explode(",", Auth::user()->permissionsGroup->data_sections);
        ?>

        <!-- Banners -->
        @if(Helper::GeneralWebmasterSettings("banners_status"))
            @if(@Auth::user()->permissionsGroup->banners_status)
                <?php
                $currentFolder = "banners"; // Put folder name here
                $PathCurrentFolder = substr($urlAfterRoot, 0, strlen($currentFolder));
                ?>
                <li {{ ($PathCurrentFolder==$currentFolder) ? 'class=active' : '' }} >
                    <a href="{{ route('Banners') }}">
                        <span class="nav-icon">
                        <i class="material-icons">&#xe433;</i>
                        </span>
                        <span>{{ __('backend.adsBanners') }}</span>
                    </a>
                </li>
            @endif
        @endif

        <!-- Sections -->
        @foreach($GeneralWebmasterSections as $GeneralWebmasterSection)
            @if(in_array($GeneralWebmasterSection->id,$data_sections_arr))
                <?php
                if ($GeneralWebmasterSection->$mnu_title_var != "") {
                    $GeneralWebmasterSectionTitle = $GeneralWebmasterSection->$mnu_title_var;
                } else {
                    $GeneralWebmasterSectionTitle = $GeneralWebmasterSection->$mnu_title_var2;
                }

                $LiIcon = "&#xe2c8;";

                switch ($GeneralWebmasterSection->type) {
                    case 0:
                        $LiIcon = "&#xe2c8;";
                        break;
                    case 1:
                        $LiIcon = "&#xe251;";
                        break;
                    case 2:
                        $LiIcon = "&#xe63b;";
                        break;
                    case 3:
                        $LiIcon = "&#xe02c;";
                        break;
                    case 6:
                        $LiIcon = "&#xe63a;";
                        break;
                }

                switch ($GeneralWebmasterSection->id) {
                    case 1:
                        $LiIcon = "&#xe231;";
                        break;
                    case 2:
                        $LiIcon = "&#xe88f;";
                        break;
                    case 2:
                        $LiIcon = "&#xe050;";
                        break;
                    case 3:
                        $LiIcon = "&#xe307;";
                        break;
                    case 7:
                        $LiIcon = "&#xe02f;";
                        break;
                    case 8:
                        $LiIcon = "&#xe8f6;";
                        break;
                }

                // get 9 char after root url to check if is "webmaster"
                $is_webmaster = substr($urlAfterRoot, 0, 9);
                ?>
                @if($GeneralWebmasterSection->sections_status > 0 && @Auth::user()->permissionsGroup->view_status == 0)
                    <li {{ ($GeneralWebmasterSection->id == @$WebmasterSection->id && $is_webmaster != "webmaster") ? 'class=active' : '' }}>
                        <a href="#{!! $GeneralWebmasterSectionTitle !!}Menu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            <span class="nav-icon">
                                <i class="material-icons">{!! $LiIcon !!}</i>
                            </span>
                            <span>{!! $GeneralWebmasterSectionTitle !!}</span>
                        </a>
                        <ul class="collapse list-unstyled" id="{!! $GeneralWebmasterSectionTitle !!}Menu">
                            
                            <?php
                            $currentFolder = "topics"; // Put folder name here
                            $PathCurrentFolder = substr($urlAfterRoot,
                                (strlen($GeneralWebmasterSection->id) + 1), strlen($currentFolder));
                            ?>
                            <li {{ ($PathCurrentFolder==$currentFolder) ? 'class=active' : '' }} >
                                <a href="{{ route('topics',$GeneralWebmasterSection->id) }}">
                                    <span>{{ __('backend.all') }} {!! $GeneralWebmasterSectionTitle !!}</span>
                                </a>
                            </li>

                            @if($GeneralWebmasterSection->sections_status > 0)

                                <?php
                                $currentFolder = "categories"; // Put folder name here
                                $PathCurrentFolder = substr($urlAfterRoot,
                                    (strlen($GeneralWebmasterSection->id) + 1), strlen($currentFolder));
                                ?>
                                <li {{ ($PathCurrentFolder==$currentFolder) ? 'class=active' : '' }} >
                                    <a href="{{ route('categories',$GeneralWebmasterSection->id) }}">
                                        <span>{{ __('backend.sectionsOf') }} {{ $GeneralWebmasterSectionTitle }}</span>
                                    </a>
                                </li>
                            @endif

                        </ul>
                    </li>

                @else
                    <li {{ ($GeneralWebmasterSection->id== @$WebmasterSection->id) ? 'class=active' : '' }}>
                        <a href="{{ route('topics',$GeneralWebmasterSection->id) }}">
                            <span class="nav-icon">
                                <i class="material-icons">{!! $LiIcon !!}</i>
                            </span>
                            <span>{!! $GeneralWebmasterSectionTitle !!}</span>
                        </a>
                    </li>
                @endif
            @endif
        @endforeach


        @if(Helper::GeneralWebmasterSettings("settings_status"))
            @if(@Auth::user()->permissionsGroup->settings_status)
                <li class="nav-header ">
                    <small class="text-muted">{{ __('backend.settings') }}</small>
                </li>

                <?php
                $currentFolder = "settings"; // Put folder name here
                $PathCurrentFolder = substr($urlAfterRoot, 0, strlen($currentFolder));

                $currentFolder2 = "menus"; // Put folder name here
                $PathCurrentFolder2 = substr($urlAfterRoot, 0, strlen($currentFolder2));

                $currentFolder3 = "users"; // Put folder name here
                $PathCurrentFolder3 = substr($urlAfterRoot, 0, strlen($currentFolder2));
                ?>
                <li {{ ($PathCurrentFolder==$currentFolder || $PathCurrentFolder2==$currentFolder2 || $PathCurrentFolder3==$currentFolder3 ) ? 'class=active' : '' }}>
                    <a href="#settingsMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <span class="nav-icon">
                            <i class="material-icons">&#xe8b8;</i>
                        </span>
                        <span>{{ __('backend.generalSiteSettings') }}</span>
                    </a>
                    <ul class="collapse list-unstyled" id="settingsMenu">
                        <?php
                        $currentFolder = "settings"; // Put folder name here
                        $PathCurrentFolder = substr($urlAfterRoot, 0, strlen($currentFolder));
                        ?>
                        <li {{ ($PathCurrentFolder==$currentFolder) ? 'class=active' : '' }}>
                            <a href="{{ route('settings') }}"
                                onclick="location.href='{{ route('settings') }}'">
                                <span>{{ __('backend.customize') }}</span>
                            </a>
                        </li>
                        <?php
                        $currentFolder = "menus"; // Put folder name here
                        $PathCurrentFolder = substr($urlAfterRoot, 0, strlen($currentFolder));
                        ?>
                        <li {{ ($PathCurrentFolder==$currentFolder) ? 'class=active' : '' }}>
                            <a href="{{ route('menus') }}">
                                <span>{{ __('backend.siteMenus') }}</span>
                            </a>
                        </li>
                        <?php
                        $currentFolder = "users"; // Put folder name here
                        $PathCurrentFolder = substr($urlAfterRoot, 0, strlen($currentFolder));
                        ?>
                        <li {{ ($PathCurrentFolder==$currentFolder) ? 'class=active' : '' }}>
                            <a href="{{ route('users') }}">
                                <span>{{ __('backend.usersPermissions') }}</span>
                            </a>
                        </li>
                    </ul>
                </li>
            @endif
        @endif


        @if(@Auth::user()->permissionsGroup->webmaster_status)
            <?php
            $currentFolder = "webmaster"; // Put folder name here
            $PathCurrentFolder = substr($urlAfterRoot, 0, strlen($currentFolder));
            ?>
            <li {{ ($PathCurrentFolder==$currentFolder) ? 'class=active' : '' }}>
                <a href="#webmasterToolsMenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <span class="nav-icon">
                        <i class="material-icons">&#xe8be;</i>
                    </span>
                    <span>{{ __('backend.webmasterTools') }}</span>
                </a>
                <ul class="collapse list-unstyled" id="webmasterToolsMenu">
                    <?php
                    $PathCurrentSubFolder = substr($urlAfterRoot, 0, (strlen($currentFolder) + 1));
                    ?>
                    <li {{ ($PathCurrentFolder==$PathCurrentSubFolder) ? 'class=active' : '' }}>
                        <a href="{{ route('webmasterSettings') }}"
                            onclick="location.href='{{ route('webmasterSettings') }}'">
                            <span>{{ __('backend.generalSettings') }}</span>
                        </a>
                    </li>
                    <?php
                    $currentSubFolder = "sections"; // Put folder name here
                    $PathCurrentSubFolder = substr($urlAfterRoot, (strlen($currentFolder) + 1),
                        strlen($currentSubFolder));
                    ?>
                    <li {{ ($PathCurrentSubFolder==$currentSubFolder) ? 'class=active' : '' }}>
                        <a href="{{ route('WebmasterSections') }}">
                            <span>{{ __('backend.siteSectionsSettings') }}</span>
                        </a>
                    </li>
                    <?php
                    $currentSubFolder = "banners"; // Put folder name here
                    $PathCurrentSubFolder = substr($urlAfterRoot, (strlen($currentFolder) + 1),
                        strlen($currentSubFolder));
                    ?>
                    <li {{ ($PathCurrentSubFolder==$currentSubFolder) ? 'class=active' : '' }}>
                        <a href="{{ route('WebmasterBanners') }}">
                            <span>{{ __('backend.adsBannersSettings') }}</span>
                        </a>
                    </li>

                </ul>
            </li>

        @endif
    </ul>
</nav>