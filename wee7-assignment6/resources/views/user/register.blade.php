@extends('layouts.login-register')
@section('title', 'Register')
@section('submit-button-text', 'Register')
@section('form-action', '/register')
@section('form-title', 'Create a new account')
@section('extra-fields')
<div>
            <label
              for="first-name"
              class="block text-sm font-medium leading-6 text-gray-900"
              >First Name</label
            >
            <div class="mt-2">
              <input
                id="firstName"
                value="{{ old('firstName') }}"
                name="firstName"
                type="text"
                autocomplete="firstName"
                placeholder="Md. Mahabur Rahman"
                required
                class="block w-full rounded-md border-0 p-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-black sm:text-sm sm:leading-6" />
            </div>
            @error('firstName')
                <div class="alert m-0 p5 text-2xl  alert-danger">{{ $message }}</div>
              @enderror
          </div>
<div>
            <label
              for="lastName"
              class="block text-sm font-medium leading-6 text-gray-900"
              >Last Name</label
            >
            <div class="mt-2">
              <input
                id="lastName"
                value="{{ old('lastName') }}"
                name="lastName"
                type="text"
                autocomplete="lastName"
                placeholder="Nadim"
                required
                class="block w-full rounded-md border-0 p-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-black sm:text-sm sm:leading-6" />
               @error('lastName')
                <div class="alert m-0 p5 text-2xl  alert-danger">{{ $message }}</div>
              @enderror

            </div>
          </div>

          <!-- Username -->
          <div>
            <label
              for="username"
              class="block text-sm font-medium leading-6 text-gray-900"
              >Username</label
            >
            <div class="mt-2">
              <input
                id="username"
                value="{{ old('username') }}"
                name="username"
                type="text"
                autocomplete="username"
                placeholder="alparslan1029"
                required
                class="block w-full rounded-md border-0 p-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-black sm:text-sm sm:leading-6" />
                @error('username')
                <div class="alert m-0 p5 text-2xl  alert-danger">{{ $message }}</div>
              @enderror
            </div>
          </div>


@endsection

@section('sign-up-or-login-link')

<p class="mt-10 text-center text-sm text-gray-500">
          Already a member?
          <a
            href="{{ route('login') }}"
            class="font-semibold leading-6 text-black hover:text-black"
            >Sign In</a
          >
        </p>
@endsection
