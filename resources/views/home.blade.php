@include('includes.header')
@include('includes.navbar') 

@foreach ($allProducts as $index)    
    <p>{{ $index->product_name }}</p>
    <p>{{ $index->price }}</p>
@endforeach

@include('includes.footer')