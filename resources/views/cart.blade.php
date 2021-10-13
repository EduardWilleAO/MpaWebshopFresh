@include('includes.header')
@include('includes.navbar') 

<div class="container bg-light rounded mt-5" style="height: 80vh; overflow: scroll;"> 
@if (isset($products))
@foreach ($products as $product)
    <div class="card mt-1">
        <div class="card-body">
            {{ $product }}
        </div>
    </div>
@endforeach
@endif
</div>

@include('includes.footer')