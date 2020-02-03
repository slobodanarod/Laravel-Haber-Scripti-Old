@extends("backend.layout")
@section("content")


    <section class="content-header">

        <div class="box box-primary">
            <div class="box-header width-border">
                <h3>Blog Ekle</h3>

            </div>
            <div class="box box-body">

                <form action="{{route("blog.store")}}" method="post" enctype="multipart/form-data">
                    @CSRF

                    <div class="form-group">
                        <label for="">Resim Seç</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" type="file" name="file">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">Başlık</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" name="title" type="text">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">Slug</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" name="slug" type="text">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">İçerik</label>
                        <div class="row">
                            <div class="col-xs-12">

                                <textarea id="summernote" class="form-control" name="blog_content"></textarea>

                            </div>
                        </div>
                    </div>

                    <script>
						$(document).ready(function () {
							$('#summernote').summernote({
								height: 200, callbacks: {
									onImageUpload: function (files, editor, welEditable) {
										sendFile(files[ 0 ], editor, welEditable);
									}
								}
							});

							function sendFile (file, editor, welEditable)
							{
								data = new FormData();
								data.append("file", file);
								$.ajaxSetup({
									headers: {
										'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
									}
								});

								$.ajax({
									data: data,
									type: "POST",
									url: "{{route('blogs.upload')}}",
									cache: false,
									contentType: false,
									processData: false,
									success: function (url) {
										var image = $('<img>').attr('src', url);
										$('#summernote').summernote("insertNode", image[ 0 ]);
									},
									error: function (data) {
										console.log(data);
									}
								});
							}
						});


                    </script>

                    <div class="form-group">
                        <label for="">Durum</label>
                        <div class="row">
                            <div class="col-xs-12">

                                <select name="status" class="form-control">
                                    <option value="1">Aktif</option>
                                    <option value="0">Pasif</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <h5>Kategori Ayarları</h5>
                    <span id="cloneCategory" class="btn btn-success" style="padding: 3px;float: right;">ekle +</span>
                    <div class="form-group" id="category">
                        <label for="">Kategori </label>
                        <div class="row">
                            <div class="col-xs-12">
                                <select name="categories[]" class="form-control">
                                    @foreach($data["categories"] as $k => $value)
                                        <option value="{{$value->id}}">{{$value->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div id="catpaste"></div>

                    <div class="form-group">
                        <label for="">Etiketler</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input type="text" name="tags" class="form-control">
                                <small>Lütfen etiketleri virgül ile ayırınız.</small>
                            </div>
                        </div>
                    </div>


                    <div align="right" class="box-footer">
                        <button class="btn btn-success" type="submit">Ekle</button>
                    </div>

                </form>
            </div>

        </div>

    </section>


@endsection

@section('css')@endsection
@section('js')


    <script>
		$(document).ready(function () {
			$("#cloneCategory").click(function () {
				$("#category").clone().appendTo("#catpaste");
			});
			$("#deleteCategory").click(function () {
				$(this).find("#category").remove();
			});

			$('#category span').on('click', function (e) {
				e.preventDefault();
				$(this).parent().remove();
			});


		});


    </script>


@endsection
