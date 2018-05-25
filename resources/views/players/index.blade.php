@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
      @foreach($players as $player)
      <div class="col-12 col-md-3">
        <ul>
          <h6>{{ $player->firstName }}</h6>
          <li>{{ $player->lastName }}</li>
          <li>{{ $player->description }}</li>
          @if($player->media)
            <img src="{{ url('/images/upload/').'/'.$player->media->source }}" alt="{{ $player->media->alt }}">
          @endif
        </ul>
        <a href="/players/{{ $player->id }}/edit">Edit</a>
        <form action="{{ url('players', [$player->id]) }}" method="POST">
          @csrf
          <input type="hidden" name="_method" value="DELETE">
          <input type="submit" value="Delete">
        </form>
      </div>
      @endforeach
    </div>
  </div>
@endsection