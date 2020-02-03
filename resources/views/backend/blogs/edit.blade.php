@extends("backend.layout")
@section("content")


    <section class="content-header">

        <div class="box box-primary">
            <div class="box-header width-border">
                <h3>Blog Düzenleme</h3>
            </div>
            <div class="box box-body">

                <form action="{{route("blog.update",$data["blogs"]->id)}}" method="post" enctype="multipart/form-data">
                    @CSRF
                    @method('PUT')
                    @isset($data["blogs"]->file)
                        <div class="form-group">
                            <label for="">Yükle resim</label>
                            <div class="row">
                                <div class="col-xs-12">
                                    <img width="100" src="/images/blogs/{{$data["blogs"]->file}}">
                                </div>
                            </div>
                        </div>
                    @endisset

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
                                <input class="form-control" name="title" type="text"
                                       value="{{ $data["blogs"]->title }}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">Slug</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" name="slug" type="text" value="{{ $data["blogs"]->slug }}">
                            </div>
                        </div>
                    </div>



                    <div class="form-group">
                        <label for="">İçerik</label>
                        <div class="row">
                            <div class="col-xs-12">

                                <textarea id="summernote" class="form-control" name="blog_content">{{$data["blogs"]->content}}</textarea>

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
                                    <option value="1" {{$data["blogs"]->status=="1" ? "selected" : ""}} >Aktif</option>
                                    <option value="0" {{$data["blogs"]->status=="0" ? "selected" : ""}}>Pasif</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <h5>Kategori Ayarları</h5>
                    <span id="cloneCategory" class="btn btn-success" style="padding: 3px;float: right;">ekle +</span>

                    @foreach($data["categories_blogs"] as $k => $value1)

                        <div class="form-group" id="category">
                            <label id="deleteCategory" for="">Kategori</label>
                            <div class="row" id="deletee">
                                <div class="col-xs-12">

                                    <select name="categories[]" class="form-control">
                                        @foreach($data["categories"] as $k => $value)
                                            <option
                                                {{ $value->id == $value1->id ? "selected" : ""  }} value="{{$value->id}}">{{$value->name}}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                        </div>

                    @endforeach

                    <div id="catpaste"></div>

                    <div class="form-group">
                        <label for="">Etiketler</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input type="text" name="tags" class="form-control" value="{{$data["tags"]}}">
                                <small>Lütfen etiketleri virgül ile ayırınız.</small>
                            </div>
                        </div>
                    </div>


                    <div align="right" class="box-footer">
                        <input type="hidden" value="{{$data["blogs"]->file}}" name="old_file">
                        <button class="btn btn-success" type="submit">Güncelle</button>
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

		});
		$("#deleteCategory").click(function () {
			console.log("selam");
			$(this).parent().remove();
		});
    </script>

@endsection
