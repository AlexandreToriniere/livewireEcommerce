<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CouponsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Frontend\CartController as FrontendCartController;
use App\Http\Controllers\Frontend\LoginController as FrontendLoginController;
use App\Http\Controllers\Frontend\ProductController as FrontendProductController;
use App\Http\Controllers\Frontend\CheckoutController as FrontendCheckoutcontroller;
use App\Http\Controllers\Frontend\RegisterController as FrontendRegisterController;


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

Route::get('/home',[HomeController::class, 'index'])->name('home.index');
//---------------------------Frontend---------------------------->

Route::get('/checkout', [FrontendCheckoutController::class, 'index'])->name('checkout.index');
Route::get('/checkout/success', [FrontendCheckoutController::class, 'success' ])->name('checkout.success');
Route::post('/session',[FrontendCheckoutController::class,'session' ])->name('session');
Route::get('/checkout/reset', [FrontendCheckoutController::class,'reset'])->name('checkout.reset');
Route::post('/checkout/success',[FrontendCheckoutController::class, 'store'])->name('checkout.store');
Route::delete('/checkout/{product}', [FrontendCheckoutController::class, 'destroy'])->name('checkout.destroy');

//---------------------------Login------------------------------>
Route::get('/logins', [FrontendLoginController::class, 'index'])->name('login.index');
Route::get('/register', [FrontendRegisterController::class, 'index'])->name('register.index');


//---------------------------Products---------------------------->
Route::get('/produits', [FrontendProductController::class, 'index'])->name('products.index');
Route::get('/{product}',[FrontendProductController::class, 'show'])->name('products.show');

//---------------------------Coupons---------------------------->

Route::post('/coupon', [CouponsController::class, 'store'])->name('coupon.store') ;
Route::delete('/coupon', [CouponsController::class, 'destroy'])->name('coupon.destroy') ;

//---------------------------Frontend---------------------------->




//---------------------------Backend---------------------------->
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

});

require __DIR__.'/auth.php';
