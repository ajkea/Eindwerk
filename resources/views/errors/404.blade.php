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
    <div class="container-fluid" id="error-not-found">
        <div class="row">
            <div class="form--404 center">
              <h6 class="form--404-text">Pagina niet gevonden, keer terug naar het overzicht</h6>
              <a href="/overview" class="button"><i class="fas fa-undo-alt"></i> Terug</a>
          </div>
        </div>
        <div class="center">
          
        </div>
    </div>
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
</body>
</html>
