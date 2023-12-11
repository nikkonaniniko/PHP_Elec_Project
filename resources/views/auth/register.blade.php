<head>
    <link rel="stylesheet" href="{{ asset('assets/css/register.css') }}">
</head>

<x-guest-layout>
    {{-- <x-authentication-card> --}}
        <div class="container">
            <div class="card">

                <p style="color: black; font-size:25px;">Create a new Account!</p><br>

                <div class="circle-center">
                    <div class="circle">
                        <img class ="logo" src="{{ asset('/images/logo.png') }}" width="150px" height="150px">
                    </div>
                </div>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div>
                        {{-- <x-label for="name" value="{{ __('Name (Format: FN LN)') }}" /> --}}
                        <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="{{ __('Name') }}"/>
                    </div>

                    <div class="mt-4">
                        {{-- <x-label for="email" value="{{ __('Email') }}" /> --}}
                        <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="{{ __('Email') }}"/>
                    </div>

                    <div class="mt-4">
                        {{-- <x-label for="phone" value="{{ __('Contact Number (+63XXXXXXXXXX)') }}" /> --}}
                        <x-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required autocomplete="phone" placeholder="{{ __('Phone') }}"/>
                    </div>

                    <div class="mt-4">
                        {{-- <x-label for="address" value="{{ __('Full Address') }}" /> --}}
                        <x-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required autocomplete="address" placeholder="{{ __('Address') }}"/>
                    </div>

                    <div class="mt-4">
                        {{-- <x-label for="password" value="{{ __('Password') }}" /> --}}
                        <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" placeholder="{{ __('Password') }}"/>
                    </div>

                    <div class="mt-4">
                        {{-- <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" /> --}}
                        <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" placeholder="{{ __('Confirm Password') }}"/>
                    </div>
                    <x-validation-errors />

                    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                        <div class="mt-4">
                            <x-label for="terms">
                                <div class="flex items-center">
                                    <x-checkbox name="terms" id="terms" required />

                                    <div class="ml-2">
                                        {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                                'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">'.__('Terms of Service').'</a>',
                                                'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">'.__('Privacy Policy').'</a>',
                                        ]) !!}
                                    </div>
                                </div>
                            </x-label>
                        </div>
                    @endif

                    <div class="flex items-center justify-end mt-4">
                        <a id="alreadyreg" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>

                        <x-button class="ml-4" id=btn>
                            {{ __('Register') }}
                        </x-button>
                    </div>
                </form>
            </div>
        </div>
    {{-- </x-authentication-card> --}}
</x-guest-layout>
