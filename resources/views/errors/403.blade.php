<!DOCTYPE html>
<html lang="en" data-theme="light" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - Sarpras</title>
    
    <style>
        .img-error {
            width: 100%;
            height: 400px;
        }
    </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="flex items-center justify-center min-h-screen px-6 bg-white lg:px-8">
    <div class="w-full md:w-2/3 md:mx-auto">
        <div class="text-center">
            <img class="mx-auto img-error" src="{{ asset('img/error-403.svg') }}" alt="Forbidden">
            <h1 class="text-4xl font-extrabold">Forbidden</h1>
            <p class="text-lg text-gray-600">You are unauthorized to see this page.</p>
            <a href="{{ route('dashboard') }}" class="mt-3 text-white btn btn-primary hover:opacity-80">Go Home</a>
        </div>
    </div>

</body>

</html>
