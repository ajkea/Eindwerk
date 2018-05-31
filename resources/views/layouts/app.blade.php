<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Managineer - @yield('title')</title>

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/bootstrap-grid.min.css') }}">

        <script defer src="{{ asset('js/fontawesome/fontawesome-all.js') }}"></script>
    </head>
    <body>
        @include('layouts.header')
        <div id="vue">
            @yield('content')
        </div>
        @include('layouts.footer')

        <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
