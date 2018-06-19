@extends('layouts.app')
@section('content')
<meta name="_token" content="{{ csrf_token() }}">
<div class="row">
  <div class="col-12">
    <h1>Overzicht</h1>
    <p>Hey {{ auth()->user()->firstName }}, welkom bij Managineer! Op deze pagina vind je een overzicht van al je spelers die je beheert.</p>
    @if(session('succes'))
    <div class="notification notification__succes alert" role="alert">
      <p>{{ session('succes') }}</p>
      <a class="close" data-dismiss="alert" aria-label="Close"><i class="fal fa-times"></i></a>
    </div>
    @endif

  </div>
  <a href="#players-form-add" data-toggle="collapse" class="button"><i class="fas fa-user-plus"></i> Toevoegen</a>
  <div id="players" class="tab-pane row tab-content" role="tabpanel">
    <div class="col-12">
      <form id="players-form-add" class="form form--crud collapse" action="/players" enctype="multipart/form-data" method="post" files="true">
        @csrf
        <fieldset>
          <legend> Speler toevoegen </legend>
          <div class="form--crud-section row">
            <div class="col-6">
              <label for="media" class="center">
                <input type="file" name="media" id="media" hidden>
                <div class="button"><i class="fal fa-camera-retro"></i> Foto</div>
              </label>
              <input type="text" name="firstName" id="playerFirstName" placeholder="voornaam"> 
              <input type="text" name="lastName" id="playerLastName" placeholder="achternaam"> 
              <select name="FKpositionID" id="FKpositionID" required>
                @foreach($positions as $position)
                  @if($loop->index < 2)
                  @else
                  <option value="{{ $position->id }}">{{ $position->positionName }}</option>
                  @endif
                @endforeach
              </select>
            </div>
            <div class="col-6">
              <input type="date" name="birthDate" id="birthDate">
              <textarea rows="2" name="description" id="playerDescription" placeholder="korte beschrijving"></textarea>
              <input type="number" name="shirtNumber" id="shirtNumber" min='1' max="99" placeholder="shirtnummer">
            </div>
          </div>
          <button class="button button--form" type="submit" value="submit"><i class="fal fa-user-plus"></i> Toevoegen</button
        </fieldset>
      </form>
    </div>
    <div class="col-12">
      <div class="overview-players-block col-12">
        <h6>Keepers:</h6>
        <div class="div-table">
          <div class="div-table-row div-table-head">
            <div class="div-table-col"></div>
            <div class="div-table-col">Naam</div>
            <div class="div-table-col">Geboortedatum</div>
            <div class="div-table-col"># shirt</div>
            <div class="div-table-col"></div>
          </div>
          @isset($players)
          @foreach ($players as $player)
            @if($player->FKpositionID === 3)
            <div class="div-table-row">
              @isset ($player->media)
                <div class="div-table-cell table-image--avatar"><img class="img-profile--avatar" src="{{ url('images/upload/'.$player->media->source)}}" alt="{{ $player->media->alt }}"></div>
              @endisset
              @empty ($player->media)
                <div class="div-table-cell table-image--avatar"><i class="fas fa-user-circle fa-3x img-profile--avatar"></i></div>
              @endempty
              <div class="div-table-cell">{{ $player->firstName.' '.$player->lastName }}</div>
              <div class="div-table-cell">{{ date('d-m-Y', strtotime($player->birthDate)) }}</div>
              <div class="div-table-cell" >{{ $player->shirtNumber }}</div>
              <div class="div-table-cell div-table-cell--buttons">
                <a class="button button__info" href="/players/{{ $player->id }}"><i class="fas fa-info"></i></a>
                <form action="/players/delete" method="post">
                  @csrf
                  <input type="hidden" name="playerID" value="{{ $player->id }}">
                  <input type="hidden" name="firstName" value="{{ $player->firstName }}">
                  <input type="hidden" name="lastName" value="{{ $player->lastName }}">
                  <button type="submit" class="button button__delete"><i class="fas fa-trash-alt"></i></button>
                </form>
              </div>
            </div>
            <div class="div-table-row" style="display: none">
              <div id="player-info-{{ $player->id }}"class="col-12 form form--crud overview-player-bio collapse">
                <div class="col">
                  <h6>{{ $player->firstName.' '.$player->lastName }}</h6>
                  <p>{{ $player->birthDate }}</p>
                  <p>{{ $player->description }}</p>
                  <p>{{ $player->position->positionName }}</p>
                </div>
                <div class="col">
                  <h6>Statistieken:</h6>
                  <p class="player-bio-stat--description">Goals:</p>
                  <p>{{ $player->playerstat->goals }}</p>
                  <p class="player-bio-stat--description">Assists:</p>
                  <p>{{ $player->playerstat->assists }}</p>
                  <p class="player-bio-stat--description">Gespeelde matchen:</p>
                  <p>{{ $player->playerstat->playedGames }}</p>
                  <p class="player-bio-stat--description">Kaarten:</p>
                  <p>gele: {{ $player->playerstat->yellowCards }} rode: {{ $player->playerstat->redCards }}</p>
                </div>
                <div class="col">
                  <div class="form--crud-section">
                    <div class="input-range">
                      <label for="shooting">
                        <p class="player-bio-stat--description">Schot: <output name="shootingOutput" id="shootingOut">{{ $player->playerskill->shooting }}</output>/ 10</p>
                        <input type="range" name="shooting" id="shooting" min="0" max="10" value="{{ $player->playerskill->shooting }}" oninput="shootingOut.value = shooting.value" disabled>
                      </label>
                      <output for="shooting" class="output"></output>
                    </div>
                    <div class="input-range">
                      <label for="defending">
                        <p class="player-bio-stat--description">Verdedigen: <output name="defendingOutput" id="defendingOut">{{ $player->playerskill->defending }}</output> / 10</p>
                        <input type="range" name="defending" id="defending" min="0" max="10" value="{{ $player->playerskill->defending }}" oninput="defendingOut.value = defending.value" disabled>
                      </label>
                      <output for="defending" class="output"></output>
                    </div>
                    <div class="input-range">
                      <label for="speed">
                        <p class="player-bio-stat--description">Snelheid: <output name="speedOutput" id="speedOut">{{ $player->playerskill->speed }}</output> km/u</p>
                        <input type="range" name="speed" id="speed" min="0" max="40" value="{{ $player->playerskill->speed }}" oninput="speedOut.value = speed.value" disabled>
                      </label>
                      <output for="speed" class="output"></output>
                    </div>
                    <div class="input-range">
                      <label for="stamina">
                          <p class="player-bio-stat--description">Conditie: <output name="staminaOutput" id="staminaOut">{{ $player->playerskill->stamina }}</output> / 10</p>
                        <input type="range" name="stamina" id="stamina" min="0" max="10" value="{{ $player->playerskill->stamina }}" oninput="staminaOut.value = stamina.value" disabled>
                      </label>
                      <output for="stamina" class="output"></output>
                    </div>
                    <div class="input-range">
                      <label for="dribbling">
                        <p class="player-bio-stat--description">Dribbelen: <output name="dribblingOutput" id="dribblingOut">{{ $player->playerskill->dribbling }}</output> / 10</p>
                        <input type="range" name="dribbling" id="dribbling" min="0" max="10" value="{{ $player->playerskill->dribbling }}" oninput="dribblingOut.value = dribbling.value" disabled>
                      </label>
                    </div>
                    <div class="input-range">
                      <label for="height">
                        <p class="player-bio-stat--description">Lengte in cm:</p>
                        <p>{{ $player->playerskill->height }}</p>
                      </label>
                      <output for="height" class="output"></output>
                    </div>
                    <div class="input-range">
                      <label for="weight">
                          <p class="player-bio-stat--description">Gewicht in kg:</p>
                          <p>{{ $player->playerskill->weight }}</p>
                      </label>
                    </div>
                    <p class="player-bio-stat--description">Beste voet:</p>
                    <p>{{ $player->playerskill->preferredFoot }}</p>
                  </div>
                </div>
              </div>
            </div>
        @endif
        @endforeach
        @endisset
        </div>
      </div>
      <div class="overview-players-block col-12">
        <h6>Verdedigers:</h6>
        <div class="div-table">
          <div class="div-table-row div-table-head">
            <div class="div-table-col"></div>
            <div class="div-table-col">Naam</div>
            <div class="div-table-col">Geboortedatum</div>
            <div class="div-table-col"># shirt</div>
            <div class="div-table-col"></div>
          </div>
          @isset($players)
          @foreach ($players as $player)
            @if($player->FKpositionID > 3 && $player->FKpositionID < 7)
            <div class="div-table-row">
                @isset ($player->media)
                  <div class="div-table-cell table-image--avatar"><img class="img-profile--avatar" src="{{ url('images/upload/'.$player->media->source)}}" alt="{{ $player->media->alt }}"></div>
                @endisset
                @empty ($player->media)
                  <div class="div-table-cell table-image--avatar"><i class="fas fa-user-circle fa-3x img-profile--avatar"></i></div>
                @endempty
              <div class="div-table-cell">{{ $player->firstName.' '.$player->lastName }}</div>
              <div class="div-table-cell">{{ date('d-m-Y', strtotime($player->birthDate)) }}</div>
              <div class="div-table-cell" >{{ $player->shirtNumber }}</div>
              <div class="div-table-cell div-table-cell--buttons" >
                <a class="button button__info" href="/players/{{ $player->id }}"><i class="fas fa-info"></i></a>
                  <form action="/players/delete" method="post">
                    @csrf
                    <input type="hidden" name="playerID" value="{{ $player->id }}">
                    <input type="hidden" name="firstName" value="{{ $player->firstName }}">
                    <input type="hidden" name="lastName" value="{{ $player->lastName }}">
                    <button type="submit" class="button button__delete"><i class="fas fa-trash-alt"></i></button>
                  </form>
              </div>
            </div>
            @endif
          @endforeach
          @endisset
        </div>
      </div>
      <div class="overview-players-block col-12">
        <h6>Middenvelders:</h6>
        <div class="div-table">
          <div class="div-table-row div-table-head">
            <div class="div-table-col"></div>
            <div class="div-table-col">Naam</div>
            <div class="div-table-col">Geboortedatum</div>
            <div class="div-table-col"># shirt</div>
            <div class="div-table-col"></div>
          </div>
          @isset($players)
          @foreach ($players as $player)
            @if($player->FKpositionID > 6 && $player->FKpositionID < 10)
            <div class="div-table-row">
                @isset ($player->media)
                  <div class="div-table-cell table-image--avatar"><img class="img-profile--avatar" src="{{ url('images/upload/'.$player->media->source)}}" alt="{{ $player->media->alt }}"></div>
                @endisset
                @empty ($player->media)
                  <div class="div-table-cell table-image--avatar"><i class="fas fa-user-circle fa-3x img-profile--avatar"></i></div>
                @endempty
              <div class="div-table-cell">{{ $player->firstName.' '.$player->lastName }}</div>
              <div class="div-table-cell">{{ date('d-m-Y', strtotime($player->birthDate)) }}</div>
              <div class="div-table-cell" >{{ $player->shirtNumber }}</div>
              <div class="div-table-cell div-table-cell--buttons" >
                <a class="button button__info" href="/players/{{ $player->id }}"><i class="fas fa-info"></i></a>
                  <form action="/players/delete" method="post">
                    @csrf
                    <input type="hidden" name="playerID" value="{{ $player->id }}">
                    <input type="hidden" name="firstName" value="{{ $player->firstName }}">
                    <input type="hidden" name="lastName" value="{{ $player->lastName }}">
                    <button type="submit" class="button button__delete"><i class="fas fa-trash-alt"></i></button>
                  </form>
              </div>
            </div>
            @endif
          @endforeach
          @endisset
        </div>
      </div>
      <div class="overview-players-block col-12">
        <h6>Aanvallers:</h6>
        <div class="div-table">
          <div class="div-table-row div-table-head">
            <div class="div-table-col"></div>
            <div class="div-table-col">Naam</div>
            <div class="div-table-col">Geboortedatum</div>
            <div class="div-table-col"># shirt</div>
            <div class="div-table-col"></div>
          </div>
          @isset($players)
          @foreach ($players as $player)
            @if($player->FKpositionID > 9 && $player->FKpositionID < 13)
            <div class="div-table-row">
                @isset ($player->media)
                  <div class="div-table-cell table-image--avatar"><img class="img-profile--avatar" src="{{ url('images/upload/'.$player->media->source)}}" alt="{{ $player->media->alt }}"></div>
                @endisset
                @empty ($player->media)
                  <div class="div-table-cell table-image--avatar"><i class="fas fa-user-circle fa-3x img-profile--avatar"></i></div>
                @endempty
              <div class="div-table-cell">{{ $player->firstName.' '.$player->lastName }}</div>
              <div class="div-table-cell">{{ date('d-m-Y', strtotime($player->birthDate)) }}</div>
              <div class="div-table-cell" >{{ $player->shirtNumber }}</div>
              <div class="div-table-cell div-table-cell--buttons" >
                <a class="button button__info" href="/players/{{ $player->id }}"><i class="fas fa-info"></i></a>
                  <form action="/players/delete" method="post">
                    @csrf
                    <input type="hidden" name="playerID" value="{{ $player->id }}">
                    <input type="hidden" name="firstName" value="{{ $player->firstName }}">
                    <input type="hidden" name="lastName" value="{{ $player->lastName }}">
                    <button type="submit" class="button button__delete"><i class="fas fa-trash-alt"></i></button>
                  </form>
              </div>
            </div>
            @endif
          @endforeach
          @endisset
        </div>
      </div>
    </div>
  </div>
</div>
@endsection