@extends("backend.layout")
@section("content")
    <section class="content-header">

        <div class="box box-primary">
            <div class="box-header width-border">
                <h3>Settings</h3>

            </div>
            <div class="box box-body">

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>Açıklama</th>
                        <th>İçerik</th>
                        <th>Type</th>
                        <th>Anahtar Değer</th>
                        <th></th>
                    </tr>
                    <tbody id="sortable">
                    @foreach($data['adminSettings'] as $adminSettings)
                        <tr id="item-{{$adminSettings->id}}">
                            <td>{{$adminSettings->id}}</td>
                            <td class="sortable">{{$adminSettings->description}}</td>
                            <td>{{$adminSettings->value}}</td>
                            <td>{{$adminSettings->type}}</td>
                            <td>{{$adminSettings->key}}</td>
                            <td width="10"><a href="{{route("settings.Edit",["id" => $adminSettings->id])}}"><i class="fa fa-pencil-square"></i></a></td>
                            @if($adminSettings->delete)
                                <td width="10"><a href="javascript:void(0)"><i id="{{$adminSettings->id}}" class="fa fa-trash-o"></i></a></td>
                            @endif
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

			$('#sortable').sortable({
				revert: true, handle: ".sortable", stop: function (event, ui) {
					var data = $(this).sortable('serialize');
					$.ajax({
						type: "POST", data: data, url: "{{route('settings.Sortable')}}", success: function (msg) {
							//							 console.log(msg);
							if (msg)
							{
								alertify.success("İşlem başarılı!");
							}
							else
							{
								alertify.error("sorun oluştu!");
							}
						}
					});

				}
			});
			$('#sortable').disableSelection();

		});
		$(".fa-trash-o").click(function () {

			destroy_id = $(this).attr('id');
			alertify.confirm('Silme işlemini onaylıyor musunuz ?', 'Bu işlem geri alınamaz.', function () {
				location.href = "/nedmin/settings/delete/" + destroy_id;
			}, function () {
				alertify.error("silme işlemi iptal edildi.")
			})

		});
    </script>


@endsection

@section('css')@endsection
@section('js')@endsection
