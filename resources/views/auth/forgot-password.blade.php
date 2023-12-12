
<head>
    <link rel="stylesheet" href="{{ asset('assets/css/forgotpass.css') }}">
</head>

<x-guest-layout>
    <div class="container">
        <div class="card">
            <p class="login">Forgot Password</p>
            <x-slot name="logo">
                <x-authentication-card-logo />
            </x-slot>
            <div class="circle-center">
                <div class="circle">
                <img class ="logo" src="{{ asset('/images/logo.png') }}" width="150px" height="150px">
                </div>
                </div>
            
            
    

    <div class="mt-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __("Don't worry if you forgot your password! Get back in within minutes by entering your email address below.") }}
    </div>

    @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
            {{ session('status') }}
        </div>
    @endif

    <x-validation-errors class="mb-4" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="block">
            <x-label  class="mt-4 text-black" for="email" value="{{ __('Email') }}" />
            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-button>
                {{ __('Email Password Reset Link') }}
            </x-button>
        </div>
    </form>
        </div></div>


        <br><br>

    </div>
</div>
</x-guest-layout>
