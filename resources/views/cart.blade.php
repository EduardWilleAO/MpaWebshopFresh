@include('includes.header')
@include('includes.navbar') 

<div class="container"> 
  @foreach ($products as $product)
    {{ $product }}
  @endforeach
</div>

@include('includes.footer')