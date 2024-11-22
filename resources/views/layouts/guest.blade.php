<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased bg-gradient-to-b from-black via-gray-950 to-[#1a0524]">
    <div class="relative">
        @if (isset($header))
            <header class="fixed inset-x-0 top-0 z-10 w-full transition-all duration-300 bg-transparent nav-fixed">
                {{ $header }}
            </header>
        @endif

        <main>
            {{ $slot }}
        </main>

    </div>
</body>

</html>
