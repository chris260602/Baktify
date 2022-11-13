@extends('layouts.app')

@section('title', 'Products | Baktify')

@section('content')
  <div class="container p-5">
    <div class="row mb-5">
      <div class="col-12 d-flex justify-content-between">
        <h2>OUR PRODUCTS</h2>
        <div class="d-flex gap-3">
          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
            placeholder="Enter email">
          <button type="submit" class="btn btn-primary">Search</button>
        </div>
      </div>

    </div>

    <div class="row">
      <div class="col">
        <div class="d-flex  flex-wrap gap-3">
          @foreach ($products as $product)
            <div class="card d-flex  text-center"
              style="width: 18rem;box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;">
              <a href="/products/{{$product->id}}" class="text-decoration-none">
                <img class="card-img-top" src="https://getbootstrap.com/docs/5.2/assets/brand/bootstrap-social.png"
                  style="height:200px ;object-fit: cover" alt="Card image cap" />
                <div class="card-body">
                  <h5 class="card-title text-dark">{{ $product->name }}</h5>
                  <p class="card-text" style="color: #838383">{{ $product->price }}</p>
                  <p class="bg-info rounded-pill w-50 m-auto mb-4 text-white">{{ $product->category }}</p>
                  <div class="d-flex justify-content-between align-items-center">
                    <a href="#" class="btn btn-primary">Add
                      to
                      Cart</a>
                    <a href="#" class="btn btn-danger">Remove Product</a>
                  </div>
                </div>
              </a>
            </div>
          @endforeach
          {{-- <div class="card d-flex  text-center"
            style="width: 18rem;box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;">
            <a href="#" class="text-decoration-none">
              <img class="card-img-top" src="https://getbootstrap.com/docs/5.2/assets/brand/bootstrap-social.png"
                style="height:200px ;object-fit: cover" alt="Card image cap" />
              <div class="card-body">
                <h5 class="card-title text-dark">Card title</h5>
                <p class="card-text" style="color: #838383">IDR 85000</p>
                <p class="bg-info rounded-pill w-50 m-auto mb-4 text-white">Country</p>
                <div class="d-flex justify-content-between align-items-center">
                  <a href="#" class="btn btn-primary">Add
                    to
                    Cart</a>
                  <a href="#" class="btn btn-danger">Remove Product</a>
                </div>
              </div>
            </a>
          </div>
          <div class="card d-flex  text-center"
            style="width: 18rem;box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;">
            <a href="#" class="text-decoration-none">
              <img class="card-img-top" src="https://getbootstrap.com/docs/5.2/assets/brand/bootstrap-social.png"
                style="height:200px ;object-fit: cover" alt="Card image cap" />
              <div class="card-body">
                <h5 class="card-title text-dark">Card title</h5>
                <p class="card-text" style="color: #838383">IDR 85000</p>
                <p class="bg-info rounded-pill w-50 m-auto mb-4 text-white">Country</p>
                <div class="d-flex justify-content-between align-items-center">
                  <a href="#" class="btn btn-primary">Add
                    to
                    Cart</a>
                  <a href="#" class="btn btn-danger">Remove Product</a>
                </div>
              </div>
            </a>
          </div>
          <div class="card d-flex  text-center"
            style="width: 18rem;box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px, rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;">
            <a href="#" class="text-decoration-none">
              <img class="card-img-top" src="https://getbootstrap.com/docs/5.2/assets/brand/bootstrap-social.png"
                style="height:200px ;object-fit: cover" alt="Card image cap" />
              <div class="card-body">
                <h5 class="card-title text-dark">Card title</h5>
                <p class="card-text" style="color: #838383">IDR 85000</p>
                <p class="bg-info rounded-pill w-50 m-auto mb-4 text-white">Country</p>
                <div class="d-flex justify-content-between align-items-center">
                  <a href="#" class="btn btn-primary">Add
                    to
                    Cart</a>
                  <a href="#" class="btn btn-danger">Remove Product</a>
                </div>
              </div>
            </a>
          </div> --}}


        </div>

      </div>
    </div>
  </div>
@endsection
