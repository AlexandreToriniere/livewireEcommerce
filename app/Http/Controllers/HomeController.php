<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $products = Product::all();
        $cartCollection = \Cart::getContent();
        $cartTotalQuantity = $cartCollection->count();
        return view('home', compact('products'), compact('cartTotalQuantity'));
    }
}
