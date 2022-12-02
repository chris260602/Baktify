@extends('layouts.app')

@section('title', 'Transaction | Baktify')

@section('content')

    <div class="container ">
        @if (count($transactions) == 0)
            <h2>Your Transaction is empty</h2>
        @else
            <h2>Your transaction</h2>
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
                    @foreach ($transactions as $singleTransaction)
                        <tr>
                            <td colspan="4" style="padding-top: 20px"><b>{{ $singleTransaction['transactionDate'] }}</b>
                            </td>

                        </tr>
                        @foreach ($singleTransaction['0'] as $transaction)
                            <tr>

                                <td><img class="card-img-top"
                                        src="/storage/productImages/{{ $transaction->product->image }}" />{{ $transaction->product->name }}
                                </td>
                                <td>{{ $transaction->product->price }}</td>
                                <td>{{ $transaction->qty }}
                                </td>
                                <td>{{ $transaction->qty * $transaction->product->price }}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="3"></td>
                            <td colspan="1" style="padding-bottom: 20px"><b>IDR.
                                    {{ $singleTransaction['totalPrice'] }}</b>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
