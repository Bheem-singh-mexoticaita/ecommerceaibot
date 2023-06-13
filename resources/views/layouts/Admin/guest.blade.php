<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ecommerceaibot Admin - @yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="keywords" content="@yield('keywords')">
	<meta name="description" content="@yield('description')">
    <link rel="shortcut icon" href="{{ asset('backend/assets/favicon.ico') }}"> 
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome/js/all.min.js') }}" />
    <link rel="stylesheet" href="{{ asset('backend/assets/css/portal.css') }}">
</head>
<body class="app app-login p-0">    	
        @yield('admincontent')
@include('layouts.Admin.footer')
