@extends("frontend.layout")
@section("title","Üyelik Bilgileri - Turna Haber")
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="gap-30"></div>

                <form method="POST" action="{{ route('frontend.profile.settings.update') }}"
                      enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="name" class="col-md-12 col-form-label text-md-left">{{ __('Profil Resmi') }}</label>

                        <div class="col-md-3">
                            <img src="/images/users/{{ $data["info"]["file"] }}" style="width: 100%"
                                 class="img-thumbnail img-fluid">
                        </div>
                        <div class="col-md-12" style="margin-top: 10px">
                            <input type="file" class="form-control @error('file') is-invalid @enderror"
                                   name="file">

                            @error('file')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-md-12 col-form-label text-md-left">{{ __('İsim') }}</label>

                        <div class="col-md-12">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                   name="name" value="{{ $data["info"]->name }}" required autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email"
                               class="col-md-12 col-form-label text-md-left">{{ __('E-Posta Adresi') }}</label>

                        <div class="col-md-12">
                            <input id="email" type="email" disabled
                                   class="form-control @error('email') is-invalid @enderror"
                                   value="{{ $data["info"]->email }}" autocomplete="email">
                            <small>E-Posta Adresi Değiştirilmez.</small>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="phone"
                               class="col-md-12 col-form-label text-md-left">{{ __('Telefon Numarası') }}</label>
                        <div class="col-md-12">
                            <input id="phone" type="text" name="phone"
                                   class="form-control @error('phone') is-invalid @enderror"
                                   value="{{ $data["info"]->phone }}">
                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group mb-0">
                        <div class="col-md-4">
                            <input type="hidden" value="{{$data["info"]->file }}" name="old_file">
                            <button type="submit" style="width: 100%;" class="btn btn-primary">
                                {{ __('GÜNCELLE') }}
                            </button>

                            <div style="margin:10px;">
                                    <a style="margin-top:10px;font-weight: bold;"
                                       href="{{ route('frontend.profile.password.restart') }}">
                                        {{ __('Şifremi Değiştir') }}
                                    </a>
                                <br>
                                <!--
                                <a style="font-weight: bold;" href="/register">
                                    Hesabımı Devre Dışı Bırak
                                </a>
                                -->
                            </div>

                        </div>


                    </div>
                </form>

            </div>

            <div class="col-md-8">
                <div class="gap-30"></div>


            </div>

        </div>
    </div>
    <div class="gap-30"></div>

@endsection

@section("css")@endsection
@section("js")@endsection
