@extends('layouts.app')
@section('content')
<div class="container">
  <ul>
    <li>{{ $player->firstName.' '.$player->lastName }}</li>
    <li>{{ $player->id }}</li>
    @if($player->media)
      <img src="{{ url('/images/upload/').'/'.$player->media->source }}" alt="{{ $player->media->alt }}">
    @endif
  </ul>
</div>
@endsection