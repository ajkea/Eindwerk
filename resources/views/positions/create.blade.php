@extends('layouts.app')
@section('content')
<div class="container">
  <form action="/positions" method="post">
    @csrf
    <div class="row">
      <label for="positionName">Naam positie:</label>
      <input type="text" name="positionName" id="positionName">
    </div>
    <div class="row">
      <label for="positionDescription">Beschrijving positie</label>
      <input type="text" name="positionDescription" id="positionDescription">
    </div>
    <button type="submit">Toevoegen</button>
  </form>
</div>
@endsection