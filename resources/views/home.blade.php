@include('includes.header')
@include('includes.navbar') 

<div>
    @foreach ($allCategories as $index)    
        <p>{{ $index->category }}</p>
    @endforeach
</div>

@include('includes.footer')