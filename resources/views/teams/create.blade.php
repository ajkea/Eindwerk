@extends('layouts.app')
@section('content')
<div class="container">
  <form action="/teams" method="post">
    @csrf
    <div class="row">
      <label for="positionName">Teamnaam:</label>
      <input type="text" name="teamName" id="teamName">
    </div>
    <div class="row">
      <label for="positionDescription">Beschrijving team</label>
      <input type="text" name="teamDescription" id="teamDescription">
    </div>
    <button type="submit">Toevoegen</button>
  </form>
</div>
@endsection