@include('includes.header')
@include('includes.navbar') 

<div class="container bg-dark rounded mt-5 p-1" style="max-height: 80vh; overflow: scroll;"> 

@php $maxOrder_id = 1; @endphp

@foreach($orders as $check) <!-- Checks the amount of different orders and puts those in a variable -->
    @if ($check->order_id > $maxOrder_id) 
        @php $maxOrder_id = $check->order_id; @endphp
    @endif
@endforeach

@for($i=1; $i <= $maxOrder_id; $i++) <!-- runs 4 times if there are 4 different orders! -->

    @php $currLoop = $orders[$i]->order_id; @endphp <!-- sets current loop id -->

    <div style="border: 1px solid black;">
    <h1 class="text-center p-5 text-light">Order {{$i}}</h1>

    @for($a=1; $a<=count($orders)-1; $a++) <!-- loops through all the products ordered -->
        @if($maxOrder_id == $orders[$a]->order_id) <!-- if the current products order_id is the same as the current order_id from the first loop show it -->
            <!--<h4><b>Product: </b>{{ $orders[$a]->product }}<h4>
            <h4><b>Amount: </b>{{ $orders[$a]->product_amount }}</h4>-->
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

    @php $lastLoop = $currLoop @endphp

@endfor

</div>

@include('includes.footer')