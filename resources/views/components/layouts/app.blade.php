<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="@yield('description', 'Blog about PHP and Javascript ecosystems.')">

    <title>@yield('title', 'Blog | PHP & Javascript Ecosystems.')</title>

    @vite(['resources/css/app.css'])
</head>

<body class="flex flex-col min-h-screen">
    @include('partials.navigation')

    <main class="container flex flex-1 mx-auto py-12 px-5">
        {{ $slot }}
    </main>

    @include('partials.footer')
</body>

</html>
