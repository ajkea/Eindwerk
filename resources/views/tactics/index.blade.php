@extends('layouts.app')
@section('content')
  <h1>Tactieken</h1>
  <div class="col-4">
    @foreach($tactics as $tactic)
      <h6>{{ $tactic->tacticName }}</h6>
      <p>{{ $tactic->tacticDescription }}</p>
      <h6>players:</h6>
      @foreach($tactic->players as $player)
        <p>{{ $player->firstName.' '.$player->lastName }}</p>
        <h6>Coördinaten:</h6>
        @foreach($player->coordinates as $coordinate)
          <p>{{ $coordinate->id }}</p>
        @endforeach
      @endforeach
    @endforeach
  </div>
@endsection