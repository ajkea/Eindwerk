@extends('layouts.app')
@section('content')
<div class="row">
  <h1>Overview</h1>
  <p>Hey {{ auth()->user()->userName }}, welkom bij Managineer! Op deze pagina vind je een overzicht van al je ploegen en spelers die je beheert.</p>
  <div class="col-12">
    <h6>Ploegen:</h6>
    <table class="table">
      <thead class="table-header">
        <th>#</th>
        <th>Ploegnaam</th>
        <th>Beschrijving</th>
        <th># spelers</th>
        <th># tactieken</th>
        <th></th>
      </thead>
      <tbody>
      @foreach($teams as $team)
        <tr class="table-content">
          <td>{{ $loop->index+1 }}</td>
          <td><input type="text" value="{{ $team->teamName }}"></td>
          <td>{{ str_limit($team->teamDescription, 20, '...') }}</td>
          <td>aantal</td>
          <td>aantal</td>
          <td><a class="button button__delete" href="">Delete</a></td>
        </tr>
      @endforeach
      </tbody>
      <tfoot>
        <th>#</th>
        <th>Ploegnaam</th>
        <th>Beschrijving</th>
        <th># spelers</th>
        <th># tactieken</th>
        <th></th>
        <th></th>
      </tfoot>
    </table>
  </div>
</div>
@endsection