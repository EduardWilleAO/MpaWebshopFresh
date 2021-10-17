@include('includes.header')
@include('includes.navbar') 

<div class="container bg-light rounded-top mt-5 p-1" style="max-height: 80vh; overflow: scroll;"> 
@if (isset($products))
@foreach ($products as $product)
    <div class="card m-2">
        <div class="card-body">
            <div>
                <h3><b>Product:</b> {{ $product->name }}</h3>
                <h5><b>Price:</b> €{{ $product->price }}</h5>
            </div>
            <div>
                <h5><b>Amount:</b> {{ $product->amount }}</h5>
            </div>
        </div>
    </div>
@endforeach
@else
    <h1 class="text-center m-5">There are no items in the cart!</h1>
@endif
</div>
@if(isset($totalPrice))
<div class="container bg-light rounded-bottom p-1">
    <div class="container-fluid d-flex justify-content-end">
        <h3 class="p-2"><b>Total price:</b> €{{ $totalPrice }}</h3>
    </div>
</div>
@endif
@include('includes.footer')