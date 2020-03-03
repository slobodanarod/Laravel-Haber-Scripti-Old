@extends("frontend.layout")
@section("title",$data["blog"]->title)
@section("twitter_desc")
@if($data["blog"]->author == 0)
	
			<meta property="og:image" content="https://turnahaber.com/images/blogs/{{ $data["blog"]->file}}"/>
            <meta property="og:type" content="website" />
            <meta property="og:title" content="{{ $data["blog"]->title }} | Turna Haber" />
            <meta property="og:url" content="https://turnahaber.com/" />
            <meta property="og:site_name" content="https://turnahaber.com/" />
    <meta name="twitter:card" content="summary_large_image"/>
    <meta name="twitter:image"
          content="https://turnahaber.com/images/blogs/{{ $data["blog"]->file}}"/>
    <meta name="twitter:site" content="@turnahaber"/>
    <meta name="twitter:title" content="{{ $data["blog"]->title }}"/>
	@else
		<meta property="og:image" content="https://turnahaber.com/images/users/{{$data["writer"]["twitter_post"]}}"/>
            <meta property="og:type" content="website" />
            <meta property="og:title" content="{{ $data["blog"]->title }} | Turna Haber" />
            <meta property="og:url" content="https://turnahaber.com/" />
            <meta property="og:site_name" content="https://turnahaber.com/" />
		<meta name="twitter:card" content="summary_large_image"/>
    <meta name="twitter:image"
          content="https://turnahaber.com/images/users/{{$data["writer"]["twitter_post"]}}"/>
    <meta name="twitter:site" content="@turnahaber"/>
	    <meta name="twitter:title" content="{{ $data["blog"]->title }}"/>
	
	@endif
@endsection
@section("content")


    @if($data["blog"]->author == 0)

        <h1 style="display: none;">{{ $data["blog"]->title }}</h1>
        <section class="main-content pt-5" id="haber-tek">
            <div class="container">
                <div class="row ts-gutter-30">
                    <div class="col-lg-8" style="padding-top:0 !important">
                        <div class="single-post">
                            <div class="post-header-area">
                                <h2 class="post-title title-lg">{{ $data["blog"]->title }}</h2>
                            </div><!-- post-header-area end -->
                            <ul class="post-meta">

                                <li><i class="fa fa-clock-o"></i>

                                    @if(\Carbon\Carbon::now()->diffInDays($data["blog"]->created_at,false) < -5)
                                        {{ $data["blog"]->created_at->formatLocalized('%d %B %A %Y')  }}
                                    @else
                                        {{ $data["blog"]->created_at->diffForHumans() }}
                                    @endif
                                </li>

                                @isset($data["categories"])
                                    <li>
                                        @foreach($data["categories"] as $category)
                                            <a href="{{route("frontend.category.index",$category["slug"])}}"
                                               class="post-cat">{{$category["name"]}}</a>
                                        @endforeach

                                    </li>
                                @endisset
                                <li style="float:right;">
                                    <script>
										jQuery(document).ready(function ($) {
											$('body').on('click', '.social-media-share a', function (e) {
												e.preventDefault();
												var data = $(this).attr('data-url');
												vce_social_share(data);
											});

											function vce_social_share (data)
											{
												window.open(data, "Share", 'height=500,width=760,top=' + ($(window).height() / 2 - 250) + ', left=' + ($(window).width() / 2 - 380) + 'resizable=0,toolbar=0,menubar=0,status=0,location=0,scrollbars=0');
											}
										});
                                    </script>
                                    <div class="social-media-share mobil-gizle">

                                        <a class="facebook" href="javascript:void(0);"
                                           data-url="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}"
                                           title="Facebook'ta Paylaş"><i class="fa fa-facebook"></i></a>

                                        <a class="twitter" href="javascript:void(0);"
                                           data-url="https://twitter.com/intent/tweet?original_referer={{ url()->current() }}&related=turnahaber&text={{$data["blog"]->title}}&url={{ url()->current() }}&via=turnahaber"
                                           data-size="large"
                                           title="Tweetle"><i class="fa fa-twitter"></i></a>

                                        <a class="whatsapp" href="javascript:void(0);"
                                           data-url="https://api.whatsapp.com/send?text={{ $data["blog"]->title }} -- {{ url()->current() }}"
                                           title="WhatsApp ile Paylaş"><i class="fa fa-whatsapp"></i></a>

                                    </div>

                                    <div class="social-media-share masaustu-gizle" id="paylas" style="
    width: 100%;
    background-color: #4f4865;
    border: 1px solid #ccc;
    display: block;
    text-align: center;
    bottom: 0;
    left: 0;
    padding: 2px;
    position: fixed;
    z-index: 1000;
    ">
                                        <span style="color: white;font-size:20px;">Hemen Paylaş : </span>

                                        <a class="facebook" href="javascript:void(0);"
                                           data-url="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}"
                                           title="Facebook'ta Paylaş"><i class="fa fa-facebook"></i></a>

                                        <a class="twitter" href="javascript:void(0);"
                                           data-url="https://twitter.com/intent/tweet?original_referer={{ url()->current() }}&related=turnahaber&text={{$data["blog"]->title}}&url={{ url()->current() }}&via=turnahaber"
                                           data-size="large"
                                           title="Tweetle"><i class="fa fa-twitter"></i></a>

                                        <a class="whatsapp" href="javascript:void(0);"
                                           data-url="https://api.whatsapp.com/send?text={{ $data["blog"]->title }} -- {{ url()->current() }}"
                                           title="WhatsApp ile Paylaş"><i class="fa fa-whatsapp"></i></a>

                                    </div>
                                    <script>
										$(window).scroll(function () {

											if ($(this).scrollTop() > 100)
											{
												$('.paylas').fadeIn();
											}
											else
											{
												$('.paylas').fadeOut();
											}
										});
                                    </script>

                                </li>
                            </ul>


                            <div class="post-content-area">
                                @isset($data["blog"]->file)
                                    <div class="post-media mb-20">
                                        <a href="/images/blogs/{{ $data["blog"]->file  }}"
                                           class="gallery-popup cboxElement">
                                            <img src="/images/blogs/{{ $data["blog"]->file  }}"
                                                 alt="{{$data["blog"]->title}}"
                                                 class="img-fluid">
                                        </a>
                                    </div>
                                @endisset
                                <div id="haber-icerik">
                                    {!! $data["blog"]->content !!}
                                </div>

                            </div><!-- post-content-area end -->


                            <div class="post-footer">

                                @isset($data["tags"])
                                    <div class="tag-lists">
                                                            <span>Etiketler:
                                                                @foreach($data["tags"] as $tag)
                                                            </span><a
                                            href="{{route("tag.show",$tag["slug"])}}">{{ $tag["name"] }}</a>
                                        @endforeach
                                    </div><!-- tag lists -->
                                    <hr>
                                @endisset
                                <div class="related-post">

                                    <div class="comments-area">
                                        <h3 class="block-title"><span>{{ count($data["comments"]) }} Yorum</span></h3>
                                        <ul class="comments-list">
                                            @forelse($data["comments"] as $comment)
                                                <li>
                                                    <div class="comment">
                                                        @if(isset(Auth::user()->id) and Auth::user()->id == $comment->userID)
                                                            <a href="{{ route("frontend.comment.delete",$comment->id) }}"
                                                               style="padding: 3px; line-height: 10px; color: black"
                                                               class="float-right"><i class="fa fa-trash-o"></i></a>
                                                        @endif
                                                        <img class="comment-avatar pull-left" alt="{{ $comment->name }}"
                                                             onerror="this.src='/images/users/user.png';"
                                                             src="/images/users/{{$comment->file}}">
                                                        <div class="comment-body">
                                                            <div class="meta-data">
                                                                <span class="comment-author">{{ $comment->name }}</span>
                                                                <span class="comment-author"></span>
                                                                {{ \Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}

                                                            </div>
                                                            <div class="comment-content">
                                                                <p>{{ $comment->content  }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            @empty
                                                Henüz yorum yapılmamış.
                                            @endforelse

                                        </ul>
                                    </div>
                                    @auth
                                        <div class="comments-form">
                                            <h3 class="title-normal">Yorum bırakın
                                                <div id="charNum"></div>
                                            </h3>
                                            <form method="POST" action="{{ route("frontend.comment.send")}}">
                                                @CSRF
                                                <div class="row">

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                    <textarea class="form-control input-msg required-field"
                                                              name="content" style="height: 140px;"
                                                              onkeyup="countChar(this)"
                                                              placeholder="Senin yorumun" rows="30" cols="30"
                                                              required="">{{old("content")}}</textarea>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="clearfix">
                                                    <input type="hidden" name="blogs_id"
                                                           value="{{ $data["blog"]->id }}">
                                                    <input type="hidden" name="users_id" value="{{ Auth::user()->id }}">
                                                    <button class="comments-btn btn btn-primary" type="submit">Yorumu
                                                        Gönder
                                                    </button>
                                                </div>
                                            </form>
                                        </div>

                                    @endauth

                                    @guest
                                        <div class="gap-50 d-none d-md-block"></div>
                                        <div class="comments-form">
                                            <h3 class="title-normal">Yorum bırakın</h3>
                                            <div class="row">

                                                <div class="col-md-12">
                                                    <p> Habere yorumunuzu eklemek için lütfen <a href="/login">giriş
                                                            yapınız.</a></p>

                                                </div>
                                            </div>
                                        </div>

                                    @endguest

                                    <div class="gap-30"></div>
                                    <h2 class="block-title">
                                        <span class="title-angle-shap"> İLGİLİ HABERLER</span>
                                    </h2>
                                    <div class="row">

                                        @foreach($data["realted"] as $k => $v)
                                            <div class="col-md-4">
                                                <div class="post-block-style">
                                                    <div class="post-thumb">
                                                        <a href="{{route("frontend.blog.index",$v["slug"])}}">
                                                            <img class="img-fluid" src="/images/blogs/{{$v["file"]}}"
                                                                 alt="{ $v[" title"] }}">
                                                        </a>

                                                    </div>

                                                    <div class="post-content">
                                                        <h2 class="post-title">
                                                            <a href="{{route("frontend.blog.index",$v["slug"])}}">{{ $v["title"] }}</a>
                                                        </h2>
                                                        <div class="post-meta mb-7 p-0">
                                                            <span class="post-date"><i class="fa fa-clock-o"></i> {{ $v->created_at->diffForHumans() }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                                <!-- realted post end -->
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="sidebar">
                            <div class="sidebar-widget ads-widget">
                                <div class="ads-image">
                                    {!!  $data["sidebarReklam"][0]["content"] !!}
                                </div>
                            </div>

                            <div class="row ts-gutter-30">
                                <div class="col-lg-12 col-md-12">

                                    <div class="row text-light ts-gutter-30">

                                        @foreach($data["gundem"] as $gundem)

                                            <div class="col-md-12">
                                                <div class="post-overaly-style post-sm"
                                                     style="background-image:url('/images/blogs/{{$gundem->file}}')">
                                                    <a href="{{  $gundem->slug }}" class="image-link">&nbsp;</a>
                                                    <div class="overlay-post-content">
                                                        <div class="post-content">
                                                            <h2 class="post-title mb-0">
                                                                <a href="{{  $gundem->url }}">{{$gundem->title}}</a>
                                                            </h2>
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
            </div>
        </section>

        <!-- YAZAR YAZMIŞSA -->
    @else


        <h1 style="display: none;">{{ $data["blog"]->title }}</h1>
        <section class="main-content pt-5" id="haber-tek">
            <div class="container">
                <div class="row ts-gutter-30">


                    <div class="col-lg-8" style="padding-top:0 !important">
                        <div class="single-post">


                            <div class="author-box d-flex">
                                    <a href="{{route("default.writer",$data["writer"]["slug"])}}">
                                        <img src="/images/users/{{$data["writer"]["twitter_post"]}}" style="width:100%;"
                                             alt="{{ $data["writer"]["name"] }}">
                                    </a>
                              
                              
                            </div>


                            <div class="post-header-area">
                                <h2 class="post-title title-lg">{{ $data["blog"]->title }}</h2>
                            </div><!-- post-header-area end -->


                            <div class="post-content-area">
                                @isset($data["blog"]->file)
                                    <div class="post-media mb-20">
                                        <a href="/images/blogs/{{ $data["blog"]->file  }}"
                                           class="gallery-popup cboxElement">
                                            <img src="/images/blogs/{{ $data["blog"]->file  }}"
                                                 alt="{{$data["blog"]->title}}"
                                                 class="img-fluid">
                                        </a>
                                    </div>
                                @endisset
                                <div id="haber-icerik">
                                    {!! $data["blog"]->content !!}
                                </div>
                                <ul class="post-meta">

                                    <li><i class="fa fa-clock-o"></i>

                                        @if(\Carbon\Carbon::now()->diffInDays($data["blog"]->created_at,false) < -5)
                                            {{ $data["blog"]->created_at->formatLocalized('%d %B %A %Y')  }}
                                        @else
                                            {{ $data["blog"]->created_at->diffForHumans() }}
                                        @endif

                                    </li>


                                    <li style="float:right;">
                                        <script>
											jQuery(document).ready(function ($) {
												$('body').on('click', '.social-media-share a', function (e) {
													e.preventDefault();
													var data = $(this).attr('data-url');
													vce_social_share(data);
												});

												function vce_social_share (data)
												{
													window.open(data, "Share", 'height=500,width=760,top=' + ($(window).height() / 2 - 250) + ', left=' + ($(window).width() / 2 - 380) + 'resizable=0,toolbar=0,menubar=0,status=0,location=0,scrollbars=0');
												}
											});
                                        </script>
                                        <div class="social-media-share">

                                            <a class="facebook" href="javascript:void(0);"
                                               data-url="https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}"
                                               title="Facebook'ta Paylaş"><i class="fa fa-facebook"></i></a>

                                            <a class="twitter" href="javascript:void(0);"
                                               data-url="https://twitter.com/intent/tweet?original_referer={{ url()->current() }}&related=turnahaber&text={{$data["blog"]->title}}&url={{ url()->current() }}&via=turnahaber"
                                               data-size="large"
                                               title="Tweetle"><i class="fa fa-twitter"></i></a>

                                            <a class="whatsapp" href="javascript:void(0);"
                                               data-url="https://api.whatsapp.com/send?text={{ $data["blog"]->title }} -- {{ url()->current() }}"
                                               title="WhatsApp ile Paylaş"><i class="fa fa-whatsapp"></i></a>

                                        </div>
                                    </li>
                                </ul>
                            </div><!-- post-content-area end -->


                            <div class="post-footer">

                                <hr>
                                <div class="related-post">

                                    <div class="comments-area">
                                        <h3 class="block-title"><span>{{ count($data["comments"]) }} Yorum</span></h3>
                                        <ul class="comments-list">
                                            @forelse($data["comments"] as $comment)
                                                <li>
                                                    <div class="comment">
                                                        @if(isset(Auth::user()->id) and Auth::user()->id == $comment->userID)
                                                            <a href="{{ route("frontend.comment.delete",$comment->id) }}"
                                                               style="padding: 3px; line-height: 10px; color: black"
                                                               class="float-right"><i class="fa fa-trash-o"></i></a>
                                                        @endif
                                                        <img class="comment-avatar pull-left" alt="{{ $comment->name }}"
                                                             onerror="this.src='/images/users/user.png';"
                                                             src="/images/users/{{$comment->file}}">
                                                        <div class="comment-body">
                                                            <div class="meta-data">
                                                                <span class="comment-author">{{ $comment->name }}</span>
                                                                <span class="comment-author"></span>
                                                                {{ \Carbon\Carbon::parse($comment->created_at)->diffForHumans() }}

                                                            </div>
                                                            <div class="comment-content">
                                                                <p>{{ $comment->content  }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                            @empty
                                                Henüz yorum yapılmamış.
                                            @endforelse

                                        </ul>
                                    </div>
                                    @auth
                                        <div class="comments-form">
                                            <h3 class="title-normal">Yorum bırakın
                                                <div id="charNum"></div>
                                            </h3>
                                            <form method="POST" action="{{ route("frontend.comment.send")}}">
                                                @CSRF
                                                <div class="row">

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                    <textarea class="form-control input-msg required-field"
                                                              name="content" style="height: 140px;"
                                                              onkeyup="countChar(this)"
                                                              placeholder="Senin yorumun" rows="30" cols="30"
                                                              required="">{{old("content")}}</textarea>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="clearfix">
                                                    <input type="hidden" name="blogs_id"
                                                           value="{{ $data["blog"]->id }}">
                                                    <input type="hidden" name="users_id" value="{{ Auth::user()->id }}">
                                                    <button class="comments-btn btn btn-primary" type="submit">Yorumu
                                                        Gönder
                                                    </button>
                                                </div>
                                            </form>
                                        </div>

                                    @endauth

                                    @guest
                                        <div class="gap-50 d-none d-md-block"></div>
                                        <div class="comments-form">
                                            <h3 class="title-normal">Yorum bırakın</h3>
                                            <div class="row">

                                                <div class="col-md-12">
                                                    <p> Habere yorumunuzu eklemek için lütfen <a href="/login">giriş
                                                            yapınız.</a></p>

                                                </div>
                                            </div>
                                        </div>

                                    @endguest

                                    <div class="gap-30"></div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="sidebar">
                            <div class="sidebar-widget ads-widget">
                                <div class="ads-image">
                                    {!!  $data["sidebarReklam"][0]["content"] !!}

                                </div>
                            </div>

                            <div class="row ts-gutter-30">
                                <div class="col-lg-12 col-md-12">

                                    <div class="row text-light ts-gutter-30">

                                        @foreach($data["gundem"] as $gundem)

                                            <div class="col-md-12">
                                                <div class="post-overaly-style post-sm"
                                                     style="background-image:url('/images/blogs/{{$gundem->file}}')">
                                                    <a href="{{  $gundem->slug }}" class="image-link">&nbsp;</a>
                                                    <div class="overlay-post-content">
                                                        <div class="post-content">
                                                            <h2 class="post-title mb-0">
                                                                <a href="{{  $gundem->url }}">{{$gundem->title}}</a>
                                                            </h2>
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
            </div>
        </section>


    @endif


@endsection

@section("css")@endsection
@section("js")

    <script>
		function countChar (val)
		{
			var len = val.value.length;
			if (len >= 400)
			{
				val.value = val.value.substring(0, 400);
			}

			else
			{
				$('#charNum').text(400 - len);
			}
		};
    </script>

@endsection
