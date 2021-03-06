<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Managineer - @yield('title')</title>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('css/bootstrap-grid.min.css') }}">
        <script type="text/javascript" src="{{ asset('js/all.js') }}"></script>


        <script type="text/javascript" src="{{ URL::asset('js/app.js') }}"></script>
        <script type="text/javascript" src="{{ URL::asset('js/bootstrap.js') }}"></script>
        <script defer src="{{ asset('js/fontawesome/fontawesome-all.js') }}"></script>
    </head>
    <body>
        @if(Auth::check())
            @include('layouts.header')
        @endif
        <div id="vue" class="container content">
            @yield('content')
        </div>
        {{-- @include('layouts.footer') --}}
        <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
