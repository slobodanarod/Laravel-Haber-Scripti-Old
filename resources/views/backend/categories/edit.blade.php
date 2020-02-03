@extends("backend.layout")
@section("content")
    <section class="content-header">

        <div class="box box-primary">
            <div class="box-header width-border">
                <h3>Kategori Düzenle</h3>

            </div>
            <div class="box box-body">

                <form action="{{ route("category.update",$data["category"]->id ) }}" method="post" enctype="multipart/form-data">
                    @CSRF
                    @method('PUT')

                    <div class="form-group">
                        <label for="">Başlık</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" name="name" type="text"
                                       value="{{ $data["category"]->name }}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">Slug</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" name="slug" type="text"
                                       value="{{ $data["category"]->slug }}">
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="">Durum</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <select name="status" class="form-control">
                                    <option value="1" {{ $data["category"]->status == "1" ? "selected" : ""  }} >Aktif</option>
                                    <option value="0" {{ $data["category"]->status == "0" ? "selected" : ""  }}>Pasif</option>
                                </select>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="">Üst Kategori</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <select name="main_cat" class="form-control">
                                    <option value="0" >Ana Kategori</option>
                                    @foreach($data["categories"] as $category)
                                        <option value="{{$category->id}}" {{  $category->id == $data["category"]->main_cat ? "selected" : ""   }} >{{ $category->name }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                    </div>

                    <h5>Meta Ayarları</h5>


                    <div class="form-group">
                        <label for="">Title</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" name="title" type="text"
                                       value="{{ $data["category"]->title }}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">Keywords</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" name="keywords" type="text"
                                       value="{{ $data["category"]->keywords }}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">Description</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <textarea class="form-control"
                                          name="description"> {{$data["category"]->description}} </textarea>
                            </div>
                        </div>
                    </div>


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
