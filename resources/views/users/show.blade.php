@extends('layouts.app')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-12 col-4-md">
      <form class="form form--crud" action="users/edit">
        <fieldset>
          <legend>Profiel bijwerken</legend>

          <p class="player-bio-stat--description">Voornaam:</p>
          <input type="text" name="firstName" id="firstName" placeholder="Voornaam" value="$user->firstName">
          <p class="player-bio-stat--description">Achternaam:</p>
          <input type="text" name="lastName" id="lastName" placeholder="Achternaam" value="$user->lastName">
        </fieldset>
      </form>
    </div>
  </div>
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