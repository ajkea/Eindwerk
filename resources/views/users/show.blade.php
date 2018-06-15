@extends('layouts.app')
@section('content')
<div class="container">
  <ul>
    <li>{{ $user->firstName }}</li>
    @if($user->teams)
      @foreach($user->teams as $team)
      <li>{{ $team->teamName }}</li>
      @endforeach
    @endif
    @if($user->media)
    <div style="max-width: 200px;">
      <img src="{{ url('/images/upload/').'/'.$user->media->source }}" alt="{{ $user->media->alt }}">
    </div>
    @endif
  </ul>
</div>
@endsection