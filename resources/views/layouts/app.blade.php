<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="light">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    {{-- Datepicker --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr@4.6.13/dist/flatpickr.min.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="overflow-x-hidden antialiased font-poppins">
    <div class="flex flex-col min-h-screen bg-gray-100">
        @include('layouts.navigation')

        <div class="grid lg:grid-cols-[256px_1fr] flex-1 mt-16 w-full">
            @include('components.sidebar')

            <div id="main-content" class="min-w-0">
                @isset($header)
                    <header class="bg-white shadow">
                        <div class="px-4 py-6 mx-auto max-w-7xl sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                @endisset

                <main class="p-4">
                    {{ $slot }}

                    <x-utils.toast />

                    <x-footer />
                </main>
            </div>
        </div>
    </div>
</body>

</html>
