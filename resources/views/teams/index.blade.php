@extends('layouts.app')
@section('content')
<div class="container">
  <ul>
  @foreach($teams as $team)
    <li>{{ $team->teamName }}</li>
    @if($team->players)
    @endif
  @endforeach
  </ul>
</div>
@endsection