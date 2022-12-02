<?php


use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CategoryController;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('pages/home');
});
Route::get('/home', function () {

    return view('pages/home');
})->name("home");

Route::get("/login", [LoginController::class, "index"])->middleware("guest");
Route::post("/login", [LoginController::class, "authenticate"]);
Route::get("/logoff", [LoginController::class, "logoff"]);

Route::get('/about-us', function () {
    return view('pages/aboutUs');
})->middleware("checkAdmin"); //Testing


Route::get("/register", [RegisterController::class, "index"])->middleware("guest");
Route::post("/register", [RegisterController::class, "handleRegister"]);
Route::get("/products", [ProductsController::class, "index"]);
Route::get("/products/{id}", [ProductsController::class, "viewProductDetail"]);

Route::get("/profile", [ProfileController::class, "index"])->middleware("auth");
Route::put("/profile", [ProfileController::class, "update"])->middleware("auth");
Route::get("/profile/update", [ProfileController::class, "viewUpdate"])->middleware("auth");

Route::get("/cart", [CartController::class, "index"])->middleware("checkMember");
Route::put("/cart/add/{id}", [CartController::class, "add"])->middleware("checkMember");
Route::put("/cart/update/{id}", [CartController::class, "update"])->middleware("checkMember");

Route::get("/checkout", [CheckoutController::class, "index"])->middleware("checkMember");
Route::post("/checkout/submit", [CheckoutController::class, "submit"])->middleware("checkMember");

Route::get("/transactions", [TransactionController::class, "index"])->middleware("checkMember");

Route::delete("/products/{id}", [ProductsController::class, "deleteProduct"]);

Route::get("/add-products", [ProductsController::class, "viewAddProduct"]);
Route::post("/add-products", [ProductsController::class, "addProduct"]);

Route::get("/edit-product/{id}", [ProductsController::class, "viewEditProduct"]);
Route::post("/edit-product/{id}", [ProductsController::class, "editProduct"]);

Route::get('/add-category', [CategoryController::class, 'index']);
Route::post('/add-category', [CategoryController::class, 'addCategory']);
