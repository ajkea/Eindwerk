@extends('layouts.app')

@section('content')
<div class="container">
    <h6>{{ __('Register') }}</h6>
    <div class="row justify-content-center">
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="row">
                {{ __('Username') }}
                <input id="username" type="text" class="{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required autofocus>
                @if ($errors->has('username'))
                    <strong>{{ $errors->first('username') }}</strong>
                @endif
            </div>

            <div class="row">
                {{ __('First name')}}
                <input id="firstName" type="text" class="{{ $errors->has('firstName') ? ' is-invalid' : '' }}" name="firstName" value="{{ old('firstName') }}" required>
                @if ($errors->has('firstName'))
                    <strong>{{ $errors->first('firstName') }}</strong>
                @endif
            </div>

            <div class="row">
                {{ __('Last name')}}
                <input id="lastName" type="text" class="{{ $errors->has('lastName') ? ' is-invalid' : '' }}" name="lastName" value="{{ old('lastName') }}" required>
                @if ($errors->has('lastName'))
                    <strong>{{ $errors->first('lastName') }}</strong>
                @endif
            </div>

            <div class="row">
                    {{ __('Email')}}
                    <input id="email" type="text" class="{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                    @if ($errors->has('email'))
                        <strong>{{ $errors->first('email') }}</strong>
                    @endif
                </div>

            <div class="row">
                {{ __('Password') }}
                <input id="password" type="password" class="{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                @if ($errors->has('password'))
                    <strong>{{ $errors->first('password') }}</strong>
                @endif
            </div>

            <div class="row">
                {{ __('Confirm Password') }}
                <input id="password-confirm" type="password" class="" name="password_confirmation" required>
            </div>

            <div class="row">
                <h5>File</h5>
                {{-- <input type="file" name="FKmediaID" id="FKmediaID"> --}}
            </div>
            
            <div class="row">
                <button type="submit">
                    {{ __('Register') }}
                </button>
            </div>
        </form>    
    </div>
</div>
@endsection
