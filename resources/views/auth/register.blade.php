@extends('layouts.app')

@section('content')
<div class="container">
    <h6>{{ __('Register') }}</h6>
    <div class="row justify-content-center">
        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" files="true">
            @csrf
            <div class="row">
                <div class="col-6">
                    <p>Gebruikersnaam:</p>
                    <p>Voornaam:</p>
                    <p>Achternaam:</p>
                    <p>Email:</p>
                    <p>Wachtwoord:</p>
                    <p>Bevestig:</p>
                    <p>Profielfoto:</p>
                </div>
                <div class="col-6">
                    <input id="username" type="text" class="{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>    
                    <input id="firstName" type="text" class="{{ $errors->has('firstName') ? ' is-invalid' : '' }}" name="firstName" value="{{ old('firstName') }}" required>
                    <input id="lastName" type="text" class="{{ $errors->has('lastName') ? ' is-invalid' : '' }}" name="lastName" value="{{ old('lastName') }}" required>
                    <input id="email" type="text" class="{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                    <input id="password" type="password" class="{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                    <input id="password-confirm" type="password" class="" name="password_confirmation" required>
                    <input type="file" name="media" id="media">
                </div>
            </div>
            {{-- <div class="row">
                <p>Gebruikersnaam:</p>
                <input id="username" type="text" class="{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>
                @if ($errors->has('username'))
                    <strong>{{ $errors->first('username') }}</strong>
                @endif
            </div>

            <div class="row">
                <p>Voornaam:</p>
                <input id="firstName" type="text" class="{{ $errors->has('firstName') ? ' is-invalid' : '' }}" name="firstName" value="{{ old('firstName') }}" required>
                @if ($errors->has('firstName'))
                    <strong>{{ $errors->first('firstName') }}</strong>
                @endif
            </div>

            <div class="row">
                <p>Achternaam:</p>
                <input id="lastName" type="text" class="{{ $errors->has('lastName') ? ' is-invalid' : '' }}" name="lastName" value="{{ old('lastName') }}" required>
                @if ($errors->has('lastName'))
                    <strong>{{ $errors->first('lastName') }}</strong>
                @endif
            </div>

            <div class="row">
                <p>Email:</p>
                <input id="email" type="text" class="{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                @if ($errors->has('email'))
                    <strong>{{ $errors->first('email') }}</strong>
                @endif
                </div>

            <div class="row">
                <p>Wachtwoord:</p>
                <input id="password" type="password" class="{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                @if ($errors->has('password'))
                    <strong>{{ $errors->first('password') }}</strong>
                @endif
            </div>

            <div class="row">
                <p>Bevestig wachtwoord:</p>
                <input id="password-confirm" type="password" class="" name="password_confirmation" required>
            </div>

            <div class="row">
                <h5>Profielfoto:</h5>
                <input type="file" name="media" id="media">
            </div> --}}
            
            <div class="row">
                <button type="submit">
                    {{ __('Register') }}
                </button>
            </div>
        </form>    
    </div>
</div>
@endsection
