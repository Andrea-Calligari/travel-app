<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/js/app.js')
    <title>@yield('title','Home-page')</title>
</head>

<body>

    @include('./partials.header')

    <main>

        @yield('content')

    </main>

    @include('./partials.footer')
    
</body>

</html>