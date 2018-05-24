@extends('layouts.app')
@section('content')
<div class="container">
  @foreach($positions as $position)
    <h6>{{ $position->positionName }}</h6>
    <p>{{ $position->positionDescription }}</p>
  @endforeach
</div>
@endsection