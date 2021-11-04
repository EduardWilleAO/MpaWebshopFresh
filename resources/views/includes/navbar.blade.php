<!--<ul>
    <li><a href="{{ url('/') }}">Homepage</a></li>
    <li class="has-dropdown"><a href="{{ url('categories') }}">Categories</a>
        <ul id="dropdown-container">
            <li class="dropdown"><a href="{{ url('category1') }}">Games</a></li>
            <li class="dropdown"><a href="{{ url('category2') }}">Chairs</a></li>
            <li class="dropdown"><a href="{{ url('category3') }}">Desks</a></li>
            <li class="dropdown"><a href="{{ url('category4') }}">Microphones</a></li>
            <li class="dropdown"><a href="{{ url('category5') }}">Peripherals</a></li>
        </ul>
    </li>
    <li><a href="{{ url('cart') }}">Cart</a></li>
</ul>-->

<nav class="navbar navbar-dark bg-dark navbar-expand-lg">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ url('/') }}">Homepage</a>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" href="{{ url('/products') }}">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="{{ url('/cart') }}">Cart</a>
        </li>
        @if(Auth::check())
        <li class="nav-item">
          <a class="nav-link active" href="{{ url('/orderHistory') }}">Orders</a>
        </li>
        @endif
        <!--<li class="nav-item">
          <a class="nav-link active" href="{{ route('login') }}">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="{{ route('register') }}">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="{{ route('logout') }}">Logout</a>
        </li>-->

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