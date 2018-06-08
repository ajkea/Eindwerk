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
    <div class="container-fluid" id="login">
        <div class="box-home center">
            <a href="/" class="box-home--link"><i class="fas fa-undo-alt"></i> Terug</a>
        </div>
        <div class="form--register center">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="col-12">
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="email" required autofocus>
                    @if ($errors->has('email'))
                        <strong>{{ $errors->first('email') }}</strong>
                    @endif
                </div>
                <div class="col-12">
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Wachtwoord" required>
                    @if ($errors->has('password'))
                        <strong>{{ $errors->first('password') }}</strong>
                    @endif
                </div>
                <div class="col-12 form--remember left">
                    <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label for="remember">Onthoud me</label>
                </div>
                <div class="col-12">
                    <button type="submit" class="button">
                        Login
                    </button>
                </div>
                <div class="col-12 left">
                    <a class="link--small" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                </div>
            </form>
        </div>
    </div>
    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
</body>
</html>
