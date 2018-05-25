@extends('layouts.app')
@section('content')
<div class="container">
  <ul>
   <li>{{ $player->firstName.' '.$player->lastName }}</li>
   <li>{{ $player->id }}</li>
  </ul>
</div>
@endsection