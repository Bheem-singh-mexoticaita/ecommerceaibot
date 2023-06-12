@extends('layouts.app')
@section('title', 'User Forget Password')
@section('content')
    <section class="forgot_password py_8" style="background-image: url('')">
        <div class="container">
          <div class="forgot_passowrd_form">
            <div class="log_in_form_head">
              <h2>Request a Password Reset</h2>
              <p>
                {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}

              </p>
              <x-auth-session-status class="mb-4" :status="session('status')" />

            </div>
            <form method="POST" action="{{ route('user.password.email') }}">
                @csrf
              <div class="custom_input">
                <x-input-label for="email" :value="__('Email')" />
        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"/>
        <x-input-error :messages="$errors->get('email')" class="mt-2" />
              </div>
              <div class="flex items-center justify-end mt-4 forgot_bttn">
                <x-primary-button class="theme_btn">
                    {{ __('Email Password Reset Link') }}
                </x-primary-button>
            </div>

            </form>
          </div>
        </div>
      </section>
      @endsection
