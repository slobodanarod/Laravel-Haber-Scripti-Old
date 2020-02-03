@extends("frontend.layout")
@section("content")

    <h1 style="display: none;"> {{ $data["word"] }}</h1>
    <section class="main-content category-layout-1 pt-5">
        <div class="container">
            <div class="row ts-gutter-30">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-12">


                            <form method="post" action="/search">
                                @CSRF

                                <div class="form-group row">
                                    <label for="email"
                                           class="col-md-4 col-form-label text-md-right"></label>

                                    <div class="col-md-4">
                                        <input  type="search" class="form-control"
                                                name="s" value="{{ $data["word"]  }}" required autofocus placeholder="Aramak istediğiniz haberi yazın">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right"></label>

                                    <div class="col-md-4" style="font-size:15px;text-align: center;">
                                        <button class="btn btn-primary">
                                            <i class="icon icon-search1"></i> Haber Ara
                                        </button>


                                    </div>
                                </div>



                            </form>


                            <h2 class="block-title">
                                <span class="title-angle-shap">  Aranan Kelime : {{  $data["word"] }} </span>
                            </h2>

                        </div><!-- col end -->
                    </div><!-- row end -->



                    <div class="row ts-gutter-10">


                        @foreach($data["results"] as $v)

                            <div class="col-md-4">
                                <div class="post-block-style">
                                    <div class="post-thumb">
                                        <a href="{{route("frontend.blog.index",$v["slug"])}}">
                                            <img class="img-fluid" src="/images/blogs/{{$v->file}}" alt="{{$v->title}}">
                                        </a>

                                    </div>
                                    <div class="post-content">
                                        <h2 class="post-title title-md">
                                            <a href="{{route("frontend.blog.index",$v["slug"])}}">{{$v->title}}</a>
                                        </h2>
                                        <div class="post-meta mb-7">
                                            <span class="post-date"><i class="fa fa-clock-o"></i> {{ $v->created_at->diffForHumans() }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endforeach

                    </div>
                    <div class="gap-30 d-none d-md-block"></div>
                </div>
            </div><!-- row end -->
        </div><!-- container end -->
    </section><!-- category-layout end -->


@endsection

@section("css")@endsection
@section("js")@endsection
