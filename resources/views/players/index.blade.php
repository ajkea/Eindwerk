@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
      @isset($team->players)
        @foreach($team->players as $player)
        <div class="col-12 col-md-6">
          @php
            $playerJSON = $player->toJson();
          @endphp
            <playersbio player="{{ $playerJSON }}" position="{{ $player->position->positionName }}"></playersbio>
          <p></p>
        </div>
        @endforeach
      @endisset
      @empty($team->players)
        <p>Voeg enkele spelers toe aub.</p>
      @endempty
    </div>
  </div>
@endsection