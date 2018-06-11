@extends('layouts.app')
@section('content')
<div class="container">
  {{ $player->firstName}}.{{ $player->lastName }}
  {{-- <playersbio player="{{ $playerJson }}"></playersbio> --}}
  <ul>
  </ul>
</div>
@endsection