@include('includes.header')
@include('includes.navbar') 

<div class="container">
  @foreach ($allProducts as $index)
  <div class="card text-center mt-3" style="width: 18rem; float: left; margin-left: 1rem;">
    <h4 class="card-header">{{ $index->product_name }}</h4>
    <div class="card-body">
      <img src="https://picsum.photos/200" class="card-img-top" alt="">
      <p class="card-text mt-3">{{ $index->price }}</p>
      <a href="#" class="btn btn-success">Add to cart</a>
    </div>
  </div>
  @endforeach
</div>

@include('includes.footer')