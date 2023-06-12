<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ecommerceaibot - @yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="keywords" content="@yield('keywords')">
	<meta name="description" content="@yield('description')"> </head>
</head>
 <!-- Bootstrap CSS -->
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.8/dist/sweetalert2.min.css" integrity="sha256-aUL5sUzmON2yonFVjFCojGULVNIOaPxlH648oUtA/ng=" crossorigin="anonymous">
 <link rel="stylesheet" href="{{ asset('plugins/bootrapp/css/bootstrap.min.css') }}" />
 <link rel="stylesheet" href="{{ asset('plugins/beautyToast/css/beautyToast.css') }}" />
   <!--slick CSS -->
   <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

   <link rel="stylesheet" href="{{ asset('frontend/assets/css/slick.css') }}" />
   <link rel="stylesheet" href="{{ asset('frontend/assets/css/slick-theme.css') }}" />
   <!-- main.css -->
   <link rel="stylesheet" href="{{ asset('frontend/assets/css/main.css') }}" />
<body>
    @include('layouts.navigation')
    <div class="wrapper">
    @yield('content')
    </div>
    @include('layouts.footer')
    <script src="https://code.jquery.com/jquery-3.6.3.slim.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
  <!-- Bootstrap Bundle (includes Popper) -->
  <script src="{{ asset('frontend/assets/js/bootstrap.bundle.min.js') }}"></script>
  <!--slick js -->
  <script src="{{ asset('frontend/assets/js/slick.min.js') }}"></script>
  <!-- main.js -->
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

  <script src="{{ asset('frontend/assets/js/main.js') }}"></script>
  <script src="{{ asset('plugins/beautyToast/js/beautyToast.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.8/dist/sweetalert2.all.min.js" integrity="sha256-IsLtAJoYEjP85/w1aVUZtzdlpsQXYcXPXqfk4JDyt+I=" crossorigin="anonymous"></script>

