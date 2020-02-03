@extends("backend.layout")
@section("content")
    <section class="content-header">

        <div class="box box-primary">
            <div class="box-header width-border">
                <h3>Banner Düzenleme</h3>

            </div>
            <div class="box box-body">

                <form action="{{route("banners.update",$data["banner"][0]->id )}}" method="post"
                      enctype="multipart/form-data">
                    @CSRF
                    @method("PUT")
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
                                <input class="form-control" name="name" type="text"
                                       value="{{ $data["banner"][0]->name }}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">URL LİNK</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" name="url" type="text"
                                       value="{{ $data["banner"][0]->url }}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">Açıklama</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" name="description" value="{{ $data["banner"][0]->description  }}" type="text">
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="">Pozisyon</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <select name="position" class="form-control">
                                    @foreach($data["positions"] as $position)
                                        <option
                                            value="{{$position->id}}" {{$data["banner"][0]->position == $position->id ? "selected" : "" }} >{{$position->name}}</option>
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
                                    <option value="1" {{ $data["banner"][0]->status == 1 ? "selected" : "" }} >Aktif
                                    </option>
                                    <option value="0" {{ $data["banner"][0]->status == 0 ? "selected" : "" }}>Pasif
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>


                    <div align="right" class="box-footer">
                        <input type="hidden" value="{{ $data["banner"][0]->file }}" name="old_file">
                        <button class="btn btn-success" type="submit">Düzenle</button>
                    </div>

                </form>
            </div>

        </div>

    </section>


@endsection

@section('css')@endsection
@section('js')@endsection
