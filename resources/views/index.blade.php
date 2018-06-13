@extends('layouts.app')
@section('title','Home')
@section('content')
</div>
<div class="container-fluid" id="index-page">
    <div class="hero-image section">
        <div class="col col-sm-11 right">
            <h1 class="hero-logo">Managineer</h1>
            <h6 class="hero-logo--description">Your personal football assistant</h6>
        </div>
        <div class="col col-sm-4 offset-sm-7 right">
            <h6 class="hero-slogan--text">No one man should have all that power</h6>
            <h6 class="hero-slogan--person">Kanye West</h6>
        </div>
        @if(Auth::check())
        <div class="col col-sm-7 offset-sm-4 right">
            <a href="/overview" class="button button--index button__transparant">Overzicht</a>
        </div>
        @else
        <div class="col col-sm-7 offset-sm-4 right">
            <a href="{{ route('register') }}" class="button button--index button__transparant">Register</a>
            <a href="{{ route('login') }}" class="button button--index button__transparant">Login</a>
        </div>
        @endauth       
    </div>
    <div class="section row" id="features">
        <div class="container section-content">
            <div class="row">
                <div class="col-12 center">
                    <h2 class="section-title">Features</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-4 center feature-item">
                    <i class="fal fa-clipboard fa-5x"></i>
                    <h6 class="head-feature">Tactics</h6>
                    <p class="text-feature">Stel je eigen tactieken op en deel ze met je vrienden.</p>
                </div>
                <div class="col-12 col-sm-4 center feature-item">
                    <i class="fal fa-users fa-5x"></i>
                    <h6 class="head-feature">Duidelijk overzicht</h6>
                    <p class="text-feature">Geef zelf je spelers in en verdeel ze onder je ploegen.</p>
                </div>
                <div class="col-12 col-sm-4 center feature-item">
                    <i class="fal fa-play-circle fa-5x"></i>
                    <h6 class="head-feature">Speel af</h6>
                    <p class="text-feature">Animeer je tactieken en maak ze zo makkelijk duidelijk aan iedereen.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="section row" id="pricing">
        <div class="container section-content">
            <div class="row">
                <div class="col-12 center">
                    <h2 class="section-title">Let's get it started</h2>
                </div>
                <div class="col-12 col-md-5 offset-md-1 col-lg-4 offset-md-2">
                    <div class="pricing--card">
                        <fieldset disabled="disabled">
                            <legend align="center">Gratis</legend>
                            <p class="text--slogan">Creëer zelf je tactieken</p>
                            <div class="pricing--card-price">
                                <h6 class="pricing--card-euro">&euro; 0,00 </h6>
                                <p class="pricing--card-time">/jaar</p>
                            </div>
                            <div class="pricing--card-list">
                                <ul>
                                    <li>Heb een overzicht over je spelers</li>
                                    <li>Verdeel je ploegen met hun spelers</li>
                                    <li>Stel zelf allerlei tactieken op</li>
                                    <li>Geen beperking op aantal spelers, teams of tactieken</li>
                                </ul>
                            </div>
                            <button href="{{ route('register') }}" class="button button__wide">Register</button>
                        </fieldset>
                    </div>
                </div>
                <div class="col-12 col-md-5 col-lg-4">
                    <div class="pricing--card">
                        <fieldset disabled="disabled">
                            <legend align="center">Premium</legend>
                            <p class="text--slogan">Deel je tactieken en werk samen</p>
                            <div class="pricing--card-price">
                                <h6 class="pricing--card-euro">&euro; 3,50 </h6>
                                <p class="pricing--card-time">/maand</p>
                            </div>
                            <div class="pricing--card-list">
                                <ul>
                                    <li>Deel je teams</li>
                                    <li>Werk samen aan een tactiek</li>
                                    <li>Kies uit meerdere templates</li>
                                    <li>Uitgebreidere informatie</li>
                                    <li>Overzicht van goals, assists, ...</li>
                                    <li>Veel liefde van ons</li>
                                </ul>
                            </div>
                            <button href="{{ route('register') }}" class="button button__wide">Register</button>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section row" id="goal">
        <div class="container section-content">
            <div class="row">
                <div class="col-8 offset-2">
                    <h1 class="index-slogan--text center">Test managineer gratis uit en neem de beker mee naar huis!</h1>
                </div>
            </div>
        </div>
    </div>
@endsection