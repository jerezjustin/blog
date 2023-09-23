<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="@yield('description', 'Blog about PHP and Javascript ecosystems.')">

    <title>@yield('title', 'Blog | PHP & Javascript Ecosystems.')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles()
</head>

<body class="flex min-h-screen flex-col bg-white dark:bg-ebony-950">
    <x-navigation />

    <main class="mx-auto flex w-full max-w-screen-xl flex-1 px-5 pt-20 md:px-0">
        {{ $slot }}
    </main>

    @include('partials.footer')

    @livewireScripts()
</body>

</html>
