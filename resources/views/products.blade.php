@include('includes.header')
@include('includes.navbar') 

<div class="container mt-2"> 
  @if(isset($category)) 
    <div class='container text-center'>
      <h1 class='display-3' style='text-transform: capitalize;'>{{ $category }}</h1>
    </div>
  @else
    <div class='container text-center'>
      <h1 class='display-3'>All products</h1>
    </div>
  @endif

  <div style="display: flex; flex-wrap: wrap; max-height: 80vh; overflow: scroll;">
  @if (isset($allProducts))
  @foreach ($allProducts as $index)
  <div class="card text-center mt-3" style="width: 18rem; float: left; margin-left: 1rem;">
    <h4 class="card-header">
      <a href="{{ url('/product', $index->id) }}">{{ $index->product_name }}</a>
    </h4>
    <div class="card-body">
      <img src="{{ $index->img_url }}" class="card-img-top" onerror="this.onerror=null; this.src='https://picsum.photos/1920/1080'" alt="">
      <p class="card-text mt-3">{{ $index->price }}</p>      
      <form method="post" action="/addToCart">
        @csrf <!-- This validates the form, required for post method -->
        <input name="id" type="hidden" value="{{ $index->id }}">
        <input name="amount" class="text-center" type="number" value="1" min="1">  
        <input class="btn btn-success mt-2" type="submit" value="Add to cart!">
      </form>
    </div>
  </div>
  @endforeach
  @endif  
  </div>
</div>

@include('includes.footer')