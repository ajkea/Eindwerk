@extends('layouts.app')
@section('content')
<div class="container">
  <ul>
    <li>{{ $player->firstName.' '.$player->lastName }}</li>
    <li>{{ $player->id }}</li>
    @if($player->media)
    <div style="max-width: 200px;">
      <img src="{{ url('/images/upload/').'/'.$player->media->source }}" alt="{{ $player->media->alt }}">
    </div>
    @endif
  </ul>
</div>
@endsection