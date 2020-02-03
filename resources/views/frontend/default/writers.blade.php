@extends("frontend.layout")
@section("title","Yazarlar")
@section("content")

    <h1 style="display: none;"> Yazarlar </h1>
    <section class="main-content category-layout-1 pt-5">
        <div class="container">
            <div class="row ts-gutter-30">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="block-title">
                                <span class="title-angle-shap"> Yazarlar </span>
                            </h2>
                        </div>
                    </div>
                    <div class="row ts-gutter-10">


                        @foreach($data["writers"] as $v)

                            <div class="col-md-3">
                                <div class="post-block-style">
                                    <div class="post-thumb">
                                        <h2 class="post-title title-md text-center" >
                                            <a href="{{route("default.writer",$v["slugW"])}}" style="color: red">{{$v["name"]}}</a>
                                        </h2>
                                        <a href="{{route("frontend.blog.index",$v["slug"])}}">
                                            <img class="img-fluid" src="/images/users/{{$v["file"]}}" alt="{{$v["title"]}}">
                                        </a>
                                    </div>
                                    <div class="post-content">

                                        <h2 class="post-title title-md">
                                            <a href="{{route("frontend.blog.index",$v["slug"])}}">{{$v["title"]}}</a>
                                        </h2>
                                        <div class="post-meta mb-7">
                                            <span class="post-date"><i class="fa fa-clock-o"></i> {{ \Carbon\Carbon::parse($v["created_at"])->formatLocalized('%d %B %A %Y') }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endforeach

                    </div><!-- row end -->
                    <div class="gap-30 d-none d-md-block"></div>
                </div><!-- col-lg-8 -->
            </div><!-- row end -->
        </div><!-- container end -->
    </section><!-- category-layout end -->


@endsection

@section("css")@endsection
@section("js")@endsection
