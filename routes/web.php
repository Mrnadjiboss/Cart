<?php
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Models\CartItem;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CartItemController;
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
    $products = Product::all();
    $cartItems = CartItem::all();
    return view('welcome', compact('products', 'cartItems'));
});
Route::get('/products', [ProductController::class, 'index'])-> name("products.index");
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');


Route::get('/cart', function () {
    // Display the cart and handle cart actions
});

// Route to add an item to the cart
Route::post('/cart/add/{product}', [CartItemController::class, 'addToCart'])->name('cart.add');

// Route to remove an item from the cart
Route::post('/cart/remove/{product}', [CartItemController::class, 'removeFromCart'])->name('cart.remove');

Route::get('/cart', [CartController::class, 'showCart'])->name('cart.show');
