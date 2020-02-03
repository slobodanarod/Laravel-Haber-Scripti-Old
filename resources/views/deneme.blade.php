<html>
<head>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <script
        src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
        crossorigin="anonymous"></script>

    <script type="text/javascript"
            href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>


    <style>
        .start-shop {
            color: #ff4242;
            font-weight: bold;
        }

        .form-group img:hover { }

        .form-group img {
            -webkit-transition: all 1s ease;
            -moz-transition: all 1s ease;
            -o-transition: all 1s ease;
            -ms-transition: all 1s ease;
            transition: all 1s ease;}

    </style>

    <script>
		$(document).ready(function () {
			$(".form-group").hover(function () {
				$(this).find(".img-footer").css("background-color", "orange");
				$(this).find(".img-footer").css("color", "black");
				$(this).find(".start-shop").css("font-size", "15px");
				$(this).find(".img-footer").css("font-weight", "bold");
			}, function () {
				$(this).find(".img-footer").css("background-color", "black");
				$(this).find(".img-footer").css("color", "white");
				$(this).find(".start-shop").css("font-size", "1rem");

			});
		});

    </script>


</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-8">
            <div class="form-group">
                <a href="/filtre-kahveler?utm_source=kategori_filtreKahveler"><img class="img-fluid" src="http://kahveciniz.com/Data/EditorFiles/n_banner/filter-coffee.jpg">
                <div style="background: black;color:white;padding: 5px;" class="img-footer">En çeşitli filtre kahve reyonu <span class="float-right start-shop">alışverişe başla</span></div>
                </a>
            </div>
            <div class="form-group">
                <a href="/hario"><img class="img-fluid" src="http://kahveciniz.com/Data/EditorFiles/n_banner/hario.jpg">
                <div style="background: black;color:white;padding: 5px;" class="img-footer">Demleme ekipmanlarında dünya devi<span class="float-right start-shop">alışverişe başla</span></div>
            </a>
            </div>
            <div class="form-group">
               <a href="/lavazza"> <img class="img-fluid" src="http://kahveciniz.com/Data/EditorFiles/n_banner/3.jpg">
                <div style="background: black;color:white;padding: 5px;" class="img-footer">Dünyanın en çok içilen
                    markası Lavazza
                     <span class="float-right start-shop">alışverişe başla</span></div>
               </a>
            </div>
            <div class="form-group">
                <a href="/lavazza"> <img class="img-fluid" src="http://kahveciniz.com/Data/EditorFiles/n_banner/lamborghini.png">
                    <div style="background: black;color:white;padding: 5px;" class="img-footer">Dünyanın en hızlı kahvesi Lamborghini
                        <span class="float-right start-shop">alışverişe başla</span></div>
                </a>
            </div>

            <div class="form-group">
                <a href="/lavazza"> <img class="img-fluid" src="http://kahveciniz.com/Data/EditorFiles/n_banner/monin.png">
                    <div style="background: black;color:white;padding: 5px;" class="img-footer">Monin sos ve şuruplar
                        <span class="float-right start-shop">alışverişe başla</span></div>
                </a>
            </div>


        </div>

        <div class="col-4 right-sidebar">
            <div class="form-group"><img class="img-fluid" src="http://kahveciniz.com/Data/EditorFiles/n_banner/CAFE.jpg"></div>
            <div class="form-group"><img class="img-fluid" src="http://kahveciniz.com/Data/EditorFiles/n_banner/4.jpg"></div>
            <div class="form-group"><img class="img-fluid" src="http://kahveciniz.com/Data/EditorFiles/n_banner/ucuncu.jpg"></div>
            <div class="form-group"><a href="/emre-tolan-ile-barista-egitimi"><img class="img-fluid" height="500px" src="http://kahveciniz.com/Data/EditorFiles/n_banner/barista.png"></a></div>


        </div>
    </div>
</div>


</body>
</html>
