@extends('layouts.app')
@section('content')
<div class="container">
  <ul>
  @foreach($teams as $team)
   <p>{{ $team->teamName }}</p>
  @endforeach
  </ul>
</div>
@endsection