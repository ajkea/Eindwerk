@extends('layouts.app')
@section('content')
<div class="row">      
  <h1>Overzicht</h1>
  <p>Hey {{ auth()->user()->username }}, welkom bij Managineer! Op deze pagina vind je een overzicht van al je ploegen en spelers die je beheert.</p>
  <div class="col-12">
    <h6>Spelers</h6>
    @if (session('succesPlayer'))
      <div class="notification notification__delete">
        <p>{{ session('succesPlayer') }}</p>
      </div>
    @endif
    <table class="table">
      <thead class="table-header">
        <th></th>
        <th colspan="2">Naam</th>
        <th>Positie</th>
        <th>Geboortedatum</th>
        <th>Beschrijving</th>
        <th>Nummer</th>
        <th></th>
      </thead>
      <tbody>
        @isset($players)
        @foreach ($players as $player)
          <tr class="table-content">
              @isset ($player->media)
                <td class="table-image--avatar"><img class="img-profile--avatar" src="{{ url('images/upload/'.$player->media->source)}}" alt="{{ $player->media->alt }}"></td>
              @endisset
              @empty ($player->media)
                <td class="table-image--avatar"><i class="fas fa-user-circle fa-3x img-profile--avatar"></i></td>
              @endempty
            <td colspan="2">{{ $player->firstName.' '.$player->lastName }}</td>
            <td>
              @isset ($player->position->positionName)
                {{ $player->position->positionName }}
              @endisset
              @empty( $player->position)
                onbekend
              @endempty
            </td>
            <td>{{ date('d-m-Y', strtotime($player->birthDate)) }}</td>
            <td>{{ $player->description }}</td>
            <td>{{ $player->shirtNumber }}</td>
            <td>
                <form action="/players/delete" method="post">
                  @csrf
                  <input type="hidden" name="playerID" value="{{ $player->id }}">
                  <input type="hidden" name="firstName" value="{{ $player->firstName }}">
                  <input type="hidden" name="lastName" value="{{ $player->lastName }}">
                  {{-- <input type="hidden" name="FKmediaID" value="{{ $player->media->id }}"> --}}
                  <input type="submit" class="button button__delete" value="Delete">
                </form>
            </td>
          </tr>
        @endforeach
        @endisset
      </tbody>
      </table>
      <form action="/players" enctype="multipart/form-data" method="post" files="true">
      <table>
        <thead class="table-form">
          <tr>
            <th></th>
            <th colspan="2">Naam</th>
            <th>Positie</th>
            <th>Geboortedatum</th>
            <th>Beschrijving</th>
            <th>Nummer</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <tr>
              @csrf
              <td class="table-image--avatar">
                <input type="file" name="media" id="media" hidden>
                <label for="media">
                  <i class="fal fa-cloud-upload fa-2x"></i>
                </label>
              </td>
              <td>
                <input type="text" name="firstName" id="playerFirstName" placeholder="voornaam"> 
              </td><td>
                <input type="text" name="lastName" id="playerLastName" placeholder="achternaam"> 
              </td>
              <td>
                <select name="FKpositionID" id="FKpositionID" required>
                  @foreach($positions as $position)
                    <option value="{{ $position->id }}">{{ $position->positionName }}</option>
                  @endforeach
                </select>
              </td>
              <td><input type="date" name="birthDate" id="birthDate" value="2000-01-01"></td>
              <td><input type="text" name="description" id="playerDescription"></td>
              <td><input type="number" name="shirtNumber" id="shirtNumber" min='1' max="99"></td>
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
    @if (session('succesTeam'))
      <div class="notification notification__delete">
        <p>{{ session('succesTeam') }}</p>
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
        @if( $loop->index === 0)
        @else
        <tr class="table-content">
          <td>{{ $loop->index }}</td>
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
          </td>
        </tr>
        @endif
      @endforeach
      </tbody>
    </table>
      <form action="/teams" method="post">
      @csrf
    <table>
      <thead class="table-form">
        <tr>
          <th>#</th>
          <th>Ploegnaam</th>
          <th>Beschrijving</th>
          <th># spelers</th>
          <th># tactieken</th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
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