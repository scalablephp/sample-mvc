<!DOCTYPE html>
<!--[if lte IE 9]> <html class="lte-ie9" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html lang="en"> <!--<![endif]-->
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<!-- Remove Tap Highlight on Windows Phone IE -->
		<meta name="msapplication-tap-highlight" content="no"/>
		<meta name="_token" content="{{ csrf_token() }}" />
		<title>D-Support @yield('title')</title>
		@include('admin.app.top')
	</head>
	<body class="sidebar_main_open sidebar_main_swipe">
		@include('admin.app.header')
		@include('admin.app.sidebar')
		<div id="page_content">
        	<div id="page_content_inner">
        		@yield('content')
        	</div>
        </div>
		@include('admin.app.bottom')
	</body>
</html>
<!-- Localized -->