@extends('layouts.app')
@section('content')
  <h4>Tactieken</h4>
  <div class="col-4">
    @foreach($tactics as $tactic)
      <h6>{{ $tactic->tacticName }}</h6>
      <p>{{ $tactic->tacticDescription }}</p>
      <h6>players:</h6>
      @foreach($tactic->players as $player)
        <p>{{ $player->firstName.' '.$player->lastName }}</p>
        <h5>Coördinaten:</h5>
        <h6>Werkt niet!!!! (niet nodig)</h6>
        {{-- @foreach($player->coordinates as $coordinate)
          <p>{{ $coordinate->xCoordinate.' '.$coordinate->yCoordinate }}</p>
        @endforeach --}}
      @endforeach
    @endforeach
  </div>
@endsection