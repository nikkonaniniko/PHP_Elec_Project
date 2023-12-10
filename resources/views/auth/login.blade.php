<head>
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
</head>

<x-guest-layout>
    <div class="container">
    <div class="card">
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <p class="login">Log in to your account</p>
            <div class="circle-center">
            <div class="circle">
            <img class ="logo" src="{{ asset('/images/logo.png') }}" width="150px" height="150px">
            </div>
            </div>
            <div class>
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" required autofocus autocomplete="username" placeholder="{{ __('Email') }}" />
            </div>

            <div class="mt-4">
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" placeholder="{{ __('Password') }}" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span id="remember_me"class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a id="forgotpass" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </div>
            
            <x-button id="btn" class="ml-4">
                {{ __('Log in') }}
            </x-button>
        </form>
        <br><br>
        <x-validation-errors class="mb-4" />{{-- TEMP FIX --}}
    </div>
</div>
</x-guest-layout>
