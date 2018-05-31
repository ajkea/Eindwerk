@extends('layouts.app')
@section('content')
<div class="container">
  <playername :player="{{ $playerJson }}"></playername>
  <ul>
  </ul>
</div>
@endsection