@extends('layouts.app')
@section('content')
<div class="container">
  <playersbio player="{{ $playerJson }}"></playersbio>
  <ul>
  </ul>
</div>
@endsection