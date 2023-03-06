<div class="tab-pane {{  ( Session::get('active_tab') == 'frontAppSettingsTab') ? 'active' : '' }}"
    id="tab-12">
    <div class="p-a-md"><h5>{!!  __('backend.frontAppSettings') !!}</h5></div>

    <div class="p-a-md col-lg-12">
        <div class="col-lg-6">

            <div class="form-group">
                <label>{{ __('backend.appMenu') }} : </label>
                <select name="app_menu_id" id="app_menu_id" class="form-control c-select">
                    <option value="0">- - {!!  __('backend.none') !!} - -</option>
                    <?php
                    $title_var = "title_" . @Helper::currentLanguage()->code;
                    $title_var2 = "title_" . \Config::get('app.locale');
                    ?>
                    @foreach ($ParentMenus as $ParentMenu)
                        <?php
                        if ($ParentMenu->$title_var != "") {
                            $title = $ParentMenu->$title_var;
                        } else {
                            $title = $ParentMenu->$title_var2;
                        }
                        ?>
                        <option
                            value="{{ $ParentMenu->id  }}" {{ ($ParentMenu->id == $WebmasterSetting->app_menu_id) ? "selected='selected'":""  }}>{{ $title }}</option>
                    @endforeach
                </select>
            </div>

            <!-- <div class="form-group">
                <label>{{ __('backend.appFooterMenu') }} : </label>
                <select name="app_footer_menu_id" id="app_footer_menu_id" class="form-control c-select">
                    <option value="0">- - {!!  __('backend.none') !!} - -</option>
                    <?php
                    $title_var = "title_" . @Helper::currentLanguage()->code;
                    $title_var2 = "title_" . \Config::get('app.locale');
                    ?>
                    @foreach ($ParentMenus as $ParentMenu)
                        <?php
                        if ($ParentMenu->$title_var != "") {
                            $title = $ParentMenu->$title_var;
                        } else {
                            $title = $ParentMenu->$title_var2;
                        }
                        ?>
                        <option
                            value="{{ $ParentMenu->id  }}" {{ ($ParentMenu->id == $WebmasterSetting->app_footer_menu_id) ? "selected='selected'":""  }}>{{ $title }}</option>
                    @endforeach
                </select>
            </div> -->

            <div class="form-group">
                <label>{{ __('backend.appSlideBanners') }} : </label>
                <select name="app_banners_section_id" id="app_banners_section_id"
                        class="form-control c-select">
                    <option value="0">- - {!!  __('backend.none') !!} - -</option>
                    @foreach ($WebmasterBanners as $WebmasterBanner)
                        <?php
                        if ($WebmasterBanner->$title_var != "") {
                            $WBTitle = $WebmasterBanner->$title_var;
                        } else {
                            $WBTitle = $WebmasterBanner->$title_var2;
                        }
                        ?>
                        <option
                            value="{{ $WebmasterBanner->id  }}" {{ ($WebmasterBanner->id == $WebmasterSetting->app_banners_section_id) ? "selected='selected'":""  }}>{!! $WBTitle !!}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>{!!  __('backend.appSectionsHome') !!}</label>
                {!! Form::text('app_sections',$WebmasterSetting->app_sections, array('id' => 'app_sections','class' => 'form-control', 'dir'=>trans('backLang.ltr'))) !!}
            </div>

        </div>
    </div>
</div>
