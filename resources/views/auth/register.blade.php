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
    <div class="container-fluid" id="register">
        <div class="box-home center">
            <a href="/" class="box-home--link"><i class="fas fa-undo-alt"></i> Terug</a>
        </div>
        <div class="form--register center">
            <form class="form" method="POST" action="{{ route('register') }}" enctype="multipart/form-data" files="true">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <h4 class="form--title">Registreer</h4>
                    </div>
                    <div class="col-12">
                        <input id="firstName" type="text" class="{{ $errors->has('firstName') ? ' is-invalid' : '' }}" name="firstName" value="{{ old('firstName') }}" placeholder="Voornaam" required>    
                    </div>
                    <div class="col-12">
                        <input id="lastName" type="text" class="{{ $errors->has('lastName') ? ' is-invalid' : '' }}" name="lastName" value="{{ old('lastName') }}" placeholder="Achternaam" required>
                    </div>
                    <div class="col-12">
                        <input id="email" type="text" class="{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Email" required>
                    </div>
                    <div class="col-12">
                        <input id="password" type="password" class="{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Wachtwoord" required>    
                    </div>
                    <div class="col-12">
                        <input id="password-confirm" type="password" class="" name="password_confirmation" placeholder="Bevestig wachtwoord" required>
                    </div>
                    <div class="col-12">
                        <button class="button form--button" type="submit">
                            {{ __('Register') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
</body>
</html>