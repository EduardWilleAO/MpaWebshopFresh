@include('includes.header')
@include('includes.navbar') 

<div>
@foreach ($category as $index)    
    <p>{{ $index->category }}</p>
@endforeach
</div>

@include('includes.footer')