@extends('layouts.login-register')
@section('title', 'Login')
@section('submit-button-text', 'Sign in')
@section('form-action', '/login')
@section('form-title', 'Sign in to your account')
@section('sign-up-or-login-link')
     <p class="mt-10 text-center text-sm text-gray-500">
          Don't have an account yet?
          <a
            href="{{ route('register')  }}"
            class="font-semibold leading-6 text-black hover:text-black"
            >Sign Up</a
          >
        </p>
@endsection
