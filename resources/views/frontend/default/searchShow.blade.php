@extends('frontend.layout')
@section('content')
    <h1 style="display: none;">Haber Arama - Turna Haber</h1>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="gap-30"></div>


                <form method="post" action="/search">
                    @CSRF

                    <div class="form-group row">
                        <label for="email"
                               class="col-md-4 col-form-label text-md-right"></label>

                        <div class="col-md-4">
                            <input  type="search" class="form-control"
                                   name="s" required autofocus placeholder="Aramak istediğiniz haberi yazın">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-md-4 col-form-label text-md-right"></label>

                        <div class="col-md-4" style="font-size:15px;text-align: center;">
                            <button class="btn btn-primary">
                                <i class="icon icon-search1"></i> Haber Ara
                            </button>


                        </div>
                    </div>



                </form>

                </form>
            </div>
        </div>
    </div>
    <div class="gap-30"></div>

@endsection
