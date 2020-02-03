@extends("backend.layout")
@section("content")
    <section class="content-header">

        <div class="box box-primary">
            <div class="box-header width-border">
                <h3>Reklamlar</h3>
                <div align="right"><a href="{{route("ads.create")}}">
                        <button class="btn btn-success">Ekle</button>
                    </a></div>
            </div>
            <div class="box box-body">

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Adı</th>
                        <th></th>
                    </tr>
                    <tbody id="sortable">
                    @foreach($ads as $ad)
                        <tr id="item-{{$ad->id}}">

                            <td>{{$ad->name}}</td>
                            <td width="10"><a href="{{route("ads.edit",$ad->id)}}"><i
                                        class="fa fa-pencil-square"></i></a></td>
                            <td width="10"><a href="javascript:void(0)"><i id="{{$ad->id}}"
                                                                           class="fa fa-trash-o"></i></a></td>
                        </tr>
                    @endforeach

                    </tbody>

                </table>

            </div>

        </div>

    </section>

    <script type="text/javascript">
		$(function () {

			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});

		});


		$(".fa-trash-o").click(function () {

			destroy_id = $(this).attr('id');
			alertify.confirm('Silme işlemini onaylıyor musunuz ?', 'Bu işlem geri alınamaz.', function () {

				$.ajax({
					type: "DELETE", url: "ads/" + destroy_id, success: function (msg) {
						if (msg)
						{
							alertify.success("İşlem başarılı");
							$("#item-" + destroy_id).remove();
						}
						else
						{
							alertify.error("İşlem tamamlanamadı.")
						}
					}


				});

			}, function () {
				alertify.error("silme işlemi iptal edildi.")
			})

		});
    </script>


@endsection

@section('css')@endsection
@section('js')@endsection
