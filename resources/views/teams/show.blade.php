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
    <form action="/userteams/addUser" method="post" style="border: 1px solid black">
      @if (session('error'))
        <div class="error">
          <p>{{ session('error') }}</p>
        </div>
      @endif
      @if (session('succes'))
        <div class="succes">
          <p>{{ session('succes') }}</p>
        </div>
      @endif
      @csrf
      <input type="hidden" name="teamID" value="{{ $team->id }}">
      <p>User toevoegen aan team: {{ $team->teamName }}</p>
      <p>User die je wilt toevoegen:</p>
      <input type="text" name="username">
      <button type="submit">Toevoegen</button>
    </form>

    <form action="/tactics/addToTeam" method="post" style="border: 1px solid black">
      @if (session('succes'))
        <div class="succes">
          <p>{{ session('succes') }}</p>
        </div>
      @endif
      @csrf
      <input type="hidden" name="FKteamID" value="{{ $team->id }}">
      <p>Tactiek toevoegen aan team: {{ $team->teamName }}</p>
      <p>Tactiek naam:</p>
      <input type="text" name="name">
      <p>Tactiek beschrijving:</p>
      <input type="text" name="description">
      <select name="type" id="type">
        <option value="free kick">Vrije trap</option>
        <option value="corner">Corner</option>
        <option value="penalty">Penalty</option>
      </select>
      <button type="submit">Toevoegen</button>
    </form>
  </col-4>
</div>
@endsection