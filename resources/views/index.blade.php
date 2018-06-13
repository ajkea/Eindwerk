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
                <div class="col-12 col-sm-10 col-lg-8 offset-sm-1 offset-lg-2">
                <fieldset disabled="disabled">
                    <legend align="center">Gratis</legend>
                    <div class="row">
                        <div class="col-12 col-sm-4 center feature-item">
                            <i class="fal fa-users fa-5x"></i>
                            <h6 class="head-feature">Overzicht bewaren</h6>
                            <p class="text-feature">Behoud een overzicht over al de spelers en ploegen die je coacht. Zo weet je direct wie beschikbaar is en wat zijn/haar kwaliteiten zijn.</p>
                        </div>
                        <div class="col-12 col-sm-4 center feature-item">
                            <i class="fal fa-clipboard fa-5x"></i>
                            <h6 class="head-feature">Tactieken opstellen</h6>
                            <p class="text-feature">Zet per ploeg een tactiek op voor verschillende spelsituaties. Zo kan je deze makkelijk tonen en animeren voor je spelers.</p>
                        </div>
                        <div class="col-12 col-sm-4 center feature-item">
                            <i class="fal fa-play-circle fa-5x"></i>
                            <h6 class="head-feature">Ongelimiteerd</h6>
                            <p class="text-feature">Kies zelf hoeveel ploegen en hoeveel spelers je toevoegd. Er is hier geen beperking op het aantal.</p>
                        </div>
                    </div>
                </fieldset>
            </div>
            </div>
            <div class="row">
                <fieldset disabled="disabled">
                    <legend align="center">premium</legend>
                    <div class="row">
                        <div class="col-12 col-sm-4 center feature-item">
                            <i class="fal fa-link fa-5x"></i>
                            <h6 class="head-feature">Delen met vrienden</h6>
                            <p class="text-feature">Deel je tactieken en ploegen met andere premium gebruikers. Zo kan je samenwerken aan 1 of meerder ploegen.</p>        
                        </div>
                        <div class="col-12 col-sm-4 center feature-item">
                            <i class="fal fa-male fa-5x"></i>
                            <i class="fal fa-female fa-5x"></i>
                            <h6 class="head-feature">Tegenstanders toevoegen</h6>
                            <p class="text-feature">Voeg tegenstanders toe in je tactieken. Zo kan je situaties naspelen of met je glazen bol situaties voorspellen.</p>
                        </div>
                        <div class="col-12 col-sm-4 center feature-item">
                            <i class="far fa-chart-bar fa-5x"></i>
                            <h6 class="head-feature">Uitgebreidde statistieken</h6>
                            <p class="text-feature">Houd statistieken bij van je spelers zoals goals, assists, gele kaarten, ... Verder kan je informatie bijhouden zoals voorkeursvoet, grootte en gewicht.</p>
                        </div>
                </fieldset>
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
                            <button href="{{ route('register') }}" class="button button__wide pricing--card-button">Neem premium</button>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section row" id="goal">
        <div class="container section-content__center">
            <div class="row">
                <div class="col-8 offset-2 right">
                    <h6 class="section-slogan--text">Voetballen is heel simpel, maar het moeilijkste wat er is, is simpel voetballen.</h6>
                    <h6 class="section-slogan--person">Johan Cruijff</h6>
                </div>
            </div>
        </div>
    </div>
@endsection