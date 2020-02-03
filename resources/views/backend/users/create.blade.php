@extends("backend.layout")
@section("content")
    <section class="content-header">

        <div class="box box-primary">
            <div class="box-header width-border">
                <h3>User Ekle</h3>

            </div>
            <div class="box box-body">

                <form action="{{route("user.store")}}" method="post" enctype="multipart/form-data">
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
                        <label for="">Ad Soyad</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control"  name="name" type="text">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">Kullanıcı Adı (Email)</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control"  name="email" type="text">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">Şifre</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control"  name="password" type="password">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">Rol</label>
                        <div class="row">
                            <div class="col-xs-12">

                                <select name="role" class="form-control">
                                    <option value="admin">Admin</option>
                                    <option value="user">Kullanıcı</option>
                                    <option value="writer">Writer</option>
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



                    <div align="right" class="box-footer"><button class="btn btn-success" type="submit">Ekle</button></div>

                </form>
            </div>

        </div>

    </section>


@endsection

@section('css')@endsection
@section('js')@endsection
