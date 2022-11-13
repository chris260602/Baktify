@extends('layouts.app')

@section('title', 'Login | Baktify')

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-12 d-flex flex-column align-items-center">
                <h1 class="mb-4">Sign in to your account</h1>

                <div class="card p-3 col-6" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
                    @if (session()->has('alert'))
                        <div class="alert alert-primary" role="alert">
                            {{ session('alert') }}
                        </div>
                    @endif
                    @if (session()->has('loginError'))
                        <div class="text-danger">
                            {{ session('loginError') }}
                        </div>
                    @endif
                    <form action="/login" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="exampleInputEmail1">Email address</label>
                            @error('email')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email"
                                value="{{ old('email') }}">

                        </div>
                        <div class="form-group mb-3">
                            <label for="exampleInputPassword1">Password</label>
                            @error('password')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                name="password" id="exampleInputPassword1" placeholder="Password"
                                value="{{ old('password') }}">
                        </div>
                        <div class="form-check mb-3">
                            <input type="checkbox" class="form-check-input" id="EmailCheck1">
                            <label class="form-check-label" for="EmailCheck1">Remember Email</label>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Submit</button>
                        <p class="text-center mt-3">Or</p>
                        <a href="/register" class="btn btn-outline-secondary w-100">
                            Register
                        </a>

                    </form>
                </div>

            </div>

        </div>
    </div>
@endsection
