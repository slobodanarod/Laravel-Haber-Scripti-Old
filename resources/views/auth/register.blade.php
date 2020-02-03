@extends('frontend.layout')
@section("title","Kayıt Ol")
@section('content')
    <h1 style="display: none;">Kayıt Ol - Turna Haber</h1>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="gap-30"></div>
                <center><h2>Hesap Oluştur</h2></center>
                <div class="gap-30"></div>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('İsim') }}</label>

                        <div class="col-md-4">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                   name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email"
                               class="col-md-4 col-form-label text-md-right">{{ __('E-Posta Adresi') }}</label>

                        <div class="col-md-4">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                   name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Parola') }}</label>

                        <div class="col-md-4">
                            <input id="password" type="password"
                                   class="form-control @error('password') is-invalid @enderror" name="password" required
                                   autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password-confirm"
                               class="col-md-4 col-form-label text-md-right">{{ __('Parola Tekrar') }}</label>

                        <div class="col-md-4">
                            <input id="password-confirm" type="password" class="form-control"
                                   name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-4 offset-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="sozlesme" required>

                                <label class="form-check-label" for="remember">
                                    <a href="/page/uyelik-sozlesmesi">Üyelik</a>, <a href="/page/gizlilik-sozlesmesi">Gizlilik</a> ve <a href="/page/kisisel-verilerin-korunmasi">Kişisel Verilerin Korunması</a> şartlarını kabul ediyorum.
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-4 offset-md-4">
                            <button type="submit" style="width: 100%;" class="btn btn-primary">
                                {{ __('KAYDINI TAMAMLA') }}
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
    <div class="gap-30"></div>

@endsection
