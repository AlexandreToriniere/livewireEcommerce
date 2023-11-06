<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Frontend\CategoryController as FrontendCategoryController;
use App\Http\Controllers\Frontend\ProductController as FrontendProductController;
use App\Http\Controllers\Frontend\CheckoutController as FrontendCheckoutController;
use App\Http\Controllers\Frontend\CartController as FrontendCartController;


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

Route::get('/', function () {
    return view('welcome');
});


//---------------------------Frontend---------------------------->
Route::get('/categories', [FrontendCategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{category}', [FrontendCategoryController::class, 'show'])->name('categories.show');

//---------------------------Products---------------------------->
Route::get('/produits', [FrontendProductController::class, 'index'])->name('products.index');
Route::get('/{product}',[FrontendProductController::class, 'show'])->name('products.show');

//---------------------------Cart---------------------------->
Route::get('/cart',[FrontendCartController::class, 'index'])->name('cart.index');
Route::get('/cart',[FrontendCartController::class, 'store'])->name('cart.store');
Route::get('/cart/reset',[FrontendCartController::class, 'reset'])->name('cart.reset');

//---------------------------Checkout---------------------------->
Route::get('/checkout', [FrontendCheckoutController::class, 'index'])->name('checkout.index');
// Route::get('/checkout', [FrontendCheckoutController::class, 'index'])->name('checkout.index');




//---------------------------Frontend---------------------------->
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'admin'])->name('admin.')->prefix('admin')->group(function(){
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::resource('/categories', CategoryController::class);
    Route::resource('/products', ProductController::class);
    Route::resource('/reservations', ReservationController::class);
});

require __DIR__.'/auth.php';
