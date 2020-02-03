@extends('frontend.layout')
@section("title","Giriş Yap")
@section('content')
    <h1 style="display: none;">Giriş Yap - Turna Haber</h1>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="gap-30"></div>
                <center><h2>Üye Girişi</h2></center>
                <div class="gap-30"></div>

                <div class="form-group row">

                    <label for="email" class="col-md-4 col-form-label text-md-right"></label>
                    <div class="col-md-4" style="font-size:15px;text-align: center;">
                        <a href="/facebook-redirect" class="btn" style="background: #0b3e6f;"><i
                                class="fa fa-facebook-f"></i> Facebook ile giriş yap</a>
                    </div>
                </div>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="email"
                               class="col-md-4 col-form-label text-md-right">{{ __('E-Posta Adresi') }}</label>

                        <div class="col-md-4">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                   name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

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
                                   autocomplete="current-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-4 offset-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember"
                                       id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Beni Hatırla') }}
                                </label>
                            </div>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right"></label>

                        <div class="col-md-4" style="font-size:15px;text-align: center;">
                            <button type="submit" class="btn btn-primary" style="width: 100%;">
                                {{ __('GİRİŞ YAP') }}
                            </button>

                            <div style="margin:10px;">
                                @if (Route::has('password.request'))
                                    <a style="margin:10px;font-weight: bold;" href="{{ route('password.request') }}">
                                        {{ __('Parolamı Unuttum') }}
                                    </a>
                                @endif
                                <br>
                                Hesabınız yok mu ?
                                <a style="font-weight: bold;" href="/register">
                                    Kayıt Ol
                                </a>
                            </div>
                        </div>
                    </div>


            </div>
            </form>
        </div>
    </div>
    </div>
    <div class="gap-30"></div>

@endsection
