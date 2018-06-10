@extends('layouts.app')
@section('content')
<div class="row">      
  <h1>Overview</h1>
  <p>Hey {{ auth()->user()->userName }}, welkom bij Managineer! Op deze pagina vind je een overzicht van al je ploegen en spelers die je beheert.</p>
  <div class="col-12">
    <h6>Spelers</h6>
    @if (session('succes'))
      <div class="notification notification__delete">
        <p>{{ session('succes') }}</p>
      </div>
    @endif
    <table class="table">
      <thead class="table-header">
        <th></th>
        <th colspan="2">Naam</th>
        <th>Positie</th>
        <th>Geboortedatum</th>
        <th>Beschrijving</th>
        <th></th>
      </thead>
      <tbody>
        @isset($players)
        @foreach ($players as $player)
          <tr class="table-content">
            @isset ($player->media)
              <td><img class="img-profile--avatar" src="{{ url('images/upload/'.$player->media->source)}}" alt="zet source"></td>
            @endisset
            @empty ($player->media)
              <td><i class="fas fa-user-circle fa-3x img-profile--avatar"></i></td>
            @endempty
            <td>{{ $player->firstName.' '.$player->lastName }}</td>
            <td>
              @isset ($player->position)
                {{ $player->position->positionName }}
              @endisset
            </td>
            <td>{{ $player->birthDate }}</td>
            <td>{{ $player->description }}</td>
          </tr>
        @endforeach
        @endisset
      </tbody>
      <tfoot>
        <tr>
          <th>

          </th>
          <th colspan="2">Naam</th>
          <th>Positie</th>
          <th>Geboortedatum</th>
          <th>Beschrijving</th>
          <th></th>
        </tr>
      </tfoot>
      </table>
      <form action="/players" method="post">
      <table>
      <tbody>
          <tr>
              @csrf
              <td></td>
              <td>
                <input type="text" name="firstName" id="playerFirstName"> 
              </td>
              <td>
                <input type="text" name="lastName" id="playerLastName"> 
              </td>
              <td>
                  <select name="FKpositionID" id="FKpositionID" required>
                    @foreach($positions as $position)
                      <option value="{{ $position->id }}">{{ $position->positionName }}</option>
                    @endforeach
                  </select></td>
              <td><input type="date" name="birthDate" id="birthDate"></td>
              <td><input type="text" name="description" id="playerDescription"></td>
              <td>
                <input class="button" type="submit" value="submit">
              </td>
          </tr>
      </tbody>
    </table>
    </form>

  </div>
  <div class="col-12">
    <h6>Ploegen:</h6>
    @if (session('succes'))
      <div class="notification notification__delete">
        <p>{{ session('succes') }}</p>
      </div>
    @endif
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
          <td>
            <form action="/teams/delete" method="post">
              @csrf
              <input type="hidden" name="teamID" value="{{ $team->id }}">
              <input type="hidden" name="teamname" value="{{ $team->teamName }}">
              <input type="submit" class="button button__delete" value="Delete">
            </form>
        </tr>
      @endforeach
      </tbody>
      <tfoot>
        <tr>
          <th>#</th>
          <th>Ploegnaam</th>
          <th>Beschrijving</th>
          <th># spelers</th>
          <th># tactieken</th>
          <th></th>
          <th></th>
        </tr>
      </tfoot>
      <tbody>
        <form action="/teams" method="post">
        @csrf
        <tr>
          <td></td>
          <td>
            <input type="text" name="teamName" id="teamName"> 
          </td>
          <td>
            <input type="text" name="teamDescription" id="teamDescription"> 
          </td>
          <td></td>
          <td></td>
          <td>
            <input type="submit" class="button" value="toevoegen"></td>
        </tr>
        </form>
      </tbody>
    </table>
  </div>
</div>
@endsection