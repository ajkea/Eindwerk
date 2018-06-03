@extends('layouts.app')
@section('content')
  <h6>Tactiek: {{ $tactic->tacticName }}</h6>
  <p>{{ $tactic->tacticDescription }}</p>
  @if($tactic->players)
    @foreach($tactic->players as $player)
      <li>{{ $player->firstName.' '.$player->lastName }}</li>
        <h6>Coordinates:</h6>
        @foreach($player->coordinates as $coordinate)
          <p>{{ $coordinate->xCoordinate. ' '.$coordinate->yCoordinate }}</p>
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
      @foreach($team->players as $play)
        <option value="{{ $play->id }}">{{ $play->firstName.' '.$play->lastName }}</option>
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
      @foreach($tactic->players as $playe)
        <option value="{{ $playe->id }}">{{ $playe->firstName.' '.$playe->lastName }}</option>
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