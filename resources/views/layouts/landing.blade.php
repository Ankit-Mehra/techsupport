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
<body class="font-sans antialiased dark:bg-gradient-to-r from-pink-300 via-red-400 to-indigo-600 dark:text-white overflow-x-hidden">

    <div class="grid grid-cols-5 min-h-screen">
        <!-- Image Section (40%) -->
        <div class="col-span-5 lg:col-span-2 p-5">
            <img src="{{ Vite::asset('resources/images/homepage.jpg') }}" alt="Background Image" class="object-cover w-full h-full rounded-lg shadow-lg">
        </div>

        <!-- Form Section (60%) -->
        <div class="col-span-5 lg:col-span-3 flex flex-col">
            <!-- Header with Logo -->
            <header class="flex items-center justify-end p-6">
                <img src="{{ Vite::asset('resources/images/logo.svg') }}" class="h-20 w-auto" alt="Logo">
            </header>
            <h1 class="text-4xl font-bold text-center">{{ $heading }}</h1>
            <!-- Registration Form -->
            <main class="flex-grow flex items-center justify-center">
                {{ $slot }}
            </main>

            <!-- Footer -->
            <footer class="p-6 text-base text-black dark:text-white text-center">
                All rights reserved &copy; {{ date('Y') }}
            </footer>
        </div>
    </div>

</body>
</html>
