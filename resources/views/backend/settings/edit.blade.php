@extends("backend.layout")
@section("content")
    <section class="content-header">

        <div class="box box-primary">
            <div class="box-header width-border">
                <h3>{{$settings->description}}</h3>

            </div>
            <div class="box box-body">

                <form action="{{route("settings.Update",["id" => $settings->id])}}" method="post" enctype="multipart/form-data">
                    @CSRF
                    <div class="form-group">
                        <label for="">Açıklama</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" readonly name="value" type="text" value="{{$settings->description}}">
                            </div>
                        </div>
                    </div>

                    @if($settings->type == "file")
                        <div class="form-group">
                            <label for="">Resim Seç</label>
                            <div class="row">
                                <div class="col-xs-12">
                                    <input class="form-control" type="file" name="value">
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="">İçerik</label>
                        <div class="row">
                            <div class="col-xs-12">
                                @if($settings->type == "text")
                                    <input class="form-control" type="text" name="value" required
                                           value="{{$settings->value}}">
                                @endif

                                @if($settings->type == "textarea")
                                    <textarea class="form-control" name="value">{{$settings->value}}</textarea>
                                @endif

                                    @if($settings->type == "ckeditor")
                                        <textarea id="editor1" class="form-control" name="value">{{$settings->value}}</textarea>
                                        <script>CKEDITOR.replace("editor1");</script>
                                    @endif

                                    @if($settings->type == "file")
                                        <img width="500" src="/images/settings/{{$settings->value}}" alt="">
                                    @endif


                            </div>
                        </div>
                    </div>

                    @if($settings->type == "file")
                        <input type="hidden" value="{{$settings->value}}" name="old_file">
                    @endif
                    <div align="right" class="box-footer"><button class="btn btn-success" type="submit">Düzenle</button></div>

                </form>
            </div>

        </div>

    </section>


@endsection

@section('css')@endsection
@section('js')@endsection
