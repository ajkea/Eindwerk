{{ Auth::user()->name }} <span class="caret"></span>
<li><a class="navbar-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a></li>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
  @csrf
</form>
<li><a class="navbar-link" href="/players">Players</a></li>
<li><a class="navbar-link" href="/users">{{ Auth::user()->username }}</a></li>