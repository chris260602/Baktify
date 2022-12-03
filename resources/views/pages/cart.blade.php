@extends('layouts.app')

@section('title', 'Cart | Baktify')

@section('content')
    @if (Session::has('deleteAlert'))
        <script>
            alert('Cart Successfully Deleted')
        </script>
    @endif
    @if (Session::has('updateAlert'))
        <script>
            alert('Cart Successfully Updated')
        </script>
    @endif
    @if (Session::has('failAlert'))
        <script>
            alert('Cart qty bigger than product qty')
        </script>
    @endif
    <div class="container ">
        @if (count($carts) == 0)
            <h2>Your cart is empty</h2>
        @else
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
                                <input type="hidden" id="productId" name="productId" value="{{ $cart->product->id }}">
                                <td>
                                    <div class="d-flex flex-row align-items-center">
                                        <img class="rounded-circle" src="/storage/productImages/{{$cart->product->image}}" style="width: 50px; height: 50px;">
                                        <p class="my-0 mx-2">{{ $cart->product->name }}</p>
                                    </div>
                                </td>
                                <td>{{ $cart->product->price }}</td>
                                <td><input type="number" min="0"
                                        class="form-control @error('qty') is-invalid @enderror" name="qty"
                                        id="exampleInputqtyl1" aria-describedby="qtylHelp" value="{{ $cart->qty }}">
                                </td>
                                <td>{{ $cart->qty * $cart->product->price }}</td>
                                <td><button type="submit" class="btn btn-primary">Update Cart</button></td>

                            </form>
                        </tr>
                    @endforeach
                    {{-- <td>{{ $carts->product->name }}</td> --}}
                </tbody>
            </table>
            <div class="d-flex align-items-center justify-content-between">
                <a href="/checkout" class="btn btn-primary">Checkout</a>
                <p>
                    <b>IDR.</b> {{ $amount }}
                </p>

            </div>

        @endif
    </div>
@endsection
