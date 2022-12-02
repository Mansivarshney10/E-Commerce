<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SiteCheckoutController;
use App\Http\Controllers\ViewOrderController;

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
    return view('index');
});

Route::get('user', function () {
    return view('user-Details');
});

Route::get('product-display', function () {
    return view('product-display');
});

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post'); 
Route::get('registration', [AuthController::class, 'registration'])->name('register');
Route::post('post-registration', [AuthController::class, 'postRegistration'])->name('register.post'); 
Route::get('dashboard', [AuthController::class, 'dashboard']); 
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('product', [ProductController::class, 'index']);  
Route::get('cart', [ProductController::class, 'cart'])->name('cart');
Route::get('add-to-cart/{id}', [ProductController::class, 'addToCart'])->name('add.to.cart');
Route::patch('update-cart', [ProductController::class, 'update'])->name('update.cart');
Route::delete('remove-from-cart', [ProductController::class, 'remove'])->name('remove.from.cart');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/checkout', [SiteCheckoutController::class, 'getCheckout'])->name('checkout.index');
    Route::post('/checkout/order', [SiteCheckoutController::class, 'placeOrder'])->name('checkout.place.order');
});

Route::get('myorders', [ViewOrderController::class, 'index']); 

Route::post('/mail', [SiteCheckoutController::class, 'subscribe']);