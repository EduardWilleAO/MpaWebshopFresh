<nav class="navbar navbar-dark bg-dark navbar-expand-lg">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ url('/') }}">Homepage</a>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Categories</a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown" role="Dropdown">
            <li><a class="dropdown-item" href="{{ url('/category/1') }}">Games</a></li>
            <li><a class="dropdown-item" href="{{ url('/category/2') }}">Hardware</a></li>
            <li><a class="dropdown-item" href="{{ url('/category/3') }}">Accessories</a></li>
            <li><a class="dropdown-item" href="{{ url('/category/4') }}">Simulation Gear</a></li>
            <li><a class="dropdown-item" href="{{ url('/category/5') }}">Camping Gear</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="{{ url('/cart') }}">Cart</a>
        </li>
        @if(Auth::check())
        <li class="nav-item">
          <form action="/orderHistory" method="post">
            @csrf
            <input type="hidden" name="user" value="{{ Auth::id(); }}">
            <input type="submit" class="nav-link active bg-dark border-0" value="Orders">
          </form>
        </li>
        @endif
        <ul class="navbar-nav" style="position: absolute; right: 5rem;">
          @guest <!-- if not logged in -->
              @if (Route::has('login'))
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                  </li>
              @endif

              @if (Route::has('register'))
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                  </li>
              @endif
          @else <!-- if logged in -->
              <li class="nav-item">
                  <a class="nav-link" style="color: white;">Welcome {{ Auth::user()->name }}!</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                      {{ __('Logout') }}
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
              </li>
          @endguest
      </ul>

      </ul>
    </div>
  </div>
</nav>