@extends('layouts.app')
@section('content')

<div id="teams" class="tab-pane row tab-content" role="tabpanel">
    <div class="col-12">
      <h6>Ploegen:</h6>
      <a href="#team-form-add" data-toggle="collapse" class="button"><i class="fas fa-users"></i> Toevoegen</a>
    </div>
    <div class="col-12">
      <form id="team-form-add" class="form form--crud" action="/teams" method="post">
        @csrf
        <fieldset>
          <legend> Ploeg toevoegen</legend>
          <input type="text" name="teamName" id="teamName" placeholder="ploegnaam"> 
          <textarea  rows="2" type="text" name="teamDescription" id="teamDescription" placeholder="extra infomatie"></textarea>
          <button type="submit" class="button button--form" value="toevoegen"><i class="fal fa-users"></i> toevoegen</button>
        </fieldset>
      </form>
    </div>
    <div class="col-12">
      <div class="div-table">
        <div class="div-table-row div-table-head">
          <div class="div-table-col">#</div>
          <div class="div-table-col">ploegnaam</div>
          <div class="div-table-col"># spelers</div>
          <div class="div-table-col"># tactieken</div>
          <div class="div-table-col"></div>
        </div>
        @foreach($teams as $team)
          @if( $loop->index !== 0)
          <div class="div-table-row">
            <div class="div-table-cell">{{ $loop->index }}</div>
            <div class="div-table-cell">{{ $team->teamName }}</div>
            <div class="div-table-cell">{{ count($team->players) -2 }}</div>
            <div class="div-table-cell">{{ count($team->tactics) }}</div>
            <div class="div-table-cell div-table-cell--buttons">
              <a href="#team-info-{{ $team->id }}" data-toggle="collapse" class="button"><i class="fas fa-info"></i></a>
              <a class="button button__info" href="/teams/{{ $team->FKteamID }}"><i class="fas fa-edit"></i></a>
              <form action="/teams/delete" method="post">
                @csrf
                <input type="hidden" name="teamID" value="{{ $team->id }}">
                <input type="hidden" name="teamname" value="{{ $team->teamName }}">
                <button type="submit" class="button button__delete"><i class="fas fa-trash-alt"></i></button>
              </form>
            </div>
          </div>
          <div id="team-info-{{ $team->id }}"class="overview-player-bio row collapse">
            <div class="col-12 col-md-4">
              <h6>{{ $team->teamName }}</h6>
              <p>{{ $team->teamDescription }}</p>
            </div>
            <div class="col-12 col-md-4">
              <h6>Tactieken</h6>
              @foreach($team->tactics as $tactic)
                <a href="/tactics/{{$tactic->id}}">{{ $tactic->tacticName }}</a>
              @endforeach
            </div>
            <div class="col-12 col-md-4">
              <h6>Spelers</h6>
              @foreach($team->players as $player)
                @if($player->position->id > 2)
                <p>{{ $player->firstName.' '.$player->lastName }}</p>
                <p>{{ $player->position->id }}</p>
                @endif
              @endforeach
            </div>
          </div>
          @endif
        @endforeach
      </div>
    </div>
  </div>
@endsection