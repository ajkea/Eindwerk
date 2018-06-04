@extends('layouts.app')
@section('content')
  <div class="row">
    <div class="col-6">
      <input type="number" name="step" id="step" value=1 onchange="updateStep(this.value)" min="1" max="{{$max}}">
      <canvas id="soccerfield" height="105" width="68" style="background: blue; width:100%;"></canvas>
    </div>
    <div class="col-6">
      {{$max}}
        {{ $coordinates[0] }}
    </div>
  </div>

  <script>
    var canvas = document.getElementById("soccerfield");
    var ctx = canvas.getContext("2d");
    var step = 1;
    var color = ["#000000","#222222","#444444","#666666","#888888","#AAAAAA",]
    
    
    @foreach($coordinates as $coordinate)
      if({{$coordinate->step}} == 1){
        ctx.beginPath();
        ctx.arc({{$coordinate->xCoordinate}}, {{$coordinate->yCoordinate}}, 2, 0, 2 * Math.PI);
        ctx.fillStyle = "#000000";
        ctx.fill();
      }
    @endforeach

    function updateStep(step) {
      canvas.width = canvas.width;
      @foreach($coordinates as $coordinate)
      if({{$coordinate->step}} == step){
        ctx.beginPath();
        ctx.arc({{$coordinate->xCoordinate}}, {{$coordinate->yCoordinate}}, 2, 0, 2 * Math.PI);
        ctx.fillStyle = "#000000";
        ctx.fill();
      }
      else if({{$coordinate->step}} == (step -1)){
        ctx.beginPath();
        ctx.arc({{$coordinate->xCoordinate}}, {{$coordinate->yCoordinate}}, 2, 0, 2 * Math.PI);
        ctx.fillStyle = "#444444";
        ctx.fill();
      }
      @endforeach
    }
  </script>




  <h6>Tactiek: {{ $tactic->tacticName }}</h6>
  <p>{{ $tactic->tacticDescription }}</p>
  @if($tactic->players)
    @foreach($tactic->players as $player)
      <li>{{ $player->firstName.' '.$player->lastName }}</li>
        <h6>Coordinates:</h6>
        @foreach($tactic->playersInTactic as $playerIT)
          @if($playerIT->FKplayerID == $player->id)
            @foreach($playerIT->coordinates as $coordinate)
              <p>{{ $coordinate->xCoordinate.' '.$coordinate->yCoordinate }}</p>
            @endforeach
          @endif
        @endforeach
    @endforeach
  @endif

  <form action="/tactics/addPlayer" method="post" style="border: 1px solid black">
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
    <p>Speler toevoegen aan tactiek: {{ $tactic->tacticName }}</p>
    <p>Speler die je wilt toevoegen:</p>
    <select name="playerID" id="playerID">
      @foreach($team->players as $player)
        <option value="{{ $player->id }}">{{ $player->firstName.' '.$player->lastName }}</option>
      @endforeach
    </select>
    <button type="submit">Toevoegen</button>
  </form>
  <form action="/tactics/addCoordinates" method="post" style="border: 1px solid black">
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
    <p>Coördinaten toevoegen aan tactiek: {{ $tactic->tacticName }}</p>
    <p>Speler die je een coördinaat wil geven:</p>
    <select name="playerID" id="playerID">
      @foreach($tactic->players as $player)
        <option value="{{ $player->id }}">{{ $player->firstName.' '.$player->lastName }}</option>
      @endforeach
    </select>
    <p>x coördinaat</p>
    <input type="number" name="x" id="x">
    <p>y coördinaat</p>
    <input type="number" name="y" id="x">
    <p>step</p>
    <input type="number" name="step" id="step">
    <button type="submit">Toevoegen</button>
  </form>
@endsection