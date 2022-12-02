@extends('layouts.app')

@section('title', 'Add Product')

@section('content')
  @auth
    @if (auth()->user()->role !== '1')
      <p>Must be an admin to edit products</p>
    @else
      <section class="m-5 p-5">
        <form method="POST" action="/edit-product/{{$product->id}}" enctype="multipart/form-data">
          @csrf
          <div class="d-flex justify-content-center">
            <h1>{{ $product->name }}</h1>
          </div>
          <div class="d-flex justify-content-center">
            <img src="/storage/productImages/{{ $product->image }}" alt="{{ $product->name }}" />
          </div>
          <div class="d-flex justify-content-center px-5 py-3">
            <label class="w-25" for="image">Product Image</label>
            <input class="form-control w-75 p-1 @error('image') is-invalid @enderror" id="image" name="image" type="file">
          </div>
          <div class="d-flex justify-content-center px-5 py-3">
            <label class="w-25" for="description">Description</label>
            <textarea class="form-control w-75 p-1 @error('description') is-invalid @enderror" id="description" name="description" rows="3">{{ $product->description }}</textarea>
          </div>
          <div class="d-flex justify-content-center px-5 py-3">
            <label class="w-25" for="price">Price</label>
            <input class="form-control w-75 p-1 @error('price') is-invalid @enderror" id="price" name="price" type="text" value="{{ $product->price }}">
          </div>
          <div class="d-flex justify-content-center px-5 py-3">
            <label class="w-25" for="stock">Product Quantity</label>
            <input class="form-control w-75 p-1 @error('stock') is-invalid @enderror" id="stock" name="stock" type="text" value="{{ $product->stock }}">
          </div>
          <div class="bg-light text-danger">
            @error('image')
              <div class="text-danger">
                - {{ $message }}
              </div>
            @enderror
            @error('description')
              <div class="text-danger">
                - {{ $message }}
              </div>
            @enderror
            @error('price')
              <div class="text-danger">
                - {{ $message }}
              </div>
            @enderror
            @error('stock')
              <div class="text-danger">
                - {{ $message }}
              </div>
            @enderror
          </div>
          <div class="d-flex justify-content-center px-5 py-3">
            <button type="submit" class="btn btn-primary mx-2">Edit</button>
            <a href="/products" class="btn btn-danger mx-2">Cancel</a>
          </div>
        </form>
      </section>
    @endif
  @endauth
@endsection
