@extends('layouts.app')

@section('title', 'Products | Baktify')

@section('content')
  <div class="container p-5">
    <div class="row mb-5">
      <div class="col-12 d-flex justify-content-start">
        <img src="https://getbootstrap.com/docs/5.2/assets/brand/bootstrap-social.png" class="w-25" alt="">
        <div class="d-flex flex-column ps-5">
          <h2>{{ $product->name }}</h2>
          <p>{{ $product->description }}</p>
          <p>Stock: {{ $product->stock }}</p>
          <p>Category: {{ $product->category }}</p>
        </div>
      </div>
    </div>


  </div>
@endsection
