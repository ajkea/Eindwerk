@extends('layouts.app')
@section('content')
<div class="container">
  @if (session('error'))
  <div class="error">
    <p>{{ session('error') }}</p>
  </div>
  @endif
  @if (session('succes'))
    <div class="notification notification__succes">
      <p>{{ session('succes') }}</p>
    </div>
  @endif
  <col-4>
    <h6>{{ $team->teamName }}</h6>
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
  @if(Auth::check() && Auth::user()->role !== "user")
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
  @endif
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