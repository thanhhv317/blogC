<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Sign in</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.4 -->
    <link href="{!! url('bootstrap/css/bootstrap.min.css') !!}" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="{!! url('dist/css/AdminLTE.min.css') !!}" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <link href="{!! url('plugins/iCheck/square/blue.css') !!}" rel="stylesheet" type="text/css" />

  </head>
  <body class="login-page">
     @yield('content')
  </body>
</html>
