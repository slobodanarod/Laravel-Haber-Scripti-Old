@extends("frontend.layout")
@section("title","Anasayfa Başlığı")
@section("content")


    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3">Page
            <small>Pagelar listeleniyor</small>
        </h1>


        @foreach($data["pages"] as $page)

        <div class="card mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-6">
                        <a href="{{route("frontend.page.detail",$page->slug)}}">
                            <img class="img-fluid rounded" src="/images/pages/{{$page->file}}" alt="{{  $page->title }}">
                        </a>
                    </div>
                    <div class="col-lg-6">
                        <h2 class="card-title">{{  $page->title }}</h2>
                        <p class="card-text">{!! substr($page->content,0,140)  !!}</p>
                        <a href="{{route("frontend.page.detail",$page->slug)}}" class="btn btn-primary">Daha fazlası &rarr;</a>
                    </div>
                </div>
            </div>
            <div class="card-footer text-muted">
               Yayınlanma Zamanı {{ $page->created_at->format("d-m-Y h:i") }}
            </div>
        </div>
        @endforeach


        <!-- Pagination -->
        <ul class="pagination justify-content-center mb-4">
            <li class="page-item">
                <a class="page-link" href="#">&larr; Older</a>
            </li>
            <li class="page-item disabled">
                <a class="page-link" href="#">Newer &rarr;</a>
            </li>
        </ul>

    </div>

    </div>

@endsection

@section("css")@endsection
@section("js")@endsection
