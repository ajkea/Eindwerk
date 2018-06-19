@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
    <div class="col-12">
      <h3>Ploeg: {{ $team->teamName }}</h3>
      <p>{{ $team->teamDescription }}</p>
      @if(session('succes'))
        <div class="notification notification__succes alert" role="alert">{{ session('succes') }}
          <a class="close" data-dismiss="alert" aria-label="Close"><i class="fal fa-times"></i></a>
        </div>
      @endif
    </div>
    <div class="col-12">
      <h6>Tactieken:s</h6>
      @foreach($team->tactics as $tactic)
      <div class="tactic-list">
        <p class="player-bio-stat--description">Titel:</p>
        <a class="link-tactic" href="../tactics/{{ $tactic->id }}">{{ $tactic->tacticName }}</a>
        <p class="player-bio-stat--description">Beschrijving:</p>
        <p>{{ $tactic->tacticDescription }}</p>
      </div>
      
      @endforeach
    </div>
    <div class="col-12">
      <h6>Spelers:</h6>
      <div class="overview-players-block col-12">
        <div class="div-table">
          <div class="div-table-row div-table-head">
            <div class="div-table-col"></div>
            <div class="div-table-col">Naam</div>
            <div class="div-table-col">Geboortedatum</div>
            <div class="div-table-col"># shirt</div>
            <div class="div-table-col"></div>
          </div>
          @isset($team->players)
          @foreach ($team->players as $player)
            @if($loop->index > 1)
            <div class="div-table-row">
              @isset ($player->media)
                <div class="div-table-cell table-image--avatar"><img class="img-profile--avatar" src="{{ url('images/upload/'.$player->media->source)}}" alt="{{ $player->media->alt }}"></div>
              @endisset
              @empty ($player->media)
                <div class="div-table-cell table-image--avatar"><i class="fas fa-user-circle fa-3x img-profile--avatar"></i></div>
              @endempty
              <div class="div-table-cell">{{ $player->firstName.' '.$player->lastName }}</div>
              <div class="div-table-cell">{{ date('d-m-Y', strtotime($player->birthDate)) }}</div>
              <div class="div-table-cell" >{{ $player->shirtNumber }}</div>
              <div class="div-table-cell div-table-cell--buttons">
                <a class="button button__info" href="/players/{{ $player->id }}"><i class="fas fa-info"></i></a>
                <form action="/players/delete" method="post">
                  @csrf
                  <input type="hidden" name="playerID" value="{{ $player->id }}">
                  <input type="hidden" name="firstName" value="{{ $player->firstName }}">
                  <input type="hidden" name="lastName" value="{{ $player->lastName }}">
                  <button type="submit" class="button button__delete"><i class="fas fa-trash-alt"></i></button>
                </form>
              </div>
            </div>
            @endif
          @endforeach
          @endisset
        </div>
      </div>
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
        <input type="hidden" name="FKteamID" value="{{ $team->id }}">
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
      @if(auth()->user()->role == 'user')
      <div class="box-premium center">
        <p>Wordt premium om teams te delen</p>
        <a class="button" href="{{ url('/#pricing') }}">Go premium</a>
      </div>
      @endif
      <fieldset {{ auth()->user()->role == 'user' ? 'disabled class=no-premium' : '' }}>
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
  </div>
</div>
@endsection