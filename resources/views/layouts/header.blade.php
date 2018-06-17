<nav class="navbar">
  <div class="navbar-content container">
    <ul class="navbar-list--left">
      <li><a class="navbar-link" href="{{ url('/overview') }}">
        {{ config('app.name', 'Managineer') }}
      </a></li>
    </ul>
    <ul class="navbar-list--right">
      @guest
        @include('layouts.header-guest')
      @else
        @include('layouts.header-user')
      @endguest
    </ul>
  </div>
</nav>