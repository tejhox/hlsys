<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

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

<body class="font-sans antialiased min-h-screen bg-center bg-fixed bg-cover"
    style="background-image: url('{{ asset('images/bg5.jpg') }}')">
    <div class="min-h-screen flex flex-col items-center px-4 sm:pt-0">
        <div
            class="w-full sm:max-w-md mt-2 px-4 py-4 bg-gray-100/70 shadow-md overflow-hidden rounded-md sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>
</body>

</html>
