@extends('layouts.app')
@section('content')
<div class="container">
  <form action="{{ url('players') }}" method="post" enctype="multipart/form-data" files="true">
    @csrf
    <div class="row">
      <label for="firstName">Voornaam:</label>
      <input type="text" name="firstName" id="firstName" value="{{ $player->firstName }}" class="{{ $errors->has('firstName') ? ' error' : '' }}" required>
    </div>
    <div class="row">
      <label for="lastName">Achternaam:</label>
      <input type="text" name="lastName" id="lastName" value="{{ $player->lastName }}" class="{{ $errors->has('lastName') ? ' error' : '' }}" required>
    </div>
    <div class="row">
      <label for="birthDate">Geboortedatum:</label>
      <input type="date" name="birthDate" id="birthDate" value="{{ $player->birthDate }}" class="{{ $errors->has('birthDate') ? ' error' : '' }}" required>
    </div>
    <div class="row">
      <label for="FKpositionID">Positie:</label>
      <select name="FKpositionID" id="FKpositionID" required>
        @foreach($positions as $position)
            <option value="{{ $position->id }}" {{ $position->id == $player->FKpositionID ? 'selected' : '' }}>{{ $position->positionName }}</option>
            <option value="{{ $position->id }}">{{ $position->positionName }}</option>
        @endforeach
      </select>
    </div>
    <div class="row">
      <label for="description">Beschrijving</label>
      <input type="text" name="description" id="description" value="{{ $player->description }}">
    </div>
    <div class="row">
      <label for="FKmediaID">Foto:</label>
      @if($player->media)
        <img src="{{ url('/images/upload/').'/'.$player->media->source }}" alt="{{ $player->media->alt }}">
        <a href={{ url('/players/').'/'.$player->media->id.'/deleteImage' }}>Verwijder afbeelding</a>
      @else
        <input type="file" name="media" id="media">
      @endif
    </div>
    <button type="submit">Toevoegen</button>
  </form>
</div>
@endsection