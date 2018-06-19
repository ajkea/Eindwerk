@extends('layouts.app')
@section('content')

<div id="teams" class="tab-pane row tab-content" role="tabpanel">
    <div class="col-12">
      <p>Hey {{ auth()->user()->firstName }}, welkom bij Managineer! Op deze pagina vind je een overzicht van al je ploegen die je beheert.</p>
      @if(session('succes'))
      <div class="notification notification__succes alert right" role="alert">{{ session('succes') }}
        <a class="close" data-dismiss="alert" aria-label="Close"><i class="fal fa-times"></i></a>
      </div>
      @endif
    </div>
    <a href="#team-form-add" data-toggle="collapse" class="button"><i class="fas fa-users"></i> Toevoegen</a>
    <div class="row">
      <h6>Ploegen:</h6>
    </div>
    <div id="teams" class="row" role="tabpanel">
      <div class="col-12">
        <form id="team-form-add" class="form form--crud collapse" action="/teams" method="post">
          @csrf
          <fieldset>
            <legend>Ploeg toevoegen</legend>
            <input type="text" name="teamName" id="teamName" placeholder="ploegnaam"> 
            <textarea  rows="2" type="text" name="teamDescription" id="teamDescription" placeholder="extra infomatie"></textarea>
            <button type="submit" class="button button--form" value="toevoegen"><i class="fal fa-users"></i> toevoegen</button>
          </fieldset>
        </form>
      </div>
    </div>
    <div id="players" class="tab-pane row tab-content" role="tabpanel">
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
            <div class="div-table-cell">{{ count($team->players) }}</div>
            <div class="div-table-cell">{{ count($team->tactics) }}</div>
            <div class="div-table-cell div-table-cell--buttons">
              <a class="button button__info" href="/teams/{{ $team->FKteamID }}"><i class="fas fa-info"></i></a>
              <form action="/teams/delete" method="post">
                @csrf
                <input type="hidden" name="teamID" value="{{ $team->id }}">
                <input type="hidden" name="teamname" value="{{ $team->teamName }}">
                <button type="submit" class="button button__delete"><i class="fas fa-trash-alt"></i></button>
              </form>
            </div>
          </div>
          @endif
        @endforeach
      </div>
    </div>
    </div>
  </div>
@endsection