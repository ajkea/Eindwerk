@extends('layouts.app')
@section('content')
<div class="row">
  <div class="col-4">

    {{ $player->playerstat }}
    {{ $player->playerskill }}
    {{ $player->media }}
    {{ $player->position }}
    <playersbiocanvas v-bind:player="{{ $player }}">
    </playersbiocanvas>
    222
  </div>
</div>
@endsection