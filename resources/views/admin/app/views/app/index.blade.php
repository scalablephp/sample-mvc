<!DOCTYPE html>
<!--[if lte IE 9]> <html class="lte-ie9" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html lang="en"> <!--<![endif]--><!doctype html>
<!--[if lte IE 9]> <html class="lte-ie9" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html lang="en"> <!--<![endif]-->
	<head>
		<meta charset="UTF-8">
		<meta content="ie=edge" http-equiv="x-ua-compatible">
		<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<!-- Remove Tap Highlight on Windows Phone IE -->
		<meta name="msapplication-tap-highlight" content="no"/>
		<meta name="_token" content="{{ csrf_token() }}" />
		<title>Sonny Sailor</title>
		<link type="images/png" rel="icon" sizes="16x16" href="{{ URL::asset('assets/images/favicon.png') }}">
		@include('app.top')
	</head>
	<body>
		@include('app.header')
		@yield('content')
		@include('app.footer')
		@include('app.bottom')
	</body>
</html>
<!-- Localized -->