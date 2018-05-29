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
		<title>Sonny Sailor</title>
		<!-- <link href="favicon.png" rel="shortcut icon">
		<link href="apple-touch-icon.png" rel="apple-touch-icon"> -->
		@include('admin.app.top')
	</head>
	<body class="menu-position-side menu-side-left full-screen with-content-panel">
		<div class="all-wrapper with-side-panel solid-bg-all">
			<div class="layout-w">
				@include('admin.app.sidebar')
				<div class="content-w">
					@include('admin.app.header')
					<div class="content-panel-toggler"><i class="os-icon os-icon-grid-squares-22"></i><span>Sidebar</span></div>
					<div class="content-i">
						@yield('content')
					</div>
				</div>
			</div>
		</div>
		@include('admin.app.bottom')
	</body>
</html>
<!-- Localized -->