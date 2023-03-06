@extends('frontEnd.app.layout')

@section('content')

    <?php
    $title_var = "title_" . @Helper::currentLanguage()->code;
    $title_var2 = "title_" . \Config::get('app.locale');
    $details_var = "details_" . @Helper::currentLanguage()->code;
    $details_var2 = "details_" . \Config::get('app.locale');
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
    ?>

    <!--============= Header Section Ends Here =============-->
    <section class="page-header single-header blog-single-header bg_img oh">
        <div class="bottom-shape">
            <img src="{{ global_asset('assets/app/css/img/page-header2.png') }}">
        </div>
    </section>
    <!--============= Header Section Ends Here =============-->


    
    <!--============= Blog Section Starts Here =============-->
    <section itemscope itemtype="https://schema.org/Article" class="blog-single-section padding-bottom">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <article>
                        <div class="post-details">
                            <div class="post-inner">
                                <div class="post-header">
                                    <div class="meta-post">
                                        <span itemprop="datePublished" content="{!! $Topic->date  !!}" class="read">
                                            {!! Helper::formatDate($Topic->date)  !!}
                                        </span>
                                    </div>
                                    <h3 itemprop="name" class="title">
                                        {{ $title }}
                                    </h3>
                                </div>
                                <div class="post-content">
                                    <!-- <div class="entry-meta">
                                        <div class="thumb">
                                            <a href="#0">
                                                <img src="{{ global_asset('assets/app/images/blog/author2.png') }}">
                                            </a>
                                        </div>
                                    </div> -->
                                    <div itemprop="articleBody" class="entry-content">
                                        {!! $Topic->$details !!}
                                    </div>
                                </div>
                            </div>
                            <div class="tags-area">
                                <ul class="social-icons">
                                    <li>
                                        <a href="{{ Helper::SocialShare('facebook', $PageTitle)}}">
                                            <i class="fab fa-facebook-f"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ Helper::SocialShare('twitter', $PageTitle)}}">
                                            <i class="fab fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ Helper::SocialShare('linkedin', $PageTitle)}}">
                                            <i class="fab fa-linkedin"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        @if($WebmasterSection->related_status)
                            @if(count($Topic->relatedTopics))
                                <div id="Related">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <br>
                                            <h4>{{ __('backend.relatedTopics') }}</h4>
                                            <div class="bottom-article newcomment">
                                                <?php
                                                $title_var = "title_" . @Helper::currentLanguage()->code;
                                                $title_var2 = "title_" . \Config::get('app.locale');
                                                $slug_var = "seo_url_slug_" . @Helper::currentLanguage()->code;
                                                $slug_var2 = "seo_url_slug_" . \Config::get('app.locale');
                                                ?>
                                                @foreach($Topic->relatedTopics as $relatedTopic)
                                                    <?php
                                                    if ($relatedTopic->topic->$title_var != "") {
                                                        $relatedTopic_title = $relatedTopic->topic->$title_var;
                                                    } else {
                                                        $relatedTopic_title = $relatedTopic->topic->$title_var2;
                                                    }
                                                    ?>
                                                    <div style="margin-bottom: 5px;">
                                                        <a href="{{ Helper::topicURL($relatedTopic->topic->id, '', 'app/') }}"><i
                                                                class="fa fa-bookmark-o"></i>&nbsp; {!! $relatedTopic_title !!}
                                                        </a>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endif

                    </article>
                </div>
            </div>
        </div>
    </section>
    <!--============= Blog Section Ends Here =============-->

@endsection