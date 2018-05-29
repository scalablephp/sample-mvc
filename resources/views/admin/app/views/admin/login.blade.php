<!DOCTYPE html>
<!--[if lte IE 9]> <html class="lte-ie9" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html lang="en"> <!--<![endif]--><!doctype html>
<!--[if lte IE 9]> <html class="lte-ie9" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html lang="en"> <!--<![endif]-->
<head>
	<meta charset="UTF-8">
	<meta content="ie=edge" http-equiv="x-ua-compatible">
	<meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<!-- Remove Tap Highlight on Windows Phone IE -->
	<meta name="msapplication-tap-highlight" content="no"/>
	<meta name="_token" content="{{ csrf_token() }}" />
	<title>Sonny Sailor Login</title>
	<!-- <link href="favicon.png" rel="shortcut icon">
	<link href="apple-touch-icon.png" rel="apple-touch-icon"> -->
	
	<link media="all" type="text/css" rel="stylesheet" href="{{ URL::asset('assets/backend/fastfonts/cssapi/487b73f1-c2d1-43db-8526-db577e4c822b.css') }}">
	<link media="all" type="text/css" rel="stylesheet" href="{{ URL::asset('assets/backend/css/maince5a.css') }}">
	<link media="all" type="text/css" rel="stylesheet" href="{{ URL::asset('assets/css/animate.min.css') }}">
	<link media="all" type="text/css" rel="stylesheet" href="{{ URL::asset('assets/plugins/noty/noty.css') }}">
	<link media="all" type="text/css" rel="stylesheet" href="{{ URL::asset('assets/plugins/ladda/ladda.min.css') }}">

	<script type="text/javascript" src="{{ URL::asset('assets/plugins/jquery/dist/jquery.min.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('assets/plugins/jquery/dist/jquery-migrate-3.0.1.min.js') }}"></script>
</head>
<body class="auth-wrapper">
	<div class="all-wrapper menu-side with-pattern">
		<div class="auth-box-w">
			<div class="logo-w">
				<img alt="" src="{{ URL::asset('assets/backend/img/logo-big.png') }}">
			</div>
			<h4 class="auth-header">Login</h4>
			{!! Form::open(array('action' => 'Admin\LoginController@login','id' => 'loginform')) !!}
			<div class="form-group">
				<label for="">Username</label>
				<input class="form-control" placeholder="Email" type="email" name="username" id="username" required>
			</div>
			<div class="form-group">
				<label for="">Password</label>
				<input class="form-control" placeholder="Password" type="password" name="password" id="password" required>
			</div>
			<div class="buttons-w">
				<div class="form-check-inline">
					<label class="form-check-label">
						<input class="form-check-input" name="remember" type="checkbox">Remember Me
					</label>
				</div>
				<button class="btn btn-primary float-right" data-style="zoom-in">Log me in</button>
			</div>
			{!! Form::close() !!}
		</div>
	</div>
	<!-- validation -->
	<script type="text/javascript" src="{{ URL::asset('assets/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('assets/plugins/jquery-validation/additional-methods.min.js') }}"></script>
	<!-- ladda -->
	<script type="text/javascript" src="{{ URL::asset('assets/plugins/ladda/spin.min.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('assets/plugins/ladda/ladda.min.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('assets/plugins/noty/noty.min.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('assets/backend/js/common.min.js') }}"></script>
	<!-- Pages folder js -->
	<script type="text/javascript" src="{{ URL::asset('assets/backend/js/pages/login.js') }}"></script>
</body>
</html>