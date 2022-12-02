<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){

        $categories = Category::all();

        return view('pages/addCategory')->with('categories', $categories);
    }
    public function addCategory(Request $req){

        $validated = $req->validate([
            'name' => ['required', 'unique:categories'],
        ]);

        Category::create($validated);

        $req->session()->flash('addedAlert', true);
        return redirect("/add-category");
    }
}
