@extends('layouts.app')

@section('title', 'Products | Baktify')

@section('content')
  <div class="container p-5">
    <div class="row mb-5">
      <div class="col-12 d-flex justify-content-start">
        <img src="/storage/productImages/{{$product->image}}" class="w-25" alt="{{$product->name}}">
        <div class="d-flex flex-column ps-5">
          <h2>{{ $product->name }}</h2>
          <p>{{ $product->description }}</p>
          <p><b>Stock:</b> {{ $product->stock }}</p>
          <p><b>Category:</b> {{ $product->categoryId->name }}</p>
        </div>
      </div>
    </div>
  </div>
@endsection
