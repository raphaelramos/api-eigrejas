<?php
$title_var = "title_" . @Helper::currentLanguage()->code;
$title_var2 = "title_" . \Config::get('app.locale');
if ($WebmasterSection->$title_var != "") {
    $WebmasterSectionTitle = $WebmasterSection->$title_var;
} else {
    $WebmasterSectionTitle = $WebmasterSection->$title_var2;
}
?>
@extends('dashboard.layouts.master')
@section('title', __('backend.sectionsOf')." ".$WebmasterSectionTitle)
@push("after-styles")
    <link href="{{ global_asset('assets/dashboard/js/fontawesome-icon-browser-picker/fontawesome-browser.css') }}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
@endpush
@section('content')
    <div class="padding">
        <div class="box">
            <div class="box-header dker">
                <?php
                $title_var = "title_" . @Helper::currentLanguage()->code;
                $title_var2 = "title_" . \Config::get('app.locale');
                if ($WebmasterSection->$title_var != "") {
                    $WebmasterSectionTitle = $WebmasterSection->$title_var;
                } else {
                    $WebmasterSectionTitle = $WebmasterSection->$title_var2;
                }
                ?>
                <h3><i class="material-icons">&#xe02e;</i> {{ __('backend.categoryNew') }}</h3>
                <small>
                    <a href="{{ route('adminHome') }}">{{ __('backend.home') }}</a> /
                    <a>{!! $WebmasterSectionTitle !!}</a> /
                    <a>{{ __('backend.sectionsOf') }}  {!! $WebmasterSectionTitle !!}</a>
                </small>
            </div>
            <div class="box-tool">
                <ul class="nav">
                    <li class="nav-item inline mr-sm-2">
                        <a class="nav-link" href="{{ route('categories',$WebmasterSection->id) }}">
                            <i class="material-icons md-18">×</i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="box-body">
                {{Form::open(['route'=>['categoriesStore',$WebmasterSection->id],'method'=>'POST', 'files' => true ])}}

                @if($WebmasterSection->sections_status==2)
                    <div class="form-group row">
                        <label for="father_id"
                               class="col-md-2 form-control-label">{!!  __('backend.categoryFather') !!} </label>
                        <div class="col-md-10">
                            <select name="father_id" id="father_id" class="form-control c-select">
                                <option value="0">- - {!!  __('backend.categoryNoFather') !!} - -</option>
                                <?php
                                $title_var = "title_" . @Helper::currentLanguage()->code;
                                $title_var2 = "title_" . \Config::get('app.locale');
                                ?>
                                @foreach ($fatherSections as $fatherSection)
                                    <?php
                                    if ($fatherSection->$title_var != "") {
                                        $title = $fatherSection->$title_var;
                                    } else {
                                        $title = $fatherSection->$title_var2;
                                    }
                                    ?>
                                    <option value="{{ $fatherSection->id  }}">{{ $title }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                @else
                    {!! Form::hidden('father_id','0') !!}
                @endif

                @foreach(Helper::languagesList() as $ActiveLanguage)
                    @if($ActiveLanguage->box_status)
                        <div class="form-group row">
                            <label
                                class="col-md-2 form-control-label">{!!  __('backend.categoryName') !!} {!! @Helper::languageName($ActiveLanguage) !!}
                            </label>
                            <div class="col-md-10">
                                {!! Form::text('title_'.@$ActiveLanguage->code,'', array('placeholder' => '','class' => 'form-control','required'=>'', 'dir'=>@$ActiveLanguage->direction)) !!}
                            </div>
                        </div>
                    @endif
                @endforeach

                <div class="form-group row">
                    <label for="photo"
                           class="col-md-2 form-control-label">{!!  __('backend.bannerPhoto') !!}</label>
                    <div class="col-md-10">
                        {!! Form::file('photo', array('class' => 'form-control','id'=>'photo','accept'=>'image/*')) !!}
                    </div>
                </div>

                <div class="form-group row m-t-md" style="margin-top: 0 !important;">
                    <div class="offset-sm-2 col-md-10">
                        <small>
                            <i class="material-icons">&#xe8fd;</i>
                            {!!  __('backend.imagesTypes') !!}
                        </small>
                    </div>
                </div>

                @if($WebmasterSection->section_icon_status)
                    <div class="form-group row">
                        <label for="icon"
                               class="col-md-2 form-control-label">{!!  __('backend.sectionIcon') !!}</label>
                        <div class="col-md-10">
                            <div class="input-group">
                                {!! Form::text('icon','', array('placeholder' => '','class' => 'form-control','id'=>'icon', 'data-fa-browser')) !!}
                                <span class="input-group-prepend"></span>
                            </div>
                        </div>
                    </div>
                @endif


                <div class="form-group row m-t-md">
                    <div class="offset-sm-2 col-md-10">
                        <button type="submit" class="btn btn-primary m-t"><i class="material-icons">
                                &#xe31b;</i> {!! __('backend.add') !!}</button>
                        <a href="{{ route('categories',$WebmasterSection->id) }}"
                           class="btn btn-default m-t"><i class="material-icons">
                                &#xe5cd;</i> {!! __('backend.cancel') !!}</a>
                    </div>
                </div>

                {{Form::close()}}
            </div>
        </div>
    </div>
@endsection
@push("after-scripts")
    <script src="{{ global_asset('assets/dashboard/js/fontawesome-icon-browser-picker/fontawesome-browser.js') }}"></script>
    <script>
        $(function () {
            $.fabrowser();
        });
    </script>
@endpush
