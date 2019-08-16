@extends('../layouts/app2');
@section('content')
    <div class="register-box">
      <div class="register-logo">
        <a href="../../index2.html"><b>REGISTER</b>TBook</a>
      </div>

      <div class="register-box-body">
        <p class="login-box-msg">Đăng ký thành viên mới</p>
        <form  action="{{ route('register') }}" method="post">
           @csrf
          <div class="form-group has-feedback">
            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus placeholder="Full name" />
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
            @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
          </div>
          <div class="form-group has-feedback">
            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required placeholder="Email" />
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
          </div>
          <div class="form-group has-feedback">
            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Password" />
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
          </div>
          <div class="form-group has-feedback">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Retype password" />
            <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">
              <div class="checkbox icheck">
                
              </div>
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Đăng ký</button>
            </div><!-- /.col -->
          </div>
        </form>

        <div class="social-auth-links text-center">
          <!-- <p>- OR -</p>
          <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign up using Facebook</a>
          <a href="#" class="btn btn-block btn-social btn-google-plus btn-flat"><i class="fa fa-google-plus"></i> Sign up using Google+</a> -->
        </div>

        <a href="{!! route('login') !!}" class="text-center">I already have a membership</a>
      </div><!-- /.form-box -->
    </div><!-- /.register-box -->

    <!-- jQuery 2.1.4 -->
    <script src="{!! url('public/admin/plugins/jQuery/jQuery-2.1.4.min.js') !!}" type="text/javascript"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="{!! url('public/admin/bootstrap/js/bootstrap.min.js') !!}" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="{!! url('public/admin/plugins/iCheck/icheck.min.js') !!}" type="text/javascript"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
@endsection()
