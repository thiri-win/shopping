<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::resource('products', ProductController::class);

Route::get('/', [ProductController::class, 'productList'])->name('products.list');
Route::get('/filter', [ProductController::class, 'filterByBrand'])->name('products.filter');


Route::get('cart', [ProductController::class, 'cart'])->name('cart');


Route::get('add-to-cart/{id}', [ProductController::class, 'addToCart'])->name('add.to.cart');

Route::patch('update-cart', [ProductController::class, 'updateCart'])->name('update.cart');
Route::delete('remove-from-cart', [ProductController::class, 'remove'])->name('remove.from.cart');

// Route::group(['middleware' => ['auth']], function() {

// });

 Route::get('/checkout', [OrderController::class, 'checkout'])->name('checkout');
    Route::post('place-order',[OrderController::class, 'store'])->name('checkout.place.order');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');