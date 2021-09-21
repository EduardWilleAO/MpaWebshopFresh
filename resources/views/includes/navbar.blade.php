@section('navbar')

<ul>
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
</ul>
