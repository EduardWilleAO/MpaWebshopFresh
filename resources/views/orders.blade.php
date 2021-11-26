@include('includes.header')
@include('includes.navbar') 

<div class="container bg-dark rounded mt-5 p-1" style="max-height: 80vh; overflow: scroll;"> 
@if(!empty(reset($orders)))
@php 
$lastOrderNum = array_key_last(reset($orders));
$firstOrderNum = key(reset($orders));

$maxOrder_id = $orders[$lastOrderNum]->order_id;
$minOrder_id = $orders[$firstOrderNum]->order_id;
@endphp
@endif

@if(!empty(reset($orders)))
@for($i=$minOrder_id; $i<=$maxOrder_id; $i++) <!-- runs 4 times if there are 4 different orders! -->
    <div id="order{{ $i }}" style="border: 1px solid black;">
    <h1 class="text-center p-5 text-light">Order {{$i}}</h1>

    @for($a=$firstOrderNum; $a<=$lastOrderNum; $a++) <!-- loops through all the products ordered -->
        @if($i == $orders[$a]->order_id) <!-- if the current products order_id is the same as the current order_id from the first loop show it -->
            <div class="card m-2">
                <div class="card-body">
                    <div style="width: 50%; float: left;">
                        <h3><b>Product:</b>{{ $orders[$a]->product }}</h3>
                        <h5><b>Amount:</b>{{ $orders[$a]->product_amount }}</h5>
                    </div>
                </div>
            </div>
        @endif
    @endfor
    </div>
@endfor
@else
<div style="border: 1px solid black;">
    <h1 class="text-center p-5 text-light">No orders placed yet</h1>
</div>
@endif

</div>

@include('includes.footer')