<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    public function index()
    {
        $products = DB::table('products')->select()->get();

        return view("products")->with('products', $products);
    }
    public function viewProductDetail($id)
    {

        $product = DB::table('products')->select()->where(['id', $id])->get()->first;

        return view("productDetail")->with('product', $product);

    }
}
