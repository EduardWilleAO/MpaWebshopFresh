@include('includes.header')
@include('includes.navbar') 

<div class="container bg-light rounded-top mt-5 p-1" style="max-height: 80vh; overflow: scroll;"> 
@if (isset($products) && $products != NULL)
@foreach ($products as $product)
    <div class="card m-2">
        <div class="card-body">
            <div style="width: 50%; float: left;">
                <h3><b>Product:</b> {{ $product->name }}</h3>
                <h5><b>Price:</b> €{{ $product->price }}</h5>
                <h5><b>Amount:</b>
                    <form method="post" action="/updateAmount" style="display: inline-block;">    
                        @csrf
                        <input name="name" type="hidden" value="{{ $product->name }}">
                        <input name="amount" style="max-width: 100px;" type="number" value="{{ $product->amount }}" required="required">
                    </form>
                </h5>
            </div>
            <img  style="max-height: 10rem; float: right;" src="{{ $product->img_url }}" onerror="this.onerror=null; this.src='https://picsum.photos/1920/1080'" alt="">
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