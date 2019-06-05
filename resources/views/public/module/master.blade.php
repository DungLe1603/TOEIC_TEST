<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>TOEIC TEST</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('public/template/jquery-ui-1.8.18.custom.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('public/template/jquery.fancybox-1.3.1.css') }}">
	<link rel="stylesheet" href="{{ asset('public/template/jplayer.blue.monday.css') }}">
	<link rel="stylesheet" href="{{ asset('public/css/style.css') }}">
	<link rel="stylesheet" href="{{ asset('public/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/shop-homepage.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/my.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('public/css/toeic.css') }}">
	<script type="text/javascript" src="{{ asset('public/template/jquery-1.4.2.min.js.download') }}"></script>
	<script type="text/javascript" src="{{ asset('public/template/jquery.cookie.js.download') }}"></script>
	<script type="text/javascript" src="{{ asset('public/template/jquery-ui-1.8.18.custom.min.js.download') }}"></script>
	<script type="text/javascript" src="{{ asset('public/template/jquery.ui.datepicker-pl.js.download') }}"></script>
	<script type="text/javascript" src="{{ asset('public/template/jquery.anythingslider.min.js.download') }}"></script>   		
	<script type="text/javascript" src="{{ asset('public/template/jquery.fancybox-1.3.1.pack.js.download') }}"></script>
	<script type="text/javascript" src="{{ asset('public/template/jquery.jplayer.min.js.download') }}"></script>

</head>
<body>
    <!-- Insert header page -->
    @include('public.module.header')
    <!-- Insert content -->
    @yield('content')
    <!-- Insert footer -->
    @include('public.module.footer')

    <script src="{{ asset('public/js/jquery.js') }}"></script>
    <script src="{{ asset('public/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('public/js/my.js') }}"></script>
	<script src="{{ asset('public/template/inferredEvents.js.download') }}" async=""></script>
	<script src="{{ asset('public/template/409949299202590') }}" async=""></script>
	<script async="" src="{{ asset('public/template/fbevents.js.download') }}"></script>
	<script src="{{ asset('public/template/reengageio.min.js.download') }}"></script>
	<script type="text/javascript" async="" src="{{ asset('public/template/ga.js.download') }}"></script>
	<script type="text/javascript">var audioSwfUrl = '/res/flash/audioplayer.swf';</script>
	<script type="text/javascript" src="{{ asset('public/template/toeic.js.download') }}"></script>
	<script src="{{ asset('public/template/f.txt') }}"></script>
</body>
</html>
