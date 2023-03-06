<nav class="navbar navbar-expand-lg navbar-light white">
    <a id="sidebarCollapse" class="navbar-item float-left hidden-lg-up mr-sm-2">
        <i class="material-icons">&#xe5d2;</i>
    </a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <!-- link and dropdown -->
            @if(@Auth::user()->permissionsGroup->add_status)
                <li class="nav-item dropdown mr-sm-2">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-fw fa-plus text-muted"></i>
                        <span>{{ __('backend.new') }} </span>
                    </a>
                    <div class="dropdown-menu">
                        <?php
                        $data_sections_arr = explode(",", Auth::user()->permissionsGroup->data_sections);
                        $clr_ary = array("info", "danger", "success", "accent",);
                        $ik = 0;
                        $mnu_title_var = "title_" . @Helper::currentLanguage()->code;
                        $mnu_title_var2 = "title_" . \Config::get('app.locale');
                        ?>
                        @if(@Auth::user()->permissionsGroup->add_status)
                            @foreach($GeneralWebmasterSections as $headerWebmasterSection)
                                @if(in_array($headerWebmasterSection->id,$data_sections_arr))
                                    <?php
                                    if ($headerWebmasterSection->$mnu_title_var != "") {
                                        $GeneralWebmasterSectionTitle = $headerWebmasterSection->$mnu_title_var;
                                    } else {
                                        $GeneralWebmasterSectionTitle = $headerWebmasterSection->$mnu_title_var2;
                                    }
                                    $LiIcon = "&#xe2c8;";

                                    switch ($headerWebmasterSection->type) {
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
                                            $LiIcon = "&#xe405;";
                                            break;
                                        case 6:
                                            $LiIcon = "&#xe63a;";
                                            break;
                                    }

                                    switch ($headerWebmasterSection->id) {
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
                                    ?>
                                    <a class="dropdown-item" href="{{route("topicsCreate",$headerWebmasterSection->id)}}">
                                        <span><i class="material-icons">{!! $LiIcon !!}</i> &nbsp;{!! $GeneralWebmasterSectionTitle !!}</span>
                                    </a>
                                @endif
                            @endforeach

                            @if(@Auth::user()->permissionsGroup->banners_status)
                                <a class="dropdown-item" href="{{route("Banners")}}"><i class="material-icons">
                                        &#xe433;</i>
                                    &nbsp;{{ __('backend.adsBanners') }}</a>
                            @endif
                            <div class="dropdown-divider"></div>

                            @if(Helper::GeneralWebmasterSettings("newsletter_status"))
                                @if(@Auth::user()->permissionsGroup->newsletter_status)
                                    <a class="dropdown-item" href="{{route("contacts")}}"><i class="material-icons">
                                            &#xe7ef;</i>
                                        &nbsp;{{ __('backend.newContacts') }}</a>
                                @endif
                            @endif
                        @endif
                        @if(Helper::GeneralWebmasterSettings("inbox_status"))
                            @if(@Auth::user()->permissionsGroup->inbox_status)
                                <a class="dropdown-item" href="{{ route("webmails",["group_id"=>"create"]) }}">
                                    <i class="material-icons">&#xe0be;</i> &nbsp;{{ __('backend.compose') }}
                                </a>
                            @endif
                        @endif

                    </div>
                </li>
            @endif
            <!-- / -->
        </ul>
        <!-- Button to site -->
        <ul class="navbar-nav">
            <li class="nav-item p-t p-b mr-sm-2">
                <a class="btn btn-sm info marginTop2" href="{{ route("Home") }}"
                title="{{ __('backend.sitePreview') }}">
                    {{ __('backend.sitePreview') }}
                </a>
            </li>
        </ul>
        <!-- Alerts -->
        <ul class="navbar-nav">
            <?php
                $alerts = count(Helper::webmailsAlerts()) + count(Helper::eventsAlerts());
            ?>
            @if($alerts >0)
                <li class="nav-item dropdown mr-sm-2">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarAlertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="material-icons">&#xe7f5;</i>
                        @if($alerts >0) 
                            <span class="label label-sm up warn">{{ $alerts }}</span>
                        @endif
                    </a>
                    <div class="dropdown-menu no-bg no-border no-shadow" aria-labelledby="navbarAlertsDropdown">
                        <div class="box dark">
                            <div class="box p-a scrollable maxHeight320">
                                @foreach(Helper::webmailsAlerts() as $webmailsAlert)
                                    <span class="clear block">
                                        <small>{{ $webmailsAlert->from_name }}</small><br>
                                        <a class="dropdown-item" href="{{ route("webmailsEdit",["id"=>$webmailsAlert->id]) }}">{{ $webmailsAlert->title }}</a>
                                        <br>
                                        <small class="text-muted">
                                            {{ date('d M Y  h:i A', strtotime($webmailsAlert->date)) }}
                                        </small>
                                    </span>
                                @endforeach
                                @foreach(Helper::eventsAlerts() as $eventsAlert)
                                    <span class="clear block">
                                        <a class="dropdown-item" href="{{ route("calendarEdit",["id"=>$eventsAlert->id]) }}">{{ $eventsAlert->title }}</a>
                                        <br>
                                        <small class="text-muted">
                                            @if($eventsAlert->type ==3 || $eventsAlert->type ==2)
                                                {{ date('d M Y  h:i A', strtotime($eventsAlert->start_date)) }}
                                            @else
                                                {{ date('d M Y', strtotime($eventsAlert->start_date)) }}
                                            @endif
                                        </small>
                                    </span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </li>
            @endif
        </ul>
        <!-- User -->
        <ul class="navbar-nav">
            <li class="nav-item dropdown mr-sm-2">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="avatar w-32">
                        @if(Auth::user()->photo !="")
                            <img src="{{ asset('uploads/users/'.Auth::user()->photo) }}" alt="{{ Auth::user()->name }}"
                                title="{{ Auth::user()->name }}">
                        @else
                            <img src="{{ asset('uploads/contacts/profile.jpg') }}" alt="{{ Auth::user()->name }}"
                                title="{{ Auth::user()->name }}">
                        @endif
                        <i class="on b-white bottom"></i>
                    </span>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    @if(Helper::GeneralWebmasterSettings("inbox_status"))
                        @if(@Auth::user()->permissionsGroup->inbox_status)
                            <a class="dropdown-item"
                                href="{{ route('webmails') }}"><span>{{ __('backend.siteInbox') }}</span>
                                @if( Helper::webmailsNewCount() >0)
                                    <span class="label warn m-l-xs">{{ Helper::webmailsNewCount() }}</span>
                                @endif
                            </a>
                        @endif
                    @endif
                    @if(Auth::user()->permissions ==0 || Auth::user()->permissions ==1)
                        <a class="dropdown-item"
                            href="{{ route('usersEdit',Auth::user()->id) }}"><span>{{ __('backend.profile') }}</span></a>
                    @endif
                    <div class="dropdown-divider"></div>
                    <a onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                        class="dropdown-item" href="{{ url('/'.\Config::get('app.backend_path').'/logout') }}">{{ __('backend.logout') }}</a>

                    <form id="logout-form" action="{{ url('/'.\Config::get('app.backend_path').'/logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
            </li>
        </ul>
        <!-- Search -->
        {{Form::open(['route'=>['adminFind'],'method'=>'POST', 'role'=>'search', 'class' => "form-inline my-2 my-lg-0" ])}}
            <div class="form-group l-h m-a-0">
                <div class="input-group input-group-sm">
                    <input type="text" name="q" class="form-control rounded"
                    placeholder="{{ __('backend.search') }}..." aria-label="{{ __('backend.search') }}" required>
                </div>
            </div>
        {{Form::close()}}
    </div>
</nav>