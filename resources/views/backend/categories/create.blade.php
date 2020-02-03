@extends("backend.layout")
@section("content")
    <section class="content-header">

        <div class="box box-primary">
            <div class="box-header width-border">
                <h3>Kategori Ekle</h3>

            </div>
            <div class="box box-body">

                <form action="{{route("category.store")}}" method="post" enctype="multipart/form-data">
                    @CSRF
                    <div class="form-group">
                        <label for="">Başlık</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" name="name" type="text">
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


                    <div class="form-group">
                        <label for="">Üst Kategori</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <select name="main_cat" class="form-control">
                                    <option value="0">Ana Kategori</option>
                                    @foreach($data["categories"] as $category)
                                        <option value="{{$category->id}}">{{ $category->name }}</option>
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
                                <input class="form-control" name="title" type="text">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">Keywords</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" name="keywords" type="text">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">Description</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <textarea class="form-control" name="description"></textarea>
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
