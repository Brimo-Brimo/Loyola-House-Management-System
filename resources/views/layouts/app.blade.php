<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Loyola House Management System') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-gray-100">

<div class="flex min-h-screen">

    @include('layouts.sidebar')

    <div class="flex-1">

        @include('layouts.navigation')

        @isset($header)

        <header class="bg-white shadow">

            <div class="px-8 py-6">

                {{ $header }}

            </div>

        </header>

        @endisset

        <main class="p-8">

            {{ $slot }}

        </main>

    </div>

</div>

</body>

</html>