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
      </ul>
    </div>
  </div>
</nav>