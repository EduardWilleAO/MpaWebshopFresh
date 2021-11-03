@include('includes.header')
@include('includes.navbar') 

<div class="container mt-2"> 

    @if (isset($product))
    @foreach ($product as $index)

    <div style="display: flex; flex-wrap: wrap; max-height: 90vh; overflow: scroll;">
    <div class="card text-center mt-3" style="width: 100rem; float: left; margin-left: 1rem;">
        <h1 class="card-header">{{ $index->product_name }}</h1>
        <div class="card-body">
        <img src="{{ $index->img_url }}" class="card-img-top" style="max-width: 90%;" onerror="this.onerror=null; this.src='https://picsum.photos/1920/1080'" alt="">
        <p class="card-text mt-3">{{ $index->price }}</p>      
        <form method="post" action="/addToCart">
            @csrf <!-- This validates the form, required for post method -->
            <input name="id" type="hidden" value="{{ $index->id }}">
            <input name="amount" class="text-center" type="number" value="1" min="1"><br>
            <input class="btn btn-success mt-2" type="submit" value="Add to cart!">
        </form>
        </div>
    </div>

    @endforeach
    @endif  
    
    </div>
</div>

@include('includes.footer')