@include('includes.header')
@include('includes.navbar') 

<div class="container bg-dark rounded mt-5 p-1" style="max-height: 80vh; overflow: scroll;">
    @if(!empty(reset($orders)))
    @foreach($orders as $index=>$order)
        <div id="order" style="border: 1px solid black;">
        <h1 class="text-center p-5 text-light">Order {{$index+1}}</h1>
            @foreach($order->products as $product)
                <div class="card m-2">
                    <div class="card-body">
                        <div style="width: 50%; float: left;">
                            <h3><b>Product: </b>{{ $product->product_name }}</h3>
                            <h5><b>Amount: </b>{{ $product->pivot->amount }}</h5>
                            <h5><b>Price:</b> €{{ $product->price }}</h5>
                        </div>
                        <img  style="max-height: 10rem; float: right;" src="{{ $product->img_url }}" onerror="this.onerror=null; this.src='https://picsum.photos/1920/1080'" alt="">
                    </div>
                </div>
            @endforeach
            </div>
    @endforeach
    @else
    <div style="border: 1px solid black;">
        <h1 class="text-center p-5 text-light">No orders placed yet</h1>
    </div>
    @endif
</div>

@include('includes.footer')