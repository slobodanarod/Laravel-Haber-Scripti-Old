@extends('frontend.layout')
@section('content')
    <h1 style="display: none;">Yazı Düzenleme - Turna Haber</h1>
    <script src="https://cdn.ckeditor.com/ckeditor5/16.0.0/classic/ckeditor.js"></script>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="gap-30"></div>

                <h2>Yazı Düzenleme</h2>
                <div class="gap-30"></div>

                <form method="POST" action="{{route("frontend.writer.news.update",["id" => $data["new"]["id"]])}}">
                    @csrf

                    <div class="form-group">
                        <label for="exampleFormControlInput1">Yazı Başlığı</label>
                        <input type="text" class="form-control" name="title" value="{{ $data["new"]["title"]  }}">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Yazı İçeriği</label>
                        <textarea id="editor1" class="form-control" name="blog_content">{{ $data["new"]["content"]  }}</textarea>
                        <script>CKEDITOR.replace("editor1");</script>
                    </div>
                    <button type="submit" class="btn btn-primary">Yazıyı Güncelle</button>
                </form>
            </div>
        </div>
    </div>
    <div class="gap-30"></div>
    <script>
		ClassicEditor
			.create(document.querySelector('#editor1'))
			.catch(error => {
				console.error(error);
			});
    </script>

@endsection
