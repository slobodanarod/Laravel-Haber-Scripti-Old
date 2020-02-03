@extends("backend.layout")
@section("content")
    <section class="content-header">

        <div class="box box-primary">
            <div class="box-header width-border">
                <h3>Banners</h3>
            <div align="right"><a href="{{route("banners.create")}}"><button class="btn btn-success">Ekle</button></a> </div>
            </div>
            <div class="box box-body">

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Sıra</th>
                        <th>Görsel</th>
                        <th>Adı</th>
                        <th>Durum</th>
                        <th></th>
                    </tr>
                    <tbody id="sortable">
                    @foreach($banners as $banner)
                        <tr id="item-{{$banner->id}}">
                            <td>{{$banner->must}}</td>
                            <td class="sortable" width="150"><img width="150" src="/images/banners/{{$banner->file}}"></td>
                            <td>{{$banner->name}}</td>
                            <td>{{ $banner->status == 1 ? "Aktif" : "Pasif"}}</td>
                            <td width="10"><a href="{{route("banners.edit",$banner->id)}}"><i class="fa fa-pencil-square"></i></a></td>
                                <td width="10"><a href="javascript:void(0)"><i id="{{$banner->id}}" class="fa fa-trash-o"></i></a></td>
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
							type: "POST",
							data: data,
							url: "{{route('banners.Sortable')}}", success: function (msg) {
								console.log(msg);
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

			$.ajax({
                type : "DELETE",
                url : "banners/"+destroy_id,
                success:function (msg) {
                    if(msg){
                    	alertify.success("İşlem başarılı");
                    	$("#item-"+destroy_id).remove();
                    }else{
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
