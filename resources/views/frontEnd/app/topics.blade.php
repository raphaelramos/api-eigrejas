@extends('frontEnd.app.layout')

@section('content')

    <!--============= Header Section Ends Here =============-->
    <section class="page-header bg_img oh" data-background="{{ global_asset('assets/app/images/page-header.png') }}">
        <div class="bottom-shape d-none d-md-block">
            <img src="{{ global_asset('assets/app/css/img/page-header.png') }}">
        </div>
        <div class="container">
            <div class="page-header-content cl-white">
                <h2 class="title">Blog</h2>
                <ul class="breadcrumb">
                    <li>
                        <a href="/">Home</a>
                    </li>
                    <li>
                        Blog
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <!--============= Header Section Ends Here =============-->

     <!--============= Blog Section Starts Here =============-->
     <section class="blog-section padding-top padding-bottom">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <article class="mb-40-none">
                        @if($Topics->total() == 0)
                            <div class="alert alert-warning">
                                {{ __('frontend.noData') }}
                            </div>
                        @endif
                        <?php
                            $title_var = "title_" . @Helper::currentLanguage()->code;
                            $title_var2 = "title_" . \Config::get('app.locale');
                            $details_var = "details_" . @Helper::currentLanguage()->code;
                            $details_var2 = "details_" . \Config::get('app.locale');
                            $slug_var = "seo_url_slug_" . @Helper::currentLanguage()->code;
                            $slug_var2 = "seo_url_slug_" . \Config::get('app.locale');
                            $i = 0;
                        ?>
                        @foreach($Topics as $Topic)
                            <?php
                            if ($Topic->$title_var != "") {
                                $title = $Topic->$title_var;
                            } else {
                                $title = $Topic->$title_var2;
                            }
                            if ($Topic->$details_var != "") {
                                $details = $details_var;
                            } else {
                                $details = $details_var2;
                            }
                            $section = "";
                            try {
                                if ($Topic->section->$title_var != "") {
                                    $section = $Topic->section->$title_var;
                                } else {
                                    $section = $Topic->section->$title_var2;
                                }
                            } catch (Exception $e) {
                                $section = "";
                            }
                            $topic_link_url = Helper::topicURL($Topic->id, "", "app/");
                            ?>
                            <div class="post-item">
                                <div class="post-thumb">
                                    <a href="{{ $topic_link_url }}">
                                        <img src="{{ URL::to($Topic->photo_file) }}" alt="{{ $title }}">
                                    </a>
                                </div>
                                <div class="post-content">
                                    <h3 class="title">
                                        <a href="{{ $topic_link_url }}">{{ $title }}</a>
                                    </h3>
                                    <p>{!! mb_substr(strip_tags($Topic->$details),0, 300)."..." !!}</p>
                                </div>
                            </div>
                        @endforeach
                    </article>
                    <div class="pagination-area text-center pt-50 pb-50 pb-lg-none">
                    {{ $Topics->firstItem() }} - {{ $Topics->lastItem() }} {{ __('backend.of') }}
                        ( {{ $Topics->total()  }} ) {{ __('backend.records') }}
                    </div>
                </div>
                <div class="col-lg-4 col-md-8 col-sm-10">
                    <aside class="sticky-menu">
                        <div class="widget widget-search">
                            {{Form::open(['route'=>['searchHomeTopics'],'method'=>'GET','class'=>'search-form'])}}
                                {!! Form::text('q',@$q, array('placeholder' => __('frontend.search'),'id'=>'search_word','required'=>'')) !!}
                                <button type="submit"><i class="flaticon-loupe"></i>Pesquisar</button>
                            {{Form::close()}}
                        </div>

                        @if(count($TopicsMostViewed)>0)
                            <?php
                            $side_title_var = "title_" . @Helper::currentLanguage()->code;
                            $side_title_var2 = "title_" . \Config::get('app.locale');
                            $slug_var = "seo_url_slug_" . @Helper::currentLanguage()->code;
                            $slug_var2 = "seo_url_slug_" . \Config::get('app.locale');
                            ?>
                            <div class="widget widget-post">
                                <h5 class="title">{{ __('frontend.mostViewed') }}</h5>
                                <div class="slider-nav">
                                    <span class="widget-prev"><i class="fas fa-angle-left"></i></span>
                                    <span class="widget-next active"><i class="fas fa-angle-right"></i></span>
                                </div>
                                <div class="widget-slider owl-carousel owl-theme">
                                    @foreach($TopicsMostViewed as $TopicMostViewed)
                                        <?php
                                        if ($TopicMostViewed->$side_title_var != "") {
                                            $side_title = $TopicMostViewed->$side_title_var;
                                        } else {
                                            $side_title = $TopicMostViewed->$side_title_var2;
                                        }
                                        $topic_link_url = Helper::topicURL($TopicMostViewed->id, "", "app/");
                                        ?>
                                        <div class="item">
                                            <div class="thumb">
                                                <a href="{{ $topic_link_url }}">
                                                    <img src="{{ URL::to($TopicMostViewed->photo_file) }}" alt="{{ $side_title }}">
                                                </a>
                                            </div>
                                            <div class="content">
                                                <h6 class="p-title">
                                                    <a href="{{ $topic_link_url }}">{{ $side_title }}</a>
                                                </h6>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                        
                        <!-- @if(count($Categories)>0)
                            <div class="widget widget-categories">
                                <h5 class="title">Categorias</h5>
                                @foreach($Categories as $Category)
                                    <?php $active_cat = ""; ?>
                                    @if($CurrentCategory!="none")
                                        @if(!empty($CurrentCategory))
                                            @if($Category->id == $CurrentCategory->id)
                                                <?php $active_cat = "class=active"; ?>
                                            @endif
                                        @endif
                                    @endif
                                    <?php
                                        if ($Category->$title_var != "") {
                                            $Category_title = $Category->$title_var;
                                        } else {
                                            $Category_title = $Category->$title_var2;
                                        }
                                        $ccount = $category_and_topics_count[$Category->id];
                                    ?>
                                    
                                    @if($Category->icon !="")
                                        <i class="fa {{$Category->icon}}"></i> &nbsp;
                                    @endif
                                    <li>
                                    <a {{ $active_cat }} href="{{ Helper::categoryURL($Category->id) }}">{{ $Category_title }}</a><span
                                        class="pull-right">({{ $ccount }})</span></li>
                                    @foreach($Category->fatherSections as $MnuCategory)
                                        <?php $active_cat = ""; ?>
                                        @if($CurrentCategory!="none")
                                            @if(!empty($CurrentCategory))
                                                @if($MnuCategory->id == $CurrentCategory->id)
                                                    <?php $active_cat = "class=active"; ?>
                                                @endif
                                            @endif
                                        @endif
                                        <?php
                                        if ($MnuCategory->$title_var != "") {
                                            $MnuCategory_title = $MnuCategory->$title_var;
                                        } else {
                                            $MnuCategory_title = $MnuCategory->$title_var2;
                                        }
                                        $ccount = $category_and_topics_count[$MnuCategory->id];
                                        ?>
                                        <li> &nbsp; &nbsp; &nbsp;
                                            @if($MnuCategory->icon !="")
                                                <i class="fa {{$MnuCategory->icon}}"></i> &nbsp;
                                            @endif
                                            <a href="{{ Helper::categoryURL($MnuCategory->id, '', 'app/') }}">{{ $MnuCategory_title }}</a>
                                            <span class="pull-right">&nbsp;({{ $ccount }})</span>
                                        </li>
                                    @endforeach

                                @endforeach
                            </div>
                        @endif -->

                    </aside>
                </div>
            </div>
        </div>
    </section>
    <!--============= Blog Section Ends Here =============-->

@endsection