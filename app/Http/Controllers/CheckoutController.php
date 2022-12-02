<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $user_id = auth()->user()->id;
        $carts = Cart::with("product")->where("user_id", $user_id)->get();
        $user = User::find($user_id);
        $totalAmount = 0;
        foreach ($carts as $cart) {
            $totalAmount += $cart->product->price * $cart->qty;
        }
        return view("pages.checkout")->with("carts", $carts)->with("amount", $totalAmount)->with("address", $user->address);
    }

    public function submit(Request $request)
    {
        $user_id = auth()->user()->id;
        $carts = Cart::with("product")->where("user_id", $user_id)->get();
        $validated = $request->validate([
            'confirmPass' => ['required'],
        ]);
        if ($request->confirmPass == $request->passcode) {
            $transaction = Transaction::create([
                'user_id' => $user_id,
                'address' =>  $request->address,
                'totalItem' => count($carts),
            ]);

            foreach ($carts as $cart) {
                TransactionDetail::create([
                    'transaction_id' => $transaction->id,
                    'product_id' => $cart->product->id,
                    'qty' => $cart->qty,
                ]);
            }
            Cart::where("user_id", $user_id)->delete();
            return redirect('/checkout')->with('sucessAlert', true);
        } else {
            return redirect('/checkout')->with('errorAlert', true);
        }
    }
}
