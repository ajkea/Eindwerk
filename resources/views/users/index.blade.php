@extends('layouts.app')
@section('content')
  <div class="container">
    <div class="row">
      @foreach($users as $user)
      <div class="col-12">
          <h6>{{ $user->username }}</h6>
          {{ $user->email }}
          @if($user->media)
          <div style="max-width:100px;">
            <img src="{{ url('/images/upload/').'/'.$user->media->source }}" alt="{{ $user->media->alt }}">
          </div>
          @endif


          @if($user->teams)
          <h6>Teams:</h6>
            @foreach($user->teams as $team)
              @if($team->teamName !== $user->username)
              <li>{{ $team->teamName }}</li>
              @endif
            @endforeach
          @endif
        <a href="/users/{{ $user->id }}/edit">Edit</a>
        <form action="{{ url('users', [$user->id]) }}" method="POST">
          @csrf
          <input type="hidden" name="_method" value="DELETE">
          <input type="submit" value="Delete">
        </form>
      </div>
      @endforeach
    </div>
  </div>
@endsection