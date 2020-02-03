<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin / Turna Haber</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="/backend/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/backend/bower_components/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/backend/bower_components/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="/backend/dist/css/AdminLTE.min.css">

    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <!-- include summernote css/js -->


    <!-- CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <!-- Default theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
    <!-- Semantic UI theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
    <!-- Bootstrap theme -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>


    <link rel="stylesheet" href="/backend/dist/css/skins/skin-blue.min.css">
    <link rel="stylesheet" href="/backend/custom/css/custom.css">
    <script src="/backend/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="/backend/bower_components/jquery-ui/jquery-ui.js"></script>
    <script src="/backend/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="/backend/dist/js/adminlte.min.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote.min.js"></script>
    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <link rel="shortcut icon" href="/images/fav.ico" type="image/x-icon">

</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <!-- Main Header -->
    <header class="main-header">

        <!-- Logo -->
        <a href="{{route("nedmin.index")}}" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>T</b>H</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Turna</b>Haber</span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li class="dropdown user user-menu">
                        <a href="/" target="_blank"> Siteye Git</a></li>

                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="/images/users/{{Auth::user()->file}}" class="img-circle" width="30"
                                 style="width:30px;" alt="{{Auth::user()->name}}">
                            <span class="hidden-xs">{{Auth::user()->name}}</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="user-header">
                                <img src="/images/users/{{Auth::user()->file}}" class="img-circle"
                                     alt="{{Auth::user()->name}}">

                                <p>
                                    {{Auth::user()->name}}
                                </p>
                            </li>

                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="{{route("user.edit",Auth::user()->id)}}" class="btn btn-default btn-flat">Profilini
                                        Düzenle</a>
                                </div>
                                <div class="pull-right">
                                    <a href="{{route("nedmin.logout")}}" class="btn btn-default btn-flat">Çıkış Yap</a>
                                </div>
                            </li>
                        </ul>
                    </li>

                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

            <!-- Sidebar user panel (optional) -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="/images/users/{{Auth::user()->file}}" class="img-circle" width="160"
                         alt="{{Auth::user()->name}}">
                </div>
                <div class="pull-left info">
                    <p>{{Auth::user()->name}}</p>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">MENÜLER</li>
                <li class="active"><a href="{{route("nedmin.index")}}"><i class="fa fa-link"></i> <span>Dashboard</span></a>
                </li>
                <li><a href="{{route("blog.index")}}"><i class="fa fa-paper-plane"></i> <span>Haberler</span></a></li>
                <li><a href="{{route("page.index")}}"><i class="fa fa-paper-plane"></i> <span>Sayfalar</span></a></li>
                <li><a href="{{route("category.index")}}"><i class="fa fa-paper-plane"></i> <span>Kategoriler</span></a>
                </li>
                <li><a href="{{route("slider.index")}}"><i class="fa fa-paper-plane"></i> <span>Sliderlar</span></a>
                </li>
                <li><a href="{{route("banners.index")}}"><i class="fa fa-paper-plane"></i> <span>Bannerlar</span></a>
                </li>


                <li class="treeview active">
                    <a href="#"><i class="fa fa-link"></i> <span>Yönetim</span>
                        <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                              </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{route("user.index")}}"><i class="fa fa-user"></i> <span>Users</span></a></li>
                        <li><a href="{{route("settings.Index")}}"><i class="fa fa-cog"></i> <span>Ayarlar</span></a>
                        </li>
                        <li><a href="{{route("ads.index")}}"><i class="fa fa-cog"></i> <span>Reklamlar</span></a></li>
                        <li><a href="{{route("nedmin.logout")}}"><i class="fa fa-cog"></i> <span>Çıkış Yap</span></a>
                        </li>
                    </ul>
                </li>


            </ul>
            <!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">


        <section class="content container-fluid">

            @yield("content")

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            Mertcan Yürekli
        </div>
        <strong>Copyright &copy; 2019
    </footer>


    <div class="control-sidebar-bg"></div>
</div>

@if(session()->has('success'))
    <script>
		alertify.success('{{session('success')}}')
    </script>
@endif
@if(session()->has('error'))
    <script>
		alertify.error('{{session('error')}}')
    </script>
@endif

@foreach($errors->all() as $error)
    <script>alertify.error('{{$error}}');</script>
@endforeach

@yield("js")
</body>
</html>
