@extends('layouts.app')

@section('title', 'Profile | Baktify')

@section('content')
    <div class="container ">
        <div class="row">
            <div class="col-12 d-flex flex-column align-items-center">
                <h1 class="mb-4">Your Profile</h1>

                <div class="card p-3 col-6" style="box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;">
                    <form @disabled(true)>

                        <div class="form-group mb-3">
                            <label for="inputName">Name</label>


                            <input type="text" name="name" class="form-control"disabled id="inputName"
                                aria-describedby="nameHelp" placeholder="Enter name" value="{{ auth()->user()->name }}">

                        </div>
                        <div class="form-group mb-3">
                            <label for="inputEmail">Email address</label>

                            <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
                                id="inputEmail" aria-describedby="emailHelp" placeholder="Enter email"
                                value="{{ auth()->user()->email }}" disabled>

                        </div>
                        <div class="row">
                            <div class="form-group mb-3 col-6">
                                <label for="inputPassword">Password</label>

                                <input type="password" name="password" class="form-control" id="inputPassword" disabled
                                    placeholder="Password" value="its a secret password">
                            </div>

                        </div>


                        <div class="form-group mb-3">
                            <label for="inputAddress">Address</label>

                            <textarea class="form-control" name="address" id="inputAddress" rows="3" disabled>{{ auth()->user()->address }}</textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="inputPhone">Phone</label>

                            <input type="text" name="phone" class="form-control" id="inputPhone"
                                placeholder="Phone Number" value="{{ auth()->user()->phone }}" disabled>
                        </div>
                        <div class="d-flex justify-content-end gap-2">
                            <a href="profile/update" class="btn btn-primary ">Update</a>
                            <a href="/logoff" class="btn btn-danger">Sign Out</a>
                        </div>


                    </form>
                </div>

            </div>

        </div>
    </div>


@endsection
