@extends('layouts.app')

@section('title', 'Products | Baktify')

@section('content')
    @if (Session::has('deleteAlert'))
        <script>
            alert('Product Successfully Deleted')
        </script>
    @endif
    @if (Session::has('addedAlert'))
        <script>
            alert('Product Successfully Added')
        </script>
    @endif
    @if (Session::has('editedAlert'))
        <script>
            alert('Product Successfully Edited')
        </script>
    @endif
    @if (Session::has('addedCart'))
        <script>
            alert('Product Successfully Added to Cart')
        </script>
    @endif
    <div class="container p-5">
        <div class="row mb-5">
            <div class="col-12 d-flex justify-content-between">
                <h2>OUR PRODUCTS</h2>
                <form method="GET" action="/products">
                    <div class="d-flex gap-3">
                        <input type="text" class="form-control" id="q" name="q" placeholder="Search Product">
                        <button type="submit" class="btn btn-primary">Search</button>
                        @auth
                            @if (auth()->user()->role === '1')
                                <a href="/add-products" class="btn btn-outline-primary">Add Product</a>
                            @endif
                        @endauth
                    </div>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="d-flex flex-wrap gap-3">
                    @if (isset($error))
                        <p>{{ $error }}</p>
                    @else
                        @foreach ($products as $product)
                            <div class="card d-flex  text-center"
                                style="width: 18rem;box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;">
                                <a href="/products/{{ $product->id }}" class="text-decoration-none">
                                    <img class="card-img-top" src="/storage/productImages/{{ $product->image }}"
                                        style="height:200px ;object-fit: cover" alt="Card image cap" />
                                    <div class="card-body">
                                        <h5 class="card-title text-dark">{{ $product->name }}</h5>
                                        <p class="card-text" style="color: #838383">IDR {{ $product->price }}</p>
                                        <p class="bg-info rounded-pill w-50 m-auto mb-4 text-white">
                                            {{ $product->categoryId->name }}
                                        </p>
                                        @auth
                                            @if (auth()->user()->role === '0')
                                                <div class="d-flex justify-content-center align-items-center">

                                                    <form method="POST" action="/cart/add/{{ $product->id }}">
                                                        @csrf
                                                        @method('PUT')
                                                        @if ($product->stock > 0)
                                                            <button type="submit" class="btn btn-primary">Add to Cart</button>
                                                        @else
                                                            <button type="submit" class="btn btn-primary"
                                                                disabled>Unavailable</button>
                                                        @endif
                                                    </form>

                                                </div>
                                            @endif
                                            @if (auth()->user()->role === '1')
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <a href="/edit-product/{{ $product->id }}" class="btn btn-primary p-1">Edit
                                                        Product</a>
                                                    <form method="POST" action="/products/{{ $product->id }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger p-1">Remove
                                                            Product</button>
                                                    </form>
                                                </div>
                                            @endif
                                        @endauth
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>

        <div class="d-flex align-items-center justify-content-center mt-5">
            {{ $products->links() }}
        </div>

    </div>
@endsection
