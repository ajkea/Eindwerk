{{ Auth::user()->name }} <span class="caret"></span>
<div class="tab" id="nav-tab">
  <li><a href="/overview" data-toggle="tab" class="nav-link button tab-link" id="players-tab">Spelers</a></li>
  <li><a href="/teams" data-toggle="tab" class="nav-link button tab-link" id="teams-tab">Ploegen</a></li>
  <li><a href="#tactics" data-toggle="tab" class="nav-link button tab-link" id="tactics-tab">Tactics</a></li>
  <li><a class="button tab-link" href="/users">{{ Auth::user()->firstName }}</a></li>
  <li><a class="button tab-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a></li>
</div>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
  @csrf
</form>