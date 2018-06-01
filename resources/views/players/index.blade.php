@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
      @foreach($players as $player)
      <div class="col-12 col-md-6">
        @php
          $playerJSON = $player->toJson();
        @endphp
          <playersbio player="{{ $playerJSON }}" position="{{ $player->position->positionName }}" ></playersbio>
        <p></p>
      </div>
      @endforeach
    </div>
  </div>
@endsection