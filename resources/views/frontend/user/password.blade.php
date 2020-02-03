@extends("frontend.layout")
@section("title","Şifreni Değiştir")
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="gap-30"></div>

                <form method="POST" action="{{ route('frontend.profile.password.restart.update') }}">
                    @csrf
                    <div class="form-group">
                        <label for="old_password" class="col-md-12 col-form-label text-md-left">{{ __('Eski Şifre') }}</label>

                        <div class="col-md-12">
                            <input id="old_password" type="password"
                                   class="form-control @error('old_password') is-invalid @enderror"
                                   name="old_password" required autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="new_password" class="col-md-12 col-form-label text-md-left">{{ __('Yeni Şifre') }}</label>

                        <div class="col-md-12">
                            <input id="new_password" type="password"
                                   class="form-control @error('new_password') is-invalid @enderror"
                                   name="new_password" required a autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="new_password1"
                               class="col-md-12 col-form-label text-md-left">{{ __('Yeni Şifre Tekrar') }}</label>

                        <div class="col-md-12">
                            <input id="new_password1" type="password"
                                   class="form-control @error('new_password1') is-invalid @enderror"
                                   name="new_password1" required autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group mb-0">
                        <div class="col-md-4">
                            <button type="submit" style="width: 100%;" class="btn btn-primary">
                                {{ __('ŞİFREMİ DEĞİŞTİR') }}
                            </button>


                        </div>


                    </div>


                </form>

            </div>


        </div>
    </div>
    <div class="gap-30"></div>

@endsection

@section("css")@endsection
@section("js")@endsection
