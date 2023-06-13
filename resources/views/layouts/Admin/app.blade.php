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
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<body class="app">   
    <header class="app-header fixed-top">
     @include('layouts.Admin.navigation')
        <div id="app-sidepanel" class="app-sidepanel">
            <div id="sidepanel-drop" class="sidepanel-drop"></div>
          @include('layouts.Admin.admin-sidebar')
        </div><!--//app-sidepanel-->
    </header><!--//app-header-->

    <div class="app-wrapper">

    @yield('admincontent')
    </div>
</div>
@include('layouts.Admin.footer')
