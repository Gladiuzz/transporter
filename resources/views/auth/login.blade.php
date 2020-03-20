<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CSM Transporter | Login</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{ asset('assets/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dist/css/AdminLTE.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/dist/css/style.css') }}">
</head>
<body class="hold-transition">
    <div class="login-page">
        <div class="login-box">
        <div class="login-logo" style="margin-bottom: 0px"><img src="{{ asset('assets/dist/img/logo.png') }}" alt="" width="300px"></div>
            <form class="login-box-body"  method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
                <div class="top">
                    <h2 class="login-logo">Administrator</h2>
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <input id="email" type="text" class="form-control" Placeholder="Email" name="email" value="{{ old('email') }}" required autofocus>
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} has-feedback">
                        <input id="password" type="password" Placeholder="Password" class="form-control" name="password" required>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="bottom">
                    <div class="row">
                        <div class="col-xs-12">
                            <button class="btn btn-login btn-block" type="submit">LOGIN</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <footer class="footer">Copyright 2019 CSM Transporter. All Right Reserved</footer>
    <!-- jQuery 2.2.3 -->
    <script src="{{ asset('assets/bower_components/jquery/dist/jquery.min.js') }}"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="{{ asset('assets/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
</body>
</html>
