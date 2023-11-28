<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $products = Product::all();
        $cartTotalQuantity = \Cart::getTotalQuantity();
        return view('home', compact('products'), compact('cartTotalQuantity'));

    }
}
