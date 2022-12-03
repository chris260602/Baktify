@extends('layouts.app')

@section('title', 'Checkout | Baktify')

@section('content')
    @if (Session::has('sucessAlert'))
        <script>
            alert('Transaction Success! You will receive our products soon! Thank you for shopping with us!')
        </script>
    @endif
    @if (Session::has('errorAlert'))
        <script>
            alert('Code is not the same!')
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

                    </tr>
                </thead>
                <tbody>
                    @foreach ($carts as $cart)
                        <tr>

                            <input type="hidden" id="Id" name="id" value="{{ $cart->id }}">
                            <input type="hidden" id="productId" name="productId" value="{{ $cart->product->id }}">
                            <td>
                                <div class="d-flex flex-row align-items-center">
                                    <img class="rounded-circle" src="/storage/productImages/{{$cart->product->image}}" style="width: 50px; height: 50px;">
                                    <p class="my-0 mx-2">{{ $cart->product->name }}</p>
                                </div>
                            </td>
                            <td>{{ $cart->product->price }}</td>
                            <td>{{ $cart->qty }}
                            </td>
                            <td>{{ $cart->qty * $cart->product->price }}</td>
                        </tr>
                    @endforeach
                    {{-- <td>{{ $carts->product->name }}</td> --}}
                </tbody>
            </table>
            <div class="d-flex align-items-center justify-content-between">
                <p>Ship to: {{ $address }}</p>
                <p>
                    <b>IDR.</b> {{ $amount }}
                </p>

            </div>

            <div class="d-flex align-items-center justify-content-end">

                <form action="/checkout/submit" method="POST">
                    @csrf
                    <input type="hidden" name="amount" value="{{ $amount }}">
                    <input type="hidden" name="address" value="{{ $address }}">
                    <p>Please enter the following passcode to checkout: <input type="text"
                            value="{{ Str::upper(Str::random(6)) }}" id="passcode" name="passcode" readonly
                            style="border: none;background: white"> </p>
                    <input type="text" class="form-control @error('confirmPass') is-invalid @enderror"
                        placeholder="XXXXXX" id="confirmPass" name="confirmPass">
                    <button type="submit" class="btn btn-primary mt-3 w-100">Submit</button>
                </form>
            </div>

        @endif
    </div>
@endsection
