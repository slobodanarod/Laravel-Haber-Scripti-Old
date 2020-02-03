@extends("frontend.layout")
@section("title",$category["name"]." Haberleri")
@section("content")

    <h1 style="display: none;">{{ $category["name"] }}</h1>
    <section class="main-content category-layout-1 pt-5">
        <div class="container">
            <div class="row ts-gutter-30">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-12">
                            <h2 class="block-title">
                                <span class="title-angle-shap">  {{$category["name"]}} </span>
                            </h2>

                        </div>
                    </div>
                    <div class="row ts-gutter-10">


                        @foreach($categories as $v)

                            <div class="col-md-3">
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
                    {{ $categories["links"] }}
                </div>
            </div>

        </div>
    </section>


@endsection

@section("css")@endsection
@section("js")@endsection
