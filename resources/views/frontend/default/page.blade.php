@extends("frontend.layout")
@section("title",$data["page"]["title"])
@section("content")

    <section class="main-content pt-5" id="haber-tek">
        <div class="container">
            <div class="row ts-gutter-30">


                <div class="col-lg-12" style="padding-top:0 !important">
                    <div class="single-post">

                        <div class="post-header-area">
                            <h2 class="post-title title-lg">{{ $data["page"]["title"] }}</h2>
                        </div><!-- post-header-area end -->

                        {!! $data["page"]["content"] !!}

                    </div>
                </div>


            </div>
        </div>
    </section>



@endsection

@section("css")@endsection
@section("js")

    <script>
		function countChar (val)
		{
			var len = val.value.length;
			if (len >= 400)
			{
				val.value = val.value.substring(0, 400);
			}

			else
			{
				$('#charNum').text(400 - len);
			}
		};
    </script>

@endsection
