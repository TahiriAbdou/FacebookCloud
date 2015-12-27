<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="UTF-8">
  <title>{!! $page_title or 'Dashboard' !!}</title>

  <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
  <link href="{{ asset("/bower_components/admin-lte/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
  <link href="{{ asset("/bower_components/admin-lte/plugins/select2/select2.min.css")}}" rel="stylesheet" type="text/css" />
  <link href="{{ asset("/bower_components/admin-lte/dist/css/AdminLTE.min.css")}}" rel="stylesheet" type="text/css" />

  <link href="{{ asset("/bower_components/admin-lte/dist/css/skins/skin-blue.min.css")}}" rel="stylesheet" type="text/css" />
  <link href="{{ asset("/bower_components/admin-lte/plugins/iCheck/square/blue.css")}}" rel="stylesheet" type="text/css" />
  <style type="text/css">
  @import url(https://fonts.googleapis.com/css?family=Roboto:300);
  body{
    /*font-family: 'Roboto', sans-serif;*/
  }
  .sidebar-menu>li>a {
    padding: 8px 5px 8px 10px;
 }</style>
  @yield('css')
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
  <![endif]-->
</head>
<body class="skin-blue">

  <div class="wrapper">

    <!-- Header -->
    @include('layouts.admin._header')

    <!-- Sidebar -->
    @include('layouts.admin._sidebar')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          {{ $page_title or "Page Title" }}
          <small>{{ $page_description or null }}</small>
        </h1>
        <!-- You can dynamically generate breadcrumbs here -->
        <ol class="breadcrumb">
          <li><a href="{!! url('dashboard') !!}"><i class="fa fa-dashboard"></i> {!! 'Admin' !!}</a></li>
          <li class="active">{{ $page_title or null }}</li>
        </ol>
      </section>
      <!-- Main content -->
      <section class="content">
        @include('partials.flash')
        <!-- Your Page Content Here -->
        @yield('content')
        
      </section><!-- /.content -->
    </div><!-- /.content-wrapper -->

    <!-- Footer -->
    @include('layouts.admin._footer')

  </div><!-- ./wrapper -->

  <!-- REQUIRED JS SCRIPTS -->
  <!-- jQuery 2.1.3 -->
  <script src="{{ asset ("/bower_components/admin-lte/plugins/jQuery/jQuery-2.1.3.min.js") }}"></script>
  <!-- Bootstrap 3.3.2 JS -->
  <script src="{{ asset ("/bower_components/admin-lte/bootstrap/js/bootstrap.min.js") }}" type="text/javascript"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset ("/bower_components/admin-lte/dist/js/app.min.js") }}" type="text/javascript"></script>

  <script src="{{ asset ("/bower_components/admin-lte/plugins/slimScroll/jquery.slimscroll.min.js") }}" type="text/javascript"></script>

  <script src="{{ asset ("/bower_components/admin-lte/plugins/fastclick/fastclick.min.js") }}" type="text/javascript"></script>
  <script src="{{ asset ("/bower_components/admin-lte/plugins/select2/select2.full.min.js") }}" type="text/javascript"></script>
  <script type="text/javascript" src="//cdn.ckeditor.com/4.4.3/standard/ckeditor.js"></script>
  <script type="text/javascript">
  (function(){
    $('.select2').select2();
    $('.editor').each(function(){ CKEDITOR.replace(this); });
    $('input').iCheck({ checkboxClass: 'icheckbox_square-blue', radioClass: 'iradio_square-blue'});
  })();
  </script>
  @yield('script')
  </body>
</html>