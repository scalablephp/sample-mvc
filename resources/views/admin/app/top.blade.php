<!-- uikit -->
<link media="all" type="text/css" rel="stylesheet" href="{{ URL::asset('bower_components/uikit/css/uikit.almost-flat.min.css') }}">
<!-- altair admin -->
<link media="all" type="text/css" rel="stylesheet" href="{{ URL::asset('assets/css/main.min.css') }}">
<link media="all" type="text/css" rel="stylesheet" href="{{ URL::asset('assets/fonts/theme-icon/theme-icon.css') }}">
<link media="all" type="text/css" rel="stylesheet" href="{{ URL::asset('assets/css/style.css') }}">
<link media="all" type="text/css" rel="stylesheet" href="{{ URL::asset('assets/js/ladda/ladda.min.css') }}">
<!-- matchMedia polyfill for testing media queries in JS -->
<!--[if lte IE 9]>
    <script type="text/javascript" src="bower_components/matchMedia/matchMedia.js"></script>
    <script type="text/javascript" src="bower_components/matchMedia/matchMedia.addListener.js"></script>
    <link rel="stylesheet" href="assets/css/ie.css" media="all">
<![endif]-->
<!-- page specific plugins -->
<!-- jquery -->
<script type="text/javascript" src="{{ URL::asset('bower_components/jquery/dist/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('bower_components/jquery/dist/jquery-migrate-3.0.1.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('public/messages.js') }}"></script>
<script type="text/javascript">Lang.setLocale('{{ \App::getLocale() }}');</script>