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
                            <h2>Sing Up to your account</h2>
                            <p>It is a long established fact that a reader will be distracted by the readable content of a page</p>
                        </div>
                        <form method="POST" action="{{ route('user.register') }}">@csrf
                            <div class="custom_input">
                        <x-input-label for="name" :value="__('Full Name')" />
                        <x-text-input id="name" class="block mt-1 w-full" placeholder="Enter your full name"  type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>
                            <div class="custom_input">
                            <x-input-label for="email" :value="__('Email')" />
    <x-text-input id="email" class="block mt-1 w-full" type="email" placeholder="Enter your e-mail"  name="email" :value="old('email')" required autocomplete="username" />
    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
                            <div class="custom_input">
                            <x-input-label for="password" :value="__('Password')" />
                        <x-text-input id="password" class="block mt-1 w-full"  type="password"   placeholder="Enter your password"  name="password" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>
                            <div class="custom_input">
                            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
<x-text-input id="password_confirmation" class="block mt-1 w-full"  type="password" name="password_confirmation" placeholder="Enter your confirm password"  required autocomplete="new-password" />
<x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                            </div>
                            <div class="log_in_btn">
                                <button type="submit" class="theme_btn">  {{ __('Register') }}</button>
                            </div>
                        </form>
                        <div class="have_account">
                        <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('user.login') }}">
        {{ __('Already registered?') }}
    </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

