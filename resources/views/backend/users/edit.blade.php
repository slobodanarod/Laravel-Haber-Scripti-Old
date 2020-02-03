@extends("backend.layout")
@section("content")
    <section class="content-header">

        <div class="box box-primary">
            <div class="box-header width-border">
                <h3>User Düzenleme</h3>

            </div>
            <div class="box box-body">

                <form action="{{route("user.update",$user->id)}}" method="post" enctype="multipart/form-data">
                    @CSRF
                    @method('PUT')
                    @isset($user->file)
                        <div class="form-group">
                            <label for="">Yükle resim</label>
                            <div class="row">
                                <div class="col-xs-12">
                                    <img width="100" src="/images/users/{{$user->file}}">
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
                        <label for="">Name</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" name="name" type="text" value="{{$user->name}}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">Kullanıcı Adı (Email)</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" name="email" type="email" value="{{$user->email}}">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">Şifre</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <input class="form-control" name="password" type="text">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">Açıklama</label>
                        <div class="row">
                            <div class="col-xs-12">
                                <textarea name="description">{{$user->description}}</textarea>
                            </div>
                        </div>
                    </div>



                    <div class="form-group">
                        <label for="">Durum</label>
                        <div class="row">
                            <div class="col-xs-12">

                                <select name="status" class="form-control">
                                    <option value="1" {{$user->status=="1" ? "selected" : ""}} >Aktif</option>
                                    <option value="0" {{$user->status=="0" ? "selected" : ""}}>Pasif</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="">Role</label>
                        <div class="row">
                            <div class="col-xs-12">

                                <select name="role" class="form-control">
                                    <option value="admin" {{$user->role=="admin" ? "selected" : ""}} >Admin</option>
                                    <option value="user" {{$user->role=="user" ? "selected" : ""}}>Kullanıcı</option>
                                    <option value="writer" {{$user->role=="writer" ? "selected" : ""}}>Yazar</option>
                                </select>
                            </div>
                        </div>
                    </div>


                    <input type="hidden" value="{{$user->file}}" name="old_file">

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
