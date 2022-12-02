<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $carts = Cart::with("product")->where("user_id", $user_id)->get();
        $totalAmount = 0;
        foreach ($carts as $cart) {
            $totalAmount += $cart->product->price * $cart->qty;
        }
        return view("pages.cart")->with("carts", $carts)->with("amount", $totalAmount);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function add(Request $req, $id)
    {
        $product = Product::find($id);
        $user_id = auth()->user()->id;
        $cartData = Cart::with("product")->where("user_id", $user_id)
            ->where("product_id", $id)
            ->first();
        if ($product != null) {
            if ($cartData && $product->stock >= $cartData->qty + 1) {
                $cartData->qty += 1;
                $cartData->update();
            } else if ($product->stock >= 1) {
                Cart::create(['product_id' => $id, 'user_id' => $user_id, 'qty' => 1]);
            }
        }
        $req->session()->flash('addedCart', true);
        return redirect("/products");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCartRequest  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validated = $request->validate([
            'qty' => ['required', 'numeric', 'min: 0',],
        ]);
        $product = Product::find($request->productId);
        if ($request->qty == 0) {
            Cart::find($request->id)->delete();
            return redirect('/cart')->with('deleteAlert', true);
        } else if ($product->stock < $request->qty) {
            return redirect('/cart')->with('failAlert', true);
        } else {
            $product->qty = $request->qty;
            Cart::find($request->id)->update(['qty' => $request->qty]);
            return redirect('/cart')->with('updateAlert', true);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Cart::find($id)->delete();
    }
}
