{{ Auth::user()->name }} <span class="caret"></span>
<div class="tab" id="nav-tab">
  <a href="/overview" class=" button" id="players-tab">Spelers</a>
  <a href="/teams" class="button" id="teams-tab">Ploegen</a>
  <a class="button" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }} <i class="fal fa-sign-out"></i></a>
</div>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
  @csrf
</form>