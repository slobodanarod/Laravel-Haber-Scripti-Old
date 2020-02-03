@extends("frontend.layout")
@section("title","")
@section("content")

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="gap-30"></div>

                <h2>Yazılarım</h2>
                <div class="gap-30"></div>


                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Yazı Başlığı</th>
                        <th scope="col">Durum</th>
                        <th scope="col">İşlem</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data["news"] as $k => $v)
                        <tr>
                            <td>{{$v["title"]}}</td>
                            <td>
                                @if($v["status"] == 1)
                                    Yayında
                                @else
                                    Pasif
                                @endif


                            </td>
                            <td><a href="{{route("frontend.writer.news.edit",$v["id"])}}"><i
                                        class="fa fa-pencil-square"></i> Düzenle </a></td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

@section("css")@endsection
@section("js")@endsection
