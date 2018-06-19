@extends('layouts.app')
@section('content')
<div class="row">
  @if(session('succes'))
  <div class="notification notification__succes alert right" role="alert">{{ session('succes') }}
    <a class="close" data-dismiss="alert" aria-label="Close"><i class="fal fa-times"></i></a>
  </div>
  @endif
  <form id="players-form-edit" class="form form--crud" action="/players/edit" enctype="multipart/form-data" method="post" files="true">
    @csrf
    <input type="hidden" name="playerID" value="{{ $player->id }}">
    <fieldset>
      <legend> Speler bijwerken</legend>
      <div class="row">
        <div class="col-12 col-md player-bio--main">
          <div class="form--crud-section">
              @if($player->media)
                <img class="player-bio-image" src="{{ url('/images/upload/').'/'.$player->media->source }}" alt="{{ $player->media->alt }}">
                <a class="button button__delete player-bio-image--button" href={{ url('/players/').'/'.$player->media->id.'/deleteImage' }}>verwijder Foto</a>
              @else
                <label for="media" class="center">
                  <input type="file" name="media" id="media" hidden>
                  <div class="button"><i class="fal fa-camera-retro"></i> Foto</div>
                </label>
              @endif  
            <p class="player-bio-stat--description player-bio-stat__first">Voornaam:</p>
            <input type="text" name="firstName" id="playerFirstName" placeholder="Voornaam" value="{{ $player->firstName }}"> 
            <p class="player-bio-stat--description">Achternaam:</p>
            <input type="text" name="lastName" id="playerLastName" placeholder="Achternaam" value="{{ $player->lastName }}"> 
            <p class="player-bio-stat--description">Positie:</p>
            <select name="FKpositionID" id="FKpositionID" required>
              @foreach($positions as $position)
                @if($loop->index < 2)
                @elseif(($loop->index+1) == $player->position->id)
                <option selected value="{{ $position->id }}">{{ $position->positionName }}</option>
                @else
                <option value="{{ $position->id }}">{{ $position->positionName }}</option>
                @endif
              @endforeach
            </select>
            <p class="player-bio-stat--description">Geboortedatum:</p>
            <input type="date" name="birthDate" id="birthDate" value="{{ $player->birthDate }}">
            <p class="player-bio-stat--description">Extra informatie:</p>
            <textarea rows="2" name="description" id="playerDescription" placeholder="korte beschrijving">{{ $player->description }}</textarea>
            <p class="player-bio-stat--description">Shirtnummer:</p>
            <input type="number" name="shirtNumber" id="shirtNumber" min='1' max="99" placeholder="shirtnummer" value="{{ $player->shirtNumber }}">
          </div>
        </div>
        <div class="col-12 col-md">
          @if(auth()->user()->role == 'user')
          <div class="box-premium center">
            <p>Wordt premium om gebruik te maken van deze extra functies</p>
            <a class="button" href="{{ url('/#pricing') }}">Go premium</a>
          </div>
          @endif
          <div class="player-bio--stats {{ auth()->user()->role == 'user' ? 'no-premium' : '' }}">
            <p class="player-bio-stat--description">Gespeelde matchen:</p>
            <input type="number" name="played" id="played" min="0" placeholder="Matchen gespeeld" value="{{ $player->playerstat->playedGames }}">
            <p class="player-bio-stat--description">Goals:</p>
            <input type="number" name="goals" id="goals" min="0" placeholder="Goals" value="{{ $player->playerstat->goals }}">
            <p class="player-bio-stat--description">Assists:</p>
            <input type="number" name="assists" id="assists" min="0" placeholder="Assists" value="{{ $player->playerstat->assists }}">
            <p class="player-bio-stat--description">Gele kaarten:</p>
            <input type="number" name="yellow" id="yellow" min="0" placeholder="Gele kaarten" value="{{ $player->playerstat->yellowCards }}">
            <p class="player-bio-stat--description">Rode kaarten:</p>
            <input type="number" name="red" id="red" min="0" placeholder="Rode kaarten" value="{{ $player->playerstat->redCards }}">
          </div>
        </div>
        <div class="col-12 col-md player-bio--skills {{ auth()->user()->role == 'user' ? 'no-premium' : '' }}">
          <div class="form--crud-section">
            <div class="input-range">
              <label for="shooting">
                <p class="player-bio-stat--description">Schot: <output name="shootingOutput" id="shootingOut">{{ $player->playerskill->shooting }}</output>/ 10</p>
                <input {{ auth()->user()->role == 'user' ? 'disabled' : '' }} type="range" name="shooting" id="shooting" min="0" max="10" value="{{ $player->playerskill->shooting }}" oninput="shootingOut.value = shooting.value">
              </label>
              <output for="shooting" class="output"></output>
            </div>
            <div class="input-range">
              <label for="defending">
                <p class="player-bio-stat--description">Verdedigen: <output name="defendingOutput" id="defendingOut">{{ $player->playerskill->defending }}</output> / 10</p>
                <input {{ auth()->user()->role == 'user' ? 'disabled' : '' }} type="range" name="defending" id="defending" min="0" max="10" value="{{ $player->playerskill->defending }}" oninput="defendingOut.value = defending.value">
              </label>
              <output for="defending" class="output"></output>
            </div>
            <div class="input-range">
              <label for="speed">
                <p class="player-bio-stat--description">Snelheid: <output name="speedOutput" id="speedOut">{{ $player->playerskill->speed }}</output> km/u</p>
                <input {{ auth()->user()->role == 'user' ? 'disabled' : '' }} type="range" name="speed" id="speed" min="0" max="40" value="{{ $player->playerskill->speed }}" oninput="speedOut.value = speed.value">
              </label>
              <output for="speed" class="output"></output>
            </div>
            <div class="input-range">
              <label for="stamina">
                  <p class="player-bio-stat--description">Conditie: <output name="staminaOutput" id="staminaOut">{{ $player->playerskill->stamina }}</output> / 10</p>
                <input {{ auth()->user()->role == 'user' ? 'disabled' : '' }} type="range" name="stamina" id="stamina" min="0" max="10" value="{{ $player->playerskill->stamina }}" oninput="staminaOut.value = stamina.value">
              </label>
              <output for="stamina" class="output"></output>
            </div>
            <div class="input-range">
              <label for="dribbling">
                <p class="player-bio-stat--description">Dribbelen: <output name="dribblingOutput" id="dribblingOut">{{ $player->playerskill->dribbling }}</output> / 10</p>
                <input {{ auth()->user()->role == 'user' ? 'disabled' : '' }} type="range" name="dribbling" id="dribbling" min="0" max="10" value="{{ $player->playerskill->dribbling }}" oninput="dribblingOut.value = dribbling.value">
              </label>
            </div>
            <div class="input-range">
              <label for="height">
                <p class="player-bio-stat--description">Lengte in cm:</p>
                <input type="number" name="height" id="height" min="120" max="220" placeholder="Lengte (cm)" value="{{ $player->playerskill->height }}">
              </label>
              <output for="height" class="output"></output>
            </div>
            <div class="input-range">
              <label for="weight">
                  <p class="player-bio-stat--description">Gewicht in kg:</p>
                <input type="number" name="weight" id="weight" min="40" max="120" placeholder="Gewicht (kg)" value="{{ $player->playerskill->weight }}">
              </label>
            </div>
            <p class="player-bio-stat--description">Beste voet:</p>
            <select name="preferredFoot" id="preferredFoot">
              <option value="{{ $player->playerskill->preferredFoot }}">{{ $player->playerskill->preferredFoot }}</option>
              <option value="Links">Links</option>
              <option value="Rechts">Rechts</option>
              <option value="Beide">Beide</option>
            </select>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12 col-md-4">
          <button class="button button--form button__wide" type="submit" value="submit"><i class="fal fa-user"></i> Bijwerken</button
        </div>
      </div>
    </fieldset>
  </form>
  <div class="hidden">
  {{ $player->playerstat }}
  {{ $player->playerskill }}
  {{ $player->media }}
  {{ $player->position }}
  <playersbiocanvas v-bind:player="{{ $player }}"></playersbiocanvas>
  </div>
</div>
@endsection