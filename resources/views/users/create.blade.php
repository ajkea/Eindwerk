@extends('layouts.app')
@section('content')
<div class="container">
  <form action="/players" enctype="multipart/form-data" method="post" files="true">
    @csrf
    <div class="row">
      <label for="firstName">Voornaam:</label>
      <input type="text" name="firstName" id="firstName" class="{{ $errors->has('firstName') ? ' error' : '' }}" required value="{{ old('firstName') }}">
    </div>
    <div class="row">
      <label for="lastName">Achternaam:</label>
      <input type="text" name="lastName" id="lastName" class="{{ $errors->has('lastName') ? ' error' : '' }}" required value="{{ old('lastName') }}">
    </div>
    <div class="row">
      <label for="birthDate">Geboortedatum:</label>
      @if($errors->has('birthDate'))
        <p>De toegevoegde speler moet ouder dan 12 jaar zijn.</p>
      @endif
      <input type="date" name="birthDate" id="birthDate" class="{{ $errors->has('birthDate') ? ' error' : '' }}" required value="{{ old('birthDate') }}">
    </div>
    <div class="row">
      <label for="FKpositionID">Positie:</label>
      <select name="FKpositionID" id="FKpositionID" required>
        @foreach($positions as $position)
          <option value="{{ $position->id }}">{{ $position->positionName }}</option>
        @endforeach
      </select>
    </div>
    <div class="row">
      <label for="description">Beschrijving</label>
      <input type="text" name="description" id="description" value="{{ old('description') }}">
    </div>
    <div class="row">
      <label for="FKmediaID">Foto:</label>
      <input type="file" name="media" id="media">
    </div>
    <button type="submit">Toevoegen</button>
  </form>
</div>
@endsection