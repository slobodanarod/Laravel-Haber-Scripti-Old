@extends("frontend.layout")
@section("content")
    <section class="no-padding hidden-xs hidden-lg">
        <div class="container">

            {{--            <section class="block-wrapper" style="padding:20px 0;" id="news_top_slider">--}}
            {{--                <div class="container">--}}
            {{--                    <div class="row ts-gutter-30">--}}
            {{--                        <div class="col-lg-12 col-md-12">--}}

            {{--                            <div class="row text-light ts-gutter-30">--}}

            {{--                                @foreach($data["bannerST"] as $banner)--}}

            {{--                                    <div class="col-md-3" style=" padding: 15px 5px; ">--}}
            {{--                                        <div class="post-overaly-style post-sm"--}}
            {{--                                             style="background-image:url('/images/banners/{{$banner->file}}')">--}}
            {{--                                            <a href="{{  $banner->url }}" class="image-link">&nbsp;</a>--}}
            {{--                                            <div class="overlay-post-content">--}}
            {{--                                                <div class="post-content">--}}

            {{--                                                    <h2 class="post-title mb-0">--}}
            {{--                                                        <a href="{{  $banner->url }}">{{$banner->name}}</a>--}}
            {{--                                                    </h2>--}}
            {{--                                                </div>--}}
            {{--                                            </div>--}}
            {{--                                        </div>--}}
            {{--                                    </div>--}}
            {{--                                @endforeach--}}
            {{--                            </div>--}}

            {{--                        </div>--}}

            {{--                    </div>--}}
            {{--                </div>--}}
            {{--            </section>--}}


            <div class="row ts-gutter-20" style="padding:10px 0;">

                <div class="col-lg-8 col-md-12 pad-r" id="ana-slider">
                    <div id="featured-slider" class="owl-carousel owl-theme featured-slider">

                        @foreach($data["sliderL"] as $slider)
                            <div class="item post-overaly-style"
                                 style="background-image:url('/images/sliders/{{$slider->file}}')">
                                <div class="featured-post">
                                    <a target="_blank" href="{{$slider->url}}" class="image-link">&nbsp;</a>
                                    <div class="overlay-post-content">

                                    </div>
                                </div>
                            </div>
                        @endforeach


                    </div>

                    <div class="col-lg-12 col-md-12 pad-r row">
                        <div class="finance" style="min-width: 100%;">
                            <div class="finance-inner">
                                <input type="hidden" name="exchange-lcd" id="exchange-lcd" >
                                <ul class="_flex _jcc clearfix">

                                    <li class="_flex _aic _jcsb {{ \App\Helper\Para::updown($data["borsa"][2]->artis) }}">
                                        <div class="f-content _flex _jcsb">
                                            <div class="f-left _flex _aic _jcsb">
                                                <div class="fwrapper">

                                                    <span class="f-name">DOLAR</span>
                                                </div>
                                                <div class="arr ion-arrow-{{ \App\Helper\Para::updown($data["borsa"][2]->artis) }}-a"></div>
                                            </div>
                                            <div class="f-right">
                                                <span class="f-value">{{ $data["borsa"][2]->fiyat }}</span>
                                                <span class="f-ratio">(%{{ $data["borsa"][2]->artis }} )</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="_flex _aic _jcsb {{ \App\Helper\Para::updown($data["borsa"][1]->artis) }}">
                                        <div class="f-content _flex _jcsb">
                                            <div class="f-left _flex _aic _jcsb">
                                                <div class="fwrapper">

                                                    <span class="f-name">EURO</span>
                                                </div>
                                                <div class="arr ion-arrow-{{ \App\Helper\Para::updown($data["borsa"][1]->artis) }}-a"></div>
                                            </div>
                                            <div class="f-right">
                                                <span class="f-value">{{ $data["borsa"][1]->fiyat }}</span>
                                                <span class="f-ratio">(%{{ $data["borsa"][1]->artis }} )</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="_flex _aic _jcsb {{ \App\Helper\Para::updown($data["borsa"][0]->artis) }}">
                                        <div class="f-content _flex _jcsb">
                                            <div class="f-left _flex _aic _jcsb">
                                                <div class="fwrapper">

                                                    <span class="f-name">ALTIN</span>
                                                </div>
                                                <div class="arr ion-arrow-{{ \App\Helper\Para::updown($data["borsa"][0]->artis) }}-a"></div>
                                            </div>
                                            <div class="f-right">
                                                <span class="f-value">{{ $data["borsa"][0]->fiyat }}</span>
                                                <span class="f-ratio">(%{{ $data["borsa"][0]->artis }} )</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="_flex _aic _jcsb {{ \App\Helper\Para::updown($data["borsa"][3]->artis) }}">
                                        <div class="f-content _flex _jcsb">
                                            <div class="f-left _flex _aic _jcsb">
                                                <div class="fwrapper">

                                                    <span class="f-name">BIST 100</span>
                                                </div>
                                                <div class="arr ion-arrow-{{ \App\Helper\Para::updown($data["borsa"][3]->artis) }}-a"></div>
                                            </div>
                                            <div class="f-right">
                                                <span class="f-value">{{ $data["borsa"][3]->fiyat }}</span>
                                                <span class="f-ratio">(%{{ $data["borsa"][3]->artis }} )</span>
                                            </div>
                                        </div>
                                    </li>
                                </ul>

                            </div>
                        </div>


                        <style>


                            .finance-inner {
                                background:#fff
                            }
                            .finance-inner ul,.finance-inner li,.finance-inner .f-left {
                                display:-ms-flexbox;
                                display:-webkit-box;
                                display:-moz-flex;
                                display:flex
                            }
                            .finance-inner ul {
                                -ms-flex-pack:center;
                                -webkit-box-pack:center;
                                justify-content:center
                            }
                            .finance-inner li {
                                padding:10px;
                                -webkit-box-align:center;
                                -ms-flex-align:center;
                                align-items:center;
                                width:calc((100% / 4))
                            }
                            @media screen and (max-width:576px) {
                                .finance ul {padding-left: 5px;}
                                .finance-inner li {
                                    padding:15px 9px
                                }
                            }
                            .finance-inner li+li {
                                border-left:solid 1px #eee
                            }
                            .finance-inner .f-content {
                                width:100%
                            }
                            .finance-inner .f-left {
                                -webkit-box-align:center;
                                -ms-flex-align:center;
                                align-items:center
                            }
                            .finance-inner .f-right {
                                display:-ms-flexbox;
                                display:-webkit-box;
                                display:-moz-flex;
                                display:flex;
                            }
                            @media screen and (max-width:576px) {
                                .finance-inner .f-right {
                                    display:block
                                }
                            }
                            .finance-inner .f-right>*+* {
                                margin-left:4px
                            }
                            @media screen and (max-width:576px) {
                                .finance-inner .f-right>*+* {
                                    margin-left:0
                                }
                            }
                            .finance-inner span[class^=f-] {
                                display:block
                            }
                            .finance-inner span[class^=f-].f-time {
                                display:none
                            }
                            .finance-inner .f-name,.finance-inner .f-value {
                                font-weight:700
                            }
                            .finance-inner .f-name {
                                font-size:14px;
                                white-space:nowrap
                            }
                            @media screen and (max-width:576px) {
                                .finance-inner .f-name {
                                    font-size:13px
                                }
                            }
                            .finance-inner .f-name a {
                                color:initial
                            }
                            .finance-inner .f-value {
                                font-size:13px
                            }
                            .f-ratio {
                                font-size:12px
                            }
                            .down .f-ratio {
                                color:#ec0b0b
                            }
                            .up .f-ratio {
                                color:#3ab515
                            }
                            @media screen and (max-width:576px) {
                                .f-ratio {
                                    margin-top:6px
                                }
                            }
                            .arr {
                                border:solid 6px transparent;
                                margin-left:10px
                            }
                            .down .arr {
                                border-top-color:#ec0b0b;
                                margin-top:2px
                            }
                            .up .arr {
                                border-bottom-color:#3ab515;
                                margin-top:-9px
                            }
                        </style>


                    </div>
                        <div class="col-lg-12 col-md-12 pad-r row mobil-gizle" id="hava_durumu">
                        <div class="weather">
                            <div class="weather-inner">
                                <div class="w-left" style="
        font-size: 20px;
        font-weight: bold;
    "><span>İstanbul</span></div>
                                <div class="weather-content">
                                    <ul class="clearfix" style="margin-bottom: 0;padding-left: 5%;">
                                        @for ($i = 0; $i < 5; $i++)
                                            <li class="clearfix" id="hd{{$i}}">
                                                <div class="weather-icon sunny"><img
                                                        src="/images/hava/{{  $data["hava_durumu"]->forecasts[$i]->code }}.png">
                                                </div>
                                                <div class="weather-results">
                                                        <span class="day">
                                                            @if($data["hava_durumu"]->forecasts[$i]->day == "Thu")
                                                                PRŞ
                                                            @elseif($data["hava_durumu"]->forecasts[$i]->day == "Fri")
                                                                CUM
                                                            @elseif($data["hava_durumu"]->forecasts[$i]->day == "Sat")
                                                                CMT
                                                            @elseif($data["hava_durumu"]->forecasts[$i]->day == "Sun")
                                                                PZR
                                                            @elseif($data["hava_durumu"]->forecasts[$i]->day == "Mon")
                                                                PZT
                                                            @endif

                                                        </span>
                                                    <span class="thermometer">{{ $data["hava_durumu"]->forecasts[$i]->high}}<sup>o</sup></span>
                                                    <span class="night-thermometer">{{ $data["hava_durumu"]->forecasts[$i]->low}}<sup>o</sup></span>
                                                </div>
                                            </li>

                                        @endfor


                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>


                </div>

                <div class="col-lg-4 col-md-12 pad-l">
                    <div class="row ts-gutter-20">

                        @foreach($data["bannerSR"] as $banner)
                            <div class="col-md-12">
                                <div class="post-overaly-style post-sm overlay-primary  ml-8"
                                     style="background-image:url('/images/banners/{{$banner->file}}')">
                                    <div class="post-content">
                                        <h2 class="post-title title-md" style="margin: 0;">
                                            <a href="{{$banner->url}}">{{$banner->name}}</a>
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div><!-- row end -->

                    <div class="col-lg-12 col-md-12 pad-r row masaustu-gizle" id="hava_durumu">
                        <div class="weather">
                            <div class="weather-inner">
                                <div class="w-left" style="
        font-size: 20px;
        font-weight: bold;
    "><span>İstanbul</span></div>
                                <div class="weather-content">
                                    <ul class="clearfix" style="margin-bottom: 0;padding-left: 5%;">
                                        @for ($i = 0; $i < 5; $i++)
                                            <li class="clearfix" id="hd{{$i}}">
                                                <div class="weather-icon sunny"><img
                                                        src="/images/hava/{{  $data["hava_durumu"]->forecasts[$i]->code }}.png">
                                                </div>
                                                <div class="weather-results">
                                                        <span class="day">
                                                            @if($data["hava_durumu"]->forecasts[$i]->day == "Thu")
                                                                PRŞ
                                                            @elseif($data["hava_durumu"]->forecasts[$i]->day == "Fri")
                                                                CUM
                                                            @elseif($data["hava_durumu"]->forecasts[$i]->day == "Sat")
                                                                CMT
                                                            @elseif($data["hava_durumu"]->forecasts[$i]->day == "Sun")
                                                                PZR
                                                            @elseif($data["hava_durumu"]->forecasts[$i]->day == "Mon")
                                                                PZT
                                                            @endif

                                                        </span>
                                                    <span class="thermometer">{{ $data["hava_durumu"]->forecasts[$i]->high}}<sup>o</sup></span>
                                                    <span class="night-thermometer">{{ $data["hava_durumu"]->forecasts[$i]->low}}<sup>o</sup></span>
                                                </div>
                                            </li>

                                        @endfor


                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>


                </div><!-- Row end -->
            </div><!-- Container end -->
        </div><!-- Container end -->
        <!-- Feature post end -->

    {{--    <section class="trending-slider pb-0">--}}
    {{--        <div class="container">--}}
    {{--            <div class="ts-grid-box">--}}
    {{--                <h2 class="block-title">--}}
    {{--                    <span class="title-angle-shap"> Gündem</span>--}}
    {{--                </h2>--}}
    {{--                <div class="owl-carousel dot-style2" id="trending-slider">--}}

    {{--                    @foreach($data["gundem"] as $v)--}}
    {{--                        <div class="item post-overaly-style post-md"--}}
    {{--                             style="background-image:url('/images/blogs/{{$v->file}}')">--}}
    {{--                            <a href="{{route("frontend.blog.index",$v->slug)}}" class="image-link">&nbsp;</a>--}}
    {{--                            <div class="overlay-post-content">--}}
    {{--                                <div class="post-content">--}}
    {{--                                    <h2 class="post-title">--}}
    {{--                                        <a href="#">{{$v->title}}</a>--}}
    {{--                                    </h2>--}}
    {{--                                </div>--}}
    {{--                            </div>--}}
    {{--                        </div><!-- Item 1 end -->--}}
    {{--                    @endforeach--}}
    {{--                </div>--}}
    {{--                <!-- most-populers end-->--}}
    {{--            </div>--}}
    {{--            <!-- ts-populer-post-box end-->--}}
    {{--        </div>--}}
    {{--        <!-- container end-->--}}
    {{--    </section>--}}
    {{--    <!-- .section -->--}}



    @if($settings["yazarlar"] == "1")

        <!-- yazarlar list -->
            <section class="block-slider mt-30" style="padding: 0;margin: 20px 0px;">
                <div class="container">
                    <a style="float:right;color: black;font-weight: bold;" href="/writers">Tüm yazarlar >></a>
                    <h2 style="
        width: 115px;
        background: red;
        padding: 5px;
        color: white;
    ">YAZARLAR</h2>
                    <div class="ts-grid-box">
                        <div class="owl-carousel dot-style2" id="writer-slider">

                            @foreach($data["writers"] as $k => $v)

                                <div class="item">
                                    <div class="post-block-style" style="text-align: center;">

                                        <div class="post-thumb">

										<div class="post-content">
                                            <h2 class="post-title" style="text-align: center;margin: 10px;">
                                                <a href="{{route("frontend.blog.index",$v["slug"])}}"
                                                   >
                                                    {{ $v["name"] }}
                                                </a>

                                            </h2>

                                        </div>

                                            <a href="{{route("frontend.blog.index",$v["slug"])}} ">
                                                <img style="border-radius: 100%;"
                                                     src="/images/users/{{$v["file"]}}" alt="{{$v["name"]}}"/>
                                            </a>
                                        </div>

                                        <div class="post-content">
                                            <h2 class="post-title" style="text-align: center;margin: 10px;">

                                                <a href="{{route("frontend.blog.index",$v["slug"])}}">
                                                    <small style="color: black;font-weight: bold;font-size: 17px;line-height: 20px;">{{$v["title"]}}</small>
                                                </a>
                                            </h2>

                                        </div>
                                    </div>
                                </div>

                            @endforeach
                        </div>
                    </div>


                </div>
                <!-- container end-->
            </section>
            <!-- yazarlar list -->
        @endif

        <a href="mailto:{{$settings["whatsapp"]}}?Subject=Haberim%20Var" target="_top"><img class="masaustu-gizle"
                                                                                            style="width: 100%"
                                                                                            src="/images/whatsapp-haber.png"></a>
        <!-- son haberler 12li -->
        <section class="block-wrapper" style="padding:20px 0;">
            <div class="container">
                <div class="row ts-gutter-30">
                    <div class="col-lg-12 col-md-12">

                        <div class="row text-light ts-gutter-30">


                            @foreach($data["last_news"] as $news)
                                <div class="col-md-4">
                                    <div class="post-overaly-style post-sm"
                                         style="background-image:url('/images/blogs/{{$news->file}}')">
                                        <a href="{{route("frontend.blog.index",$news->slug)}}"
                                           class="image-link">&nbsp;</a>

                                    </div>
									 <div class="overlay-post-content" style="border: 1px solid #ccc;">
                                            <div class="post-content" style="
    padding-top: 0px !important;
    min-height: 70px;
    background: white;
    color: black;
    position: relative;
    padding: 8px;
">
                                                <small><a style="font-size: 13px;color: red;"
                                                        href="{{route("frontend.category.index",$news->category_slug)}}">{{$news->category_name}}</a></small>
                                                <h2 style="
    font-size: 20px;
    line-height: 21px;
    font-weight: 400;
" class="post-title mb-0">
                                                    <a href="{{route("frontend.blog.index",$news->slug)}}">
                                                        <b style="
    color: black;
    text-transform: capitalize;
">{{$news->title}} </b></a>
                                                </h2>
                                            </div>
                                        </div>
                                </div>
                            @endforeach


                        </div>

                    </div>

                </div>
            </div>
        </section>
        <!-- son haberler 12li -->


        <!-- 5li tab haberler -->
    <!--
            <section class="block-wrapper">
                <div class="container">
                    <div class="row ts-gutter-30">
                        <div class="col-lg-8 col-md-12">
                            <div class="featured-tab">
                                <h2 class="block-title">
                                    <span class="title-angle-shap"> SON HABERLER </span>
                                </h2>
                                <ul class="nav nav-tabs">

                                    <li class="nav-item">
                                        <a class="nav-link animated fadeIn" href="#tab_a" data-toggle="tab">
                                            <span class="tab-head">
                                            <span class="tab-text-title">Yerel Basın</span>
                                        </span>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link animated fadeIn" href="#tab_b" data-toggle="tab">
                                            <span class="tab-head">
                                            <span class="tab-text-title">Sağlık</span>
                                        </span>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link animated fadeIn" href="#tab_c" data-toggle="tab">
                                            <span class="tab-head">
                                            <span class="tab-text-title">Magazin</span>
                                        </span>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link animated fadeIn" href="#tab_d" data-toggle="tab">
                                            <span class="tab-head">
                                            <span class="tab-text-title">Dünya</span>
                                        </span>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link animated fadeIn" href="#tab_e" data-toggle="tab">
                                            <span class="tab-head">
                                            <span class="tab-text-title">Ekonomi</span>
                                        </span>
                                        </a>
                                    </li>

                                </ul>

                                <div class="tab-content">
                                    <div class="tab-pane active animated fadeInRight" id="tab_a">
                                        <div class="row">
                                            @foreach($data["saglik"] as $k => $v)

        @if($loop->first)
            <div class="col-lg-6 col-md-6">
                <div class="post-block-style clearfix">
                    <div class="post-thumb">
                        <a href="{{ route("frontend.blog.index",$v["slug"]) }}">
                                                                    <img class="img-fluid"
                                                                         src="/images/blogs/{{ $v["file"]  }}"
                                                                         alt="{{$v["title"]}}"/>
                                                                </a>

                                                            </div>

                                                            <div class="post-content">
                                                                <h2 class="post-title title-md">
                                                                    <a style="line-height: 23px;"
                                                                       href="{{ route("frontend.blog.index",$v["slug"]) }}">{{$v["title"]}}</a>
                                                                </h2>
                                                                <div class="post-meta mb-7">
                                                                    <span class="post-date"><i class="fa fa-clock-o"></i> {{ $v["created_at"]->diffForHumans() }}</span>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="list-post-block">
                                                            <ul class="list-post">
                                                                @endif
        @continue($loop->first)
            <li>
                <div class="post-block-style media">
                    <div class="post-thumb">
                        <a href="{{ route("frontend.blog.index",$v["slug"]) }}">
                                                                                <img class="img-fluid"
                                                                                     src="/images/blogs/{{ $v["file"]  }}"
                                                                                     alt="{{$v["title"]}}"/>
                                                                            </a>
                                                                        </div>

                                                                        <div class="post-content media-body">

                                                                            <h2 class="post-title">
                                                                                <a href="{{ route("frontend.blog.index",$v["slug"]) }}">{{$v["title"]}}</a>
                                                                            </h2>
                                                                            <div class="post-meta mb-7">
                                                                            <span class="post-date"><i
                                                                                    class="fa fa-clock-o"></i> {{ $v["created_at"]->diffForHumans() }} </span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                @endforeach
        </ul>
    </div>
</div>
</div>
</div>

<div class="tab-pane animated fadeInRight" id="tab_b">
<div class="row">


@foreach($data["saglik"] as $k => $v)

        @if($loop->first)
            <div class="col-lg-6 col-md-6">
                <div class="post-block-style clearfix">
                    <div class="post-thumb">
                        <a href="{{ route("frontend.blog.index",$v["slug"]) }}">
                                                                    <img class="img-fluid"
                                                                         src="/images/blogs/{{ $v["file"]  }}"
                                                                         alt="{{$v["title"]}}"/>
                                                                </a>

                                                            </div>

                                                            <div class="post-content">
                                                                <h2 class="post-title title-md">
                                                                    <a style="line-height: 23px;"
                                                                       href="{{ route("frontend.blog.index",$v["slug"]) }}">{{$v["title"]}}</a>
                                                                </h2>
                                                                <div class="post-meta mb-7">
                                                                    <span class="post-date"><i class="fa fa-clock-o"></i> {{ $v["created_at"]->diffForHumans() }}</span>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="list-post-block">
                                                            <ul class="list-post">
                                                                @endif
        @continue($loop->first)
            <li>
                <div class="post-block-style media">
                    <div class="post-thumb">
                        <a href="{{ route("frontend.blog.index",$v["slug"]) }}">
                                                                                <img class="img-fluid"
                                                                                     src="/images/blogs/{{ $v["file"]  }}"
                                                                                     alt="{{$v["title"]}}"/>
                                                                            </a>
                                                                        </div>

                                                                        <div class="post-content media-body">

                                                                            <h2 class="post-title">
                                                                                <a href="{{ route("frontend.blog.index",$v["slug"]) }}">{{$v["title"]}}</a>
                                                                            </h2>
                                                                            <div class="post-meta mb-7">
                                                                            <span class="post-date"><i
                                                                                    class="fa fa-clock-o"></i> {{ $v["created_at"]->diffForHumans() }} </span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                @endforeach
        </ul>
    </div>
</div>
</div>
</div>

<div class="tab-pane animated fadeInRight" id="tab_c">
<div class="row">
@foreach($data["saglik"] as $k => $v)

        @if($loop->first)
            <div class="col-lg-6 col-md-6">
                <div class="post-block-style clearfix">
                    <div class="post-thumb">
                        <a href="{{ route("frontend.blog.index",$v["slug"]) }}">
                                                                    <img class="img-fluid"
                                                                         src="/images/blogs/{{ $v["file"]  }}"
                                                                         alt="{{$v["title"]}}"/>
                                                                </a>

                                                            </div>

                                                            <div class="post-content">
                                                                <h2 class="post-title title-md">
                                                                    <a style="line-height: 23px;"
                                                                       href="{{ route("frontend.blog.index",$v["slug"]) }}">{{$v["title"]}}</a>
                                                                </h2>
                                                                <div class="post-meta mb-7">
                                                                    <span class="post-date"><i class="fa fa-clock-o"></i> {{ $v["created_at"]->diffForHumans() }}</span>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="list-post-block">
                                                            <ul class="list-post">
                                                                @endif
        @continue($loop->first)
            <li>
                <div class="post-block-style media">
                    <div class="post-thumb">
                        <a href="{{ route("frontend.blog.index",$v["slug"]) }}">
                                                                                <img class="img-fluid"
                                                                                     src="/images/blogs/{{ $v["file"]  }}"
                                                                                     alt="{{$v["title"]}}"/>
                                                                            </a>
                                                                        </div>

                                                                        <div class="post-content media-body">

                                                                            <h2 class="post-title">
                                                                                <a href="{{ route("frontend.blog.index",$v["slug"]) }}">{{$v["title"]}}</a>
                                                                            </h2>
                                                                            <div class="post-meta mb-7">
                                                                            <span class="post-date"><i
                                                                                    class="fa fa-clock-o"></i> {{ $v["created_at"]->diffForHumans() }} </span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                @endforeach
        </ul>
    </div>
</div>
</div>
</div>

<div class="tab-pane animated fadeInRight" id="tab_d">
<div class="row">
@foreach($data["saglik"] as $k => $v)

        @if($loop->first)
            <div class="col-lg-6 col-md-6">
                <div class="post-block-style clearfix">
                    <div class="post-thumb">
                        <a href="{{ route("frontend.blog.index",$v["slug"]) }}">
                                                                    <img class="img-fluid"
                                                                         src="/images/blogs/{{ $v["file"]  }}"
                                                                         alt="{{$v["title"]}}"/>
                                                                </a>

                                                            </div>

                                                            <div class="post-content">
                                                                <h2 class="post-title title-md">
                                                                    <a style="line-height: 23px;"
                                                                       href="{{ route("frontend.blog.index",$v["slug"]) }}">{{$v["title"]}}</a>
                                                                </h2>
                                                                <div class="post-meta mb-7">
                                                                    <span class="post-date"><i class="fa fa-clock-o"></i> {{ $v["created_at"]->diffForHumans() }}</span>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="list-post-block">
                                                            <ul class="list-post">
                                                                @endif
        @continue($loop->first)
            <li>
                <div class="post-block-style media">
                    <div class="post-thumb">
                        <a href="{{ route("frontend.blog.index",$v["slug"]) }}">
                                                                                <img class="img-fluid"
                                                                                     src="/images/blogs/{{ $v["file"]  }}"
                                                                                     alt="{{$v["title"]}}"/>
                                                                            </a>
                                                                        </div>

                                                                        <div class="post-content media-body">

                                                                            <h2 class="post-title">
                                                                                <a href="{{ route("frontend.blog.index",$v["slug"]) }}">{{$v["title"]}}</a>
                                                                            </h2>
                                                                            <div class="post-meta mb-7">
                                                                            <span class="post-date"><i
                                                                                    class="fa fa-clock-o"></i> {{ $v["created_at"]->diffForHumans() }} </span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                @endforeach
        </ul>
    </div>
</div>
</div>
</div>


<div class="tab-pane animated fadeInRight" id="tab_e">
<div class="row">
@foreach($data["saglik"] as $k => $v)

        @if($loop->first)
            <div class="col-lg-6 col-md-6">
                <div class="post-block-style clearfix">
                    <div class="post-thumb">
                        <a href="{{ route("frontend.blog.index",$v["slug"]) }}">
                                                                    <img class="img-fluid"
                                                                         src="/images/blogs/{{ $v["file"]  }}"
                                                                         alt="{{$v["title"]}}"/>
                                                                </a>

                                                            </div>

                                                            <div class="post-content">
                                                                <h2 class="post-title title-md">
                                                                    <a style="line-height: 23px;"
                                                                       href="{{ route("frontend.blog.index",$v["slug"]) }}">{{$v["title"]}}</a>
                                                                </h2>
                                                                <div class="post-meta mb-7">
                                                                    <span class="post-date"><i class="fa fa-clock-o"></i> {{ $v["created_at"]->diffForHumans() }}</span>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="list-post-block">
                                                            <ul class="list-post">
                                                                @endif
        @continue($loop->first)
            <li>
                <div class="post-block-style media">
                    <div class="post-thumb">
                        <a href="{{ route("frontend.blog.index",$v["slug"]) }}">
                                                                                <img class="img-fluid"
                                                                                     src="/images/blogs/{{ $v["file"]  }}"
                                                                                     alt="{{$v["title"]}}"/>
                                                                            </a>
                                                                        </div>

                                                                        <div class="post-content media-body">

                                                                            <h2 class="post-title">
                                                                                <a href="{{ route("frontend.blog.index",$v["slug"]) }}">{{$v["title"]}}</a>
                                                                            </h2>
                                                                            <div class="post-meta mb-7">
                                                                            <span class="post-date"><i
                                                                                    class="fa fa-clock-o"></i> {{ $v["created_at"]->diffForHumans() }} </span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                @endforeach
        </ul>
    </div>
</div>
</div>
</div>

</div>
</div>
</div>
<div class="col-lg-4 col-md-12">
<img style="
width: 100%;
" src="http://dogalciftlik.net/wp-content/uploads/2018/01/Cadir-%C3%A7%C4%B1-500-adet-380x380.jpg">
</div>

<div class="gap-20"></div>


</div>
</div>
</section>
-->


        <!-- SPOR HABERLERİ -->
        <section class="trending-slider full-width no-padding" id="spor-haberleri">
            <div class="ts-grid-box">

                <div class="owl-carousel" id="fullbox-slider">

                    @foreach($data["spor"] as $k => $v)
                        <div class="item post-overaly-style post-lg"
                             style="background-image:url('/images/blogs/{{$v["file"]}}')">
                            <a href="{{ route("frontend.blog.index",$v["slug"]) }}" class="image-link">&nbsp;</a>
                            <div class="overlay-post-content">
                                <div class="post-content">

                                    <h2 class="post-title title-md">
                                        <a href="{{ route("frontend.blog.index",$v["slug"]) }}">{{$v["title"]}} </a>
                                    </h2>
                                    <div class="post-meta">
                                        <ul>
                                            <li class="post-date"><i
                                                    class="fa fa-clock-o"></i> {{ $v["created_at"]->diffForHumans()  }}
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- SPOR HABERLERİ -->

        <section class="block-wrapper">
            <div class="container">
                <div class="row ts-gutter-30">
                    <div class="col-lg-8 col-md-12">
                        <h2 class="block-title">
                            <span class="title-angle-shap"> GÜNDEM </span>
                        </h2>
                        <div class="row text-light ts-gutter-30">
                            @foreach($data["gundem"] as $v)
                                <div class="col-md-4">
                                    <div class="post-overaly-style post-sm"
                                         style="background-image:url('/images/blogs/{{$v["file"]}}')">
                                        <a href="{{ route("frontend.blog.index",$v["slug"])  }}"
                                           class="image-link">&nbsp;</a>
                                        <div class="overlay-post-content">
                                            <div class="post-content">

                                                <h2 class="post-title mb-0">
                                                    <a href="{{ route("frontend.blog.index",$v["slug"])  }}"><b>{{$v["title"]}}</b></a>
                                                </h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                    <div class="col-lg-4 col-md-12">
                        <h2 class="block-title block-title-dark">
                            <span class="title-angle-shap">YEREL BASIN </span>
                        </h2>
                        <div class="list-post-block">
                            <ul class="list-post">

                                @foreach($data["yerel"] as $k => $v)

                                    <li>
                                        <div class="post-block-style media">
                                            <div class="post-thumb thumb-md">
                                                <a href="{{ route("frontend.blog.index",$v["slug"]) }}">
                                                    <img class="img-fluid" src="/images/blogs/{{$v["file"]}}"
                                                         alt="{{$v["title"]}}">
                                                </a>
                                            </div>

                                            <div class="post-content media-body">
                                                <h2 class="post-title">
                                                    <a href="{{ route("frontend.blog.index",$v["slug"]) }}">{{$v["title"]}}</a>
                                                </h2>
                                                <div class="post-meta mb-7">
                                                    <span class="post-date"><i class="fa fa-clock-o"></i> {{ $v["created_at"]->diffForHumans() }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="block-wrapper">
            <div class="container">
                <div class="row ts-gutter-30">
                    <div class="col-lg-12 col-md-12">
                        <h2 class="block-title">
                            <span class="title-angle-shap">SAĞLIK </span>
                        </h2>
                        <div class="row ts-gutter-20">

                            @foreach($data["saglik"] as $k => $v)

                                <div class="col-md-4">
                                    <div class="post-block-style">
                                        <div class="post-thumb">
                                            <a href="{{ route("frontend.blog.index",$v["slug"]) }}">
                                                <img class="img-fluid" src="/images/blogs/{{$v["file"]}}"
                                                     alt="{{$v["title"]}}">
                                            </a>

                                        </div>

                                        <div class="post-content">
                                            <h2 class="post-title">
                                                <a href="{{ route("frontend.blog.index",$v["slug"]) }}">{{$v["title"]}}</a>
                                            </h2>
                                            <div class="post-meta mb-7">
                                                <span class="post-date"><i class="fa fa-clock-o"></i>  {{ $v["created_at"]->diffForHumans()  }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @endforeach

                        </div>

                    </div>

                </div>
            </div>
        </section>


        <section class="block-wrapper">
            <div class="container">
                <div class="col-lg-12 col-md-12">
                    <div class="block style2 text-light">
                        <h2 class="block-title">
                            <span class="title-angle-shap"> YAŞAM </span>
                        </h2>

                        <div class="row">


                            <div class="col-lg-12 col-md-12">
                                <div class="row ts-gutter-20">

                                    @foreach($data["yasam"] as $k => $v)
                                        <div class="col-md-3">
                                            <div class="post-block-style">
                                                <div class="post-thumb">
                                                    <a href="{{ route("frontend.blog.index",$v["slug"])  }}">
                                                        <img class="img-fluid" src="/images/blogs/{{ $v["file"]  }}"
                                                             alt="{{$v["title"]}}"/>
                                                    </a>
                                                </div>

                                                <div class="post-content">
                                                    <h2 class="post-title mb-2">
                                                        <a href="{{ route("frontend.blog.index",$v["slug"])  }}">{{  $v["title"] }}</a>
                                                    </h2>
                                                    <div class="post-meta mb-7">
                                                        <span class="post-date"><i class="fa fa-clock-o"></i>{{$v["created_at"]->diffForHumans() }}
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </section>

@endsection

@section("css")
@endsection
@section("js")

@endsection
