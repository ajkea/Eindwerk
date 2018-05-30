@extends('layouts.app')
@section('content')
<div class="container">
  <col-4>
    <ul>
      <li>{{ $team->teamName }}</li>
      <p>Users:</p>
      @if($team->users)
        @foreach($team->users as $user)
          <li>{{ $user->username }}</li>
        @endforeach
      @endif
    </ul>
  </col-4>
  <col-4>
    <form action="/userteams/addUser" method="post">
      @csrf
      <input type="hidden" name="teamID" value="{{ $team->id }}">
      <p>User toevoegen aan team: {{ $team->teamName }}</p>
      <p>User die je wilt toevoegen:</p>
      <input type="text" name="username">
      <button type="submit">Toevoegen</button>
    </form>
  </col-4>
</div>
@endsection