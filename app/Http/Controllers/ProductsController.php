<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    public function index(Request $req)
    {
        if ($req->query('q') === null) {
            $products = Product::simplePaginate(12);

            return view("pages/products")->with('products', $products);
        } else {
            $query = "%".$req->query('q')."%";
            $products = Product::where('name', 'like', [$query])->get();

            if (count($products) === 0) {
                $error = "No products match for '".$req->query('q')."'";
                return view("pages/products")->with('products', $products)->with('error',$error);
            }else{
                return view("pages/products")->with('products', $products);
            }
        }
    }
    public function viewProductDetail($id)
    {
        $product = Product::find($id);

        return view("pages/productDetail")->with('product', $product);
    }
    public function viewEditProduct($id)
    {
        $product = Product::find($id);

        return view("pages/editProduct")->with('product', $product);
    }

    public function deleteProduct($id)
    {
        Storage::delete(Product::find($id)->image);
        Storage::delete('/productImages/'.Product::find($id)->image);
        Product::find($id)->delete();

        return redirect('/products')->with('deleteAlert', true);
    }

    public function viewAddProduct(Request $req){

        $categories = Category::all();

        return view('pages/addProduct')->with('categories', $categories);
    }
    public function addProduct(Request $req){

        $validated = $req->validate([
            'name' => ['required', 'min:5'],
            'description' => ['required', 'min:15', 'max:500'],
            'price' => ['required', 'numeric', 'min:1000', 'max:10000000'],
            'stock' => ['required', 'numeric', 'min:1', 'max:10000'],
            'image' => ['required', 'mimetypes:image/jpg,image/jpeg,image/png'],
            'category' => ['required'],
        ]);

        // dd($validated);

        $filePath = Storage::putFile('', $validated['image']);
        Storage::move('/'.$filePath,'/productImages/'.$filePath);
        $validated['image'] = $filePath;

        Product::create($validated);

        return redirect('/products')->with('addedAlert', true);
    }
    public function editProduct($id, Request $req){

        $validated = $req->validate([
            'description' => ['required', 'min:15', 'max:500'],
            'price' => ['required', 'numeric', 'min:1000', 'max:10000000'],
            'stock' => ['required', 'numeric', 'min:1', 'max:10000'],
            'image' => ['required', 'mimetypes:image/jpg,image/jpeg,image/png'],
        ]);

        Storage::delete('/productImages/'.Product::find($id)->image);
        $filePath = Storage::putFile('', $validated['image']);
        Storage::move('/'.$filePath,'/productImages/'.$filePath);

        $updateDetails = [
            'description' => $validated['description'],
            'price' => $validated['price'],
            'stock' => $validated['stock'],
            'image' => $filePath,
        ];

        Product::find($id)->update($updateDetails);

        return redirect('/products')->with('addedAlert', true);
    }

}
