@extends('layouts.app')
@section('title','Home')
@section('content')
</div>
<div class="container-fluid" id="index-page">
    <div class="hero-image">
        <div class="col col-sm-11 right">
            <h1 class="hero-logo">Managineer</h1>
            <h6 class="hero-logo--description">Your personal football assistant</h6>
        </div>
        <div class="col col-sm-4 offset-sm-7 right">
            <h6 class="hero-slogan--text">No one man should have all that power</h6>
            <h6 class="hero-slogan--person">Kanye West</h6>
        </div>
        <div class="col col-sm-4 offset-sm-7 right">
            <a href="{{ route('login') }}" class="button button__transparant">Login</a>
            <a href="{{ route('register') }}" class="button button__transparant">Register</a>
        </div>
        
    </div>
    <div class="section row" id="features">
        <div class="container">
            <div class="row">
                <div class="col center">
                    <h4 class="section-title">Features</h4>
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
    <div class="row section" id="image-manager">
        <div class="col-12 col-sm-6" id="col-1">

        </div>
        <div class="col-12 col-sm-6" id="col-2">
            <h4 class="section-title">Verras de tegenstander</h4>
        </div>
        
        
    </div>
@endsection