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
use App\Http\Controllers\Frontend\testcontroller as Frontendtestcontroller;


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

Route::get('/test', [Frontendtestcontroller::class, 'index'])->name('test.index');
Route::get('/test/success', [Frontendtestcontroller::class, 'success' ])->name('test.success');
Route::post('/session',[Frontendtestcontroller::class,'session' ])->name('session');

//---------------------------Frontend---------------------------->
Route::get('/categories', [FrontendCategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{category}', [FrontendCategoryController::class, 'show'])->name('categories.show');

//---------------------------Products---------------------------->
Route::get('/produits', [FrontendProductController::class, 'index'])->name('products.index');
Route::get('/{product}',[FrontendProductController::class, 'show'])->name('products.show');

//---------------------------Cart---------------------------->
Route::get('/panier', 'App\Http\Controllers\Frontend\CartController@index')->name('cart.index');
Route::get('/panier/reset', [FrontendCartController::class,'reset'])->name('cart.reset');
Route::post('/panier/success',[FrontendCartController::class, 'store'])->name('cart.store');
Route::delete('/panier/{product}', [FrontendCartController::class, 'destroy'])->name('cart.destroy');



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

});

require __DIR__.'/auth.php';
