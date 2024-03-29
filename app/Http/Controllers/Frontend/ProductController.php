<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        $cartCollection = \Cart::getContent();
        $cartTotalQuantity = $cartCollection->count();
        return view('frontend/product', compact('products', 'cartTotalQuantity'));
    }


    //-------Single Product----------//
    public function show($slug){
        $product = Product::where('slug', $slug)->firstorFail();
        $cartCollection = \Cart::getContent();
        $cartTotalQuantity = $cartCollection->count();
        return view('frontend/single-product', compact('product', 'cartTotalQuantity'));
    }
}
