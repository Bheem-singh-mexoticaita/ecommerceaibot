@extends('layouts.app')
@section('title', 'User -Login')
@section('content')

<x-auth-session-status class="mb-4" :status="session('status')" />
<section class="log_in">
    <div class="row g-0 align-items-center">
        <div class="col-md-4">
            <div class="log_in_banner">
                <img src="{{ asset('frontend/assets/img/login_banner.jpg') }}" alt="">
            </div>
        </div>
        <div class="col-md-8">
            <div class="log_in_cntnt">
                <div class="log_in_form contact_form">
                    <div class="log_in_form_head">
                        <h2>Login to your account</h2>
                        <p>It is a long established fact that a reader will be distracted by the readable content of a page</p>
                    </div>
                  <form method="POST" action="{{ route('user.login') }}">@csrf
                        <div class="custom_input">
                        <x-input-label for="email" :value="__('E-mail')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email"  placeholder="Enter your email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                        <div class="custom_input">
                        <x-input-label for="password" :value="__('Password')" />
                        <x-text-input id="password" class="block mt-1 w-full"  placeholder="Enter your password" type="password"  name="password"   autocomplete="current-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                        <div class="remem_ber">
                            <div class="check_bx">
                                <div class="form-check">
                                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                                    <label class="form-check-label" for="defaultCheck1">
                                    <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                                    </label>
                                  </div>
                            </div>
                            @if (Route::has('user.password.request'))
                            <a href="{{ route('user.password.request') }}">  {{ __('Forgot your password?') }}</a>
                            @endif
                        </div>
                        <div class="log_in_btn">
                            <button type="submit" class="theme_btn"> {{ __('Log in') }}</button>
                        </div>
                    </form>
                    <div class="have_account">
                        <h4>Don’t have an account?<a href="{{ route('user.register') }}">Sign Up</a></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

