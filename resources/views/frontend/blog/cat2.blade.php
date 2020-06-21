@extends("frontend.master")
@section("title","İş İlanları Hakkında Yazılar")
@section("content")
    <section class="blog-area pt-115">
        <div class="container">
            <div class="row">
                @foreach($blogs as $blog)
                    <div class="col-lg-4 col-md-6">
                        <div class="single-blog mt-30">
                            <div class="blog-image">
                                <img src="/images/blogs/{{ $blog->file }}" alt="Blog">
                            </div>
                            <div class="blog-content">
                                <h4 class="blog-title"><a
                                        href="{{ route("frontend.blog.detail",$blog->slug) }}">{{ $blog->title }}</a>
                                </h4>
                                <p>{{ $blog->mini_content }}</p>
                                <a href="{{ route("frontend.blog.detail",$blog->slug) }}" class="main-btn main-btn-2">İlanları
                                    İncele</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{ $blogs->links() }}
        </div>
    </section>
@endsection
@section("css")@endsection
@section("js")@endsection
