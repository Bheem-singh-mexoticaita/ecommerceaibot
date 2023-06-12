@extends('layouts.app')
@section('title', 'User Reset Password')
@section('content')
    <section class="forgot_password py_8" style="background-image: url('')">
        <div class="container">
          <div class="forgot_passowrd_form">
            <div class="log_in_form_head">
              <h2>Reset Password</h2>
              <p>
                It is a long established fact that a reader will be distracted
                by the readable content of a page
              </p>
            </div>
            <form method="POST" action="{{ route('user.password.store') }}">
                @csrf
                <input type="hidden" name="token" value="{{ $request->route('token') }}">
              <div class="custom_input">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
              </div>
              <div class="custom_input">
                <x-input-label for="password" :value="__('Password')" />
        <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
        <x-input-error :messages="$errors->get('password')" class="mt-2" />
              </div>
              <div class="custom_input">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" required autocomplete="new-password" />

                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
              </div>

              <div class="flex items-center justify-end mt-4 forgot_bttn">
                <x-primary-button class="theme_btn">
                    {{ __('Reset Password') }}
                </x-primary-button>
            </div>
            </form>
          </div>
        </div>
      </section>
      @endsection
