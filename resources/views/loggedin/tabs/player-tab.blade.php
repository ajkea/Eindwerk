
  @section('tab-player')
  <div id="tab-players" class="row tab-content">
    <div class="col-12">
      <form class="form form--crud" action="/players" enctype="multipart/form-data" method="post" files="true">
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
          @if(Auth::check() && Auth::user()->role !== "user")
          <div class="form--crud-section">
            <div class="input-range">
              <label for="shooting">
                <input type="range" name="shooting" id="shooting" min="0" max="100" value="0">
                <input type="number" name="shooting" id="shooting" min="0" max="100" placeholder="shooting">
              </label>
              <output for="shooting" class="output"></output>
            </div>
            <div class="input-range">
              <label for="defending">
                <input type="range" name="defending" id="defending" min="0" max="100" value="0">
                <input type="number" name="defending" id="defending" min="0" max="100" placeholder="defending">
              </label>
              <output for="defending" class="output"></output>
            </div>
            <div class="input-range">
              <label for="speed">
                <input type="range" name="speed" id="speed" min="0" max="100" value="0">
                <input type="number" name="speed" id="speed" min="0" max="100">
              </label>
              <output for="speed" class="output"></output>
            </div>
            <div class="input-range">
              <label for="stamina">
                <input type="range" name="stamina" id="stamina" min="0" max="100" value="0">
                <input type="number" name="stamina" id="stamina" min="0" max="100">
              </label>
              <output for="stamina" class="output"></output>
            </div>
            <div class="input-range">
              <label for="dribbling">
                <input type="range" name="dribbling" id="dribbling" min="0" max="100" value="0">
                <input type="number" name="dribbling" id="dribbling" min="0" max="100">
              </label>
              <output for="dribbling" class="output"></output>
            </div>
            <div class="input-range">
              <label for="height">
                <input type="range" name="height" id="height" min="0" max="100" value="0">
                <input type="number" name="height" id="height" min="0" max="100">
              </label>
              <output for="height" class="output"></output>
            </div>
            <div class="input-range">
              <label for="weight">
                <input type="range" name="weight" id="weight" min="0" max="100" value="0">
                <input type="number" name="weight" id="weight" min="0" max="100">
              </label>
              <output for="weight" class="output"></output>
            </div>
            <input type="text" name="preferredFoot" id="preferredFoot" placeholder="Link/rechts voetig">
          </div>
          @endif
          <button class="button button--form" type="submit" value="submit"><i class="fal fa-user-plus"></i> Toevoegen</button
        </fieldset>
      </form>
    </div>
    <div class="col-12">
      <div class="overview-players-block">
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
              <div class="div-table-cell div-table-cell--buttons" ><a class="button button__info" href="/players/{{ $player->id }}"><i class="fas fa-info-circle"></i></a>
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
      <div class="overview-players-block">
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
              <div class="div-table-cell div-table-cell--buttons" ><a class="button button__info" href="/players/{{ $player->id }}"><i class="fas fa-info-circle"></i></a>
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
      <div class="overview-players-block">
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
              <div class="div-table-cell div-table-cell--buttons" ><a class="button button__info" href="/players/{{ $player->id }}"><i class="fas fa-info-circle"></i></a>
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
      <div class="overview-players-block">
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
              <div class="div-table-cell div-table-cell--buttons" ><a class="button button__info" href="/players/{{ $player->id }}"><i class="fas fa-info-circle"></i></a>
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
  @endsection