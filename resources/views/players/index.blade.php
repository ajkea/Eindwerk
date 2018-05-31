@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
      @foreach($players as $player)
      <div class="col-12 col-md-6">
        <playername player="json"></playername>
      </div>
      @endforeach
    </div>
  </div>
@endsection