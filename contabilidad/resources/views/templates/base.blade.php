<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
        <meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <link type="image/x-icon" href="{{asset('favicon.ico')}}" rel="shortcut icon">
        <title>@yield('app_title')</title>
        @section('app_css')
            <!-- bootstrap & fontawesome -->
			<link rel="stylesheet" href="{{ asset('ac_theme/assets/css/bootstrap.min.css') }}" />
			<link rel="stylesheet" href="{{ asset('ac_theme/assets/font-awesome/4.5.0/css/font-awesome.min.css') }}" />

			<!-- text fonts -->
			<link rel="stylesheet" href="{{ asset('ac_theme/assets/css/fonts.googleapis.com.css') }}" />

			<!-- ace styles -->
			<link rel="stylesheet" href="{{ asset('ac_theme/assets/css/ace.min.css') }}" class="ace-main-stylesheet" id="main-ace-style" />

			<!--[if lte IE 9]>-->
			<link rel="stylesheet" href="{{ asset('ac_theme/assets/css/ace-skins.min.css') }}" />
			<link rel="stylesheet" href="{{ asset('ac_theme/assets/css/ace-rtl.min.css') }}" />

			<script src="{{ asset('ac_theme/assets/js/ace-extra.min.js') }}"></script>
        @show
    </head>
    @yield('app_body')
</html>