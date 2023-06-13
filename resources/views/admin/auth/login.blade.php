@extends('layouts.Admin.guest')
@section('title', 'Login')
@section('admincontent')
<div class="row g-0 app-auth-wrapper">
    <div class="col-12 col-md-7 col-lg-6 auth-main-col text-center p-5">
        <div class="d-flex flex-column align-content-end">
            <div class="app-auth-body mx-auto">	
                <div class="app-auth-branding mb-4"><a class="app-logo" href="index.html"><img class="logo-icon me-2" src="{{ asset('backend/assets/images/app-logo.svg') }}" alt="logo"></a></div>
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <h2 class="auth-heading text-center mb-5">Log in to Admin Pannal </h2>
                <div class="auth-form-container text-start">
                    <form class="auth-form login-form" method="POST" action="{{ route('admin.adminlogin') }}"> @csrf
                        <div class="email mb-3">
                            <x-input-label class="sr-only"   for="email" :value="__('Email')" />
                            <x-text-input id="email" class="form-control signin-email" placeholder="Enter Email Address"  type="email" name="email" :value="old('email')"  autofocus autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />

                        </div><!--//form-group-->
                        <div class="password mb-3">
                            <x-input-label class="sr-only" for="password" :value="__('Password')" />
                            <x-text-input id="password" class="form-control signin-password"   type="password"  name="password"  placeholder="Enter Password" autocomplete="current-password" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            <div class="extra mt-3 row justify-content-between">
                                <div class="col-6">
                                    <div class="form-check">
                                        <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                                        <label class="form-check-label">{{ __('Remember me') }}</label>
                                    </div>
                                </div><!--//col-6-->
                                <div class="col-6">
                                    <div class="forgot-password text-end">
                                        @if (Route::has('admin.password.request'))
                                        <a href="{{ route('admin.password.request') }}">Forgot password?</a>
                                        @endif
                                    </div>
                                </div><!--//col-6-->
                            </div><!--//extra-->
                        </div><!--//form-group-->
                        <div class="text-center">
                            <button type="submit" class="btn app-btn-primary w-100 theme-btn mx-auto">Log In</button>
                        </div>
                    </form>
                                    </div><!--//auth-form-container-->	

            </div><!--//auth-body-->
        
            <footer class="app-auth-footer">
                <div class="container text-center py-3">
                     <!--/* This template is free as long as you keep the footer attribution link. If you'd like to use the template without the attribution link, you can buy the commercial license via our website: themes.3rdwavemedia.com Thank you for your support. :) */-->
                <small class="copyright">Designed with <span class="sr-only">love</span><i class="fas fa-heart" style="color: #fb866a;"></i> by <a class="app-link" href="http://themes.3rdwavemedia.com" target="_blank">Xiaoying Riley</a> for developers</small>
                   
                </div>
            </footer><!--//app-auth-footer-->	
        </div><!--//flex-column-->   
    </div><!--//auth-main-col-->
    <div class="col-12 col-md-5 col-lg-6 h-100 auth-background-col">
        <div class="auth-background-holder">
        </div>
        <div class="auth-background-mask"></div>
        <div class="auth-background-overlay p-3 p-lg-5">
            <div class="d-flex flex-column align-content-end h-100">
                <div class="h-100"></div>
            </div>
        </div><!--//auth-background-overlay-->
    </div><!--//auth-background-col-->

</div><!--//row--
  @endsection

