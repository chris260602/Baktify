@extends('layouts.app')

@section('title', 'Products | Baktify')

@section('content')
  @if (session('deleteAlert'))
    <script>
      alert('Product Successfully Deleted')
    </script>
  @endif
  @if (session('addedAlert'))
    <script>
      alert('Product Successfully Added')
    </script>
  @endif
  <div class="container p-5">
    <div class="row mb-5">
      <div class="col-12 d-flex justify-content-between">
        <h2>OUR PRODUCTS</h2>
        <div class="d-flex gap-3">
          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
            placeholder="Enter email">
          <button type="submit" class="btn btn-primary">Search</button>
          @auth
            @if (auth()->user()->role === '1')
              <a href="/add-products" class="btn btn-outline-primary">Add Product</a>
            @endif
          @endauth
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col">
        <div class="d-flex  flex-wrap gap-3">
          @foreach ($products as $product)
            <div class="card d-flex  text-center"
              style="width: 18rem;box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;">
              <a href="/products/{{ $product->id }}" class="text-decoration-none">
                <img class="card-img-top" src="https://getbootstrap.com/docs/5.2/assets/brand/bootstrap-social.png"
                  style="height:200px ;object-fit: cover" alt="Card image cap" />
                <div class="card-body">
                  <h5 class="card-title text-dark">{{ $product->name }}</h5>
                  <p class="card-text" style="color: #838383">IDR {{ $product->price }}</p>
                  <p class="bg-info rounded-pill w-50 m-auto mb-4 text-white">{{ $product->category }}</p>
                  @auth
                    @if (auth()->user()->role === '0')
                      <div class="d-flex justify-content-center align-items-center">
                        <a href="#" class="btn btn-primary">Add to Cart</a>
                      </div>
                    @endif
                    @if (auth()->user()->role === '1')
                      <div class="d-flex justify-content-between align-items-center">
                        <a href="/edit-product" class="btn btn-primary">Add to Cart</a>
                        <form method="POST" action="/products/{{ $product->id }}">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger">Remove Product</button>
                        </form>
                      </div>
                    @endif
                  @endauth
                </div>
              </a>
            </div>
          @endforeach
        </div>
      </div>
    </div>

  </div>
@endsection
