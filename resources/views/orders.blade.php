@include('includes.header')
@include('includes.navbar') 

<div class="container bg-light rounded mt-5 p-1" style="max-height: 80vh; overflow: scroll;"> 

@php $maxOrder_id = 1; @endphp

@foreach($orders as $check) <!-- Checks the amount of different orders and puts those in a variable -->
    @if ($check->order_id > $maxOrder_id) 
        @php $maxOrder_id = $check->order_id; @endphp
    @endif
@endforeach

@for($i=1; $i <= $maxOrder_id; $i++) <!-- runs 4 times if there are 4 different orders! -->

    @php $currLoop = $orders[$i]->order_id; @endphp <!-- sets current loop id -->

    <div style="border: 1px solid black;">

    @for($a=1; $a<=count($orders)-1; $a++) <!-- loops through all the products ordered -->
        @if($maxOrder_id == $orders[$a]->order_id) <!-- if the current products order_id is the same as the current order_id from the first loop show it -->
            <h4>{{ $orders[$a]->product }}<h4>
        @endif
    @endfor

    </div>

    @php $lastLoop = $currLoop @endphp

@endfor

</div>

@include('includes.footer')