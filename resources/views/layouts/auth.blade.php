<!DOCTYPE html>

<html>
<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
  <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
  <link href="{{ asset("/bower_components/admin-lte/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
  <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
  <link href="{{ asset("/bower_components/admin-lte/dist/css/AdminLTE.min.css")}}" rel="stylesheet" type="text/css" />
  <link href="{{ asset("/bower_components/admin-lte/dist/css/skins/skin-blue.min.css")}}" rel="stylesheet" type="text/css" />
  <link href="{{ asset("/bower_components/admin-lte/plugins/iCheck/square/blue.css")}}" rel="stylesheet" type="text/css" />
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
  <![endif]-->
</head>

<body class="hold-transition  {!! $page or 'login' !!}-page">
    <div class=" {!! $page or 'login' !!}-box">
      <div class=" {!! $page or 'login' !!}-logo">
        <a href="/">Dash<b>BOARD</b></a>
      </div>
      <div class=" {!! $page or 'login' !!}-box-body">
        @yield('content')
      </div>
    </div>



<!-- REQUIRED JS SCRIPTS -->
<!-- jQuery 2.1.3 -->
<script src="{{ asset ("/bower_components/admin-lte/plugins/jQuery/jQuery-2.1.4.min.js") }}"></script>
<!-- Bootstrap 3.3.2 JS -->
<script src="{{ asset ("/bower_components/admin-lte/bootstrap/js/bootstrap.min.js") }}" type="text/javascript"></script>

<script src="{{ asset ("/bower_components/admin-lte/plugins/slimScroll/jquery.slimscroll.min.js") }}" type="text/javascript"></script>

<script src="{{ asset ("/bower_components/admin-lte/plugins/fastclick/fastclick.min.js") }}" type="text/javascript"></script>

<script src="{{ asset ("/bower_components/admin-lte/plugins/iCheck/icheck.min.js") }}" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="{{ asset ("/bower_components/admin-lte/dist/js/app.min.js") }}" type="text/javascript"></script>

<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
        increaseArea: '20%' // optional
      });
  });
</script>
</body>
</html>