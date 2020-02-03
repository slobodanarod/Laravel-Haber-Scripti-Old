@extends("backend.layout")
@section("content")
    <section class="content-header">

        <div class="box box-primary">
            <div class="box-header width-border">
                <h3>Reklam Düzenleme</h3>

            </div>
            <div class="box box-body">

                <form action="{{route("ads.update",$ad["id"])}}" method="post">
                    @CSRF
                    @method("PUT")

                    <div class="form-group">
                        <label for="">Adı</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" name="name" value="{{$ad["name"]}}" type="text">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">Reklam Kodu</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <textarea name="content"
                                          style="width: 100%;height: 150px;">{{$ad["content"]}}</textarea>
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
@section('js')@endsection
