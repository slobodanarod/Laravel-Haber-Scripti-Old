@extends("frontend.layout")
@section("title","İletişim")
@section("content")

    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3">İletişim
        </h1>

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{route("default.index")}}">Ana Sayfa</a>
            </li>
            <li class="breadcrumb-item active">İletişim</li>
        </ol>

        <div class="row">
            <div class="col-lg-8 mb-4">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                    @if (session()->has("success"))
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ session("success") }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                <h3>Bize ulaşın</h3>
                <form name="sentMessage" id="contactForm" method="post" action="{{route("default.contact.post")}}">
                    @CSRF
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Full Name:</label>
                            <input type="text" class="form-control" name="name" >
                            <p class="help-block"></p>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Phone Number:</label>
                            <input type="tel" class="form-control" name="phone">
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Email Address:</label>
                            <input type="email" class="form-control" name="email">
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Message:</label>
                            <textarea rows="10" cols="100" class="form-control" name="message"  maxlength="999" style="resize:none"></textarea>
                        </div>
                    </div>
                    <div id="success"></div>
                    <button type="submit" class="btn btn-primary">Mesajı Gönder</button>
                </form>

            </div>
            <!-- Contact Details Column -->
            <div class="col-lg-4 mb-4">
                <h3>İletişim Bilgileri</h3>
                <p>
                    {!! $settings["adres"] !!}
                </p>
                <p>
                    <abbr title="Phone">T</abbr>: {{$settings["phone_gsm"]}}
                </p>
                <p>
                    <abbr title="Email">M</abbr>:
                    <a href="mailto:name@example.com">{{$settings["mail"]}}
                    </a>
                </p>
                <p>
                    <abbr title="Hours">H</abbr>: Monday - Friday: 9:00 AM to 5:00 PM
                </p>
            </div>
        </div>


    </div>
    <!-- /.container -->

@endsection

@section("css")@endsection
@section("js")@endsection
