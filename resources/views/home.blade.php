<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Head content remains the same -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Styles -->
    <link rel="stylesheet" href="{{ Vite::asset('resources/css/app.css') }}" />
</head>
<body class="font-sans antialiased dark:bg-gradient-to-r from-pink-500 to-indigo-700 dark:text-white overflow-x-hidden">

    <div class="grid grid-cols-5 min-h-screen">
        <!-- Image Section (40%) -->
        <div class="col-span-5 lg:col-span-2">
            <img src="{{ Vite::asset('resources/images/homepage.jpg') }}" alt="Background Image" class="object-cover w-full h-full">
        </div>

        <!-- Form Section (60%) -->
        <div class="col-span-5 lg:col-span-3 flex flex-col">
            <!-- Header with Logo -->
            <header class="flex items-center justify-end p-6">
                <img src="{{ Vite::asset('resources/images/logo.svg') }}" class="h-20 w-auto" alt="Logo">
            </header>
            <h1 class="text-3xl font-semibold text-center">Register for using our ticketing system</h1>
            <!-- Registration Form -->
            <main class="flex-grow flex items-center justify-center">
                <form method="POST" action="{{ route('register') }}" class="w-full max-w-2xl p-8 bg-white dark:bg-violet-800 rounded-md shadow-md">
                    @csrf
                    <!-- Name -->
                    <div>
                        <x-input-label for="name" :value="__('Name')" class="text-lg font-semibold" />
                        <x-text-input id="name" class="block mt-1 w-full text-lg" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2 text-sm text-red-600" />
                    </div>

                    <!-- Email Address -->
                    <div class="mt-6">
                        <x-input-label for="email" :value="__('Email')" class="text-lg font-semibold" />
                        <x-text-input id="email" class="block mt-1 w-full text-lg" type="email" name="email" :value="old('email')" required autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-600" />
                    </div>

                    <!-- Password -->
                    <div class="mt-6">
                        <x-input-label for="password" :value="__('Password')" class="text-lg font-semibold" />
                        <x-text-input id="password" class="block mt-1 w-full text-lg"
                                      type="password"
                                      name="password"
                                      required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-600" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-6">
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" class="text-lg font-semibold" />
                        <x-text-input id="password_confirmation" class="block mt-1 w-full text-lg"
                                      type="password"
                                      name="password_confirmation" required autocomplete="new-password" />
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-sm text-red-600" />
                    </div>

                    <div class="flex items-center justify-between mt-8">
                        <a class="underline text-base text-gray-600 dark:text-gray-200 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>

                        <x-primary-button class="ml-4 px-6 py-3 text-lg">
                            {{ __('Register') }}
                        </x-primary-button>
                    </div>
                </form>
            </main>

            <!-- Footer -->
            <footer class="p-6 text-base text-black dark:text-white text-center">
                All rights reserved &copy; {{ date('Y') }}
            </footer>
        </div>
    </div>

</body>
</html>
