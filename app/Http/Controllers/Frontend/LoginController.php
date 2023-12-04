<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        $cartCollection = \Cart::getContent();
        $cartTotalQuantity = $cartCollection->count();
        return view('login', compact('cartTotalQuantity'));
    }
}
