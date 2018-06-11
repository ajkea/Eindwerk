<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Managineer - @yield('title')</title>

        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/bootstrap-grid.min.css') }}">
        <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/all.js') }}"></script>

        <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
        {{-- <script type="text/javascript" src="{{ asset('js/bootstrap.js') }}"></script> --}}
        <script defer src="{{ asset('js/fontawesome/fontawesome-all.js') }}"></script>
    </head>
    <body>
        @if(Auth::check())
            @include('layouts.header')
        @endif
        <div id="vue" class="container-fluid content">
            @yield('content')
        </div>
        @include('layouts.footer')

    </body>
</html>
