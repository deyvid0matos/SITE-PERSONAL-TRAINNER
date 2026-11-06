<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" type="image/png" href="{{ asset('logofooter.png') }}">

        <title>{{ config('app.name', 'Tiago Silva') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800,900&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <script src="https://unpkg.com/lucide@latest"></script>

        <style>
            html, body {
                background-color: #050505 !important;
                color: #f3f4f6;
                margin: 0;
                padding: 0;
            }
        </style>
    </head>
    <body class="font-sans antialiased bg-[#050505]">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-[#050505]">
            
            <div class="w-full sm:max-w-md mt-6 px-6 py-4 overflow-hidden">
                {{ $slot }}
            </div>
            
        </div>
    </body>
</html>