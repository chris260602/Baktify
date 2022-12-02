@extends('layouts.app')

@section('title', 'Add Category')

@section('content')
    @auth
        @if (auth()->user()->role !== '1')
            <p>Must be an admin to add category</p>
        @else
            <section class="container p-5 mb-5">
                <div class="d-flex flex-wrap my-3">
                    @foreach ($categories as $category)
                        <span class="rounded shadow-sm bg-info m-2 px-4 py-2">{{ $category->name }}</span>
                    @endforeach
                </div>
                <h2>Add new Category</h2>
                <form class="my-3" method="POST" action="/add-category" enctype="multipart/form-data">
                    @csrf
                    <div class="d-flex justify-content-between">
                        <label class="w-25" for="name">Add Category</label>
                        <input class="form-control w-75 py-1 @error('name') is-invalid @enderror" id="name" name="name"
                            type="text" value="{{ old('name') }}">
                    </div>
                    <button type="submit" class="btn btn-primary my-3">Submit</button>
                </form>
                <div class="bg-light text-danger">
                    @error('name')
                        <div class="text-danger">
                            - {{ $message }}
                        </div>
                    @enderror
                    @if (Session::has('addedAlert'))
                        <script>
                            alert('Category Successfully Added!')
                        </script>
                    @endif
                </div>
            </section>
        @endif
    @endauth
@endsection
