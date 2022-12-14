@extends('layouts.app')

@section('title', 'Add Product')

@section('content')
    @auth
        @if (auth()->user()->role !== '1')
            <p>Must be an admin to add products</p>
        @else
            <section class="m-5 p-5">
                <form method="POST" action="/add-products" enctype="multipart/form-data">
                    @csrf
                    <div class="d-flex justify-content-center px-5 py-3">
                        <label class="w-25" for="image">Product Image</label>
                        <input class="form-control w-75 p-1 @error('name') is-invalid @enderror" id="image" name="image"
                            type="file">
                    </div>
                    <div class="d-flex justify-content-center px-5 py-3">
                        <label class="w-25" for="name">Product Name</label>
                        <input class="form-control w-75 p-1  @error('name') is-invalid @enderror" id="name" name="name"
                            type="text" value="{{ old('name') }}">
                    </div>
                    <div class="d-flex justify-content-center px-5 py-3">
                        <label class="w-25" for="description">Description</label>
                        <textarea class="form-control w-75 p-1 @error('name') is-invalid @enderror" id="description" name="description"
                            rows="3">{{ old('description') }}</textarea>
                    </div>
                    <div class="d-flex justify-content-center px-5 py-3">
                        <label class="w-25" for="price">Price</label>
                        <input class="form-control w-75 p-1 @error('name') is-invalid @enderror" id="price" name="price"
                            type="text" value="{{ old('price') }}">
                    </div>
                    <div class="d-flex justify-content-center px-5 py-3">
                        <label class="w-25" for="stock">Product Quantity</label>
                        <input class="form-control w-75 p-1 @error('name') is-invalid @enderror" id="stock" name="stock"
                            type="text" value="{{ old('stock') }}">
                    </div>
                    <div class="d-flex justify-content-center px-5 py-3">
                        <label class="w-25" for="category">Category Name</label>
                        <select class="form-control w-75 p-1 @error('name') is-invalid @enderror" name="category"
                            id="category">
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="bg-light text-danger">
                        @error('image')
                            <div class="text-danger">
                                - {{ $message }}
                            </div>
                        @enderror
                        @error('name')
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
                        @error('category')
                            <div class="text-danger">
                                - {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="d-flex justify-content-center px-5 py-3">
                        <button type="submit" class="btn btn-primary mx-2">Insert</button>
                        <a href="/products" class="btn btn-danger mx-2">Cancel</a>
                    </div>
                </form>
            </section>
        @endif
    @endauth
@endsection
