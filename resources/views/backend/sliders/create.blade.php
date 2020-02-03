@extends("backend.layout")
@section("content")
    <section class="content-header">

        <div class="box box-primary">
            <div class="box-header width-border">
                <h3>Slider Ekle</h3>

            </div>
            <div class="box box-body">

                <form action="{{route("slider.store")}}" method="post" enctype="multipart/form-data">
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
                                <input class="form-control"  name="title" type="text">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">Slug</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control"  name="slug" type="text">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">URL</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control"  name="url" type="text">
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="">İçerik</label>
                        <div class="row">
                            <div class="col-xs-12">

                                        <textarea id="editor1" class="form-control" name="slider_content"></textarea>
                                        <script>CKEDITOR.replace("editor1");</script>



                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">İçerik</label>
                        <div class="row">
                            <div class="col-xs-12">

                        <select name="status" class="form-control">
                            <option value="1">Aktif</option>
                            <option value="0">Pasif</option>
                        </select>
                            </div>
                        </div>
                    </div>



                    <div align="right" class="box-footer"><button class="btn btn-success" type="submit">Ekle</button></div>

                </form>
            </div>

        </div>

    </section>


@endsection

@section('css')@endsection
@section('js')@endsection
