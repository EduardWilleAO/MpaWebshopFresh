@include('includes.header')
@include('includes.navbar') 

<div class='container text-center'>
    <h1 class='display-3' style='color: white; text-shadow: 0px 0px 3px black;'>Homepage!</h1>
</div>

@if(isset($allCategories))
@foreach($allCategories as $category)
<div class="container mt-5 text-center">
    <div class="card mt-3" style="width: 18rem; float: left; margin-left: 1rem;">
    <div class="card-header">
        <h2 style="text-transform: capitalize;">{{ $category->category }}</h2>
    </div>
    <div class="card-body">
        <a href="{{ url('/category', $category->id) }}" class="btn btn-lg btn-primary">Go to category</a>
    </div>
    </div>
</div>
@endforeach
@endif

@include('includes.footer')