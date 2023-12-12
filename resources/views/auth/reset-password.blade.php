<head>
    <link rel="stylesheet" href="{{ asset('assets/css/forgotpass.css') }}">
    <link rel="shortcut icon" href="/images/favicon.png" type="">
    <title>Lootbox | Reset Password</title>
</head>

<x-guest-layout>
    <div class="container">
        <div class="card">
            <p class="login">Change Password</p>
            <x-slot name="logo">
                <x-authentication-card-logo />
            </x-slot>
            <div class="circle-center">
                <div class="circle">
                    <img class ="logo" src="{{ asset('/images/logo.png') }}" width="150px" height="150px">
                </div>
            </div>

            <form method="POST" action="{{ route('password.update') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <div class="block">
                    <x-label class="mt-4 text-gray-800 dark:text-gray-800" for="email" value="{{ __('Email') }}" />
                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)"
                        required autofocus autocomplete="username" readonly />
                </div>

                <div class="mt-4">
                    <x-label class="mt-4 text-gray-800 dark:text-gray-800" for="password"
                        value="{{ __('Password') }}" />
                    <x-input id="password" class="block mt-1 w-full" type="password" name="password" required
                        autocomplete="new-password" />
                </div>

                <div class="mt-4">
                    <x-label class="mt-4 text-gray-800 dark:text-gray-800" for="password_confirmation"
                        value="{{ __('Confirm Password') }}" />
                    <x-input id="password_confirmation" class="block mt-1 w-full" type="password"
                        name="password_confirmation" required autocomplete="new-password" />
                </div>

                <x-validation-errors class="err_message" />

                <div class="flex items-center justify-end mt-4">
                    <x-button>
                        {{ __('Reset Password') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
