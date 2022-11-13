<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    public function index()
    {
        $products = DB::table('products')->select()->get();

        return view("pages/products")->with('products', $products);
    }
    public function viewProductDetail($id)
    {
        $product = DB::table('products')->select()->where('id', $id)->get();

        return view("pages/productDetail")->with('product', $product[0]);

    }

    public function deleteProduct($id)
    {
        $product = DB::table('products')->where('id', $id)->delete();

        return redirect('/products')->with('deleteAlert', true);
    }

    public function addProduct(Request $req){

        $validated = $req->validate([
            'name' => ['required', 'min:5'],
            'description' => ['required', 'min:15', 'max:500'],
            'price' => ['required', 'numeric', 'min:1000', 'max:10000000'],
            'stock' => ['required', 'numeric', 'min:1', 'max:10000'],
            'image' => ['required', '', ''],
            'category' => ['required', ''],
        ]);

        Product::create($validated);

        return redirect('/products')->with('addedAlert', true);
    }

}
