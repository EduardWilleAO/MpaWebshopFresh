@include('includes.header')
@include('includes.navbar') 

<div class="container bg-light rounded mt-5 p-1" style="max-height: 80vh; overflow: scroll;"> 
@if (isset($products))
@foreach ($products as $product)
    <div class="card m-2">
        <div class="card-body">
            {{ $product->name }}
            {{ $product->price }}
            {{ $product->amount }}
        </div>
    </div>
@endforeach
@else
    <h1 class="text-center m-5">There are no items in the cart!</h1>
@endif
</div>

@include('includes.footer')