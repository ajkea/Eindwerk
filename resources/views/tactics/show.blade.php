@extends('layouts.app')
@section('content')
  <script>
    var tactic = @json($tactic);
    var team = @json($team);
    var coordinates = @json($coordinates);
    var max = @json($max);
  </script>
  <script type="text/javascript" src="{{ asset('js/canvas.js') }}"></script>
  <div class="row">
    <div class="col-12">
      @if(session('succes'))
        <div class="notification notification__succes alert" role="alert">{{ session('succes') }}
          <a class="close" data-dismiss="alert" aria-label="Close"><i class="fal fa-times"></i></a>
        </div>
      @endif
      @if(session('error'))
        <div class="notification notification__error alert" role="alert">{{ session('error') }}
          <a class="close" data-dismiss="alert" aria-label="Close"><i class="fal fa-times"></i></a>
        </div>
      @endif
    </div>
    <div class="col-12 col-xl-7">
      <ol>
        <li>Voeg een speler toe aan de tactiek</li>
        <li>Selecteer een speler uit de lijst</li>
        <li>Versleep de speler naar een positie naar keuze</li>
        <li>Doe dit voor al je stappen</li>
      </ol>
      <p class="player-bio-stat--description">Verwijder een speler door erop te klikken met de rechtermuisknop</p>
      <fieldset>
        <legend>Tactiek menu</legend>
        <p class="player-bio-stat--description">Stap:</p>
        <input type="number" name="step" id="step" value="{{ ( !empty(old('step')) ? old('step') : '1') }}" onchange="updateStep()" min="1" max="{{$max+1}}" autofocus="true">
        <button onclick="runSteps('{{$max}}')">Afspelen</button>
        <form id="addCoordinates" action="/tactics/addCoordinates" method="post">
          @csrf
          <input type="hidden" name="tacticID" value="{{ $tactic->id }}">
          <select name="playerID" id="playerIDForm">
              <option disabled selected value>kies een speler</option>
            @foreach($tactic->players as $player)
              @if($loop->first)
                <option value="{{ $player->id }}">{{ $player->firstName }}</option>
              @elseif($loop->index == 1)
                @if(Auth::check() && Auth::user()->role !== "user")
                  <option value="{{ $player->id }}">{{ $player->firstName }}</option>)
                @else
                  <option disabled>PREMIUM - {{ $player->firstName }}</option>)
                @endif
              @else
                <option value="{{ $player->id }}">{{ $player->shirtNumber.' - '.$player->firstName.' '.$player->lastName }}</option>
              @endif
            @endforeach
          </select>
          <input type="hidden" name="x" id="xCoordinateAdd">
          <input type="hidden" name="y" id="yCoordinateAdd">
          <input type="hidden" name="step" id="formStepAdd">
        </form>
      </fieldset>
    </div>
      <div class="col-12 col-xl-7">
        <form id="removeCoordinates" action="{{ url('tactics/removeCoordinates')}}" method="post">
          @csrf
          <input type="hidden" name="tacticID" value="{{ $tactic->id }}">
          <input type="hidden" name="x" id="xCoordinateDelete">
          <input type="hidden" name="y" id="yCoordinateDelete">
          <input type="hidden" name="step" id="formStepDelete">
        </form>
        <canvas id="soccerfield" height="1056" width="550" oncontextmenu="return false"></canvas>
    </div>
    <div class="col-12 col-xl-4">
      <div class="div-table">
        <div class="div-table-row div-table-head">
          <div class="div-table-col"></div>
          <div class="div-table-col">Naam</div>
          <div class="div-table-col">Geboortedatum</div>
          <div class="div-table-col"># shirt</div>
          <div class="div-table-col"></div>
        </div>
        @foreach ($tactic->players as $player)
        @if($loop->index < 2)
        @else
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
            <div class="div-table-cell div-table-cell--buttons" ><a class="button button__info" href="/players/{{ $player->id }}"><i class="fas fa-info-circle"></i></a>
              <form action="/tactics/deletePlayer" method="post">
                @csrf
                <input type="hidden" name="playerID" value="{{ $player->id }}">
                <input type="hidden" name="tacticID" value="{{ $tactic->id }}">
                <button type="submit" class="button button__delete"><i class="fas fa-user-minus"></i></button>
              </form>
            </div>
          </div>
        @endif
        @endforeach
      </div>
      <form class="form form--crud" action="/tactics/addPlayer" method="post">
        @csrf
        <fieldset>
          <legend>Speler toevoegen</legend>
          <input type="hidden" name="tacticID" value="{{ $tactic->id }}">
          <p>Voeg een speler toe aan het speelveld.</p>
          <p>Speler die je wilt toevoegen:</p>
          <select name="playerID" id="playerID">
            @foreach($team->players as $player)
              @if($loop->index > 1)
              <option value="{{ $player->id }}">{{ $player->firstName.' '.$player->lastName }}</option>
              @endif
            @endforeach
          </select>
          <button type="submit">Toevoegen</button>
        </fieldset>
      </form>
    </div>
    <div class="row">
      <form id="editCoordinates" action="{{ url('tactics/editCoordinates')}}" method="post">
        @csrf
        <input type="hidden" name="tacticID" value="{{ $tactic->id }}">
        <input type="hidden" name="xStart" id="xCoordinateEditStart">
        <input type="hidden" name="yStart" id="yCoordinateEditStart">
        <input type="hidden" name="xEnd" id="xCoordinateEditEnd">
        <input type="hidden" name="yEnd" id="yCoordinateEditEnd">
        <input type="hidden" name="step" id="formStepEdit">
    </form>
    </div>
  </div>
</div>
@endsection