@extends("frontend.layout")
@section("title",$data["writer"]["name"])
@section("content")
    <h1 style="display: none;">{{ $data["writer"]["name"] }}</h1>
    <section class="main-content category-layout-1 pt-5">
        <div class="container">
            <div class="row ts-gutter-30">
                <div class="col-lg-12">
                    <div class="row ts-gutter-10">
                        <div class="col-lg-3">
                            <h3>  {{ $data["writer"]["name"] }} </h3>
                            <div class="author-box" style="margin: 0;border: none;">
                                <img src="/images/users/{{$data["writer"]["file"]}}" alt="{{$data["writer"]["name"]}}"
                                     style="width:100%">

                            </div>
                            <div class="author-info">
                                {{ $data["writer"]["description"] }}
                            </div>
                        </div>
                        <div class="col-md-9">

                            @foreach($data["blogs"] as $v)
                                <div class="post-block-style">
                                    <div class="post-thumb">
                                    </div>
                                    <div class="post-content">
                                        <h2 class="post-title title-md">
                                            <a href="{{route("frontend.blog.index",$v["slug"])}}">{{$v->title}}
                                            </a>
                                        </h2>
                                        <a href="{{route("frontend.blog.index",$v["slug"])}}">{{$v->title}}
                                            <p>{!!  \Illuminate\Support\Str::limit($v["content"],150,$end ="...") !!} </p>
                                        </a>
                                        <div class="post-meta mb-7">
                                            <span class="post-date"><i class="fa fa-clock-o"></i> {{ $v->created_at->diffForHumans() }}</span>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            @endforeach
                        </div>
                    </div>
                    <div class="gap-30 d-none d-md-block"></div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section("css")@endsection
@section("js")@endsection
