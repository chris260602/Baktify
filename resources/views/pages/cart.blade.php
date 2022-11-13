@extends('layouts.app')

@section('title', 'Cart | Baktify')

@section('content')
    <div class="container ">
        {{-- @if (count($carts) == 0)
            <h2>Your cart is empty</h2>
        @else --}}
        <h2>Your cart</h2>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">PRODUCT</th>
                    <th scope="col">PRICE</th>
                    <th scope="col">QTY</th>
                    <th scope="col">SUBTOTAL</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($carts as $cart)
                    <tr>
                        <form action="/cart/update/{{ $cart->id }}" method="POST">
                            @method('put')
                            @csrf
                            <input type="hidden" id="Id" name="id" value="{{ $cart->id }}">
                            <td>{{ $cart->product->name }}</td>
                            <td>{{ $cart->product->price }}</td>
                            <td><input type="number" min="0" class="form-control @error('qty') is-invalid @enderror"
                                    name="qty" id="exampleInputqtyl1" aria-describedby="qtylHelp"
                                    value="{{ $cart->qty }}"> </td>
                            <td>{{ $cart->qty * $cart->product->price }}</td>
                            <td><button type="submit" class="btn btn-primary">Update Cart</button></td>

                        </form>
                    </tr>
                @endforeach
                {{-- <td>{{ $carts->product->name }}</td> --}}
            </tbody>
        </table>
        {{-- @endif --}}
        <button type="submit" class="btn btn-primary">Checkout</button>
    </div>
@endsection
