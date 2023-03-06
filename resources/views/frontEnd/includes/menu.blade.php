@if(Helper::GeneralWebmasterSettings("header_menu_id") >0)
    <?php
    // Get list of footer menu links by group Id
    $HeaderMenuLinks = Helper::MenuList(Helper::GeneralWebmasterSettings("header_menu_id"));
    ?>
    @if(count($HeaderMenuLinks)>0)

        <?php
        /// Current Full URL
        $fullPagePath = $_SERVER['REQUEST_URI'];
        // URL after Root Path EX: admin/home
        $urlAfterRoot = substr($fullPagePath,0,strrpos($fullPagePath,'/'));

        $category_title_var = "title_" . @Helper::currentLanguage()->code;
        $category_title_var2 = "title_" . \Config::get('app.locale');
        $slug_var = "seo_url_slug_" . @Helper::currentLanguage()->code;
        $slug_var2 = "seo_url_slug_" . \Config::get('app.locale');
        ?>
        <div class="navbar-collapse collapse ">
            <ul class="nav navbar-nav">
                @foreach($HeaderMenuLinks as $HeaderMenuLink)
                    <?php
                    if ($HeaderMenuLink->$category_title_var != "") {
                        $link_title = $HeaderMenuLink->$category_title_var;
                    } else {
                        $link_title = $HeaderMenuLink->$category_title_var2;
                    }
                    ?>
                    @if($HeaderMenuLink->type==3)
                        <?php
                        // Section with drop list
                        ?>
                        <li class="dropdown">
                            <a href="javascript:void(0)" class="dropdown-toggle " data-toggle="dropdown"
                               data-hover="dropdown"
                               data-delay="0" data-close-others="true">{{ $link_title }} <i
                                    class="fa fa-angle-down"></i></a>

                            @if(count($HeaderMenuLink->webmasterSection->sections) >0)
                                {{--categories drop down--}}
                                <ul class="dropdown-menu">
                                    @foreach($HeaderMenuLink->webmasterSection->sections as $MnuCategory)
                                        @if($MnuCategory->father_id ==0)
                                            @if($MnuCategory->status)
                                                <?php
                                                if ($MnuCategory->$category_title_var != "") {
                                                    $category_title = $MnuCategory->$category_title_var;
                                                } else {
                                                    $category_title = $MnuCategory->$category_title_var2;
                                                }
                                                ?>
                                                <li>
                                                    <a href="{{ Helper::categoryURL($MnuCategory->id) }}">
                                                        @if($MnuCategory->icon !="")
                                                            <i class="fa {{$MnuCategory->icon}}"></i> &nbsp;
                                                        @endif
                                                        {{ $category_title }}</a>
                                                </li>
                                            @endif
                                        @endif
                                    @endforeach
                                </ul>
                            @elseif(count($HeaderMenuLink->webmasterSection->topics) >0)
                                {{--topics drop down--}}
                                <ul class="dropdown-menu">
                                    @foreach($HeaderMenuLink->webmasterSection->topics as $MnuTopic)
                                        @if($MnuTopic->status)
                                            @if($MnuTopic->expire_date =='' || ($MnuTopic->expire_date !='' && $MnuTopic->expire_date >= date("Y-m-d")))
                                                <?php
                                                if ($MnuTopic->$category_title_var != "") {
                                                    $category_title = $MnuTopic->$category_title_var;
                                                } else {
                                                    $category_title = $MnuTopic->$category_title_var2;
                                                }
                                                ?>
                                                <li>
                                                    <a href="{{ Helper::topicURL($MnuTopic->id) }}">
                                                        @if($MnuTopic->icon !="")
                                                            <i class="fa {{$MnuTopic->icon}}"></i> &nbsp;
                                                        @endif
                                                        {{ $category_title }}</a>
                                                </li>
                                            @endif
                                        @endif
                                    @endforeach
                                </ul>
                            @endif

                        </li>
                    @elseif($HeaderMenuLink->type==2)
                        <?php
                        // Section Link
                        ?>
                        <li>
                            <a href="{{ Helper::sectionURL($HeaderMenuLink->cat_id) }}">{{ $link_title }}</a>
                        </li>
                    @elseif($HeaderMenuLink->type==1)
                        <?php
                        // Direct Link
                        $this_link_url = "";
                        if ($HeaderMenuLink->link != "") {
                            if (@Helper::currentLanguage()->code != \Config::get('app.locale')) {
                                $f3c = mb_substr($HeaderMenuLink->link, 0, 3);
                                if ($f3c == "htt" || $f3c == "www") {
                                    $this_link_url = $HeaderMenuLink->link;
                                } else {
                                    $this_link_url = url(@Helper::currentLanguage()->code . "/" . $HeaderMenuLink->link);
                                }
                            } else {
                                $this_link_url = url($HeaderMenuLink->link);
                            }
                        }
                        ?>

                        <li><a href="{{ $this_link_url }}">{{ $link_title }}</a></li>
                    @else
                        <?php
                        // Main title ( have drop down menu )
                        ?>
                        <li class="dropdown">
                            <a href="javascript:void(0)" class="dropdown-toggle " data-toggle="dropdown"
                               data-hover="dropdown"
                               data-delay="0" data-close-others="true">{{ $link_title }}</a>
                            @if(count($HeaderMenuLink->subMenus) >0)
                                <ul class="dropdown-menu">
                                    @foreach($HeaderMenuLink->subMenus as $subMenu)
                                        <?php
                                        if ($subMenu->$category_title_var != "") {
                                            $subMenu_title = $subMenu->$category_title_var;
                                        } else {
                                            $subMenu_title = $subMenu->$category_title_var2;
                                        }
                                        ?>
                                        @if($subMenu->type==3)
                                            <?php
                                            // sub menu - Section will drop list
                                            ?>
                                            <li><a href="javascript:void(0)" class="dropdown-toggle "
                                                   data-toggle="dropdown"
                                                   data-hover="dropdown" data-delay="0"
                                                   data-close-others="true">{{ $subMenu_title }}</a>
                                                <?php
                                                // make list
                                                // - check is categories list
                                                // - or pages list
                                                ?>

                                                @if(count($subMenu->webmasterSection->sections) >0)
                                                    {{--categories drop down--}}
                                                    <ul class="dropdown-menu">
                                                        @foreach($subMenu->webmasterSection->sections as $SubMnuCategory)
                                                            @if($SubMnuCategory->father_id ==0)
                                                                @if($SubMnuCategory->status)
                                                                    <?php
                                                                    if ($SubMnuCategory->$category_title_var != "") {
                                                                        $SubMnuCategory_title = $SubMnuCategory->$category_title_var;
                                                                    } else {
                                                                        $SubMnuCategory_title = $SubMnuCategory->$category_title_var2;
                                                                    }
                                                                    ?>
                                                                    <li>
                                                                        <a href="{{ Helper::categoryURL($SubMnuCategory->id) }}">
                                                                            @if($SubMnuCategory->icon !="")
                                                                                <i class="fa {{$SubMnuCategory->icon}}"></i>
                                                                                &nbsp;
                                                                            @endif
                                                                            {{ $SubMnuCategory_title }}</a>
                                                                    </li>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                    </ul>
                                                @elseif(count($subMenu->webmasterSection->topics) >0)
                                                    {{--topics drop down--}}
                                                    <ul class="dropdown-menu">
                                                        @foreach($subMenu->webmasterSection->topics as $SubMnuTopic)
                                                            @if($SubMnuTopic->status)
                                                                @if($SubMnuTopic->expire_date =='' || ($SubMnuTopic->expire_date !='' && $SubMnuTopic->expire_date >= date("Y-m-d")))
                                                                    <?php
                                                                    if ($SubMnuTopic->$category_title_var != "") {
                                                                        $SubMnuTopic_title = $SubMnuTopic->$category_title_var;
                                                                    } else {
                                                                        $SubMnuTopic_title = $SubMnuTopic->$category_title_var2;
                                                                    }
                                                                    ?>
                                                                    <li>
                                                                        <a href="{{ Helper::topicURL($SubMnuTopic->id) }}">{{ $SubMnuTopic_title }}</a>
                                                                    </li>
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                    </ul>
                                                @endif

                                            </li>
                                        @elseif($subMenu->type==2)
                                            <?php
                                            // sub menu - Section Link
                                            ?>
                                            <li>
                                                <a href="{{ Helper::sectionURL($subMenu->cat_id) }}">{{ $subMenu_title }}</a>
                                            </li>
                                        @elseif($subMenu->type==1)
                                        <?php
                                            // sub menu - Direct Link
                                            $this_link_url = "";
                                            if ($subMenu->link != "") {
                                                if (@Helper::currentLanguage()->code != \Config::get('app.locale')) {
                                                    $f3c = mb_substr($subMenu->link, 0, 3);
                                                    if ($f3c == "htt" || $f3c == "www") {
                                                        $this_link_url = $subMenu->link;
                                                    } else {
                                                        $this_link_url = url(@Helper::currentLanguage()->code . "/" . $subMenu->link);
                                                    }
                                                } else {
                                                    $this_link_url = url($subMenu->link);
                                                }
                                            }
                                            ?>
                                            <li><a href="{{ $this_link_url }}">{{ $subMenu_title }}</a>
                                            </li>
                                        @else
                                            <?php
                                            // sub menu - Main title ( have drop down menu )
                                            ?>
                                            <li><a href="javascript:void(0)">{{ $subMenu_title }}</a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            @endif
                        </li>
                    @endif
                @endforeach
            
                    <!-- login btn -->
                    @if(Helper::GeneralWebmasterSettings("dashboard_link_status"))
                        @if(Auth::check())
                            <li class="dropdown">
                                <a href="javascript:void(0)" class="dropdown-toggle"
                                data-toggle="dropdown"
                                data-hover="dropdown" data-delay="0"
                                data-close-others="true">
                                    {{ Auth::user()->name }}
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    @if(@Auth::user()->permissionsGroup->content_status)
                                        <li>
                                            <a class="dropdown-item" href="{{ route('adminHome') }}">
                                                <i class="fa fa-cog"></i> {{__('frontend.dashboard')}}
                                            </a>
                                        </li>
                                    @endif
                                    <li>
                                        <a class="dropdown-item" href="{{@Helper::adminUrl()}}">
                                            <i class="fa fa-cog"></i> {{__('frontend.panel')}}
                                        </a>
                                    </li>
                                    @if(Auth::user()->permissions ==0 || Auth::user()->permissions ==1)
                                        <li><a class="dropdown-item"
                                            href="{{ route('usersEdit',Auth::user()->id) }}"> <i
                                                class="fa fa-user"></i> {{ __('backend.profile') }}</a></li>
                                    @endif
                                    @if(Helper::GeneralWebmasterSettings("inbox_status"))
                                        @if(@Auth::user()->permissionsGroup->inbox_status)
                                            <li><a href="{{ route('webmails') }}" class="dropdown-item">
                                                <i class="fa fa-envelope"></i> {{ __('backend.siteInbox') }}
                                            </a></li>
                                        @endif
                                    @endif
                                    <li><a onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                                        class="dropdown-item" href="{{ url('/'.\Config::get('app.backend_path').'/logout') }}"><i
                                            class="fa fa-sign-out"></i> {{ __('backend.logout') }}</a></li>

                                    <form id="logout-form" action="{{ url('/'.\Config::get('app.backend_path').'/logout') }}" method="POST"
                                            style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </ul>
                            </li>
                        @else
                            <li>
                                <!-- <a href="{{ route('adminHome') }}">{{__('frontend.login')}}</a> -->
                                <a href="{{@Helper::adminUrl()}}">{{__('frontend.login')}}</a>
                            </li>
                        @endif
                    @endif
                    @if(count(Helper::languagesList()) >1)
                        <li class="dropdown">
                            <a href="javascript:void(0)" class="dropdown-toggle"
                                data-toggle="dropdown"
                                data-hover="dropdown" data-delay="0"
                                data-close-others="true">
                                @if(@Helper::currentLanguage()->icon !="")
                                    <img width="16px" src="{{ asset('assets/dashboard/images/flags/'.@Helper::currentLanguage()->icon.".svg") }}">
                                @endif
                                {{ @Helper::currentLanguage()->title }} <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu">
                                @foreach(Helper::languagesList() as $ActiveLanguage)
                                    <li>
                                        <a href="{{ URL::to('lang/'.$ActiveLanguage->code) }}">
                                            @if($ActiveLanguage->icon !="")
                                                <img width="16px"
                                                    src="{{ asset('assets/dashboard/images/flags/'.$ActiveLanguage->icon.".svg") }}">
                                            @endif
                                            {{ $ActiveLanguage->title }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endif
            </ul>
        </div>
    @endif
@endif
