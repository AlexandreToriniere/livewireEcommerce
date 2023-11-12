<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        return view('frontend/product', compact('products'));
    }



    public function show($slug){
        $product = Product::where('slug', $slug)->firstorFail();
        return view('frontend/single-product', compact('product'));
    }
}
