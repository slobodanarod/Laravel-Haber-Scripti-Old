@extends("backend.layout")
@section("content")
    <section class="content-header">

        <div class="box box-primary">
            <div class="box-header width-border">
                <h3>Slider Düzenleme</h3>

            </div>
            <div class="box box-body">

                <form action="{{route("slider.update",$slider->id)}}" method="post" enctype="multipart/form-data">
                    @CSRF
                    @method('PUT')
                    @isset($slider->file)
                        <div class="form-group">
                            <label for="">Yükle resim</label>
                            <div class="row">
                                <div class="col-xs-12">
                                    <img width="100" src="/images/sliders/{{$slider->file}}">
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
                                <input class="form-control" name="title" type="text" value="{{$slider->title}}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">Slug</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" name="slug" type="text" value="{{$slider->slug}}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">URL</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" name="url" type="text" value="{{$slider->url}}">
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="">İçerik</label>
                        <div class="row">
                            <div class="col-xs-12">

                                <textarea id="editor1" class="form-control"
                                          name="slider_content">{{$slider->content}}</textarea>
                                <script>CKEDITOR.replace("editor1");</script>


                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">İçerik</label>
                        <div class="row">
                            <div class="col-xs-12">

                                <select name="status" class="form-control">
                                    <option value="1" {{$slider->status=="1" ? "selected" : ""}} >Aktif</option>
                                    <option value="0" {{$slider->status=="0" ? "selected" : ""}}>Pasif</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" value="{{$slider->file}}" name="old_file">

                    <div align="right" class="box-footer">
                        <button class="btn btn-success" type="submit">Düzenle</button>
                    </div>

                </form>
            </div>

        </div>

    </section>


@endsection

@section('css')@endsection
@section('js')@endsection
