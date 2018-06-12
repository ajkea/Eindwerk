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
      <input type="number" name="step" id="step" value="{{ ( !empty(old('step')) ? (old('step') + 1) : '1') }}" onchange="updateStep()" min="1" max="{{$max+1}}" autofocus="true">
      <button onclick="runSteps('{{$max}}')">Play!</button>
      <button onclick="resetSteps()">Reset steps</button>
      <form id="addCoordinates" action="/tactics/addCoordinates" method="post">
        @if (session('error'))
          <div class="error">
            <p>{{ session('error') }}</p>
          </div>
        @endif
        @if (session('succes'))
          <div class="succes">
            <p>{{ session('succes') }}</p>
          </div>
        @endif
        @csrf
        <input type="hidden" name="tacticID" value="{{ $tactic->id }}">
        <select name="playerID" id="playerIDForm">
          @foreach($tactic->players as $player)
            <option {{ old('playerID') == $player->id ? "selected" : "" }} value="{{ $player->id }}">{{ $player->firstName.' '.$player->lastName }}</option>
          @endforeach
        </select>
        <input type="hidden" name="x" id="xCoordinateAdd">
        <input type="hidden" name="y" id="yCoordinateAdd">
        <input type="hidden" name="step" id="formStepAdd">
      </form>
    </div>
      <div class="col-12 col-xl-7">
      <form id="removeCoordinates" action="{{ url('tactics/removeCoordinates')}}" method="post">
        @csrf
        <input type="hidden" name="tacticID" value="{{ $tactic->id }}">
        <input type="hidden" name="x" id="xCoordinateDelete">
        <input type="hidden" name="y" id="yCoordinateDelete">
        <input type="hidden" name="step" id="formStepDelete">
      </form>
      <canvas id="soccerfield" height="820" width="544" oncontextmenu="return false"></canvas>
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
        @if($loop->index === 2)
      </div>
          <div class="playerbio--card">
            <fieldset disabled="disabled">
              <legend>{{ $player->firstName.' '.$player->lastName }}</legend>
              <div class="row">
                <div class="col-3">
                  <img class="img-profile--avatar"src="{{ url('images/upload/'.$player->media->source)}}" alt="{{ url('images/upload/'.$player->media->alt)}}" srcset="">              
                </div>
                <div class="col-9">
                  <h6 class="playerbio-header--position">{{ $player->position->positionName }}</h6>
                </div>

                <p>{{ $player->description }}</p>
              </div>
            </fieldset>
          </div>
        <div class="div-table">
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
      </div>
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
    <form action="/tactics/addPlayer" method="post" style="border: 1px solid black">
      @csrf
      <input type="hidden" name="tacticID" value="{{ $tactic->id }}">
      <p>Speler toevoegen aan tactiek: {{ $tactic->tacticName }}</p>
      <p>Speler die je wilt toevoegen:</p>
      <select name="playerID" id="playerID">
        @foreach($team->players as $player)
          <option value="{{ $player->id }}">{{ $player->firstName.' '.$player->lastName }}</option>
        @endforeach
      </select>
      <button type="submit">Toevoegen</button>
    </form>
    </div>
  </div>
</div>
@endsection