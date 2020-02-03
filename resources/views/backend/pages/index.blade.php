@extends("backend.layout")
@section("content")
    <section class="content-header">

        <div class="box box-primary">
            <div class="box-header width-border">
                <h3>Pages</h3>
            <div align="right"><a href="{{route("page.create")}}"><button class="btn btn-success">Ekle</button></a> </div>
            </div>
            <div class="box box-body">

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Başlık</th>
                        <th></th>
                    </tr>
                    <tbody id="sortable">
                    @foreach($data['pages'] as $pages)
                        <tr id="item-{{$pages->id}}">
                            <td class="sortable">{{$pages->title}}</td>
                            <td width="10"><a href="{{route("page.edit",$pages->id)}}"><i class="fa fa-pencil-square"></i></a></td>
                                <td width="10"><a href="javascript:void(0)"><i id="{{$pages->id}}" class="fa fa-trash-o"></i></a></td>
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
                        url: "{{route('pages.Sortable')}}", success: function (msg) {
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

			$.ajax({
                type : "DELETE",
                url : "page/"+destroy_id,
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
