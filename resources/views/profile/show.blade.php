<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/images/favicon.png" type="image/png">
    <title>Lootbox | Profile Settings</title>
    <link rel="stylesheet" href="{{ asset('your-custom-styles.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/updateprofile.css') }}">
</head>

<body class="bg-gray-100">

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <header class="flex items-center justify-between mb-8">
            <a href="{{ url('redirect') }}">
                <img width="100px" src="/images/logo.png" alt="logo" class="logo" />
            </a>
        </header>
<br><br>
        <div class="card">
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                @livewire('profile.update-profile-information-form')
            @endif
        </div>

        <div class="card">
            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                @livewire('profile.update-password-form')
  
        </div>

            @endif

            {{-- @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                <div class="mt-6">
                    @livewire('profile.two-factor-authentication-form')
                </div>

                <hr class="my-6">
            @endif --}}
            <div class="card">
            <div class="mt-6">
                @livewire('profile.logout-other-browser-sessions-form')
            </div>
            <div class="card">
            @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())

                <div class="mt-6">
                    @livewire('profile.delete-user-form')
                </div>
            @endif
        </div>
    </div>

</body>

</html>
