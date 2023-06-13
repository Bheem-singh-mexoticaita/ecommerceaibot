@extends('layouts.Admin.guest')
@section('title', 'Login')
@section('admincontent')
  <!-- Session Status -->
  <div class="container-fluid page-body-wrapper full-page-wrapper">
    <div class="content-wrapper d-flex align-items-center auth">
      <div class="row flex-grow">
        <div class="col-lg-4 mx-auto">
          <div class="auth-form-light text-left p-5">
            <div class="brand-logo">
              <img src="{{ asset('backend/assets/images/logo-dark.svg') }}">
            </div>
            <h6 class="font-weight-light">Sign in to continue.</h6>
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('admin.adminlogin') }}">
                @csrf
              <div class="form-group">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class=" form-control form-control-lg block mt-1 w-full" placeholder="Enter Email Address"  type="email" name="email" :value="old('email')"  autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />

              </div>
              <div class="form-group">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" class="form-control form-control-lg block mt-1 w-full"   type="password"  name="password"  placeholder="Enter Password" autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
                   <!-- Remember Me -->
    <div class="block mt-4">
        <label for="remember_me" class="inline-flex items-center">
            <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
            <span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
        </label>
    </div>
    <div class="flex items-center justify-end mt-4">
        @if (Route::has('admin.password.request'))
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('admin.password.request') }}">
                {{ __('Forgot your password?') }}
            </a>
        @endif
        <button type="submit" class="theme_btn"> {{ __('Log in') }}</button>
        </div>
</div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- content-wrapper ends -->
  </div>
  @endsection

