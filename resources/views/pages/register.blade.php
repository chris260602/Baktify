@extends('layouts.app')

@section('title', 'Register | Baktify')

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-12 d-flex flex-column align-items-center">
                <h1 class="mb-4">Create your account</h1>

                <div class="card p-3 col-6" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
                    <form action="/register" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="inputName">Name</label>
                            @error('name')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror

                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                id="inputName" aria-describedby="nameHelp" placeholder="Enter name"
                                value="{{ old('name') }}">

                        </div>
                        <div class="form-group mb-3">
                            <label for="inputEmail">Email address</label>
                            @error('email')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                            <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
                                id="inputEmail" aria-describedby="emailHelp" placeholder="Enter email"
                                value="{{ old('email') }}">

                        </div>
                        <div class="row">
                            <div class="form-group mb-3 col-6">
                                <label for="inputPassword">Password</label>
                                @error('password')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <input type="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror" id="inputPassword"
                                    placeholder="Password" value="{{ old('password') }}">
                            </div>
                            <div class="form-group mb-3 col-6">
                                <label for="inputConfirm">Confirm Password</label>
                                @error('password_confirmation')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <input type="password" name="password_confirmation"
                                    class="form-control @error('password_confirmation') is-invalid @enderror"
                                    id="inputConfirm" placeholder="Confirmation Password"
                                    value="{{ old('password_confirmation') }}">

                            </div>
                        </div>


                        <div class="form-group mb-3">
                            <label for="inputAddress">Address</label>
                            @error('address')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                            <textarea class="form-control @error('address') is-invalid @enderror" name="address" id="inputAddress" rows="3">{{ old('address') }}</textarea>
                            <small id="addressHelp" class="form-text text-muted">Please write your actual address where you
                                can receive mail.</small>
                        </div>
                        <div class="form-group mb-3">
                            <label for="inputPhone">Phone</label>
                            @error('phone')
                                <div class="text-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"
                                id="inputPhone" placeholder="Phone Number" value="{{ old('phone') }}">
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Create Account</button>
                        </div>


                    </form>
                </div>

            </div>

        </div>
    </div>
@endsection
