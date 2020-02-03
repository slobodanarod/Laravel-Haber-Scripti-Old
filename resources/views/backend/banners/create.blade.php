@extends("backend.layout")
@section("content")
    <section class="content-header">

        <div class="box box-primary">
            <div class="box-header width-border">
                <h3>Banner Ekle</h3>

            </div>
            <div class="box box-body">

                <form action="{{route("banners.store")}}" method="post" enctype="multipart/form-data">
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
                        <label for="">Adı</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" name="name" type="text">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">URL LİNK</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" name="url" type="text">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">Açıklama</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" name="description" type="text">
                            </div>
                        </div>
                    </div>



                    <div class="form-group">
                        <label for="">Pozisyon</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <select name="position" class="form-control">
                                @foreach($positions as $position)
                                        <option value="{{$position->id}}">{{$position->name}}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

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
