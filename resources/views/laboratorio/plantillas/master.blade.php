<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale())}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/laboratorio.css') }}" rel="stylesheet">
    <link href="{{ asset('css/errors.css') }}" rel="stylesheet">
</head>
<body>
    @include('laboratorio.plantillas.sidebar')
    
    <main>
        @yield('content')
    </main>

    <script src="{{ asset('js/app.js') }}" defer></script>
    @yield('scripts')
    <script src="{{ asset('js/laboratorio.js') }}" type="module"></script>
</body>
</html>