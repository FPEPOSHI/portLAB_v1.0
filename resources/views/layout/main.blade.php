<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
    <meta charset="UTF-8">
    <title>{{ $page_title or "portLAB" }}</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="{{ asset("dist/css/AdminLTE.min.css")}}" rel="stylesheet" type="text/css" />

    <link href="{{ asset("dist/css/skins/skin-purple.min.css")}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("css/custom.css")}}" rel="stylesheet" type="text/css" />

    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition skin-purple layout-top-nav">
<div class="wrapper">

    @include('header')
    <div class="content-wrapper">
        <section class="content-header">
           @include('sub_header')
        </section>
        <div class="row">
            {{--<div class="col-lg-2">--}}
                {{--menu--}}
            {{--</div>--}}
            <div class="col-lg-9">
                    <section class="content">
                        @yield('content')
                    </section><!-- /.content -->
                </div>
            <div class="col-lg-3">
                <div class="margin-right-top">
                    @include('latest_projects')
                    @include('stats')
                </div>
            </div>
        </div>
    </div><!-- /.content-wrapper -->
</div>

@include('edit_pass')
@include('edit_settings')
@include('pay')
        <!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.1.3 -->
<script src="{{ asset ("jQuery/jQuery-2.1.4.min.js") }}"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.34.7/css/bootstrap-dialog.min.css"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.34.7/js/bootstrap-dialog.min.js"></script>
<!-- AdminLTE App -->
<script src="{{ asset ("dist/js/app.min.js") }}" type="text/javascript"></script>
<script src="{{ asset ("js/custom.js") }}" type="text/javascript"></script>
<script src="{{ asset ("js/ajax.js") }}" type="text/javascript"></script>
</body>
</html>