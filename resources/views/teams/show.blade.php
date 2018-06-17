@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
    <div class="col-12">
        <h4>Ploeg: {{ $team->teamName }}</h4>
        @if(session('succes'))
          <div class="notification notification__succes alert" role="alert">{{ session('succes') }}
            <a class="close" data-dismiss="alert" aria-label="Close"><i class="fal fa-times"></i></a>
          </div>
        @endif
    
    </div>
    <div class="col-12 col-md-4">
      <fieldset>
      <legend>{{ $team->teamName }} bijwerken</legend>
      <form class="form form--crud" action="/teams/edit">
          <p class="player-bio-stat--description">Ploegnaam:</p>
          <input type="text" name="teamName" id="teamName" placeholder="Ploegnaam" value="{{ $team->teamName }}">
          <p class="player-bio-stat--description">Ploegnaam:</p>
          <textarea name="teamDescription" id="teamDescription" cols="100%" rows="2">{{ $team->teamDescription }}</textarea>
          <button class="button" type="submit">Bijwerken</button>
      </form>
      <form class="form form--crud" action="/userteams/addPlayer" method="post">
        @csrf
        <input type="hidden" name="teamID" value="{{ $team->id }}">
        <p class="player-bio-stat--description">Spelers toevoegen:</p>
        <select name="playerID" id="playerID">
          @foreach($players as $player)
              <option value="{{ $player->id }}">{{ $player->firstName.' '.$player->lastName }}</option>
          @endforeach
        </select>
        <button class="button"><i class="fal fa-user-plus"></i></button>
      </form>
      </fieldset>
    </div>
    <div class="col-12 col-md-4">
      <form class="form form--crud" action="/tactics/addToTeam" method="post">
        @csrf
        <fieldset>
          <legend>Tactiek aanmaken</legend>
          <p class="player-bio-stat--description">Naam:</p>
          <input type="text" name="name" placeholder="Naam">
          <p class="player-bio-stat--description">Beschrijving:</p>
          <textarea name="description" id="description" rows="2" placeholder="Beschrijving"></textarea>
          <button class="button" type="submit">Toevoegen</button>
        </fieldset>
      </form>
    </div>
    <div class="col-12 col-md-4">
      <fieldset>
        <legend>Gebruikers toevoegen</legend>
        <form class="form form--crud" action="/userteams/addUser" method="post">
          @csrf
          <input type="hidden" name="teamID" value="{{ $team->id }}">
          <p class="player-bio-stat--description">Gebruiker toevoegen:</p>
          <input type="text" name="email" placeholder="email gebruiker">
          <button class="button" type="submit">Toevoegen</button>
        </form>
      </fieldset>
    </div>

  <col-4>
    <ul>
      @isset($team->users)
      <p>Gebruikers die deze ploeg beheren:</p>
        @foreach($team->users as $user)
          <li>{{ $user->firstName }}</li>
        @endforeach
      @endisset
      @isset($team->players)
      <p>Players:</p>
        @foreach($team->players as $player)
          @if($loop->index < 2)
          @else
            <li>{{ $player->firstName.' '.$player->lastName }}</li>
          @endif  
        @endforeach
      @endisset
      @isset($team->tactics)
      <p>Tactieken:</p>
        @foreach($team->tactics as $tactic)
        <a href="/tactics/{{ $tactic->id }}">{{ $tactic->tacticName }}</a>
        @endforeach
      @endisset
    </ul>
  </col-4>
  <col-4>
    <form action="/userteams/addPlayer" method="post">
      @csrf
      <input type="hidden" name="teamID" value="{{ $team->id }}">
      <select name="playerID" id="playerID">
        @foreach($players as $player)
            <option value="{{ $player->id }}">{{ $player->firstName.' '.$player->lastName }}</option>
        @endforeach
      </select>
      <button class="button">Toevoegen</button>
    </form>
  </col-4>
  {{-- @if(Auth::check() && Auth::user()->role !== "user") --}}
  <col-4>
    <form action="/userteams/addUser" method="post" style="border: 1px solid black">
      @csrf
      <input type="hidden" name="teamID" value="{{ $team->id }}">
      <p>User toevoegen aan team: {{ $team->teamName }}</p>
      <p>User die je wilt toevoegen:</p>
      <input type="text" name="firstName">
      <button class="button" type="submit">Toevoegen</button>
    </form>
  </div>
  {{-- @endif --}}
  <div class="col-4">
    <form action="/tactics/addToTeam" method="post" style="border: 1px solid black">
      @csrf
      <input type="hidden" name="FKteamID" value="{{ $team->id }}">
      <p>Tactiek toevoegen aan team: {{ $team->teamName }}</p>
      <p>Tactiek naam:</p>
      <input type="text" name="name">
      <p>Tactiek beschrijving:</p>
      <input type="text" name="description">
      <input type="hidden" name="type" value="vrij spel">
      <button class="button" type="submit">Toevoegen</button>
    </form>
  </col-4>
</div>
@endsection