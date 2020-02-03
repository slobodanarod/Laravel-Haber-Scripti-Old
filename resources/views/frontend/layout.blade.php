<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Basic Page Needs
    ================================================== -->
    <meta charset="utf-8">
    <title>@yield("title") {{ $settings["title"]  }}</title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--Favicon-->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">

    @yield("css")
    <link rel="stylesheet" href="/frontend/css/bootstrap.min.css">

    <link rel="stylesheet" href="/frontend/css/iconfonts.css">
    <link rel="stylesheet" href="/frontend/css/font-awesome.min.css">
    <link rel="stylesheet" href="/frontend/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/frontend/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="/frontend/css/magnific-popup.css">


    <link rel="stylesheet" href="/frontend/css/animate.css">

    <link rel="stylesheet" href="/frontend/css/style.css">
    <link rel="stylesheet" href="/frontend/css/responsive.css">

    <link rel="stylesheet" href="/frontend/css/colorbox.css">
    <link rel="stylesheet" href="/frontend/css/custom.css">

    <!--[if lt IE 9]>
    <script src="/frontend/js/html5shiv.js"></script>
    <script src="/frontend/js/respond.min.js"></script>
    <![endif]-->

    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>


    <script src="/frontend/js/jquery.js"></script>
    <script src="/frontend/js/popper.min.js"></script>
    <script src="/frontend/js/bootstrap.min.js"></script>
    <script src="/frontend/js/jquery.magnific-popup.min.js"></script>
    <script src="/frontend/js/owl.carousel.min.js"></script>
    <script src="/frontend/js/jquery.colorbox.js"></script>
    <script src="/frontend/js/custom.js"></script>

    @yield("twitter_desc")
    <link rel="shortcut icon" href="/images/fav.ico" type="image/x-icon">

</head>

<body>
<div class="trending-bar trending-light d-md-block">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-md-8 text-center text-md-left">
                <p class="trending-title"><i class="tsicon fa fa-bolt"></i> SON DAKİKA</p>
                <div id="trending-slide" class="owl-carousel owl-theme trending-slide">

                    @foreach($settings["last_news_header_text"] as $last_news_text)
                        <div class="item">
                            <div class="post-content">
                                <h2 class="post-title title-small">
                                    <a href="{{route("frontend.blog.index",$last_news_text["slug"])}}">{{ $last_news_text["title"]  }}</a>
                                </h2>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

{{--            <div class="col-md-4 text-center text-md-right">--}}
{{--                <div id="trending-slide">--}}

{{--                    Dolar : <b> {{ $settings["dolar"] }} </b> |--}}
{{--                    Euro : <b> {{ $settings["euro"] }} </b> |--}}
{{--                    Altın : <b> {{ $settings["gram_altin"]  }} </b>--}}


{{--                </div>--}}
{{--            </div>--}}


        </div>
    </div>
</div>

<header id="header" class="header">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-md-3 col-sm-12">
                <div class="logo">
                    <a href="/">
                        <img src="/frontend/images/logos/logo.png" alt="">
                    </a>
                </div>
            </div>

{{--            <div class="col-md-8 col-sm-12 header-right hidden-xs hidden-md" id="header_ad">--}}
{{--                <div class="ad-banner float-right">--}}
{{--                    <a href="#">--}}
{{--                        <img src="/images/banners/whatsapp.jpg" class="img-fluid" alt="whatsapp haber">--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--            </div>--}}

        </div>
    </div>
</header>

<div class="main-nav clearfix is-ts-sticky">
    <div class="container">
        <div class="row justify-content-between">
            <nav class="navbar navbar-expand-lg col-lg-10">
                <div class="site-nav-inner float-left">
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="true" aria-label="Toggle navigation">
                        <span class="fa fa-bars"></span>
                    </button>
                    <div id="navbarSupportedContent" class="collapse navbar-collapse navbar-responsive-collapse">
                        <ul class="nav navbar-nav">
                            @if($settings["yazarlar"] == "1")
                            <li><a href="{{route("default.writers")}}" >Yazarlar</a></li>
                            @endif
                            @foreach($settings["frontmenu"] as $k => $v)
                                @if(!$v["child"])
                                    <li><a href="{{route("frontend.category.index",$v["slug"])}}"
                                        >{{$v["name"]}}</a></li>
                                @else
                                    <li class="nav-item dropdown active">
                                        <a href="" class="menu-dropdown" data-toggle="dropdown">{{$v["name"]}} <i
                                                class="fa fa-angle-down"></i></a>
                                        <ul class="dropdown-menu" role="menu" style="position: absolute !important;">
                                            @foreach($v["child"]["0"] as $k => $v)
                                                <li class="active"><a
                                                        href="{{route("frontend.category.index",$v["slug"])}}">{{$v["name"]}}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>

                </div>
            </nav>

            <div class="col-lg-4 text-right nav-social-wrap">
                <div class="top-social">
                    <ul class="social list-unstyled">
                        <div class="dropdown">
                            @guest
                                <button
                                    style="background: none;border: none;font-weight: bold;color: white;font-size:18px;"
                                    type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="fa fa-user"></i>
                                </button>
                                <div class="dropdown-menu" style="padding: 15px;" aria-labelledby="dropdownMenuButton">
                                    <h5>Üye Girişi</h5>
                                    <a class="dropdown-item btn" style="background: green;" href="/login"><i
                                            class="fas fa-sign-in-alt"></i> Giriş Yap</a>
                                    <a class="dropdown-item btn" style="background: #fc4a00;" href="/register">Kayıt
                                        ol</a>
                                    <span><a  href="mailto:{{$settings["whatsapp"]}}?Subject=Haberim%20Var" target="_top">Haberini Gönder Yayınlayalım</a></span><br>
                                    <span><a href="/page/sikca-sorulan-sorular">Üyelik Sözleşmesi</a></span><br>
                                    <span><a href="/page/uyelik-sozlesmesi">Sıkça Sorulan Sorular</a></span>
                                </div>
                            @endguest

                            @auth
                                <button
                                    style="background: none;border: none;font-weight: bold;color: white;font-size:18px;"
                                    type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <i class="fa fa-user"></i>
                                </button>
                                <div class="dropdown-menu" style="padding: 15px;" aria-labelledby="dropdownMenuButton">
                                    <h5>Hesabım</h5>

                                    @if(Auth::user()->role == "writer")
                                        <a class="dropdown-item btn"
                                           href="{{route("frontend.writer.news")}}">Yazılarım</a>
                                        <a class="dropdown-item btn" href="{{route("frontend.writer.news.create")}}">Yazı
                                            Ekle</a>
                                    @endif
                                    <a class="dropdown-item btn" href="{{  route("frontend.profile.settings") }}">Üye
                                        Bilgilerim</a>
                                    <a class="dropdown-item btn" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Çıkış Yap') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            @endauth
                        </div>
                    </ul>
                </div>


                <div class="nav-search">
                    <a href="{{route("default.search.show")}}">
                        <i class="icon icon-search1"></i>
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>


@yield("content")


<div class="ts-copyright">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-12 text-center">
                <div class="copyright-content text-light">
                    <p>&copy; 2019, TURNAHABER - Tüm hakları saklıdır..</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="top-up-btn">
    <div class="backto" style="display: block;">
        <a href="#" class="icon icon-arrow-up" aria-hidden="true"></a>
    </div>
</div>

@yield("js")
</body>

</html>
@if(session()->has('success'))
    <script>
		alertify.success('{{session('success')}}')
    </script>
@endif
@if(session()->has('error'))
    <script>
		alertify.error('{{session('error')}}')
    </script>
@endif

@foreach($errors->all() as $error)
    <script>alertify.error('{{$error}}');</script>
@endforeach

